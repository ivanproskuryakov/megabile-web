<?php

namespace Magazento\CatalogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\File as FileValidation;

class UploadType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('file', 'file', array(
                    'label' => 'Catalog XML',
                    'constraints' => array(
                        new FileValidation(array(
                            'maxSize' => 31457280,
                        )),
                    ),
                ))
                ;
    }

    public function getName() {
        return 'upload';
    }

}