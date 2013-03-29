<?php

namespace Magazento\ServiceBundle\Model;

use Magazento\UserBundle\Document\User;
use Magazento\BillingBundle\Model\BillingPlan;
class Console {

    protected $dm;
    protected $container;

    public function __construct($doctrine,$service_container)
    {
        $this->dm = $doctrine;
        $this->container = $service_container;
    }
    
    public function AlertAll() {
        
        $billing = new BillingPlan();
        var_dump($billing->getPayPeriod());
//        $dm = $this->dm;
//        $users = $dm->getRepository('MagazentoUserBundle:User')->getAllUsersConsole();
//        
//        foreach ($users as $user) {
//            var_dump($user->getId());
//            var_dump($user->getPlan());
//            var_dump($user->getMoney());           
//            var_dump($user->getPayDate()->__toString());           
//        }
//        
    }
    
}
