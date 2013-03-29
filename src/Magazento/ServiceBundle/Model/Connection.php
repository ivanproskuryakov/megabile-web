<?php

namespace Magazento\ServiceBundle\Model;

class Connection
{
    
    protected $dm;
    protected $container;

    public function __construct($doctrine,$container)
    {
        $this->dm = $doctrine;
        $this->container = $container;
    }
    
    public function isConnected()
    {
        $connection = true;
        try {
            $this->dm->getConnection()->__toString();
        } catch (\Exception $e) {
        
            $email = $this->container->getParameter('email_contact'); 
            $message = \Swift_Message::newInstance()
                ->setSubject('Megabile: Database Connection')
                ->setFrom($email)
                ->setTo($email)
                ->setBody($e->getMessage())
            ;
            $this->container->get('mailer')->send($message);      
            $connection = false;

        }
        
        return $connection;
    }
    
    
}