<?php

namespace Magazento\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


use APY\DataGridBundle\Grid\Source\Vector;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Column;

use Magazento\UserBundle\Document\User;

class UserController extends Controller
{
    
    public function userAction()
    {
            $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $vector = $dm->getRepository('MagazentoUserBundle:User')->getAllUsersAdmin();
            
            $columns = array(
                new Column\TextColumn(array('id' => 'id', 'field' => 'id', 'filterable' => true, 'source' => true, 'title' => 'id')),
                new Column\TextColumn(array('id' => 'username', 'field' => 'username', 'filterable' => true, 'source' => true, 'title' => 'username')),
                new Column\TextColumn(array('id' => 'email', 'field' => 'email', 'filterable' => true, 'source' => true, 'title' => 'email')),
                new Column\TextColumn(array('id' => 'money', 'field' => 'money', 'filterable' => true, 'source' => true, 'title' => 'money')),
                new Column\TextColumn(array('id' => 'money_reserved', 'field' => 'money_reserved', 'filterable' => true, 'source' => true, 'title' => 'money_reserved')),
                new Column\TextColumn(array('id' => 'pay_date', 'field' => 'pay_date', 'filterable' => true, 'source' => true, 'title' => 'pay_date')),
                new Column\TextColumn(array('id' => 'count_build', 'field' => 'build_count', 'filterable' => true, 'source' => true, 'title' => 'builds')),
                new Column\TextColumn(array('id' => 'count_category', 'field' => 'count_category', 'filterable' => true, 'source' => true, 'title' => 'categories')),
                new Column\TextColumn(array('id' => 'count_products', 'field' => 'count_products', 'filterable' => true, 'source' => true, 'title' => 'Products')),
            );


            $source = new Vector($vector,$columns);      
            
            /* @var $grid APY\DataGridBundle\Grid\Grid */
            $grid = $this->get('grid');
            $grid->setLimits(array(25,50,75));
            $grid->setPage(1);      
            $grid->setSource($source);
            $rowAction = new RowAction('Delete', '_admin_user_delete', true, '_self', array('class' => 'grid_delete_action'));
            $grid->addRowAction($rowAction);    


            return $grid->getGridResponse('MagazentoAdminBundle:Security:user.html.twig');
    }
    
    public function userdeleteAction(Request $request) 
    {
        if ($id = $request->query->get('id')) {
            $this->get('magazento_admin_user')->deleteUser($id);  
        } else {
        }
        
        return $this->redirect($this->generateUrl('_admin_user'));
    }    
}