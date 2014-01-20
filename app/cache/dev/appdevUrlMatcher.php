<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appdevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appdevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // _wdt
        if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
        }

        if (0 === strpos($pathinfo, '/_profiler')) {
            // _profiler_search
            if ($pathinfo === '/_profiler/search') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
            }

            // _profiler_purge
            if ($pathinfo === '/_profiler/purge') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
            }

            // _profiler_info
            if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::infoAction',)), array('_route' => '_profiler_info'));
            }

            // _profiler_import
            if ($pathinfo === '/_profiler/import') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
            }

            // _profiler_export
            if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+)\\.txt$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
            }

            // _profiler_phpinfo
            if ($pathinfo === '/_profiler/phpinfo') {
                return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::phpinfoAction',  '_route' => '_profiler_phpinfo',);
            }

            // _profiler_search_results
            if (preg_match('#^/_profiler/(?P<token>[^/]+)/search/results$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
            }

            // _profiler
            if (preg_match('#^/_profiler/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
            }

            // _profiler_redirect
            if (rtrim($pathinfo, '/') === '/_profiler') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_profiler_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => '_profiler_search_results',  'token' => 'empty',  'ip' => '',  'url' => '',  'method' => '',  'limit' => '10',  '_route' => '_profiler_redirect',);
            }

        }

        if (0 === strpos($pathinfo, '/_configurator')) {
            // _configurator_home
            if (rtrim($pathinfo, '/') === '/_configurator') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_configurator_home');
                }

                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
            }

            // _configurator_step
            if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
            }

            // _configurator_final
            if ($pathinfo === '/_configurator/final') {
                return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
            }

        }

        // magazento_service_default_index
        if (rtrim($pathinfo, '/') === '/test') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'magazento_service_default_index');
            }

            return array (  '_controller' => 'Magazento\\ServiceBundle\\Controller\\DefaultController::indexAction',  '_route' => 'magazento_service_default_index',);
        }

        // magazento_api_api_storeinfo
        if (0 === strpos($pathinfo, '/api/storeinfo') && preg_match('#^/api/storeinfo/(?P<username>[^/]+)/(?P<user_api>[^/]+)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'magazento_api_api_storeinfo');
            }

            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Magazento\\ApiBundle\\Controller\\ApiController::storeInfoAction',)), array('_route' => 'magazento_api_api_storeinfo'));
        }

        // magazento_api_api_storecatalog
        if (0 === strpos($pathinfo, '/api/storecatalog') && preg_match('#^/api/storecatalog/(?P<username>[^/]+)/(?P<user_api>[^/]+)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'magazento_api_api_storecatalog');
            }

            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Magazento\\ApiBundle\\Controller\\ApiController::storeCatalogAction',)), array('_route' => 'magazento_api_api_storecatalog'));
        }

        // magazento_api_api_orderemail
        if (0 === strpos($pathinfo, '/api/orderemail') && preg_match('#^/api/orderemail/(?P<username>[^/]+)/(?P<user_api>[^/]+)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'magazento_api_api_orderemail');
            }

            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Magazento\\ApiBundle\\Controller\\ApiController::orderEmailAction',)), array('_route' => 'magazento_api_api_orderemail'));
        }

        // _magazento_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_magazento_homepage');
            }

            return array (  '_controller' => 'Magazento\\MenuBundle\\Controller\\DefaultController::homepageAction',  '_route' => '_magazento_homepage',);
        }

        // _magazento_howitworks
        if ($pathinfo === '/howitworks') {
            return array (  '_controller' => 'Magazento\\MenuBundle\\Controller\\DefaultController::howitworksAction',  '_route' => '_magazento_howitworks',);
        }

        // _magazento_why
        if ($pathinfo === '/whywe') {
            return array (  '_controller' => 'Magazento\\MenuBundle\\Controller\\DefaultController::whyAction',  '_route' => '_magazento_why',);
        }

        // _magazento_start
        if ($pathinfo === '/start') {
            return array (  '_controller' => 'Magazento\\MenuBundle\\Controller\\DefaultController::startAction',  '_route' => '_magazento_start',);
        }

        // _magazento_pricing
        if ($pathinfo === '/pricing') {
            return array (  '_controller' => 'Magazento\\MenuBundle\\Controller\\DefaultController::pricingAction',  '_route' => '_magazento_pricing',);
        }

        // _magazento_contact
        if ($pathinfo === '/contact') {
            return array (  '_controller' => 'Magazento\\MenuBundle\\Controller\\DefaultController::contactAction',  '_route' => '_magazento_contact',);
        }

        // _magazento_demo_iphone
        if ($pathinfo === '/demo/iphone') {
            return array (  '_controller' => 'Magazento\\MenuBundle\\Controller\\DefaultController::demoiphoneAction',  '_route' => '_magazento_demo_iphone',);
        }

        // _magazento_demo_android
        if ($pathinfo === '/demo/android') {
            return array (  '_controller' => 'Magazento\\MenuBundle\\Controller\\DefaultController::demoandroidAction',  '_route' => '_magazento_demo_android',);
        }

        // _magazento_billing_changeplan
        if ($pathinfo === '/billing/changeplan') {
            return array (  '_controller' => 'Magazento\\BillingBundle\\Controller\\DefaultController::changeplanAction',  '_route' => '_magazento_billing_changeplan',);
        }

        // _magazento_billing_pay
        if ($pathinfo === '/billing/pay') {
            return array (  '_controller' => 'Magazento\\BillingBundle\\Controller\\DefaultController::payAction',  '_route' => '_magazento_billing_pay',);
        }

        // _magazento_billing_index
        if ($pathinfo === '/billing') {
            return array (  '_controller' => 'Magazento\\BillingBundle\\Controller\\DefaultController::indexAction',  '_route' => '_magazento_billing_index',);
        }

        // _magazento_build
        if ($pathinfo === '/build') {
            return array (  '_controller' => 'Magazento\\BuildBundle\\Controller\\BuildController::buildAction',  '_route' => '_magazento_build',);
        }

        // _magazento_build_run
        if ($pathinfo === '/build/iphone') {
            return array (  '_controller' => 'Magazento\\BuildBundle\\Controller\\BuildController::buildIphoneAction',  '_route' => '_magazento_build_run',);
        }

        // _magazento_build_download_iphone
        if ($pathinfo === '/build/iphone/download') {
            return array (  '_controller' => 'Magazento\\BuildBundle\\Controller\\BuildController::downloadIphoneAction',  '_route' => '_magazento_build_download_iphone',);
        }

        // _magazento_settings
        if ($pathinfo === '/settings') {
            return array (  '_controller' => 'Magazento\\SettingsBundle\\Controller\\DefaultController::settingsAction',  '_route' => '_magazento_settings',);
        }

        // _magazento_settings_apple
        if ($pathinfo === '/settings/apple') {
            return array (  '_controller' => 'Magazento\\SettingsBundle\\Controller\\DefaultController::appleAction',  '_route' => '_magazento_settings_apple',);
        }

        // _magazento_billing
        if ($pathinfo === '/billing') {
            return array (  '_controller' => 'Magazento\\BillingBundle\\Controller\\DefaultController::indexAction',  '_route' => '_magazento_billing',);
        }

        // _magazento_billing_change_plan
        if ($pathinfo === '/billing/planchange') {
            return array (  '_controller' => 'Magazento\\BillingBundle\\Controller\\DefaultController::planChangeAction',  '_route' => '_magazento_billing_change_plan',);
        }

        // _magazento_billing_payment_send
        if ($pathinfo === '/billing/send') {
            return array (  '_controller' => 'Magazento\\BillingBundle\\Controller\\PaymentController::sendAction',  '_route' => '_magazento_billing_payment_send',);
        }

        // _magazento_billing_payment_success
        if ($pathinfo === '/billing/success') {
            return array (  '_controller' => 'Magazento\\BillingBundle\\Controller\\PaymentController::successAction',  '_route' => '_magazento_billing_payment_success',);
        }

        // _magazento_catalog_upload
        if (rtrim($pathinfo, '/') === '/catalog/upload') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_magazento_catalog_upload');
            }

            return array (  '_controller' => 'Magazento\\CatalogBundle\\Controller\\DefaultController::uploadAction',  '_route' => '_magazento_catalog_upload',);
        }

        // _magazento_catalog
        if ($pathinfo === '/catalog/productgrid') {
            return array (  '_controller' => 'Magazento\\CatalogBundle\\Controller\\DefaultController::productgridAction',  '_route' => '_magazento_catalog',);
        }

        // _magazento_catalog_productgrid
        if ($pathinfo === '/catalog/productgrid') {
            return array (  '_controller' => 'Magazento\\CatalogBundle\\Controller\\DefaultController::productgridAction',  '_route' => '_magazento_catalog_productgrid',);
        }

        // _magazento_catalog_categoryjson
        if ($pathinfo === '/catalog/category/json') {
            return array (  '_controller' => 'Magazento\\CatalogBundle\\Controller\\DefaultController::categoryJSONAction',  '_route' => '_magazento_catalog_categoryjson',);
        }

        // _magazento_catalog_categorygrid
        if ($pathinfo === '/catalog/categorygrid') {
            return array (  '_controller' => 'Magazento\\CatalogBundle\\Controller\\DefaultController::categorygridAction',  '_route' => '_magazento_catalog_categorygrid',);
        }

        // fos_user_security_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Magazento\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
        }

        // fos_user_security_check
        if ($pathinfo === '/login_check') {
            return array (  '_controller' => 'Magazento\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
        }

        // fos_user_security_logout
        if ($pathinfo === '/logout') {
            return array (  '_controller' => 'Magazento\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'Magazento\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'Magazento\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/register')) {
            // fos_user_registration_register
            if (rtrim($pathinfo, '/') === '/register') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                }

                return array (  '_controller' => 'Magazento\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
            }

            // fos_user_registration_check_email
            if ($pathinfo === '/register/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_check_email;
                }

                return array (  '_controller' => 'Magazento\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
            }
            not_fos_user_registration_check_email:

            // fos_user_registration_confirm
            if (0 === strpos($pathinfo, '/register/confirm') && preg_match('#^/register/confirm/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirm;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Magazento\\UserBundle\\Controller\\RegistrationController::confirmAction',)), array('_route' => 'fos_user_registration_confirm'));
            }
            not_fos_user_registration_confirm:

            // fos_user_registration_confirmed
            if ($pathinfo === '/register/confirmed') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_registration_confirmed;
                }

                return array (  '_controller' => 'Magazento\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
            }
            not_fos_user_registration_confirmed:

        }

        if (0 === strpos($pathinfo, '/resetting')) {
            // fos_user_resetting_request
            if ($pathinfo === '/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_request;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_send_email
            if ($pathinfo === '/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_resetting_send_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ($pathinfo === '/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
            }
            not_fos_user_resetting_check_email:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',)), array('_route' => 'fos_user_resetting_reset'));
            }
            not_fos_user_resetting_reset:

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        // _admin_login
        if ($pathinfo === '/admin/login') {
            return array (  '_controller' => 'Magazento\\AdminBundle\\Controller\\SecurityController::loginAction',  '_route' => '_admin_login',);
        }

        // _admin_history
        if ($pathinfo === '/admin/history') {
            return array (  '_controller' => 'Magazento\\AdminBundle\\Controller\\HistoryController::historyAction',  '_route' => '_admin_history',);
        }

        // _admin_user
        if ($pathinfo === '/admin/user') {
            return array (  '_controller' => 'Magazento\\AdminBundle\\Controller\\UserController::userAction',  '_route' => '_admin_user',);
        }

        // _admin_user_delete
        if ($pathinfo === '/admin/user/delete') {
            return array (  '_controller' => 'Magazento\\AdminBundle\\Controller\\UserController::userdeleteAction',  '_route' => '_admin_user_delete',);
        }

        // _admin_logout
        if ($pathinfo === '/admin/logout') {
            return array('_route' => '_admin_logout');
        }

        // _admin_login_check
        if ($pathinfo === '/admin/login_check') {
            return array('_route' => '_admin_login_check');
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
