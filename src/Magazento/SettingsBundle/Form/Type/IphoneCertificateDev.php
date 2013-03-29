<?php

namespace Magazento\SettingsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File as FileValidation;


class IphoneCertificateDev extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                    ->add('type', 'hidden', array(
                        'data' => 'dev',
                        ))
                    ->add('password', 'text', array(
                       'label' => 'Certificate Password'))
                    ->add('p12', 'file', array(
                        'label' => 'Certificate (.p12)',
                        'constraints' => array(
                            new FileValidation(array(
                                'maxSize' => 104858,
                            )),
                        ),
                    ))
                    ->add('mobileprovision', 'file', array(
                        'label' => 'Mobileprovision (.mobileprovision)',
                        'constraints' => array(
                            new FileValidation(array(
                                'maxSize' => 104858,
                            )),
                        ),
                    ))
                ;
    }

    public function getName() {
        return 'IphoneCertificateDev';
    }

}