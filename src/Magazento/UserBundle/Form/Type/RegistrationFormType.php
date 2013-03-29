<?php
namespace Magazento\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Magazento\BillingBundle\Model\BillingPlan;

class RegistrationFormType extends AbstractType
{
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $billingPlan = new BillingPlan();
//        $billingPlan = $billingPlan->plan;
//
//        foreach ($billingPlan as $k => $plan) {
//            $plansArray[$plan['name']] = $plan['name'] . ' - ' .  $plan['products'];
//        }
        
        $builder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle'))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
//            ->add('plan', 'choice', array(
//                'label' => 'Billing plan',
//                'empty_value' => false,
//                'expanded' => true,
//                'multiple' => false,
//                'choices'   => $plansArray,
//                'required'  => true,
//                'data' => 'FREE',
//            ))            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'intention'  => 'registration',
        ));
    }

    public function getName()
    {
        return 'magazento_user_registration';
    }
}
