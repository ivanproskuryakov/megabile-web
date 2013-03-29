<?php

namespace Magazento\SettingsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class IphoneTranslationType extends AbstractType {

public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
            ->add('text', 'textarea', array(
            'label' => 'Text'))
        ;    
        
    }

    public function getName() {
        return 'iphoneTranslation';
    }

}