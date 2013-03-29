<?php

namespace Magazento\AdminBundle\Model;

class User {

    protected $security_context;
    protected $dm;
    protected $container;

    public function __construct($security_context,$doctrine,$service_container)
    {
        $this->security_context = $security_context;   
        $this->dm = $doctrine;
        $this->container = $service_container;
    }
    
    public function deleteUser($userId) {
        
        $error = '';
        try {
            $this->dm->getRepository('MagazentoUserBundle:User')->removeByUserId($userId);
            $this->dm->getRepository('MagazentoCatalogBundle:Category')->removeByUserId($userId);
            $this->dm->getRepository('MagazentoCatalogBundle:Product')->removeByUserId($userId);        
            $this->dm->getRepository('MagazentoBillingBundle:History')->removeByUserId($userId);
            $this->dm->getRepository('MagazentoBuildBundle:BuildHistory')->removeByUserId($userId);

            $this->dm->getRepository('MagazentoSettingsBundle:Apple')->removeByUserId($userId);
            $this->dm->getRepository('MagazentoSettingsBundle:Company')->removeByUserId($userId);
            $this->dm->getRepository('MagazentoSettingsBundle:Iphone')->removeByUserId($userId);
            $this->dm->getRepository('MagazentoSettingsBundle:IphoneTranslation')->removeByUserId($userId);
        } catch (\Exception $e) {
            $error = $e->getMessage();     
            exit($error);
        }

        return $error;

    }
    
}