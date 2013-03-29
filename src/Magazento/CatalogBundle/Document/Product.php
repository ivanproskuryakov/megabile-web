<?php 
namespace Magazento\CatalogBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Magazento\CatalogBundle\Repository\ProductRepository")
 */
class Product
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
     * @MongoDB\int
     */
    protected $xml_product_id;
    /**
     * @MongoDB\String
     */
    protected $xml_category_id;
    /**
     * @MongoDB\String
     */
    protected $sku;
    /**
     * @MongoDB\String
     */
    protected $name;
    /**
     * @MongoDB\Float
     */
    protected $price;
    /**
     * @MongoDB\String
     */
    protected $description;
    /**
     * @MongoDB\String
     */
    protected $url;
    /**
     * @MongoDB\String
     */
    protected $picture;


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
     * Set name
     *
     * @param string $name
     * @return \Product
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
     * Set price
     *
     * @param float $price
     * @return \Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set xml_product_id
     *
     * @param int $xmlProductId
     * @return \Product
     */
    public function setXmlProductId($xmlProductId)
    {
        $this->xml_product_id = $xmlProductId;
        return $this;
    }

    /**
     * Get xml_product_id
     *
     * @return int $xmlProductId
     */
    public function getXmlProductId()
    {
        return $this->xml_product_id;
    }

    /**
     * Set sku
     *
     * @param string $sku
     * @return \Product
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * Get sku
     *
     * @return string $sku
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return \Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return \Product
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return \Product
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * Get picture
     *
     * @return string $picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set user_id
     *
     * @param string $userId
     * @return \Product
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
     * Set xml_category_id
     *
     * @param string $xmlCategoryId
     * @return \Product
     */
    public function setXmlCategoryId($xmlCategoryId)
    {
        $this->xml_category_id = $xmlCategoryId;
        return $this;
    }

    /**
     * Get xml_category_id
     *
     * @return string $xmlCategoryId
     */
    public function getXmlCategoryId()
    {
        return $this->xml_category_id;
    }
}
