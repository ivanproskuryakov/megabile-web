<?php

namespace Magazento\ServiceBundle\Model;

use Magazento\SettingsBundle\Document\Mail;
use Magazento\SettingsBundle\Document\Apple;
use Magazento\SettingsBundle\Document\Company;
use Magazento\SettingsBundle\Document\Iphone;
use Magazento\SettingsBundle\Document\IphoneTranslation;

class Certificates {

    protected $security_context;
    protected $dm;
    protected $container;

    public function __construct($security_context,$doctrine,$service_container)
    {
        $this->security_context = $security_context;   
        $this->dm =        $doctrine;
        $this->container = $service_container;
        $this->dir =       $this->container->getParameter('uploads_secure_directory');        
    }
    

    public function getCertificates() {
        $usr = $this->security_context->getToken()->getUser();
        $api = $this->container->getParameter('server').'/check/sertificate/'.$usr->getUsername().'/';
        $json = file_get_contents($api);
        $response = json_decode($json);
        
        return $response;
    }
    
    public function installKeychain() {
        $usr = $this->security_context->getToken()->getUser();
        $api = $this->container->getParameter('server').'/install/keychain/'.$usr->getUsername().'/';
        $json = file_get_contents($api);
        $response = json_decode($json);
        return $response;
    }
    
    public function deleteCertificate($type) {
        $usr = $this->security_context->getToken()->getUser();
        $api = $this->container->getParameter('server').'/delete/sertificate/'.$usr->getUsername().'/'.$type.'/';
        $json = file_get_contents($api);
        $response = json_decode($json);
        return $response;
    }    
    
    
    public function installCertificate($form) {
        $usr = $this->security_context->getToken()->getUser();
        $response->status = true;
        
        $p12 = $form->get('p12')->getData();
        $mob = $form->get('mobileprovision')->getData();
        $password = $form->get('password')->getData();
        $type = $form->get('type')->getData();
        
        if (pathinfo($p12->getClientOriginalName(), PATHINFO_EXTENSION) != 'p12') {
            $response->message = 'Wrong file type for: Certificate';
            $response->status = false;
        }
        if (pathinfo($mob->getClientOriginalName(), PATHINFO_EXTENSION) != 'mobileprovision') {
            $response->message = 'Wrong file type for: Mobileprovision';
            $response->status = false;
        }
        
        if ($response->status) {
            
            $p12Data = file_get_contents($p12->getRealPath());
            $mobData = file_get_contents($mob->getRealPath());
            $api = $this->container->getParameter('server').'/install/sertificate/';
            list($status) = get_headers($api);
            if (strpos($status, '404') !== FALSE) {
                $response->message = '404 server unreachable';
                $response->status = false;
                return $response;
            }
            
            
            $postData = array();
            $postData['user'] = $usr->getUsername();
            $postData['p12'] = $p12Data;
            $postData['mob'] = $mobData;
            $postData['password'] = $password;
            $postData['type'] = $type;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            $json = curl_exec($ch);
            curl_close($ch);
            
            $response = json_decode($json);
            return $response;
        }
        return $response;
    }
    
}
    