<?php 
namespace Magazento\SettingsBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
//use APY\DataGridBundle\Grid\Mapping as GRID;

/**
 * @MongoDB\Document(repositoryClass="Magazento\SettingsBundle\Repository\CompanyRepository")
 */
class Company
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
    protected $currency;
    /**
     * @MongoDB\String
     */
    protected $name;
    /**
     * @MongoDB\String
     */
    protected $address_line;
    /**
     * @MongoDB\String
     */
    protected $country;    
    /**
     * @MongoDB\String
     */
    protected $region;
    /**
     * @MongoDB\String
     */
    protected $city;
    /**
     * @MongoDB\String
     */
    protected $zip;
    
    /**
     * @MongoDB\String
     */
    protected $email;
    /**
     * @MongoDB\String
     */
    protected $phone;
    /**
     * @MongoDB\String
     */
    protected $website;
    
    /**
     * @MongoDB\String
     */
    protected $ordering;
    /**
     * @MongoDB\String
     */
    protected $shipping;
    /**
     * @MongoDB\String
     */
    protected $privacy;
    /**
     * @MongoDB\String
     */
    protected $cancellation;
    




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
     * @return \Company
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
     * Set name
     *
     * @param string $name
     * @return \Company
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return \Company
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * Get region
     *
     * @return string $region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return \Company
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return \Company
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * Get zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set address_line
     *
     * @param string $addressLine
     * @return \Company
     */
    public function setAddressLine($addressLine)
    {
        $this->address_line = $addressLine;
        return $this;
    }

    /**
     * Get address_line
     *
     * @return string $addressLine
     */
    public function getAddressLine()
    {
        return $this->address_line;
    }



    /**
     * Set email
     *
     * @param string $email
     * @return \Company
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return \Company
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * Get phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return \Company
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * Get website
     *
     * @return string $website
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set ordering
     *
     * @param string $ordering
     * @return \Company
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;
        return $this;
    }

    /**
     * Get ordering
     *
     * @return string $ordering
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set shipping
     *
     * @param string $shipping
     * @return \Company
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * Get shipping
     *
     * @return string $shipping
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Set privacy
     *
     * @param string $privacy
     * @return \Company
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;
        return $this;
    }

    /**
     * Get privacy
     *
     * @return string $privacy
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * Set cancellation
     *
     * @param string $cancellation
     * @return \Company
     */
    public function setCancellation($cancellation)
    {
        $this->cancellation = $cancellation;
        return $this;
    }

    /**
     * Get cancellation
     *
     * @return string $cancellation
     */
    public function getCancellation()
    {
        return $this->cancellation;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return \Company
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Get currency
     *
     * @return string $currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return \Company
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get country
     *
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }
}
