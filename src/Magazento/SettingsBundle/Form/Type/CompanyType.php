<?php

namespace Magazento\SettingsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CompanyType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('currency', 'text', array(
                    'label' => 'Store currency'))
                ->add('name', 'text', array(
                    'label' => 'Company name'))
                ->add('address_line', 'text', array(
                    'label' => 'Address'))
                ->add('country', 'text', array(
                    'label' => 'Country'))
                ->add('city', 'text', array(
                    'label' => 'Region'))
                ->add('zip', 'text', array(                    
                    'label' => 'City'))
                ->add('region', 'text', array(
                    'label' => 'Zip / Post Code'))
                ->add('email', 'text', array(
                    'label' => 'Email'))          
                ->add('phone', 'text', array(
                    'label' => 'Phone'))          
                ->add('website', 'text', array(
                    'label' => 'Website'))          
                
                ->add('ordering', 'textarea', array(
                    'label' => 'Ordering'))
                ->add('shipping', 'textarea', array(
                    'label' => 'Shipping services'))
                ->add('privacy', 'textarea', array(
                    'label' => 'Privacy Policy'))
                ->add('cancellation', 'textarea', array(
                    'label' => 'Refunds and Cancellations'));
    }

    public function getName() {
        return 'company';
    }

}