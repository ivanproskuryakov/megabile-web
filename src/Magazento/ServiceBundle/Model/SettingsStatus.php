<?php
namespace Magazento\ServiceBundle\Model;

use Magazento\SettingsBundle\Lib\SmtpValidation;
class SettingsStatus {

    protected $security_context;
    protected $dm;
    protected $container;

    public function __construct($security_context,$doctrine,$service_container)
    {
        $this->security_context = $security_context;   
        $this->dm = $doctrine;
        $this->container = $service_container;
    }
    
    public function ok($build = null) {
        $result = false;
        $status = $this->status($build);

        if (count($status['issues']) == 0) $result = true; 
        return $result;
    }
    
    public function status($build = null) {
        $usr = $this->security_context->getToken()->getUser();
        $dm = $this->dm;
        $apple = $dm->getRepository('MagazentoSettingsBundle:Apple')->findOneBy(array('user_id' => $usr->getId()));
        $products = $dm->getRepository('MagazentoCatalogBundle:Product')->findBy(array('user_id' => $usr->getId()))->count();
        $categories = $dm->getRepository('MagazentoCatalogBundle:Category')->findBy(array('user_id' => $usr->getId()))->count();
        

        // IDENTIFIER 
        $this->iphoneStatus['iphoneidentifier']['name'] = 'Apple Identifier - com.magazento.'.$usr->getUsername();
        
        //CERTS 
        $response = $this->container->get('magazento_certificates')->getCertificates();     
        
        if ($response->dev->status) {
            $this->iphoneStatus['certdev']['name'] = 'Testing: '.$response->dev->identity;            
            $this->iphoneStatus['certdev']['issue'] = false;
        } else {
            $this->iphoneStatus['certdev']['name'] = 'Certificates for Testing not installed';                             
            $this->iphoneStatus['certdev']['issue'] = true;
        }
        
        if ($response->prod->status) {
            $this->iphoneStatus['certprod']['name'] = 'Distribution: '.$response->prod->identity;
            $this->iphoneStatus['certprod']['issue'] = false;
        } else {
            $this->iphoneStatus['certprod']['name'] = 'Certificates for Distribution not installed';                    
            $this->iphoneStatus['certprod']['issue'] = true;
        }
        
        // UNSET 
        if ($build == 'prod') unset($this->iphoneStatus['certdev']);
        if ($build == 'dev') unset($this->iphoneStatus['certprod']);

                
        //PRODUCTS
        $this->iphoneStatus['products']['name'] = 'Store Products - '.$products . ' items';
        $this->iphoneStatus['categories']['name'] = 'Store Categories - '.$categories . ' items';       
        if ($products == 0) {  $this->iphoneStatus['products']['issue'] = true; }     
        if ($categories == 0) {  $this->iphoneStatus['categories']['issue'] = true; }     

        //ISSUES
        $issueArray = array();
        $completeArray = array();
        foreach ($this->iphoneStatus as $status) {
            if ($status['issue']) $issueArray[] = $status['name'];
            if (!$status['issue']) $completeArray[] = $status['name'];
        }
        return array('issues'=>$issueArray,'complete'=>$completeArray);
    }
    
    
}







//    public function SMTPstatus() {
//        
//        
//        $usr = $this->security_context->getToken()->getUser();
//        $dm = $this->dm;
//        
//        $mail = $dm->getRepository('MagazentoSettingsBundle:Mail')->findOneBy(array('user_id' => $usr->getId()));
//        $user = $mail->getUser();
//        $password = $mail->getPassword();
//        $server = $mail->getServer();
//        $port = $mail->getPort();
//        $enc = $mail->getEncryption();
//        $security = null;
//        if ($enc) $security = $enc;
//        
//        try {
//            $started = false; 
//            $status = '';
//            $transport = \Swift_SmtpTransport::newInstance($server, $port,$security)
//                        ->setUsername($user)
//                        ->setPassword($password)
//                        ;
//            $transport->setTimeout(5);
//            $transport->start();
//            $started = $transport->isStarted();
//            $status = "SMTP IS WORKING";
//            $transport->stop();
//        } catch (\Exception $e) {
//            $started = false;
//            $status = $e->getMessage();           
//        }
//
//        return array('started'=>$started,'status'=>$status);
//    }