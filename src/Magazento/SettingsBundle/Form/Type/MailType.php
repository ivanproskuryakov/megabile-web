<?php

namespace Magazento\SettingsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File as FileValidation;

class MailType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('server', 'text', array(
                    'label' => 'Server'))
                ->add('user', 'text', array(
                    'label' => 'User'))
                ->add('password', 'text', array(
                    'label' => 'Password'))
                ->add('port', 'text', array(
                    'label' => 'Port'))
//                ->add('encryption', 'radio', array(
//                    'label' => 'TLS/SSL required'))
                ->add('encryption', 'choice', array(
                    'expanded' => false,
                    'choices' => array('ssl' => 'SSL required', 'tls' => 'TLS required', '0' => 'No encryption'),
                    'label' => 'Encryption'
                ))                     
        ;
    }

    public function getName() {
        return 'mail';
    }

}