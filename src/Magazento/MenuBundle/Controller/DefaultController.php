<?php

namespace Magazento\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Magazento\MenuBundle\Form\Type\ContactType;

class DefaultController extends Controller
{
    
    public function homepageAction()
    {
        return $this->render('MagazentoMenuBundle:Default:homepage.html.twig');
    }
    public function howitworksAction()
    {
        return $this->render('MagazentoMenuBundle:Default:howitworks.html.twig');
    }
    public function pricingAction()
    {
        return $this->render('MagazentoMenuBundle:Default:pricing.html.twig');
    }
    public function demoiphoneAction()
    {
        return $this->render('MagazentoMenuBundle:Default:demo_iphone.html.twig');
    }
    public function demoandroidAction()
    {
        return $this->render('MagazentoMenuBundle:Default:demo_android.html.twig');
    }
    public function whyAction()
    {
        return $this->render('MagazentoMenuBundle:Default:why.html.twig');
    }
    public function startAction()
    {
        return $this->render('MagazentoMenuBundle:Default:start.html.twig');
    }
    public function contactAction(Request $request)
    {
        
        $form = $this->createForm(new ContactType());
        
        if ($request->isMethod('POST')) {
            $form->bind($request);
            if ($form->isValid()) {
                
                $emailTo = $this->container->getParameter('email_contact'); 
                $body = "From: " . $form->get('email')->getData() . "\r\n" .
                        "Name: " . $form->get('name')->getData() . "\r\n" .
                        "Message: ". $form->get('message')->getData();
                
                $message = \Swift_Message::newInstance()
                    ->setSubject('Megabile: Contact Form')
                    ->setFrom($form->get('email')->getData())
                    ->setTo($this->container->getParameter('email_contact'))
                    ->setBody($body)
                ;
                $this->get('mailer')->send($message);                
                
                
                $this->get('session')->setFlash('notice', 'Thank you for contacting us!');
            }
            
        }        
        
        return $this->render('MagazentoMenuBundle:Default:contact.html.twig',array('contact_form' => $form->createView()));
    }

}
