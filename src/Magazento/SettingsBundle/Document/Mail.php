<?php 
namespace Magazento\SettingsBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Magazento\SettingsBundle\Repository\MailRepository")
 */
class Mail
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
    protected $user;    
    /**
     * @MongoDB\String
     */
    protected $password;    
    /**
     * @MongoDB\String
     */
    protected $server;    
    /**
     * @MongoDB\String
     */
    protected $port;   
    /**
     * @MongoDB\String
     */
    protected $encryption;    
    

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
     * @return \Mail
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
     * Set user
     *
     * @param string $user
     * @return \Mail
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return string $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return \Mail
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set server
     *
     * @param string $server
     * @return \Mail
     */
    public function setServer($server)
    {
        $this->server = $server;
        return $this;
    }

    /**
     * Get server
     *
     * @return string $server
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * Set port
     *
     * @param string $port
     * @return \Mail
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * Get port
     *
     * @return string $port
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set encryption
     *
     * @param string $encryption
     * @return \Mail
     */
    public function setEncryption($encryption)
    {
        $this->encryption = $encryption;
        return $this;
    }

    /**
     * Get encryption
     *
     * @return string $encryption
     */
    public function getEncryption()
    {
        return $this->encryption;
    }
}
