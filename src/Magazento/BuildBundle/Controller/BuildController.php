<?php

namespace Magazento\BuildBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File as FileValidation;

use Magazento\BuildBundle\Form\Type\CompanyType;
use Magazento\BuildBundle\Form\Type\IphoneBuildDevType;
use Magazento\BuildBundle\Form\Type\IphoneBuildProdType;
use Magazento\BuildBundle\Model\BuildXml;



class BuildController extends Controller {

    public function buildAction() {
        
        $buildStatus = $this->get('magazento_build_iphone')->getLastHistoryStatus('iphone');
//        var_dump($buildStatus);
//        exit();
        $status = $this->get('magazento_settings_status')->status();
        $formIphoneProd = $this->createForm(new IphoneBuildProdType());
        $formIphoneDev = $this->createForm(new IphoneBuildDevType());
        return $this->render('MagazentoBuildBundle:Default:build.html.twig', array(
                    'formIphoneProd' => $formIphoneProd->createView(),
                    'formIphoneDev' => $formIphoneDev->createView(),
                    'issues' => $status['issues'],
                    'complete' => $status['complete'],
                    'buildStatus' => $buildStatus,
            )
        );
    }
    
    public function buildIphoneAction(Request $request) {
            
        $form = $this->createForm(new IphoneBuildProdType());   

        $form->bind($request);
        if ($form->isValid()) { 

            $status = $this->get('magazento_certificates')->getCertificates();

            switch ($form->get('type')->getData()) {
                case 'dev':
                    if (!$this->get('magazento_settings_status')->ok('dev')) {
                        $this->get('session')->setFlash('notice', 'You need to finish with setting first, after that you will be able to make a build for TESTING');
                        return $this->redirect($this->generateUrl('_magazento_build'));
                    }
                    $identity = $status->dev->identity;
                    break;

                case 'prod':
                    if (!$this->get('magazento_settings_status')->ok('prod')) {
                        $this->get('session')->setFlash('notice', 'You need to finish with setting first, after that you will be able to make a build for DISTRIBUTION');
                        return $this->redirect($this->generateUrl('_magazento_build'));
                    }
                    $identity = $status->prod->identity;
                    break;

                default:
                    break;
            }

            $this->get('magazento_build_xml')->zipCatalog();  
            $this->get('magazento_build_iphone')->createInfoFile();
            $this->get('magazento_build_iphone')->updatePlist();
            $this->get('magazento_build_iphone')->copyImages();
            $this->get('magazento_build_iphone')->copyImages();
            $response = $this->get('magazento_build_iphone')->compileRequest($form,$identity);
            if (!$response) {
                $this->get('session')->setFlash('notice','404 server unreachable. Please try again later');
                return $this->redirect($this->generateUrl('_magazento_build'));
            }
            
            $this->get('magazento_build_iphone')->saveHistory($response);

        }            

        return $this->redirect($this->generateUrl('_magazento_build'));
    }
    
    public function downloadIphoneAction() {
        
        $response = $this->get('magazento_build_iphone')->downloadIphone();
        if (!$response) {
            $this->get('session')->setFlash('notice','404 server unreachable. Please try again later');
            return $this->redirect($this->generateUrl('_magazento_build'));
        }
        
        $usr = $this->get('security.context')->getToken()->getUser();
        $file = $this->container->getParameter('uploads_secure_directory') . '/' .$usr->getUsername(). '/MagazentoIphone.ipa';        
        file_put_contents($file, $response);
        if (file_exists($file)) {
            ob_clean();
            $fp = fopen($file, 'rb');
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private",false);
            header("Content-Type: application/octet-stream");
            header("Content-Disposition: attachment; filename=MegabileIphone.ipa");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . filesize($file));
            fpassthru($fp);   
        }
    }
        
    


}
                