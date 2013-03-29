<?php

namespace Magazento\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use APY\DataGridBundle\Grid\Source\Vector;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Column;

use Magazento\BuildBundle\Document\BuildHistory;


class HistoryController extends Controller
{
    public function historyAction()
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $vector = $dm->getRepository('MagazentoBuildBundle:BuildHistory')->getAllHistory();

        $columns = array(
            new Column\TextColumn(array('id' => 'id', 'field' => 'id', 'filterable' => true, 'source' => true, 'title' => 'id')),
            new Column\TextColumn(array('id' => 'log_rawtime', 'field' => 'log_rawtime', 'filterable' => true, 'source' => true, 'title' => 'time')),
            new Column\TextColumn(array('id' => 'log_time', 'field' => 'log_time', 'filterable' => true, 'source' => true, 'title' => 'date')),
            new Column\TextColumn(array('id' => 'user_id', 'field' => 'user_id', 'filterable' => true, 'source' => true, 'title' => 'user_id')),
            new Column\TextColumn(array('id' => 'type', 'field' => 'type', 'filterable' => true, 'source' => true, 'title' => 'type')),
            new Column\TextColumn(array('id' => 'log', 'field' => 'log', 'filterable' => true, 'source' => true, 'title' => 'log')),
        );

        $source = new Vector($vector,$columns);      

        /* @var $grid APY\DataGridBundle\Grid\Grid */
        $grid = $this->get('grid');
        $grid->setLimits(array(25,50,75));
        $grid->setPage(1);      
        $grid->setSource($source);

        $grid->hideColumns(array('id'));   

        return $grid->getGridResponse('MagazentoAdminBundle:Security:history.html.twig');
    }
}