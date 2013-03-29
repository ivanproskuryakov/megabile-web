<?php

namespace Magazento\ServiceBundle\Model;

use XMLWriter;
use DOMDocument;
use ZipArchive;

class BuildXml {


    protected $categoryArray = array();
    protected $productArray = array();
    protected $translationArray = array();
    protected $companyArray = array();
    
    protected $security_context;
    protected $dm;
    protected $container;

    public function __construct($security_context,$doctrine,$service_container)
    {
        $this->security_context = $security_context;   
        $this->dm = $doctrine;
        $this->container = $service_container;
    }
    
    public function setCategories($categories) {
        return $this->categoryArray = $categories;
    }

    public function setProducts($products) {
        return $this->productArray = $products;
    }
    
    public function setTranslation($translation) {
        
        $translation = explode("\n", trim($translation));
        for ($i=0 ; $i< count($translation); $i++) {
            $item = explode('*****', $translation[$i]);
            $this->translationArray[$i]['id'] = trim($item[0],'"');
            $this->translationArray[$i]['name'] = trim($item[1],'"');
        }
    }    
    
    public function setCompany($company) {
        $array['user']      = $company->getUserId();
        $array['currency']  = $company->getCurrency();
        $array['name']      = $company->getName();
        $array['address_line'] =$company->getAddressLine();
        $array['country']    = $company->getCountry();
        $array['region']    = $company->getRegion();
        $array['city']      = $company->getCity();
        $array['zip']       = $company->getZip();
        $array['email']     = $company->getEmail();
        $array['phone']     = $company->getPhone();
        $array['website']   = $company->getWebsite();
        $array['ordering']  = $company->getOrdering();
        $array['shipping']  = $company->getShipping();
        $array['privacy']   = $company->getPrivacy();
        $array['cancellation'] = $company->getCancellation();
        $this->companyArray = $array;
    }    
    
    
    public function zipCatalog() {
        
        $usr = $this->security_context->getToken()->getUser();
        $categories = $this->dm->getRepository('MagazentoCatalogBundle:Category')->getCategoriesByUserId($usr->getId());
        $products = $this->dm->getRepository('MagazentoCatalogBundle:Product')->getProductsByUserId($usr->getId());
        $translation = $this->dm->getRepository('MagazentoSettingsBundle:IphoneTranslation')->findOneBy(array('user_id' => $usr->getId()));
        $company = $this->dm->getRepository('MagazentoSettingsBundle:Company')->findOneBy(array('user_id' => $usr->getId()));

        $zipFile = $this->container->getParameter('uploads_secure_directory') . '/' . $usr->getUserName().'/'.'store_catalog.zip';
        $xmlFile = $this->container->getParameter('uploads_secure_directory') . '/' . $usr->getUserName().'/'.'store_catalog.xml';

        $this -> setCategories($categories);
        $this -> setProducts($products);
        $this -> setTranslation($translation->getText());
        $this -> setCompany($company);
        
        file_put_contents($xmlFile, $this -> generate());
        system("zip -P magazento.mobile.password -j $zipFile \"$xmlFile\"");
        ob_clean();
    }
    
    public function generate() {
        
        $w = new XMLWriter();
        $w->openMemory();
        $w->setIndent(true);
        $w->startDocument('1.0', 'UTF-8');
            $w->startElement('yml_catalog');
                $w->writeAttribute('date',time());
                $w->startElement('shop');

                    $w->startElement('company');
                        foreach ($this->companyArray as $k=> $value) {
                            $w->startElement('companysettings');
                            $w->writeAttribute('id', $k );
                            $w->writeAttribute('value', $value );
                            $w->endElement();
                        } 
                    $w->endElement();
                    
                    $w->startElement('translation');
                        foreach ($this->translationArray as $translation) {
                            $w->startElement('translate');
                            $w->writeAttribute('id',$translation['id'] );
                            $w->writeAttribute('text',$translation['name'] );
                            $w->endElement();
                        }
                    $w->endElement();

                    $w->startElement('categories');
                        foreach ($this->categoryArray as $category) {
                            $w->startElement('category');
                            $w->writeAttribute('id',$category['id'] );
                            $w->writeAttribute('parentId',$category['parentId'] );
                            $w->text($category['name'] );
                            $w->endElement();
                        }
                    $w->endElement();

                    $w->startElement('offers');
                    foreach ($this->productArray as $product) {
                        $w->startElement('offer');
                            $w->writeAttribute('id',$product['xml_product_id'] );
                            $w->startElement('name');
                            $w->text($product['name'] );
                            $w->endElement();

                            $w->startElement('sku');
                            $w->text($product['sku'] );
                            $w->endElement();

                            $w->startElement('price');
                            $w->text($product['price'] );
                            $w->endElement();

                            $w->startElement('picture');
                            $w->text($product['picture'] );
                            $w->endElement();

                            $w->startElement('description');
                            $w->text($product['description'] );
                            $w->endElement();

                            $w->startElement('categoryId');
                                $categories = explode(',',$product['xml_category_id']);
                                foreach ($categories as $catId) {
                                    $w->startElement('cid');
                                    $w->text($catId);
                                    $w->endElement();
                                }
                            $w->endElement();

                        $w->endElement();
                    }
                    $w->endElement();
                $w->endElement();
            $w->endElement();
        $w->endDocument();


        return $w->outputMemory(true);


    }

}