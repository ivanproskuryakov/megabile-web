<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    
    public function init()
    {
        parent::init();
        error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT ^E_DEPRECATED); // choose a level you need
    }
    
    public function registerBundles()
    {
        $bundles = array(
            //Symfony
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            
            //Doctrine
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            
            //FOS
            new FOS\UserBundle\FOSUserBundle(),
            
            //APY
            new APY\DataGridBundle\APYDataGridBundle(),
            
            //KNP
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            
            //Custom
            new Magazento\CatalogBundle\MagazentoCatalogBundle(),
            new Magazento\UserBundle\MagazentoUserBundle(),
            new Magazento\MenuBundle\MagazentoMenuBundle(),
            new Magazento\BuildBundle\MagazentoBuildBundle(),
            new Magazento\BillingBundle\MagazentoBillingBundle(),
            new Magazento\ConsoleBundle\MagazentoConsoleBundle(),
            new Magazento\AdminBundle\MagazentoAdminBundle(),
            new Magazento\SettingsBundle\MagazentoSettingsBundle(),
            new Magazento\ApiBundle\MagazentoApiBundle(),
            new Magazento\ServiceBundle\MagazentoServiceBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}

//            new Acme\StoreBundle\AcmeStoreBundle(),
