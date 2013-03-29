<?php 
namespace Magazento\SettingsBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Magazento\SettingsBundle\Repository\AppleRepository")
 */
class Apple
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
    protected $password_dev;
    /**
     * @MongoDB\String
     */
    protected $password_prod;
    /**
     * @MongoDB\String
     */
    protected $p12;
    /**
     * @MongoDB\String
     */
    protected $mobileprovision;
    
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
     * @return \Apple
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
     * Set p12
     *
     * @param string $p12
     * @return \Apple
     */
    public function setP12($p12)
    {
        $this->p12 = $p12;
        return $this;
    }

    /**
     * Get p12
     *
     * @return string $p12
     */
    public function getP12()
    {
        return $this->p12;
    }

    /**
     * Set mobileprovision
     *
     * @param string $mobileprovision
     * @return \Apple
     */
    public function setMobileprovision($mobileprovision)
    {
        $this->mobileprovision = $mobileprovision;
        return $this;
    }

    /**
     * Get mobileprovision
     *
     * @return string $mobileprovision
     */
    public function getMobileprovision()
    {
        return $this->mobileprovision;
    }


    /**
     * Set password_dev
     *
     * @param string $passwordDev
     * @return \Apple
     */
    public function setPasswordDev($passwordDev)
    {
        $this->password_dev = $passwordDev;
        return $this;
    }

    /**
     * Get password_dev
     *
     * @return string $passwordDev
     */
    public function getPasswordDev()
    {
        return $this->password_dev;
    }

    /**
     * Set password_prod
     *
     * @param string $passwordProd
     * @return \Apple
     */
    public function setPasswordProd($passwordProd)
    {
        $this->password_prod = $passwordProd;
        return $this;
    }

    /**
     * Get password_prod
     *
     * @return string $passwordProd
     */
    public function getPasswordProd()
    {
        return $this->password_prod;
    }
}
