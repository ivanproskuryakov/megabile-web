<?php

namespace Magazento\ServiceBundle\Model;

use Magazento\SettingsBundle\Document\Mail;
use Magazento\SettingsBundle\Document\Apple;
use Magazento\SettingsBundle\Document\Company;
use Magazento\SettingsBundle\Document\Iphone;
use Magazento\SettingsBundle\Document\IphoneTranslation;

class Settings {

    protected $security_context;
    protected $dm;
    protected $container;
    protected $session;
    protected $dir;

    public function __construct($security_context,$doctrine,$service_container,$session)
    {
        $this->security_context = $security_context;   
        $this->dm = $doctrine;
        $this->container = $service_container;
        $this->session = $session;
        $this->dir = $this->container->getParameter('uploads_secure_directory');
        
    }
    
    public function saveIphone($form) {
        
        $usr = $this->security_context->getToken()->getUser();
        $dm = $this->dm;
        
        $iphone = $dm->getRepository('MagazentoSettingsBundle:Iphone')->findOneBy(array('user_id' => $usr->getId()));
        if (!$iphone) $iphone = new Iphone();
        
        // ICON
        $icon = $form->get('icon')->getData();
        $iconRetina = $form->get('icon_retina')->getData();
        if ($icon) {
            $iphone->setIcon(TRUE);
            $icon->move($this->dir . '/' . $usr->getUsername(), 'icon.png');
        }
        if ($iconRetina) {
            $iphone->setIconRetina(TRUE);
            $iconRetina->move($this->dir . '/' . $usr->getUsername(), 'icon@2x.png');
        }
        
        // SPLASH
        $default = $form->get('default')->getData();
        $defaultRetina = $form->get('default_retina')->getData();
        $defaultRetina568h = $form->get('default_retina_568h')->getData();
        if ($default) {
            $iphone->setDefault(TRUE);
            $default->move($this->dir . '/' . $usr->getUsername(), 'Default.png');
        }
        if ($defaultRetina) {
            $iphone->setDefaultRetina(TRUE);
            $defaultRetina->move($this->dir . '/' . $usr->getUsername(), 'Default@2x.png');
        }
        if ($defaultRetina568h) {
            $iphone->setDefaultRetina568h(TRUE);
            $defaultRetina568h->move($this->dir . '/' . $usr->getUsername(), 'Default-568h@2x.png');
        }
        
        
        $iphone->setProductName($form->get('product_name')->getData());
        $iphone->setUserId($usr->getId());
        
        $dm->persist($iphone);
        $dm->flush();       
        
        $this->session->setFlash('notice', 'iPhone settings were updated');        

    }
    
    public function saveIphoneTranslation($request) {
        
        $usr = $this->security_context->getToken()->getUser();
        $dm = $this->dm;

        $userTranslation = $request->request->get('iphoneTranslation');
        $default = $this->getDefaultTranslation();

        if (count($userTranslation) == count($default)) {

            for ($i=0; $i < count($default);$i++) {
                $item = explode('*****', $default[$i]);
                $translationDB .=  $item[0] .'*****'. $userTranslation[$i]."\n";
            }       
            $model = $dm->getRepository('MagazentoSettingsBundle:IphoneTranslation')->findOneBy(array('user_id' => $usr->getId()));

            if (!$model)
                $model = new IphoneTranslation();
            $model->setUserId($usr->getId());
            $model->setText($translationDB);
            $dm->persist($model);
            $dm->flush();     
            
            $this->session->setFlash('notice', 'Translations for Iphone App were updated');
        }
    }

    public function saveCompany($form) {
        
        $usr = $this->security_context->getToken()->getUser();
        $dm = $this->dm;
        
        $company = $dm->getRepository('MagazentoSettingsBundle:Company')->findOneBy(array('user_id' => $usr->getId()));
        if (!$company)
            $company = new Company();
        $company->setUserId($usr->getId());
        $company->setName($form->get('name')->getData());
        $company->setAddressLine($form->get('address_line')->getData());
        $company->setCountry($form->get('country')->getData());
        $company->setRegion($form->get('region')->getData());
        $company->setCity($form->get('city')->getData());
        $company->setZip($form->get('zip')->getData());

        $company->setCurrency($form->get('currency')->getData());
        $company->setEmail($form->get('email')->getData());
        $company->setPhone($form->get('phone')->getData());
        $company->setOrdering($form->get('ordering')->getData());
        $company->setShipping($form->get('shipping')->getData());
        $company->setPrivacy($form->get('privacy')->getData());
        $company->setWebsite($form->get('website')->getData());
        $company->setCancellation($form->get('cancellation')->getData());

        $dm->persist($company);
        $dm->flush();  
        
        $this->session->setFlash('notice', 'Settings for Company were updated');        
    }

    
    
