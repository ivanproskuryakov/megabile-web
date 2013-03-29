<?php

namespace Magazento\CatalogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


use APY\DataGridBundle\Grid\Source\Vector;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Column;
use Magazento\CatalogBundle\Document\Product;
use Magazento\CatalogBundle\Document\Category;
use Magazento\CatalogBundle\Model\XmlProcessing;

use Magazento\CatalogBundle\Form\Type\UploadType;

//use Magazento\CatalogBundle\Entity\Xmlfile;


class DefaultController extends Controller {
    
    function convertToTree(array $flat) {
        $indexed = array();
        foreach ($flat as $row) {
            $indexed[$row['id']] = $row;
        }  
        $root = null;
        foreach ($indexed as $id => $row) {
            $indexed[$row['parentId']]['children'][] =& $indexed[$id];
            if (!$row['parentId']) {
                $root = $id;
            }
        }

        return array($indexed[$root]);
    }  
    
    /*
     * CATEGORIES
     */
    public function categoryJSONAction() {
        $usr = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $vector = $dm->getRepository('MagazentoCatalogBundle:Category')->getCategoriesByUserId($usr->getId());
        $tree = $this->convertToTree($vector);
        echo json_encode($tree);
        exit();
    }
    
    public function categorygridAction() {
        
        $usr = $this->get('security.context')->getToken()->getUser();
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $vector = $dm->getRepository('MagazentoCatalogBundle:Category')->getCategoriesByUserId($usr->getId());
        if (!$vector) {
            $this->get('session')->setFlash('notice', 'You need to import your catalog first');
            return $this->redirect($this->generateUrl('_magazento_catalog_upload'));
        }     
        
        $form = $this->createForm(new UploadType());  
        return $this->render('MagazentoCatalogBundle:Default:category.html.twig', array(
                    'form' => $form->createView(),
                ));        
    }

    /*
     * PRODUCTS
     */

    public function productgridAction() {
        $usr = $this->get('security.context')->getToken()->getUser();

        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $vector = $dm->getRepository('MagazentoCatalogBundle:Product')->getProductsByUserId($usr->getId());
        if (!$vector) {
            $this->get('session')->setFlash('notice', 'You need to import your catalog first');
            return $this->redirect($this->generateUrl('_magazento_catalog_upload'));
        }


        $columns = array(
            new Column\TextColumn(array('id' => 'picture', 'field' => 'picture', 'filterable' => false, 'source' => true, 'title' => 'picture')),
            new Column\TextColumn(array('id' => 'price', 'field' => 'price', 'source' => true, 'title' => 'price')),
            new Column\TextColumn(array('id' => 'name', 'field' => 'name', 'source' => true, 'title' => 'name')),
            new Column\TextColumn(array('id' => 'sku', 'field' => 'sku', 'source' => true, 'title' => 'sku')),
            new Column\TextColumn(array('id' => 'description', 'field' => 'description', 'source' => true, 'title' => 'description')),
        );


        $source = new Vector($vector, $columns);


        $grid = $this->get('grid');
        $grid->setLimits(array(25, 50, 75));
        $grid->setPage(1);
        $grid->setSource($source);
        $grid->hideColumns(array('id', 'xml_product_id', 'xml_product_id', 'xml_category_id', 'url'));

        $form = $this->createForm(new UploadType());  
        return $grid->getGridResponse('MagazentoCatalogBundle:Default:grid.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    public function uploadAction(Request $request) {

        $form = $this->createForm(new UploadType());  
        
        if ($request->isMethod('POST')) {
            $form->bind($request);
            if ($form->isValid()) {

                $file = $form->get('file');
                if (pathinfo($file->getData()->getClientOriginalName(), PATHINFO_EXTENSION) != 'xml') {
                    $this->get('session')->setFlash('notice', 'Bad XML file');
                    return $this->redirect($this->generateUrl('_magazento_catalog_upload'));
                }

                $this->get('magazento_catalog')->upload($file);
                $this->get('magazento_build_xml')->zipCatalog();  
                return $this->redirect($this->generateUrl('_magazento_catalog_categorygrid'));
            }
        }

        return $this->render('MagazentoCatalogBundle:Default:upload.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

}
