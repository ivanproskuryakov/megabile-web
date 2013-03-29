<?php
// src/Acme/UserBundle/Document/User.php

namespace Magazento\UserBundle\Document;

use FOS\UserBundle\Document\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Magazento\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;
    
    /**
     * @MongoDB\String
     */
    protected $money;    
    
    /**
     * @MongoDB\String
     */
    protected $plan;    
    
    /**
     * @MongoDB\String
     */
    protected $moneyReserved;    
    
    /**
     * @MongoDB\timestamp
     */
    protected $payDate;  
    
    /**
     * @MongoDB\String
     */
    protected $apiKey;    
    

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set money
     *
     * @param string $money
     * @return \User
     */
    public function setMoney($money)
    {
        $this->money = $money;
        return $this;
    }

    /**
     * Get money
     *
     * @return string $money
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set plan
     *
     * @param string $plan
     * @return \User
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
        return $this;
    }

    /**
     * Get plan
     *
     * @return string $plan
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set moneyReserved
     *
     * @param string $moneyReserved
     * @return \User
     */
    public function setMoneyReserved($moneyReserved)
    {
        $this->moneyReserved = $moneyReserved;
        return $this;
    }

    /**
     * Get moneyReserved
     *
     * @return string $moneyReserved
     */
    public function getMoneyReserved()
    {
        return $this->moneyReserved;
    }

    /**
     * Set payDate
     *
     * @param timestamp $payDate
     * @return \User
     */
    public function setPayDate($payDate)
    {
        $this->payDate = $payDate;
        return $this;
    }

    /**
     * Get payDate
     *
     * @return timestamp $payDate
     */
    public function getPayDate()
    {
        return $this->payDate;
    }

    /**
     * Set apiKey
     *
     * @param string $apiKey
     * @return \User
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string $apiKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
}