    /*
     * Translations
     */     
    public function translationToArray($userdata) {
        
        // Prepare
        $userdataArray = array();
        $data = explode("\n",trim($userdata));
        for ($i=0; $i < count($data); $i++) {
            $item = explode('*****', $data[$i]);
            $userdataArray[$i] = $item[1];
        }        
 
        // Update
        $defaults = $this->container->getParameter('defaults_dir');        
        $default = file_get_contents($defaults.'/translation.csv');           
        $default = explode("\n",trim($default));
        for ($i=0; $i < count($default);$i++) {
            $item = explode('*****', $default[$i]);
            $translationArray[] = array("id"=>$i,'key'=>$item[0],'value'=>$userdataArray[$i]);
        }
        
        return $translationArray;
    }
    
    
    public function getDefaultTranslation() {
        
        $defaults = $this->container->getParameter('defaults_dir');        
        $translationData = file_get_contents($defaults.'/translation.csv');    
        $translationData = explode("\n",$translationData);     
        
        return $translationData;
    }
    
    public function getImages() {
        $usr = $this->security_context->getToken()->getUser();
        $imagesDir = $this->container->getParameter('defaults_dir').'/images'; 
        $dir = $this->container->getParameter('uploads_secure_directory'); 
        
        $images = array();
       
        
        $images['icon'] = $this->imgBase64($imagesDir.'/icon.png');
        $images['icon_retina'] = $this->imgBase64($imagesDir.'/icon@2x.png');
        $images['default'] = $this->imgBase64($imagesDir.'/Default.png');
        $images['default_retina'] = $this->imgBase64($imagesDir.'/Default@2x.png');
        $images['default_retina_568h'] = $this->imgBase64($imagesDir.'/Default-568h@2x.png');
        
        $file = $dir . '/' . $usr->getUsername() . '/icon.png';
        if (file_exists($file)) $images['icon'] = $this->imgBase64($file);
        $file = $dir . '/' . $usr->getUsername() . '/icon@2x.png';
        if (file_exists($file)) $images['icon_retina'] = $this->imgBase64($file);
        
        $file = $dir . '/' . $usr->getUsername() . '/Default.png';
        if (file_exists($file)) $images['default_retina'] = $this->imgBase64($file);
        $file = $dir . '/' . $usr->getUsername() . '/Default@2x.png';
        if (file_exists($file)) $images['default_retina'] = $this->imgBase64($file);
        $file = $dir . '/' . $usr->getUsername() . '/Default-568h@2x.png';
        if (file_exists($file)) $images['default_retina_568h'] = $this->imgBase64($file);
        
        return $images;
    }
    
    public function imgBase64($file) {
        $imagedata = file_get_contents($file);
        $data = 'data:image/png;base64,'.base64_encode($imagedata);        
        return $data ;
    }
    
}



//    public function saveMail($form) {
//        
//        $usr = $this->security_context->getToken()->getUser();
//        $dm = $this->dm;
//        
//        $mail = $dm->getRepository('MagazentoSettingsBundle:Mail')->findOneBy(array('user_id' => $usr->getId()));
//        if (!$mail)
//            $mail = new Mail();
//        $mail->setUserId($usr->getId());
//        
//        $mail->setUser($form->get('user')->getData());
//        $mail->setPassword($form->get('password')->getData());
//        $mail->setServer($form->get('server')->getData());
//        $mail->setPort($form->get('port')->getData());
//        $mail->setEncryption($form->get('encryption')->getData());
//
//        $dm->persist($mail);
//        $dm->flush();  
//        
//        $this->session->setFlash('notice', 'Settings for Company were updated');        
//    }
    