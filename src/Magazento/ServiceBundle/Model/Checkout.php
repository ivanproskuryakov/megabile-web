<?php

namespace Magazento\ServiceBundle\Model;

use Magazento\BillingBundle\Document\History;
use Magazento\BuildBundle\Document\BuildHistory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class Checkout {

    protected $security_context;
    protected $dm;
    protected $container;
    protected $templating;
    protected $mailer;
    

    public function __construct($security_context,$doctrine,$service_container,$templating,$mailer)
    {
        $this->security_context = $security_context;   
        $this->dm           = $doctrine;
        $this->container    = $service_container;
        $this->templating   = $templating;
        $this->mailer       = $mailer;
        $this->user         = $this->security_context->getToken()->getUser();
        $this->user_dir     = $this->container->getParameter('uploads_secure_directory') . '/' . $this->user->getUsername();
        $this->defaults     = $this->container->getParameter('defaults_dir');
    }
    
    public function saveHistory($money) {
        $dm = $this->dm;   
        
        $history = new History();
        $history->setUserId($this->user->getId());
        $history->setAmount($money);
        $history->setStatus('pending');
        $history->setTime(time());
        $dm->persist($history);    
        $dm->flush();
        
        $orderId = $this->dm->getRepository('MagazentoBillingBundle:History')->getLast($this->user->getId());
        return $orderId;
    }
    
    public function orderCompleted($orderId) {
        $dm = $this->dm;
        
        $order = $dm->get('doctrine.odm.mongodb.document_manager')->getRepository('MagazentoBillingBundle:History')->find($orderId);
        $order->setStatus('review');
        $dm->persist($order);    
        $dm->flush();
        
//        var_dump($order);
        
        return $orderId;
    }
    
    public function pay($money) {
        
        $dm = $this->dm;
        $moneyAfter = $this->user->getMoney() + $money;

        $this->user->setMoney($moneyAfter); 
        $dm->persist($this->user);   
        
        /*
         * EMAIL NOTIFICATION
         */
        $message = \Swift_Message::newInstance()
               ->setSubject('Megabile: Payment Success')
               ->setFrom('noreply@megabile.com')
               ->setTo($this->user->getEmail())
               ->setBody(
                   $this->templating->render(
                       'MagazentoBillingBundle:Default:email_payment.txt.twig',
                       array('money' => $money)
                   )
               );      
        $this->mailer->send($message);

    }
    
    
    
            
}

