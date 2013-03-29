<?php
namespace Magazento\MenuBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array(
                        'label' => 'Name'))
                ->add('email', 'email', array(
                        'label' => 'Email'))              
                ->add('message', 'textarea', array(
                        'label' => 'Message',
                        'max_length' => '200',
                    ));              
    }

    public function getName()
    {
        return 'contactform';
    }
}