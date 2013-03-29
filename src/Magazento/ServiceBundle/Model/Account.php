<?php

namespace Magazento\ServiceBundle\Model;

use Magazento\SettingsBundle\Document\IphoneTranslation;
use Magazento\SettingsBundle\Document\Company;
use Magazento\SettingsBundle\Document\Iphone;

class Account {

    protected $security_context;
    protected $dm;
    protected $container;
    

    public function __construct($security_context,$doctrine,$service_container)
    {
        $this->security_context = $security_context;   
        $this->dm           = $doctrine;
        $this->container    = $service_container;
    }
    
    public function setDataforAccount($usr) {
        
        /*
         * User
         */        
        $model = $this->dm->getRepository('MagazentoUserBundle:User')->findOneById($usr->getId());
        $model->setPlan('FREE');
        $model->setPayDate(time());
        $model->setMoneyReserved(0);
        $model->setMoney(0);
        $model->setApiKey(md5($usr->getId().'magazento'));
        
        $this->dm->persist($model);
        $this->dm->flush();
        
        /*
         * Translation
         */
        
        $iphoneDirectory = $this->container->getParameter('defaults_dir');        
        $default = file_get_contents($iphoneDirectory.'/translation.csv');               
        $translation = new IphoneTranslation();
        $translation->setUserId($usr->getId());
        $translation->setText($default);
        $this->dm->persist($translation);
        $this->dm->flush();     
        
        
        /*
         * Company
         */
        
        $company = new Company();
        $company->setUserId($usr->getId());
        $company->setName($usr->getUsername());
        $company->setAddressLine('Westbridge House Essex');
        $company->setRegion('North West');
        $company->setCity('Lancaster');
        $company->setCountry('United Kingdom');
        $company->setZip('CX1 2TO');

        $company->setCurrency('USD');
        $company->setEmail($usr->getEmail());
        $company->setPhone('+123 88 555 889');
        $company->setOrdering('Our company ordering terms');
        $company->setShipping('Our company shipping terms');
        $company->setPrivacy('Our company privacy rules and conditions');
        $company->setCancellation('Our company order cancelation terms');        
        $company->setWebsite('www.companywebsite.com');


        $this->dm->persist($company);
        $this->dm->flush();    
        /*
         * Iphone
         */
        
        $iphone = new Iphone();
        $iphone->setProductName($usr->getUsername());
        $iphone->setUserId($usr->getId());


        $this->dm->persist($iphone);
        $this->dm->flush();    

    }    
    
    
            
}