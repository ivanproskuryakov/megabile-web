<?php 
namespace Magazento\BillingBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Magazento\BillingBundle\Repository\HistoryRepository")
 */
class History
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $user_id;
    
    /**
     * @MongoDB\float
     */ 
   protected $amount;

    /**
     * @MongoDB\timestamp
     */
    protected $time;
    
    /**
     * @MongoDB\String
     */
    protected $status;
    


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
     * Set user_id
     *
     * @param string $userId
     * @return \History
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
        return $this;
    }

    /**
     * Get user_id
     *
     * @return string $userId
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return \History
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get amount
     *
     * @return float $amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set time
     *
     * @param timestamp $time
     * @return \History
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * Get time
     *
     * @return timestamp $time
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return \History
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return string $status
     */
    public function getStatus()
    {
        return $this->status;
    }
}
