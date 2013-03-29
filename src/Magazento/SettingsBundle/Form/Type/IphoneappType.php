<?php

namespace Magazento\SettingsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\Image as FileValidation;

class IphoneappType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
//                ->add('identifier', 'text', array(
//                    'label' => 'Bundle indetifier (com.magazento.YOUR_IDENTIFIER)'))
                ->add('product_name', 'text', array(
                    'label' => 'Product name'))
//                ->add('executable_name', 'text', array(
//                    'label' => 'Executable name'))
                ->add('icon', 'file', array(
                    'label' => 'Icon 57 x 57 pixels',
                    'data_class'=>null,
                    'required'  => false,
                    'constraints' => array(
                        new FileValidation(array(
                            'maxSize' => 104858,
                            'mimeTypes' => array('image/png'),
                            'minHeight' => '57',
                            'maxHeight' => '57',
                            'minWidth' => '57',
                            'maxWidth' => '57',
                        )),
                    ),
                ))
                ->add('icon_retina', 'file', array(
                    'label' => 'Icon retina 114 x 114 pixels',
                    'required'  => false,
                    'data_class'=>null,
                    'constraints' => array(
                        new FileValidation(array(
                            'maxSize' => 104858,
                            'mimeTypes' => array('image/png'),
                            'minHeight' => '114',
                            'maxHeight' => '114',
                            'minWidth' => '114',
                            'maxWidth' => '114',
                        )),
                    ),
                ))
                
                ->add('default', 'file', array(
                    'label' => 'Splash screen 320 × 480 pixels',
                    'required'  => false,
                    'data_class'=>null,
                    'constraints' => array(
                        new FileValidation(array(
                            'maxSize' => 524288,
                            'mimeTypes' => array('image/png'),
                            'minHeight' => '480',
                            'maxHeight' => '480',
                            'minWidth' => '320',
                            'maxWidth' => '320',
                        )),
                    ),
                ))
                ->add('default_retina', 'file', array(
                    'label' => 'Splash screen retina 640 × 960 pixels',
                    'required'  => false,
                    'data_class'=>null,
                    'constraints' => array(
                        new FileValidation(array(
                            'maxSize' => 524288,
                            'mimeTypes' => array('image/png'),
                            'minHeight' => '960',
                            'maxHeight' => '960',
                            'minWidth' => '640',
                            'maxWidth' => '640',
                        )),
                    ),
                ))
                ->add('default_retina_568h', 'file', array(
                    'label' => 'Splash screen retina 640 × 1136 pixels',
                    'required'  => false,
                    'data_class'=>null,
                    'constraints' => array(
                        new FileValidation(array(
                            'maxSize' => 1048576,
                            'mimeTypes' => array('image/png'),
                            'minHeight' => '1136',
                            'maxHeight' => '1136',
                            'minWidth' => '640',
                            'maxWidth' => '640',
                        )),
                    ),
                ))
            ;
    }

    public function getName() {
        return 'iphoneApp';
    }


}