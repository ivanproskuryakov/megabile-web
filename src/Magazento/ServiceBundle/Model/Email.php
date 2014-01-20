<?php

namespace Magazento\ServiceBundle\Model;

use Magazento\BillingBundle\Document\History;
use Magazento\BuildBundle\Document\BuildHistory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class Email {

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
    }
    
    public function newUserRegistered($usr) {
        $message = \Swift_Message::newInstance()
               ->setSubject('Megabile: New User')
               ->setFrom('noreply@megabile.com')
               ->setTo($this->container->getParameter('email_contact'))
               ->setBody(
                   $this->templating->render(
                       'MagazentoServiceBundle:Default:email_user_regitered.txt.twig',
                       array('user_email' => $usr->getEmail())
                   )
               );      
        $this->mailer->send($message);

    }
    
    
    
            
}

