<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace Magazento\MenuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function registeredMenu(FactoryInterface $factory, array $options)
    {
        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $menu = $factory->createItem('root')
                    ->setAttributes(array(
                        'id' => 'navigation'
                    ));       
            $catalog = $menu->addChild('Store', array('route' => '_magazento_catalog_productgrid'))

                    ->setAttributes(array(
                        'class' => 'drop'
                    ))
                    ->setChildrenAttributes(array(
                        'class' => 'dropdown clearfix',
                    ));

            $catalog->addChild('Product', array('route' => '_magazento_catalog_productgrid'));
            $catalog->addChild('Category', array('route' => '_magazento_catalog_categorygrid'));
            $catalog->addChild('Upload XML', array('route' => '_magazento_catalog_upload'));
            $menu->addChild('Settings', array('route' => '_magazento_settings')); 
            $menu->addChild('Certificates', array('route' => '_magazento_settings_apple')); 
            $menu->addChild('Build', array('route' => '_magazento_build'));     
            $menu->addChild('Billing', array('route' => '_magazento_billing'));
//            $menu->addChild('Wiki', array('uri' => 'http://www.megabile.com/wiki'));             
            
//                    ->setAttributes(array(
//                        'class' => 'drop'
//                    ))
//                    ->setChildrenAttributes(array(
//                        'class' => 'dropdown clearfix',
//                    ));
//            $profile->addChild('Apple', array('route' => '_magazento_profile_apple'));
//            $profile->addChild('Android', array('route' => '_magazento_profile_android'));
            }
        
        return $menu;
    }
    public function unregisteredMenu(FactoryInterface $factory, array $options)
    {
            $menu = $factory->createItem('root')
                    ->setAttributes(array(
                        'id' => 'navigation'
                    ));       
            $menu->addChild('Home', array('route' => '_magazento_homepage'));
            $catalog = $menu->addChild('About', array('route' => '_magazento_howitworks'))  
                    ->setAttributes(array(
                        'class' => 'drop'
                    ))
                    ->setChildrenAttributes(array(
                        'class' => 'dropdown clearfix',
                    ));
            $catalog->addChild('Iphone App', array('route' => '_magazento_demo_iphone'));
            $catalog->addChild('Android App', array('route' => '_magazento_demo_android'));
//            $catalog->addChild('Quick Start', array('route' => '_magazento_start'));
            $catalog->addChild('How It Works', array('route' => '_magazento_howitworks'));
            $catalog->addChild('Why Us ?', array('route' => '_magazento_why'));
            $pricing = $menu->addChild('Pricing & Sign up', array('route' => '_magazento_pricing'));     
            $menu->addChild('Wiki', array('uri' => 'http://wiki.megabile.com')); 
            $menu->addChild('Free Support', array('route' => '_magazento_contact')); 
            
//                    ->setAttributes(array(
//                        'class' => 'drop'
//                    ))
//                    ->setChildrenAttributes(array(
//                        'class' => 'dropdown clearfix',
//                    ));
//            $profile->addChild('Apple', array('route' => '_magazento_profile_apple'));
//            $profile->addChild('Android', array('route' => '_magazento_profile_android'));
        
        return $menu;
    }
}