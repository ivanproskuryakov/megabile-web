<?php

namespace Magazento\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Magazento\BillingBundle\Model\BillingPlan;

class ApiController extends Controller
{
    /**
     * @Route("/api/storeinfo/{user_id}/{user_api}/")
     */
    public function storeInfoAction($user_id,$user_api)
    {
        
        if ($this->container->get('magazento_connection')->isConnected() == false )  {
            $result = array();            
            $result['error'] = 'Server is over capacity';
            echo json_encode($result);
            exit();            
        }
        
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $user = $dm->getRepository('MagazentoUserBundle:User')->findOneBy(array('id' =>$user_id, 'apiKey' =>$user_api));    

        if ($user == null) {
            $result = array();            
            $result['error'] = 'Store on maintenance...';
        }

        if ($user) {
            $result = array();
            $billing = new BillingPlan();
            $result['products'] = $billing->getProducts($user->getPlan());
            $result['paydate'] = $user->getPayDate()->__toString();
            $result['error'] = '';
            
            $zip = $this->container->getParameter('uploads_secure_directory') . '/' . $user->getUsername() .'/'.'store_catalog.zip';
            if (file_exists($zip)) {
                $result['updatedate'] = filemtime($zip);
            }            
        }
        
        echo json_encode($result);
        exit();
    }
    
    /**
     * @Route("/api/storecatalog/{user_id}/{user_api}/")
     */
    public function storeCatalogAction($user_id,$user_api)
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $usr = $dm->getRepository('MagazentoUserBundle:User')->findOneBy(array('id' =>$user_id, 'apiKey' =>$user_api));    
        if ($usr) {
            
            $zip = $this->container->getParameter('uploads_secure_directory') . '/' . $usr->getUsername() .'/'.'store_catalog.zip';
            if (file_exists($zip)) {
                $fp = fopen($zip, 'rb');
                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Cache-Control: private",false);
                header("Content-Type: application/octet-stream");
                header("Content-Disposition: attachment; filename=".basename($zip));
                header("Content-Transfer-Encoding: binary");
                header("Content-Length: " . filesize($zip));
                fpassthru($fp);   
            }
        }
        exit();
    }    
    
    /**
     * @Route("/api/orderemail/{user_id}/{user_api}/")
     */
    public function orderEmailAction($user_id,$user_api)
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $user = $dm->getRepository('MagazentoUserBundle:User')->findOneBy(array('id' =>$user_id, 'apiKey' =>$user_api));    
        if ($user) {
                
            $email_body = $_REQUEST['message'];
            $email_subject = $_REQUEST['subject'];

//            var_dump($email_body);
//            exit();
            $message = \Swift_Message::newInstance()
                ->setSubject($email_subject)
                ->setFrom($this->container->getParameter('email_noreply'))
                ->setTo($user->getEmail())
                ->setBody($email_body)
            ;
            
            $this->get('mailer')->send($message);    
            
            echo 200;
        }
        exit();
    }
}
