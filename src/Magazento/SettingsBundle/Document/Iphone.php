<?php 
namespace Magazento\SettingsBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Magazento\SettingsBundle\Repository\IphoneRepository")
 */
class Iphone
{
    /**
     * @MongoDB\Id
     */
    protected $id;
    /**
     * @MongoDB\String
     */
    protected $user_id;    
    
//    /**
//     * @MongoDB\String
//     */
//    protected $identifier;
    /**
     * @MongoDB\String
     */
    protected $product_name;
//    /**
//     * @MongoDB\String
//     */
//    protected $executable_name;
    /**
     * @MongoDB\Boolean
     */
    protected $icon;
    /**
     * @MongoDB\Boolean
     */
    protected $icon_retina;
    /**
     * @MongoDB\Boolean
     */
    protected $default;
    /**
     * @MongoDB\Boolean
     */
    protected $default_retina;
    /**
     * @MongoDB\Boolean
     */
    protected $default_retina_568h;
    

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
     * @return \Iphone
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
     * Set product_name
     *
     * @param string $productName
     * @return \Iphone
     */
    public function setProductName($productName)
    {
        $this->product_name = $productName;
        return $this;
    }

    /**
     * Get product_name
     *
     * @return string $productName
     */
    public function getProductName()
    {
        return $this->product_name;
    }

//    /**
//     * Set executable_name
//     *
//     * @param string $executableName
//     * @return \Iphone
//     */
//    public function setExecutableName($executableName)
//    {
//        $this->executable_name = $executableName;
//        return $this;
//    }
//
//    /**
//     * Get executable_name
//     *
//     * @return string $executableName
//     */
//    public function getExecutableName()
//    {
//        return $this->executable_name;
//    }

//    /**
//     * Set identifier
//     *
//     * @param string $identifier
//     * @return \Iphone
//     */
//    public function setIdentifier($identifier)
//    {
//        $this->identifier = $identifier;
//        return $this;
//    }
//
//    /**
//     * Get identifier
//     *
//     * @return string $identifier
//     */
//    public function getIdentifier()
//    {
//        return $this->identifier;
//    }

    /**
     * Set icon
     *
     * @param boolean $icon
     * @return \Iphone
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Get icon
     *
     * @return boolean $icon
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set icon_retina
     *
     * @param boolean $iconRetina
     * @return \Iphone
     */
    public function setIconRetina($iconRetina)
    {
        $this->icon_retina = $iconRetina;
        return $this;
    }

    /**
     * Get icon_retina
     *
     * @return boolean $iconRetina
     */
    public function getIconRetina()
    {
        return $this->icon_retina;
    }

    /**
     * Set default
     *
     * @param boolean $default
     * @return \Iphone
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }

    /**
     * Get default
     *
     * @return boolean $default
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set default_retina
     *
     * @param boolean $defaultRetina
     * @return \Iphone
     */
    public function setDefaultRetina($defaultRetina)
    {
        $this->default_retina = $defaultRetina;
        return $this;
    }

    /**
     * Get default_retina
     *
     * @return boolean $defaultRetina
     */
    public function getDefaultRetina()
    {
        return $this->default_retina;
    }

    /**
     * Set default_retina_568h
     *
     * @param boolean $defaultRetina568h
     * @return \Iphone
     */
    public function setDefaultRetina568h($defaultRetina568h)
    {
        $this->default_retina_568h = $defaultRetina568h;
        return $this;
    }

    /**
     * Get default_retina_568h
     *
     * @return boolean $defaultRetina568h
     */
    public function getDefaultRetina568h()
    {
        return $this->default_retina_568h;
    }
}
