<?php

namespace Magazento\ServiceBundle\Model;

use XMLWriter;
use Magazento\BuildBundle\Document\BuildHistory;
class BuildIphone {

    protected $security_context;
    protected $dm;
    protected $container;
    
    protected $user_dir;
    protected $defaults;
    protected $target;
    protected $version;
    protected $build;
    protected $user;
    protected $type;
    protected $system_user;

    public function __construct($security_context,$doctrine,$service_container)
    {
        $this->security_context = $security_context;   
        $this->dm           = $doctrine;
        $this->container    = $service_container;
        $this->user         = $this->security_context->getToken()->getUser();
        $this->user_dir     = $this->container->getParameter('uploads_secure_directory') . '/' . $this->user->getUserName();
        $this->defaults     = $this->container->getParameter('defaults_dir');
    }
    
    public function compileRequest($form,$identity) {
        $this->version = $form->get('version')->getData();
        $this->build = $form->get('build')->getData(); 
        $this->type = $form->get('type')->getData(); 
        
        if (!file_exists($this->user_dir.'/icon.png'))              copy($imagesDir.'/icon.png',$this->user_dir.'/icon.png');
        if (!file_exists($this->user_dir.'/icon@2x.png'))           copy($imagesDir.'/icon@2x.png',$this->user_dir.'/icon@2x.png');
        if (!file_exists($this->user_dir.'/Default.png'))           copy($imagesDir.'/Default.png',$this->user_dir.'/Default.png');
        if (!file_exists($this->user_dir.'/Default@2x.png'))        copy($imagesDir.'/Default@2x.png',$this->user_dir.'/Default@2x.png');
        if (!file_exists($this->user_dir.'/Default-568h@2x.png'))   copy($imagesDir.'/Default-568h@2x.png',$this->user_dir.'/Default-568h@2x.png');
        
        $api = $this->container->getParameter('server').'/compile/iphone/';
        
        $postData = array();
        $postData['icon']            = file_get_contents($this->user_dir.'/icon.png');
        $postData['icon@2x']         = file_get_contents($this->user_dir.'/icon@2x.png');
        $postData['Default']         = file_get_contents($this->user_dir.'/Default.png');
        $postData['Default@2x']      = file_get_contents($this->user_dir.'/Default@2x.png');
        $postData['Default-568h@2x'] = file_get_contents($this->user_dir.'/Default-568h@2x.png');
        
        $postData['info']            = file_get_contents($this->user_dir.'/info.xml');
        $postData['plist']           = file_get_contents($this->user_dir.'/info.plist');
        
        $postData['identity'] = $identity;        
        $postData['type'] = $this->type;
        $postData['user'] = $this->user->getUsername();        

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
    
    public function createInfoFile() {
        $api_url = $this->container->getParameter('api_url_store');
        $infoXml = $this->user_dir.'/info.xml';
        
        $w = new XMLWriter();
        $w->openMemory();
        $w->setIndent(true);
        $w->startDocument('1.0', 'UTF-8');
            $w->startElement('shop');

                $w->startElement('api');
                $w->text($api_url);
                $w->endElement();  

                $w->startElement('user');
                $w->text($this->user->getUsername());
                $w->endElement();
                
                $w->startElement('apikey');
                $w->text($this->user->getApiKey());
                $w->endElement();

            $w->endElement();
        $w->endDocument();
        $data = $w->outputMemory(true);
        
        $encrypted_data = base64_encode('0'.$data);
        $encrypted_data = base64_encode('1'.$encrypted_data);
        $encrypted_data = base64_encode('2'.$encrypted_data);
        $encrypted_data = base64_encode('3'.$encrypted_data);
        $encrypted_data = base64_encode('4'.$encrypted_data);
        
        file_put_contents($infoXml, $encrypted_data );
    }
    
    public function copyImages() {
        $imagesDir = $this->defaults.'/images';
        
        if (!file_exists($this->user_dir.'/icon.png'))              copy($imagesDir.'/icon.png',$this->user_dir.'/icon.png');
        if (!file_exists($this->user_dir.'/icon@2x.png'))           copy($imagesDir.'/icon@2x.png',$this->user_dir.'/icon@2x.png');
        if (!file_exists($this->user_dir.'/Default.png'))           copy($imagesDir.'/Default.png',$this->user_dir.'/Default.png');
        if (!file_exists($this->user_dir.'/Default@2x.png'))        copy($imagesDir.'/Default@2x.png',$this->user_dir.'/Default@2x.png');
        if (!file_exists($this->user_dir.'/Default-568h@2x.png'))   copy($imagesDir.'/Default-568h@2x.png',$this->user_dir.'/Default-568h@2x.png');
        
    }
    
    public function updatePlist() {
        $plistInfo = $this->user_dir.'/info.plist';
        $plistTemplate = $this->defaults.'/template.plist';
        
        $iphoneSettings = $this->dm->getRepository('MagazentoSettingsBundle:Iphone')->findOneBy(array('user_id' => $this->user->getId()));
        $template = file_get_contents($plistTemplate);
        $template = str_replace('${PRODUCT_NAME}', $iphoneSettings->getProductName(), $template);
        $template = str_replace('${IDENTIFIER}', $this->user->getUsername(), $template);
        $template = str_replace('${SHORT_VERSION}', $this->version, $template);
        $template = str_replace('${BUILD}',$this->build, $template);

        $file = fopen($plistInfo, "w");
        fwrite($file,$template);
        fclose($file);        
    }
    
    
// HISTORY ********************
    
    public function saveHistory($log) {
        
        $history = new BuildHistory();
        $history->setUserId($this->user->getId());
        $history->setType('iphone');
        $history->setLogTime(time());
        $history->setLog($log);
        $this->dm->persist($history);
        $this->dm->flush();    
    }
    
    public function getLastHistoryStatus($type) {
        
        $record = $this->dm->getRepository('MagazentoBuildBundle:BuildHistory')->getLast($this->user->getId(),$type);  
        
        
        $result = array();
        $result['status'] = false;
        $result['time'] = ' - ';
        $result['message'] = 'Error has been found...';
        $result['log'] = '';
        
        
        if (count($record)) {
            $log = $record->getLog();
            $result['log'] = $log;
            $result['time'] = date("F j, Y, g:i a",$record->getLogTime()->__toString());
        } else {
            return false;
        } 
        
        if (strpos($log,"CONFIGURATION = Release")) $result['type'] = 'Distribution';
        if (strpos($log,"CONFIGURATION = Debug"))   $result['type']   = 'Testing';
        

        
        // ERRRORS        
        if (strpos($log,"doesn't match any valid")) {
            $result['message'] = 'Identity doesn\'t match any valid, non-expired certificate/private key pair in your keychains';
        }
        
        if (strpos($log,"Permission denied")) {
            $result['message'] = 'Permission denied.';
        }
        
        if (strpos($log,"Command /usr/bin/codesign failed with exit code 1")) {
            $result['message'] = 'Codesign failed with exit code 1. Failed code sign';
        }
        
        if (strpos($log,"provisioning profile matching the application")) {
            $result['message'] = 'Code Sign error, valid provisioning profile matching the application\'s Identifier not found';
        }
        
        if (strpos($log,"unexpired provisioning profiles found that contain")) {
            $result['message'] = 'Code Sign error, no unexpired provisioning profiles found that contain any of the keychain\'s signing certificates';
        }
        
        // SUCCEEDED                
        if (strpos($log,"** BUILD SUCCEEDED **")) {
            $result['status'] = true;
            $result['message'] = 'BUILD SUCCEEDED';
        }        
        
        return $result;
    }
    
// DOWNLOAD ********************
 
    
    public function downloadIphone()
    {
        
        $api = $this->container->getParameter('server').'/download/iphone/'.$this->user->getUsername()."/";
        

        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_NOBODY, false); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $valid = curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200;
        curl_close($ch);
        if ($valid) return $response;
        return false;

    }    
    
    
            
}