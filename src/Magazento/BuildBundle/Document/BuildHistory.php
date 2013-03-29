<?php 
namespace Magazento\BuildBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Magazento\BuildBundle\Repository\BuildHistoryRepository")
 */
class BuildHistory
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
     * @MongoDB\String
     */
    protected $type;
    
    /**
     * @MongoDB\timestamp
     */
    protected $log_time;
    
    /**
     * @MongoDB\String
     */
    protected $log;
    

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
     * @return \Android
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
     * Set type
     *
     * @param string $type
     * @return \BuildHistory
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set log
     *
     * @param string $log
     * @return \BuildHistory
     */
    public function setLog($log)
    {
        $this->log = $log;
        return $this;
    }

    /**
     * Get log
     *
     * @return string $log
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * Set log_time
     *
     * @param timestamp $logTime
     * @return \BuildHistory
     */
    public function setLogTime($logTime)
    {
        $this->log_time = $logTime;
        return $this;
    }

    /**
     * Get log_time
     *
     * @return timestamp $logTime
     */
    public function getLogTime()
    {
        return $this->log_time;
    }
}
