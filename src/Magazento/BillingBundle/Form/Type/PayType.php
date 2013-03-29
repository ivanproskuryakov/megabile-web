<?php

namespace Magazento\BillingBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PayType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('money', 'integer', array(
            'attr' => array('min' => '1','max'=>'10000'),
            'required' => true,
            'label' => 'Add money'));
    }

    public function getName() {
        return 'pay';
    }

}