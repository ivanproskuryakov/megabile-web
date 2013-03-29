<?php
namespace Magazento\BillingBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Magazento\BillingBundle\Model\BillingPlan;

class PlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $billingPlan = new BillingPlan();
        $billingPlan = $billingPlan->plan;

        foreach ($billingPlan as $k => $plan) {
            $plansArray[$plan['name']] = $plan['name'] . ' - ' .  $plan['products'] . ' (' .  $plan['price'] . ' USD)';
        }
                
        $builder->add('plan', 'choice', array(
                    'label' => 'Billing plan',
                    'empty_value' => false,
                    'expanded' => true,
                    'multiple' => false,
                    'choices'   => $plansArray,
                    'required'  => true,
                    'data' => $options['plan'],
                ));                 
    }

    public function getName()
    {
        return 'plan';
    }
}