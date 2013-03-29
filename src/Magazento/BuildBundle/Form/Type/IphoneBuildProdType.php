<?php

namespace Magazento\BuildBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File as FileValidation;


class IphoneBuildProdType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                    ->add('type', 'hidden', array(
                        'data' => 'prod',
                        ))
                    ->add('version', 'text', array(
                        'label' => 'Version',
                        'data' => '1.0.0',
                        ))
                    ->add('build', 'text', array(
                        'label' => 'Build',
                        'data' => '1',
                    ))
                    ;
    }

    public function getName() {
        return 'iphonebuild';
    }

}