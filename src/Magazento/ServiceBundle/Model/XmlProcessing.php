<?php

namespace Magazento\ServiceBundle\Model;

use XMLReader;
use DOMDocument;

class XmlProcessing {

    protected $errors = array();
    protected $categoryArray = array();
    protected $productArray = array();

    public function noErrorsWereFound() {
        if (count($this->errors)) return false;
        return true;
    }
    
    public function getProductArray() {
        return $this->productArray;
    }
    public function getErrorsArray() {
        return $this->errors;
    }
    public function getCategoryArray() {
        return $this->categoryArray;
    }
    
    
    public function isRootCategoryExists($categories) {

        foreach ($categories as $category) {
            if ($category['xml_parent_Id'] == 0) return true;
        }
        return false;
    }    

    public function processXmlFile($address) {
        

        $doc = new DOMDocument;
        $xmlReader = new XMLReader();
        if (!$xmlReader->open($address, null, LIBXML_NOERROR | LIBXML_NOWARNING | 1)) {
            throw exit("Failed to open xml file.");
        }
//        $xmlReader->setParserProperty(XMLReader::VALIDATE, true);
        
//        if (!$xmlReader->isValid()) {
//            $this->errors[] = 'XML document is not valid';
//        }           
        $offers = array();
        $categories = array();

//        if (!$xmlReader->isValid()) $this->errors[] = 'ERROR: document is not valid. ';
//        try {

            if ($this->noErrorsWereFound()) {
                while ($xmlReader->read()) {
                    if ($xmlReader->nodeType == XMLReader::ELEMENT) {
                        if (!$xmlReader->localName == 'categories') {
                            $this->errors[] = '"categories" element is missing! ';
                            break;
                        }
                        if (!$xmlReader->localName == 'offers') {
                            $this->errors[] = '"offers" element is missing! ';
                            break;
                        }


                        if (!$this->noErrorsWereFound())
                            break;

                        try {                        
                            if ($xmlReader->localName == 'category') {
                                $node = simplexml_import_dom($doc->importNode($xmlReader->expand(), true));    
                                $id = (int)$node['id'];
                                $categories[$id]['xml_category_id'] = (int)$node['id'];
                                $categories[$id]['xml_parent_Id'] = (int)$node['parentId'];
                                $categories[$id]['name'] = (string)$node;
                            }
                        } catch (\Exception $e) {
                            $this->errors[] = 'Category '.$node.' with ID# '.$node['id'].' not valid';           
                        }  
                        
                        try {       
                            if ($xmlReader->localName == 'offer') {
                                $node = simplexml_import_dom($doc->importNode($xmlReader->expand(), true)); 
                                $id = (int)$node['id'];     

                                $offers[$id]['xml_product_id'] = $id;
                                $offers[$id]['sku'] = (string)$node->sku;
                                $offers[$id]['name'] = (string)$node->name;
                                $offers[$id]['price'] = (string)$node->price;
                                $offers[$id]['description'] = (string)$node->description;
                                $offers[$id]['url'] = (string)$node->url;
                                $offers[$id]['picture'] = (string)$node->picture;


                                $tempcategories = array();
                                foreach ($node->categoryId->cid as $cat) {
                                   $tempcategories[] = (int)$cat;
                                }

                                $offers[$id]['xml_category_id'] = implode(',', $tempcategories);
        //                        var_dump($node->categoryId);
        //                        var_dump($offers[$id]['xml_category_id']);
        //                        exit();                                
                            }
                        } catch (\Exception $e) {
                            $this->errors[] = 'Product '.(string)$node->name.' with ID# '.$id.' not valid';           
                        }  


                    }
                }
            }
//        } catch (\Exception $e) {
//            $this->errors[] = 'XML nodes not valid';           
//        }            
        
        if ($this->isRootCategoryExists($categories) == false) {
            $this->errors[] = 'Root Category is missing! Your catalog should have root node with attribute parentId="0"  ';
        }   
        
        if ($this->noErrorsWereFound()) {
            $this->categoryArray = $categories;
            $this->productArray = $offers;
        }

    }

}