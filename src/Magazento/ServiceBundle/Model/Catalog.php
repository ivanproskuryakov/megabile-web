<?php

namespace Magazento\ServiceBundle\Model;

use Magazento\CatalogBundle\Document\Product;
use Magazento\CatalogBundle\Document\Category;
use Magazento\ServiceBundle\Model\XmlProcessing;

class Catalog {


    
    protected $security_context;
    protected $dm;
    protected $container;
    protected $session;
    protected $user_id;
    protected $usr;

    public function __construct($security_context,$doctrine,$service_container,$session)
    {
        $this->security_context = $security_context;   
        $this->dm = $doctrine;
        $this->container = $service_container;
        $this->session = $session;
        
        $this->usr = $this->security_context->getToken()->getUser();
    }
    
    public function upload($file) {
        
        $dir = $this->container->getParameter('uploads_secure_directory');        

        $file->getData()->move($dir . '/' . $this->usr->getUsername(), 'catalog.xml');

        $fileadress = $dir . '/' . $this->usr->getUsername() . '/catalog.xml';

        if (file_exists($fileadress)) {

            $processing = new XmlProcessing();
            $processing->processXmlFile($fileadress);
            
            // STOP IF ERRORS
            if ($errors = $processing->getErrorsArray()) {
                $this->session->setFlash('notice', 'Please fix errors: '.  implode(", ", $errors));
                return;
            } 
            
            // NO ERRORS          
            $dm = $this->dm;
            $dm->getRepository('MagazentoCatalogBundle:Product')->removeByUserId($this->usr->getId());
            $dm->getRepository('MagazentoCatalogBundle:Category')->removeByUserId($this->usr->getId());


            foreach ($processing->getCategoryArray() as $_category) {
                $category = new Category();
                $category->setXmlParentId($_category['xml_parent_Id']);
                $category->setXmlCategoryId($_category['xml_category_id']);
                $category->setName($_category['name']);
                $category->setUserId($this->usr->getId());
                $dm->persist($category);
            }

            foreach ($processing->getProductArray() as $_product) {
                $product = new Product();
                $product->setXmlProductId($_product['xml_product_id']);
                $product->setSku($_product['sku']);
                $product->setName($_product['name']);
                $product->setPrice($_product['price']);
                $product->setDescription($_product['description']);
                $product->setUrl($_product['url']);
                $product->setPicture($_product['picture']);
                $product->setXmlCategoryId($_product['xml_category_id']);
                $product->setName($_product['name']);
                $product->setUserId($this->usr->getId());
                $dm->persist($product);
            }

            $dm->flush();

            $this->session->setFlash('notice', 'Catalog data has been uploaded. Categories:' . count($processing->getCategoryArray()) . ' Products:' . count($processing->getProductArray()));
        }
    }
}
