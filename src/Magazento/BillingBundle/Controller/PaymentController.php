<?php

namespace Magazento\BillingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Magazento\BillingBundle\Document\History;
use Magazento\BillingBundle\Model\BillingPlan;


use Magazento\BillingBundle\Form\Type\PayType;

class PaymentController extends Controller
{
    
    
    public function successAction(Request $request) {
        $hashSecretWord = $this->container->getParameter('2co_secret');
        $hashSid = $this->container->getParameter('2co_sid');
        $hashOrder = $request->request->get('order_number');
        $hashTotal = $request->request->get('total');
        $KEY = $request->request->get('key');
//        $hashOrder = $_REQUEST['order_number'];       
//        $hashTotal = $_REQUEST['total'];
        $StringToHash = strtoupper(md5($hashSecretWord . $hashSid . $hashOrder . $hashTotal));        
        
        if ($StringToHash == $KEY) {
            $this->get('magazento_checkout')->orderCompleted($hashOrder);  
        }     
//        var_dump($hashOrder);
//        var_dump($_REQUEST);
//        exit('success');
    }
    
    
    
    public function sendAction(Request $request) {
        $form =  $this->createForm(new PayType());
        if ($request->isMethod('POST')) {
            $form->bind($request);
            if ($form->isValid()) {

                $money = $form->get('money')->getData();

                if (!is_int($money)) return $this->redirect($this->generateUrl('_magazento_billing_index'));

                $orderId = $this->get('magazento_checkout')->saveHistory($money);  
                if (!$orderId) return $this->redirect($this->generateUrl('_magazento_billing_index'));
                
                $usr = $this->get('security.context')->getToken()->getUser();
		$tcoFields = array();
		$tcoFields['sid']				= $this->container->getParameter('2co_sid');
		$tcoFields['total']				= $money;
//		$tcoFields['total']				= 0.01;
		$tcoFields['cart_order_id']			= $orderId->getId();
		$tcoFields['merchant_order_id']			= $orderId->getId();
		$tcoFields['email']				= $usr->getEmail();
		$tcoFields['x_receipt_link_url']                = $this->generateUrl('_magazento_billing_payment_success');
                
                $tcoFields['c_name']                          = 'Money deposit';
                $tcoFields['c_description']                   = 'www.megamobile.com';
                $tcoFields['c_price']                         = $money;
                $tcoFields['c_prod']                          = $usr->getUsername();           
                
                return $this->render('MagazentoBillingBundle:Default:redirect.html.twig', array(
                        'gateway' => $this->container->getParameter('2co_gateway'),
                        'tcoFields' => $tcoFields,
                    )
                );
            }
        }   

        return $this->redirect($this->generateUrl('_magazento_billing_index'));
    }
    
    
    
}
