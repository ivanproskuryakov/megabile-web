<?php

namespace Magazento\BillingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use APY\DataGridBundle\Grid\Source\Vector;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\MassAction;

use Magazento\BillingBundle\Document\History;
use Magazento\BillingBundle\Model\BillingPlan;
use Magazento\ProfileBundle\Document\Company;


use Magazento\BillingBundle\Form\Type\PayType;
use Magazento\BillingBundle\Form\Type\PlanType;


class DefaultController extends Controller
{
    
    /**
     * @Template()
     */
    public function indexAction(Request $request) {
        $usr = $this->get('security.context')->getToken()->getUser();

        $planForm = $this->createForm(new PlanType(),
                array('plan'=>$usr->getPlan())
                )->createView();
        $payForm = $this->createForm(new PayType())->createView();

        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $vector = $dm->getRepository('MagazentoBillingBundle:History')->getHistoryByUserId($usr->getId());

        $grid = false;
        if ($vector) {
            $source = new Vector($vector);
            /* @var $grid APY\DataGridBundle\Grid\Grid */
            $grid = $this->get('grid');
            $grid->setLimits(array(25,50,75));
            $grid->setPage(1);      
            $grid->setSource($source);
            $grid->hideColumns(array('id'));

            return $grid->getGridResponse('MagazentoBillingBundle:Default:billing.html.twig',array('plan_form' => $planForm,'pay_form' => $payForm));
        }
        return $this->render('MagazentoBillingBundle:Default:billing.html.twig', array('grid' => $grid,'plan_form' => $planForm,'pay_form' => $payForm));
    }
    
    public function changeplanAction(Request $request) {
            $form =  $this->createForm(new PlanType());
            if ($request->isMethod('POST')) {
                $form->bind($request);
                if ($form->isValid()) {
                    
                    $usr = $this->get('security.context')->getToken()->getUser();
                    $dm = $this->get('doctrine.odm.mongodb.document_manager');
                    $plan = $form->get('plan')->getData();
                    $billing = new BillingPlan();
                    
                    /*
                     * CHECK PLAN EXISTS
                     */
                    if (!$billing->planExists($plan)) {
                        $this->get('session')->setFlash('notice', 'This plan does not exists : '.$plan);
                        return $this->redirect($this->generateUrl('_magazento_billing_index'));
                    }
                    /*
                     * CHECK PLAN != CURRENT PLAN
                     */
                    if ($plan == $usr->getPlan()) {
                        $this->get('session')->setFlash('notice', 'You have selected the same plan as you have now : '.$plan);
                        return $this->redirect($this->generateUrl('_magazento_billing_index'));
                    }
                    
                    /*
                     * CHECK TOTAL MONEY > PLAN PRICE
                     */
                    $reservedMoneyFinal = $billing->getReservedMoneyFinalByUser($usr);
                    $totalMoney = ($usr->getMoney() + $reservedMoneyFinal);
                    
                    $planPriceFinal = $billing ->getPlanPriceFinalForUser($plan,$usr);
                    
                    if ($totalMoney < $planPriceFinal) {
                        $this->get('session')->setFlash('notice', 'Sorry, but you do not have enought money for this opperation : ' .$totalMoney. ' USD');
                        return $this->redirect($this->generateUrl('_magazento_billing_index'));
                    }

                    $newMoney = $usr->getMoney() - ($planPriceFinal - $usr->getMoneyReserved());
                    $usr->setMoney($newMoney); 
                    $usr->setPlan($plan); 
                    
                    $usr->setMoneyReserved($billing->getPlanPrice($plan));
                    
                    if ($usr->getPayDate() == false) $usr->setPayDate(time());
                    
                    $dm->persist($usr);        
                    $dm->flush();
                    
                    /*
                     * EMAIL NOTIFICATION
                     */
                    $message = \Swift_Message::newInstance()
                           ->setSubject('Megabile.com: Billing Plan')
                           ->setFrom('noreply@megabile.com')
                           ->setTo($usr->getEmail())
                           ->setBody(
                               $this->renderView(
                                   'MagazentoBillingBundle:Default:email_billingplan.txt.twig',
                                   array('plan' => $plan),
                                   array('paydate' => $usr->getPayDate())
                               )
                           );     
                    
                    $this->get('mailer')->send($message);                    
                    
                    
                    $this->get('session')->setFlash('notice', 'Your current plan: '.$plan);
                }
            }               

            return $this->redirect($this->generateUrl('_magazento_billing_index'));
    }
    
    
}
