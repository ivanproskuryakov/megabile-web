<?php

namespace Magazento\BillingBundle\Model;

class BillingPlan
{
    public $plan = array();
    public $payPeriod = 30;
    public $alertPeriod = 30;
    
    /**
     * Get plan
     *
     * @return arrat $plan
     */
    public function getPlan()
    {
        return $this->plan;
    }
    
    /**
     * Get payPeriod
     *
     * @return arrat $payPeriod
     */
    public function getPayPeriod()
    {
        return $this->payPeriod;
    }
    
    /**
     * Get alertPeriod
     *
     * @return arrat $alertPeriod
     */
    public function getAlertPeriod()
    {
        return $this->alertPeriod;
    }

    public function getReservedMoneyFinalByUser($usr) {
        $money = $usr->getMoneyReserved();
        $time = time() - $usr->getPayDate()->__toString(); 
        $dayLeft = round($time / ( 1 * 60 * 60 * 24));  // 86400 SECONDS
        $money = $money * (( $this->getPayPeriod() - $dayLeft)/ $this->getPayPeriod());

//        var_dump($time);
//        var_dump($dayLeft);
//        exit();
        
        return $money;
    }    
    
    public function getPlanPriceFinalForUser($plan,$usr) {
        $money = $this->getPlanPrice($plan);
        $time = time() - $usr->getPayDate()->__toString(); 
        $dayLeft = round($time / ( 1 * 60 * 60 * 24));  // 86400 SECONDS
        $money = $money * (( $this->getPayPeriod() - $dayLeft)/ $this->getPayPeriod());
        return $money;
    }    
    
    public function planExists($plan) {
        foreach ($this->plan as $k => $_item) {
            if ($_item['name'] == $plan) {
                return true;  
                break;
            } 
        }
        return false;  
    }
    
    public function getPlanPrice($plan) {
        foreach ($this->plan as $k => $_item) {
            if ($_item['name'] == $plan) {
                return $_item['price'];
                break;
            } 
        }
        return false;  
    }
    
    public function getProducts($plan) {
        foreach ($this->plan as $k => $_item) {
            if ($_item['name'] == $plan) {
                return $_item['products'];
                break;
            } 
        }
        return false;  
    }       
    
    public function __construct() {
        $this->plan['FREE'];
        $this->plan['FREE']['name']         = 'FREE' ;
        $this->plan['FREE']['products']     = '100' ;
        $this->plan['FREE']['support']      = 'Community support' ;
        $this->plan['FREE']['price']        = '0' ;
        
        $this->plan['PROFESSIONAL'];
        $this->plan['PROFESSIONAL']['name']         = 'PROFESSIONAL' ;        
        $this->plan['PROFESSIONAL']['products']     = '500' ;
        $this->plan['PROFESSIONAL']['support']      = 'Tickets 24h' ;
        $this->plan['PROFESSIONAL']['price']        = '50' ;        
        
        $this->plan['BUSINESS'];
        $this->plan['BUSINESS']['name']         = 'BUSINESS' ;        
        $this->plan['BUSINESS']['products']     = '2000' ;
        $this->plan['BUSINESS']['support']      = 'Tickets 12h' ;
        $this->plan['BUSINESS']['price']        = '100' ;  
        
        $this->plan['ENTERPRISE'];
        $this->plan['ENTERPRISE']['name']         = 'ENTERPRISE' ;        
        $this->plan['ENTERPRISE']['products']     = '10000' ;
        $this->plan['ENTERPRISE']['support']      = 'Tickets 6h' ;     
        $this->plan['ENTERPRISE']['price']        = '300' ;          
        
    }
}