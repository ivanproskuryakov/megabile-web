<?php 
namespace Magazento\CatalogBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="Magazento\CatalogBundle\Repository\CategoryRepository")
 */
class Category
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
    protected $xml_category_id;

    /**
     * @MongoDB\int
     */
    protected $xml_parent_Id;
    
    /**
     * @MongoDB\String
     */
    protected $name;


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
     * @return \Category
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
     * Set xml_category_id
     *
     * @param int $xmlCategoryId
     * @return \Category
     */
    public function setXmlCategoryId($xmlCategoryId)
    {
        $this->xml_category_id = $xmlCategoryId;
        return $this;
    }

    /**
     * Get xml_category_id
     *
     * @return int $xmlCategoryId
     */
    public function getXmlCategoryId()
    {
        return $this->xml_category_id;
    }

    /**
     * Set xml_parent_Id
     *
     * @param int $xmlParentId
     * @return \Category
     */
    public function setXmlParentId($xmlParentId)
    {
        $this->xml_parent_Id = $xmlParentId;
        return $this;
    }

    /**
     * Get xml_parent_Id
     *
     * @return int $xmlParentId
     */
    public function getXmlParentId()
    {
        return $this->xml_parent_Id;
    }

    /**
     * Get user_id
     *
     * @return id $userId
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set user_id
     *
     * @param string $userId
     * @return \Category
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
        return $this;
    }
}
