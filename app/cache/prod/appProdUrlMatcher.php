<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\SecurityController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        // default_home
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'default_home');
            }

            return array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\DefaultController::indexAction',  '_route' => 'default_home',);
        }

        // migrate
        if ($pathinfo === '/migrate') {
            return array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\DefaultController::migrateAction',  '_route' => 'migrate',);
        }

        if (0 === strpos($pathinfo, '/core')) {
            if (0 === strpos($pathinfo, '/core/organisation')) {
                // organisation_index
                if (rtrim($pathinfo, '/') === '/core/organisation') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'organisation_index');
                    }

                    return array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\OrganisationController::indexAction',  '_route' => 'organisation_index',);
                }

                // organisation_new
                if ($pathinfo === '/core/organisation/new') {
                    return array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\OrganisationController::newAction',  '_route' => 'organisation_new',);
                }

                // organisation_edit
                if (0 === strpos($pathinfo, '/core/organisation/edit') && preg_match('#^/core/organisation/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'organisation_edit')), array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\OrganisationController::editAction',));
                }

                // organisation_delete
                if (0 === strpos($pathinfo, '/core/organisation/delete') && preg_match('#^/core/organisation/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'organisation_delete')), array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\OrganisationController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/core/user')) {
                // user_index
                if (rtrim($pathinfo, '/') === '/core/user') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'user_index');
                    }

                    return array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::indexAction',  '_route' => 'user_index',);
                }

                if (0 === strpos($pathinfo, '/core/user/new')) {
                    // user_new_atsgt
                    if (0 === strpos($pathinfo, '/core/user/newAtsgt') && preg_match('#^/core/user/newAtsgt/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_new_atsgt')), array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::newFromAtemschutzgeraetetraeger',));
                    }

                    // user_new
                    if ($pathinfo === '/core/user/new') {
                        return array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
                    }

                }

                // user_status
                if (0 === strpos($pathinfo, '/core/user/status') && preg_match('#^/core/user/status/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_status')), array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::statusAction',));
                }

                // user_edit
                if (0 === strpos($pathinfo, '/core/user/edit') && preg_match('#^/core/user/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::editAction',));
                }

                // user_delete
                if (0 === strpos($pathinfo, '/core/user/delete') && preg_match('#^/core/user/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::deleteAction',));
                }

            }

            // myaccount_edit
            if ($pathinfo === '/core/account/edit') {
                return array (  '_controller' => 'Atemschutz\\CoreBundle\\Controller\\MyAccountController::editAction',  '_route' => 'myaccount_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/nachweis')) {
            if (0 === strpos($pathinfo, '/nachweis/atemschutzgeraetetraeger')) {
                // atemschutzgeraetetraeger_index
                if ($pathinfo === '/nachweis/atemschutzgeraetetraeger/index.html') {
                    return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::indexAction',  '_route' => 'atemschutzgeraetetraeger_index',);
                }

                // atemschutzgeraetetraeger_report
                if (0 === strpos($pathinfo, '/nachweis/atemschutzgeraetetraeger/report') && preg_match('#^/nachweis/atemschutzgeraetetraeger/report\\.(?P<_format>html|pdf)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'atemschutzgeraetetraeger_report')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::reportAction',));
                }

                if (0 === strpos($pathinfo, '/nachweis/atemschutzgeraetetraeger/show')) {
                    // atemschutzgeraetetraeger_show
                    if (preg_match('#^/nachweis/atemschutzgeraetetraeger/show/(?P<id>[^/\\.]++)\\.(?P<_format>html|pdf)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'atemschutzgeraetetraeger_show')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::showAction',));
                    }

                    // atemschutzgeraetetraeger_showMy
                    if ($pathinfo === '/nachweis/atemschutzgeraetetraeger/showMy.html') {
                        return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::showMyAction',  '_route' => 'atemschutzgeraetetraeger_showMy',);
                    }

                }

                // atemschutzgeraetetraeger_new
                if ($pathinfo === '/nachweis/atemschutzgeraetetraeger/new.html') {
                    return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::newAction',  '_route' => 'atemschutzgeraetetraeger_new',);
                }

                // atemschutzgeraetetraeger_status
                if (0 === strpos($pathinfo, '/nachweis/atemschutzgeraetetraeger/status') && preg_match('#^/nachweis/atemschutzgeraetetraeger/status/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'atemschutzgeraetetraeger_status')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::statusAction',));
                }

                // atemschutzgeraetetraeger_edit
                if (0 === strpos($pathinfo, '/nachweis/atemschutzgeraetetraeger/edit') && preg_match('#^/nachweis/atemschutzgeraetetraeger/edit/(?P<id>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'atemschutzgeraetetraeger_edit')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::editAction',));
                }

                // atemschutzgeraetetraeger_delete
                if (0 === strpos($pathinfo, '/nachweis/atemschutzgeraetetraeger/delete') && preg_match('#^/nachweis/atemschutzgeraetetraeger/delete/(?P<id>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'atemschutzgeraetetraeger_delete')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::deleteAction',));
                }

                // atemschutzgeraetetraeger_tauglichkeit_report
                if (0 === strpos($pathinfo, '/nachweis/atemschutzgeraetetraeger/tauglichkeit/report') && preg_match('#^/nachweis/atemschutzgeraetetraeger/tauglichkeit/report/(?P<_format>html|pdf)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'atemschutzgeraetetraeger_tauglichkeit_report')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::atemschutzgeraetetraegerTauglichkeitReportAction',));
                }

            }

            if (0 === strpos($pathinfo, '/nachweis/einsatzart')) {
                // einsatzart_index
                if (rtrim($pathinfo, '/') === '/nachweis/einsatzart') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'einsatzart_index');
                    }

                    return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\EinsatzartController::indexAction',  '_route' => 'einsatzart_index',);
                }

                // einsatzart_new
                if ($pathinfo === '/nachweis/einsatzart/new') {
                    return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\EinsatzartController::newAction',  '_route' => 'einsatzart_new',);
                }

                // einsatzart_edit
                if (0 === strpos($pathinfo, '/nachweis/einsatzart/edit') && preg_match('#^/nachweis/einsatzart/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'einsatzart_edit')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\EinsatzartController::editAction',));
                }

                // einsatzart_delete
                if (0 === strpos($pathinfo, '/nachweis/einsatzart/delete') && preg_match('#^/nachweis/einsatzart/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'einsatzart_delete')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\EinsatzartController::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/nachweis/g26')) {
                // g26_void
                if (0 === strpos($pathinfo, '/nachweis/g26/void') && preg_match('#^/nachweis/g26/void/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'g26_void')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\G26Controller::voidAction',));
                }

                // g26_new
                if (0 === strpos($pathinfo, '/nachweis/g26/new') && preg_match('#^/nachweis/g26/new/(?P<atemschutzgeraetetraegerId>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'g26_new')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\G26Controller::newAction',));
                }

                // g26_edit
                if (0 === strpos($pathinfo, '/nachweis/g26/edit') && preg_match('#^/nachweis/g26/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'g26_edit')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\G26Controller::editAction',));
                }

                // g26_delete
                if (0 === strpos($pathinfo, '/nachweis/g26/delete') && preg_match('#^/nachweis/g26/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'g26_delete')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\G26Controller::deleteAction',));
                }

            }

            if (0 === strpos($pathinfo, '/nachweis/nachweis')) {
                // nachweis_new
                if (0 === strpos($pathinfo, '/nachweis/nachweis/new') && preg_match('#^/nachweis/nachweis/new/(?P<atemschutzgeraetetraegerId>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'nachweis_new')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::newAction',));
                }

                // nachweis_bulk
                if ($pathinfo === '/nachweis/nachweis/bulk') {
                    return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::bulkAction',  '_route' => 'nachweis_bulk',);
                }

                if (0 === strpos($pathinfo, '/nachweis/nachweis/used')) {
                    // nachweis_used_locations
                    if ($pathinfo === '/nachweis/nachweis/used/locations') {
                        return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::usedLocationsAction',  '_route' => 'nachweis_used_locations',);
                    }

                    // nachweis_used_work
                    if ($pathinfo === '/nachweis/nachweis/used/work') {
                        return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::usedWorkAction',  '_route' => 'nachweis_used_work',);
                    }

                }

                // nachweis_show
                if (0 === strpos($pathinfo, '/nachweis/nachweis/show') && preg_match('#^/nachweis/nachweis/show/(?P<id>[^/\\.]++)\\.(?P<_format>html|pdf)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'nachweis_show')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::showAction',));
                }

                // nachweis_edit
                if (0 === strpos($pathinfo, '/nachweis/nachweis/edit') && preg_match('#^/nachweis/nachweis/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'nachweis_edit')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::editAction',));
                }

                // nachweis_delete
                if (0 === strpos($pathinfo, '/nachweis/nachweis/delete') && preg_match('#^/nachweis/nachweis/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'nachweis_delete')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::deleteAction',));
                }

                if (0 === strpos($pathinfo, '/nachweis/nachweisart')) {
                    // nachweisart_index
                    if (rtrim($pathinfo, '/') === '/nachweis/nachweisart') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'nachweisart_index');
                        }

                        return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisartController::indexAction',  '_route' => 'nachweisart_index',);
                    }

                    // nachweisart_new
                    if ($pathinfo === '/nachweis/nachweisart/new') {
                        return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisartController::newAction',  '_route' => 'nachweisart_new',);
                    }

                    // nachweisart_edit
                    if (0 === strpos($pathinfo, '/nachweis/nachweisart/edit') && preg_match('#^/nachweis/nachweisart/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'nachweisart_edit')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisartController::editAction',));
                    }

                    // nachweisart_delete
                    if (0 === strpos($pathinfo, '/nachweis/nachweisart/delete') && preg_match('#^/nachweis/nachweisart/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'nachweisart_delete')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisartController::deleteAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/nachweis/report')) {
                // report_select_year
                if ($pathinfo === '/nachweis/report/selectYear') {
                    return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\ReportController::selectYearAction',  '_route' => 'report_select_year',);
                }

                // report_year
                if (0 === strpos($pathinfo, '/nachweis/report/year') && preg_match('#^/nachweis/report/year/(?P<year>[^/\\.]++)\\.(?P<_format>html|pdf)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'report_year')), array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\ReportController::yearAction',));
                }

                // report_search_nachweis
                if ($pathinfo === '/nachweis/report/searchNachweis') {
                    return array (  '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\ReportController::searchNachweisAction',  '_route' => 'report_search_nachweis',);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
