<?php

namespace Magazento\SettingsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Magazento\SettingsBundle\Document\Apple;
use Magazento\SettingsBundle\Document\Company;
use Magazento\SettingsBundle\Document\Iphone;
use Magazento\SettingsBundle\Document\Android;
use Magazento\SettingsBundle\Document\IphoneTranslation;

use Magazento\SettingsBundle\Form\Type\CompanyType;
use Magazento\SettingsBundle\Form\Type\IphoneCertificateDev;
use Magazento\SettingsBundle\Form\Type\IphoneCertificateProd;
use Magazento\SettingsBundle\Form\Type\IphoneappType;
use Magazento\SettingsBundle\Form\Type\IphoneTranslationType;

class DefaultController extends Controller {

    public function settingsAction(Request $request) {

        $usr = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        
        $company = $dm->getRepository('MagazentoSettingsBundle:Company')->findOneBy(array('user_id' => $usr->getId()));
        $iphone = $dm->getRepository('MagazentoSettingsBundle:Iphone')->findOneBy(array('user_id' => $usr->getId()));
        $iphoneTranslation = $dm->getRepository('MagazentoSettingsBundle:IphoneTranslation')->findOneBy(array('user_id' => $usr->getId()));

        $formCompany = $this->createForm(new CompanyType(),$company);
        $formIphoneapp = $this->createForm(new IphoneappType(),$iphone);
        $formIphoneTranslation = $this->createForm(new IphoneTranslationType(),$iphoneTranslation);
        $transArray = $this->get('magazento_settings')->translationToArray($iphoneTranslation->getText());

        if ($request->isMethod('POST')) {

            // IPHONE
            if ($request->request->get($formIphoneapp->getName())) {
                $formIphoneapp->bind($request);
                
                if ($formIphoneapp->isValid()) {
                    $this->get('magazento_settings')->saveIphone($formIphoneapp);
                }
            }
            
            // COMPANY
            if ($request->request->get($formCompany->getName())) {
                $formCompany->bind($request);
                if ($formCompany->isValid()) {
                    $this->get('magazento_settings')->saveCompany($formCompany);
                }
            }
            
            // TRANLATION
            if ($request->request->get($formIphoneTranslation->getName())) {
                $this->get('magazento_settings')->saveIphoneTranslation($request);
            }
            
            $this->get('magazento_build_xml')->zipCatalog();  
            
        }    
        
        return $this->render('MagazentoSettingsBundle:Default:settings.html.twig', array(
                    'formCompany' => $formCompany->createView(),
                    'formIphoneapp' => $formIphoneapp->createView(),
                    'formIphoneTranslation' => $formIphoneTranslation->createView(),
                    'translationData' => $transArray,
                    'images' => $this->get('magazento_settings')->getImages(),
            )
        );
    }

    

    /**
     * @Template()
     */
    public function appleAction(Request $request) {
        $usr = $this->get('security.context')->getToken()->getUser();
        $formDev = $this->createForm(new IphoneCertificateDev()); 
        $formProd = $this->createForm(new IphoneCertificateProd()); 
        
        if ($request->isMethod('POST')) {
            
            // DEV
            if ($request->request->get($formDev->getName())) {
                $formDev->bind($request);
                if ($formDev->isValid()) {
                    
                    $response = $this->get('magazento_certificates')->installKeychain();
                    if ($response->status) {
                        $this->get('magazento_certificates')->deleteCertificate('dev');
                        $response = $this->get('magazento_certificates')->installCertificate($formDev);
                        
                        if (!$response->status) $this->get('session')->setFlash('notice', $response->message);
                    }
                }
            }
            
            // PROD
            if ($request->request->get($formProd->getName())) {
                $formProd->bind($request);
                if ($formProd->isValid()) {
                    $response = $this->get('magazento_certificates')->installKeychain();
                    if ($response->status) {
                        $this->get('magazento_certificates')->deleteCertificate('prod');
                        $this->get('magazento_certificates')->installCertificate($formProd);
                        
                        if (!$response->status) $this->get('session')->setFlash('notice', $response->message);
                    }
                }
            }
            

        }
        
        // KEYCHAINS
        $response = $this->get('magazento_certificates')->getCertificates();        
        return $this->render('MagazentoSettingsBundle:Default:apple.html.twig', array(
            'cerDev' => ($response->dev->status) ? 'INSTALLED '.$response->dev->identity : 'NOT INSTALLED',
            'cerProd' => ($response->prod->status) ? 'INSTALLED '.$response->prod->identity : 'NOT INSTALLED',
            'formDev' => $formDev->createView(),
            'formProd' => $formProd->createView(),
        ));
    }
    

}
