<?php
namespace Magazento\UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

use FOS\UserBundle\Event\FilterUserResponseEvent;

/**
 * Listener responsible to change the redirection at the end of the password resetting
 */

class MainListener implements EventSubscriberInterface
{
    private $router;
    protected $security_context;
    protected $dm;
    protected $container;

    public function __construct($security_context,UrlGeneratorInterface $router,$doctrine,$service_container)
    {
        $this->security_context = $security_context;   
        $this->router = $router;
        $this->dm = $doctrine;
        $this->container = $service_container;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_CONFIRMED => 'onPasswordResettingSuccess',
        );
    }

    public function onPasswordResettingSuccess(FilterUserResponseEvent $event)
    {
        
    }
}

