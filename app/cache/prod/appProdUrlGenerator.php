<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    static private $declaredRoutes = array(
        'login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\SecurityController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),),
        'login_check' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login_check',    ),  ),  4 =>   array (  ),),
        'logout' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),),
        'default_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),),
        'migrate' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\DefaultController::migrateAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/migrate',    ),  ),  4 =>   array (  ),),
        'organisation_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\OrganisationController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/core/organisation/',    ),  ),  4 =>   array (  ),),
        'organisation_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\OrganisationController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/core/organisation/new',    ),  ),  4 =>   array (  ),),
        'organisation_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\OrganisationController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/core/organisation/edit',    ),  ),  4 =>   array (  ),),
        'organisation_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\OrganisationController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/core/organisation/delete',    ),  ),  4 =>   array (  ),),
        'user_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/core/user/',    ),  ),  4 =>   array (  ),),
        'user_new_atsgt' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::newFromAtemschutzgeraetetraeger',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/core/user/newAtsgt',    ),  ),  4 =>   array (  ),),
        'user_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/core/user/new',    ),  ),  4 =>   array (  ),),
        'user_status' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::statusAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/core/user/status',    ),  ),  4 =>   array (  ),),
        'user_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/core/user/edit',    ),  ),  4 =>   array (  ),),
        'user_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\UserController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/core/user/delete',    ),  ),  4 =>   array (  ),),
        'myaccount_edit' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\CoreBundle\\Controller\\MyAccountController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/core/account/edit',    ),  ),  4 =>   array (  ),),
        'atemschutzgeraetetraeger_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/atemschutzgeraetetraeger/index.html',    ),  ),  4 =>   array (  ),),
        'atemschutzgeraetetraeger_report' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::reportAction',  ),  2 =>   array (    '_format' => 'html|pdf',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'html|pdf',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/atemschutzgeraetetraeger/report',    ),  ),  4 =>   array (  ),),
        'atemschutzgeraetetraeger_show' => array (  0 =>   array (    0 => 'id',    1 => '_format',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::showAction',  ),  2 =>   array (    '_format' => 'html|pdf',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'html|pdf',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/nachweis/atemschutzgeraetetraeger/show',    ),  ),  4 =>   array (  ),),
        'atemschutzgeraetetraeger_showMy' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::showMyAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/atemschutzgeraetetraeger/showMy.html',    ),  ),  4 =>   array (  ),),
        'atemschutzgeraetetraeger_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/atemschutzgeraetetraeger/new.html',    ),  ),  4 =>   array (  ),),
        'atemschutzgeraetetraeger_status' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::statusAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/atemschutzgeraetetraeger/status',    ),  ),  4 =>   array (  ),),
        'atemschutzgeraetetraeger_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '.html',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/nachweis/atemschutzgeraetetraeger/edit',    ),  ),  4 =>   array (  ),),
        'atemschutzgeraetetraeger_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '.html',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/nachweis/atemschutzgeraetetraeger/delete',    ),  ),  4 =>   array (  ),),
        'atemschutzgeraetetraeger_tauglichkeit_report' => array (  0 =>   array (    0 => '_format',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\AtemschutzgeraetetraegerController::atemschutzgeraetetraegerTauglichkeitReportAction',  ),  2 =>   array (    '_format' => 'html|pdf',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => 'html|pdf',      3 => '_format',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/atemschutzgeraetetraeger/tauglichkeit/report',    ),  ),  4 =>   array (  ),),
        'einsatzart_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\EinsatzartController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/einsatzart/',    ),  ),  4 =>   array (  ),),
        'einsatzart_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\EinsatzartController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/einsatzart/new',    ),  ),  4 =>   array (  ),),
        'einsatzart_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\EinsatzartController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/einsatzart/edit',    ),  ),  4 =>   array (  ),),
        'einsatzart_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\EinsatzartController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/einsatzart/delete',    ),  ),  4 =>   array (  ),),
        'g26_void' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\G26Controller::voidAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/g26/void',    ),  ),  4 =>   array (  ),),
        'g26_new' => array (  0 =>   array (    0 => 'atemschutzgeraetetraegerId',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\G26Controller::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'atemschutzgeraetetraegerId',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/g26/new',    ),  ),  4 =>   array (  ),),
        'g26_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\G26Controller::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/g26/edit',    ),  ),  4 =>   array (  ),),
        'g26_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\G26Controller::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/g26/delete',    ),  ),  4 =>   array (  ),),
        'nachweis_new' => array (  0 =>   array (    0 => 'atemschutzgeraetetraegerId',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'atemschutzgeraetetraegerId',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/nachweis/new',    ),  ),  4 =>   array (  ),),
        'nachweis_bulk' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::bulkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/nachweis/bulk',    ),  ),  4 =>   array (  ),),
        'nachweis_used_locations' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::usedLocationsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/nachweis/used/locations',    ),  ),  4 =>   array (  ),),
        'nachweis_used_work' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::usedWorkAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/nachweis/used/work',    ),  ),  4 =>   array (  ),),
        'nachweis_show' => array (  0 =>   array (    0 => 'id',    1 => '_format',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::showAction',  ),  2 =>   array (    '_format' => 'html|pdf',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'html|pdf',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'id',    ),    2 =>     array (      0 => 'text',      1 => '/nachweis/nachweis/show',    ),  ),  4 =>   array (  ),),
        'nachweis_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/nachweis/edit',    ),  ),  4 =>   array (  ),),
        'nachweis_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/nachweis/delete',    ),  ),  4 =>   array (  ),),
        'nachweisart_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisartController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/nachweisart/',    ),  ),  4 =>   array (  ),),
        'nachweisart_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisartController::newAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/nachweisart/new',    ),  ),  4 =>   array (  ),),
        'nachweisart_edit' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisartController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/nachweisart/edit',    ),  ),  4 =>   array (  ),),
        'nachweisart_delete' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\NachweisartController::deleteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/nachweis/nachweisart/delete',    ),  ),  4 =>   array (  ),),
        'report_select_year' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\ReportController::selectYearAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/report/selectYear',    ),  ),  4 =>   array (  ),),
        'report_year' => array (  0 =>   array (    0 => 'year',    1 => '_format',  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\ReportController::yearAction',  ),  2 =>   array (    '_format' => 'html|pdf',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => 'html|pdf',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/\\.]++',      3 => 'year',    ),    2 =>     array (      0 => 'text',      1 => '/nachweis/report/year',    ),  ),  4 =>   array (  ),),
        'report_search_nachweis' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Atemschutz\\NachweisBundle\\Controller\\ReportController::searchNachweisAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/nachweis/report/searchNachweis',    ),  ),  4 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens);
    }
}
