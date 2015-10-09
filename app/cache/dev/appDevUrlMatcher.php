<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
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
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/ma')) {
                if (0 === strpos($pathinfo, '/admin/material')) {
                    // Invision_InventarioBundle_Material_list
                    if (rtrim($pathinfo, '/') === '/admin/material') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'Invision_InventarioBundle_Material_list');
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\ListController::indexAction',  '_route' => 'Invision_InventarioBundle_Material_list',);
                    }

                    // Invision_InventarioBundle_Material_excel
                    if ($pathinfo === '/admin/material/excel') {
                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\ExcelController::excelAction',  '_route' => 'Invision_InventarioBundle_Material_excel',);
                    }

                    // Invision_InventarioBundle_Material_edit
                    if (preg_match('#^/admin/material/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Material_edit')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\EditController::indexAction',));
                    }

                    // Invision_InventarioBundle_Material_update
                    if (preg_match('#^/admin/material/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_Invision_InventarioBundle_Material_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Material_update')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\EditController::updateAction',));
                    }
                    not_Invision_InventarioBundle_Material_update:

                    // Invision_InventarioBundle_Material_show
                    if (preg_match('#^/admin/material/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Material_show')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\ShowController::indexAction',));
                    }

                    // Invision_InventarioBundle_Material_object
                    if (preg_match('#^/admin/material/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Material_object')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\ActionsController::objectAction',));
                    }

                    // Invision_InventarioBundle_Material_batch
                    if ($pathinfo === '/admin/material/batch') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_Invision_InventarioBundle_Material_batch;
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\ActionsController::batchAction',  '_route' => 'Invision_InventarioBundle_Material_batch',);
                    }
                    not_Invision_InventarioBundle_Material_batch:

                    // Invision_InventarioBundle_Material_new
                    if ($pathinfo === '/admin/material/new') {
                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\NewController::indexAction',  '_route' => 'Invision_InventarioBundle_Material_new',);
                    }

                    // Invision_InventarioBundle_Material_create
                    if ($pathinfo === '/admin/material/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_Invision_InventarioBundle_Material_create;
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\NewController::createAction',  '_route' => 'Invision_InventarioBundle_Material_create',);
                    }
                    not_Invision_InventarioBundle_Material_create:

                    // Invision_InventarioBundle_Material_filters
                    if ($pathinfo === '/admin/material/filter') {
                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\ListController::filtersAction',  '_route' => 'Invision_InventarioBundle_Material_filters',);
                    }

                    // Invision_InventarioBundle_Material_scopes
                    if (0 === strpos($pathinfo, '/admin/material/scope') && preg_match('#^/admin/material/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Material_scopes')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Material\\ListController::scopesAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/maleta')) {
                    // Invision_InventarioBundle_Maleta_list
                    if (rtrim($pathinfo, '/') === '/admin/maleta') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'Invision_InventarioBundle_Maleta_list');
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\ListController::indexAction',  '_route' => 'Invision_InventarioBundle_Maleta_list',);
                    }

                    // Invision_InventarioBundle_Maleta_excel
                    if ($pathinfo === '/admin/maleta/excel') {
                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\ExcelController::excelAction',  '_route' => 'Invision_InventarioBundle_Maleta_excel',);
                    }

                    // Invision_InventarioBundle_Maleta_edit
                    if (preg_match('#^/admin/maleta/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Maleta_edit')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\EditController::indexAction',));
                    }

                    // Invision_InventarioBundle_Maleta_update
                    if (preg_match('#^/admin/maleta/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_Invision_InventarioBundle_Maleta_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Maleta_update')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\EditController::updateAction',));
                    }
                    not_Invision_InventarioBundle_Maleta_update:

                    // Invision_InventarioBundle_Maleta_show
                    if (preg_match('#^/admin/maleta/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Maleta_show')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\ShowController::indexAction',));
                    }

                    // Invision_InventarioBundle_Maleta_object
                    if (preg_match('#^/admin/maleta/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Maleta_object')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\ActionsController::objectAction',));
                    }

                    // Invision_InventarioBundle_Maleta_batch
                    if ($pathinfo === '/admin/maleta/batch') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_Invision_InventarioBundle_Maleta_batch;
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\ActionsController::batchAction',  '_route' => 'Invision_InventarioBundle_Maleta_batch',);
                    }
                    not_Invision_InventarioBundle_Maleta_batch:

                    // Invision_InventarioBundle_Maleta_new
                    if ($pathinfo === '/admin/maleta/new') {
                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\NewController::indexAction',  '_route' => 'Invision_InventarioBundle_Maleta_new',);
                    }

                    // Invision_InventarioBundle_Maleta_create
                    if ($pathinfo === '/admin/maleta/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_Invision_InventarioBundle_Maleta_create;
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\NewController::createAction',  '_route' => 'Invision_InventarioBundle_Maleta_create',);
                    }
                    not_Invision_InventarioBundle_Maleta_create:

                    // Invision_InventarioBundle_Maleta_filters
                    if ($pathinfo === '/admin/maleta/filter') {
                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\ListController::filtersAction',  '_route' => 'Invision_InventarioBundle_Maleta_filters',);
                    }

                    // Invision_InventarioBundle_Maleta_scopes
                    if (0 === strpos($pathinfo, '/admin/maleta/scope') && preg_match('#^/admin/maleta/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Maleta_scopes')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Maleta\\ListController::scopesAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/sede')) {
                // Invision_SoporteBundle_Sede_list
                if (rtrim($pathinfo, '/') === '/admin/sede') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'Invision_SoporteBundle_Sede_list');
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\ListController::indexAction',  '_route' => 'Invision_SoporteBundle_Sede_list',);
                }

                // Invision_SoporteBundle_Sede_excel
                if ($pathinfo === '/admin/sede/excel') {
                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\ExcelController::excelAction',  '_route' => 'Invision_SoporteBundle_Sede_excel',);
                }

                // Invision_SoporteBundle_Sede_edit
                if (preg_match('#^/admin/sede/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Sede_edit')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\EditController::indexAction',));
                }

                // Invision_SoporteBundle_Sede_update
                if (preg_match('#^/admin/sede/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_SoporteBundle_Sede_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Sede_update')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\EditController::updateAction',));
                }
                not_Invision_SoporteBundle_Sede_update:

                // Invision_SoporteBundle_Sede_show
                if (preg_match('#^/admin/sede/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Sede_show')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\ShowController::indexAction',));
                }

                // Invision_SoporteBundle_Sede_object
                if (preg_match('#^/admin/sede/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Sede_object')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\ActionsController::objectAction',));
                }

                // Invision_SoporteBundle_Sede_batch
                if ($pathinfo === '/admin/sede/batch') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_SoporteBundle_Sede_batch;
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\ActionsController::batchAction',  '_route' => 'Invision_SoporteBundle_Sede_batch',);
                }
                not_Invision_SoporteBundle_Sede_batch:

                // Invision_SoporteBundle_Sede_new
                if ($pathinfo === '/admin/sede/new') {
                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\NewController::indexAction',  '_route' => 'Invision_SoporteBundle_Sede_new',);
                }

                // Invision_SoporteBundle_Sede_create
                if ($pathinfo === '/admin/sede/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_SoporteBundle_Sede_create;
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\NewController::createAction',  '_route' => 'Invision_SoporteBundle_Sede_create',);
                }
                not_Invision_SoporteBundle_Sede_create:

                // Invision_SoporteBundle_Sede_filters
                if ($pathinfo === '/admin/sede/filter') {
                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\ListController::filtersAction',  '_route' => 'Invision_SoporteBundle_Sede_filters',);
                }

                // Invision_SoporteBundle_Sede_scopes
                if (0 === strpos($pathinfo, '/admin/sede/scope') && preg_match('#^/admin/sede/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Sede_scopes')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Sede\\ListController::scopesAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/tipo/sede')) {
                // Invision_SoporteBundle_TipoSede_list
                if (rtrim($pathinfo, '/') === '/admin/tipo/sede') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'Invision_SoporteBundle_TipoSede_list');
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\ListController::indexAction',  '_route' => 'Invision_SoporteBundle_TipoSede_list',);
                }

                // Invision_SoporteBundle_TipoSede_excel
                if ($pathinfo === '/admin/tipo/sede/excel') {
                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\ExcelController::excelAction',  '_route' => 'Invision_SoporteBundle_TipoSede_excel',);
                }

                // Invision_SoporteBundle_TipoSede_edit
                if (preg_match('#^/admin/tipo/sede/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_TipoSede_edit')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\EditController::indexAction',));
                }

                // Invision_SoporteBundle_TipoSede_update
                if (preg_match('#^/admin/tipo/sede/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_SoporteBundle_TipoSede_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_TipoSede_update')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\EditController::updateAction',));
                }
                not_Invision_SoporteBundle_TipoSede_update:

                // Invision_SoporteBundle_TipoSede_show
                if (preg_match('#^/admin/tipo/sede/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_TipoSede_show')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\ShowController::indexAction',));
                }

                // Invision_SoporteBundle_TipoSede_object
                if (preg_match('#^/admin/tipo/sede/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_TipoSede_object')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\ActionsController::objectAction',));
                }

                // Invision_SoporteBundle_TipoSede_batch
                if ($pathinfo === '/admin/tipo/sede/batch') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_SoporteBundle_TipoSede_batch;
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\ActionsController::batchAction',  '_route' => 'Invision_SoporteBundle_TipoSede_batch',);
                }
                not_Invision_SoporteBundle_TipoSede_batch:

                // Invision_SoporteBundle_TipoSede_new
                if ($pathinfo === '/admin/tipo/sede/new') {
                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\NewController::indexAction',  '_route' => 'Invision_SoporteBundle_TipoSede_new',);
                }

                // Invision_SoporteBundle_TipoSede_create
                if ($pathinfo === '/admin/tipo/sede/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_SoporteBundle_TipoSede_create;
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\NewController::createAction',  '_route' => 'Invision_SoporteBundle_TipoSede_create',);
                }
                not_Invision_SoporteBundle_TipoSede_create:

                // Invision_SoporteBundle_TipoSede_filters
                if ($pathinfo === '/admin/tipo/sede/filter') {
                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\ListController::filtersAction',  '_route' => 'Invision_SoporteBundle_TipoSede_filters',);
                }

                // Invision_SoporteBundle_TipoSede_scopes
                if (0 === strpos($pathinfo, '/admin/tipo/sede/scope') && preg_match('#^/admin/tipo/sede/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_TipoSede_scopes')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSede\\ListController::scopesAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/inventario')) {
                // Invision_InventarioBundle_Inventario_list
                if (rtrim($pathinfo, '/') === '/admin/inventario') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'Invision_InventarioBundle_Inventario_list');
                    }

                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\ListController::indexAction',  '_route' => 'Invision_InventarioBundle_Inventario_list',);
                }

                // Invision_InventarioBundle_Inventario_excel
                if ($pathinfo === '/admin/inventario/excel') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\ExcelController::excelAction',  '_route' => 'Invision_InventarioBundle_Inventario_excel',);
                }

                // Invision_InventarioBundle_Inventario_edit
                if (preg_match('#^/admin/inventario/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Inventario_edit')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\EditController::indexAction',));
                }

                // Invision_InventarioBundle_Inventario_update
                if (preg_match('#^/admin/inventario/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_InventarioBundle_Inventario_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Inventario_update')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\EditController::updateAction',));
                }
                not_Invision_InventarioBundle_Inventario_update:

                // Invision_InventarioBundle_Inventario_show
                if (preg_match('#^/admin/inventario/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Inventario_show')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\ShowController::indexAction',));
                }

                // Invision_InventarioBundle_Inventario_object
                if (preg_match('#^/admin/inventario/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Inventario_object')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\ActionsController::objectAction',));
                }

                // Invision_InventarioBundle_Inventario_batch
                if ($pathinfo === '/admin/inventario/batch') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_InventarioBundle_Inventario_batch;
                    }

                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\ActionsController::batchAction',  '_route' => 'Invision_InventarioBundle_Inventario_batch',);
                }
                not_Invision_InventarioBundle_Inventario_batch:

                // Invision_InventarioBundle_Inventario_new
                if ($pathinfo === '/admin/inventario/new') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\NewController::indexAction',  '_route' => 'Invision_InventarioBundle_Inventario_new',);
                }

                // Invision_InventarioBundle_Inventario_create
                if ($pathinfo === '/admin/inventario/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_InventarioBundle_Inventario_create;
                    }

                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\NewController::createAction',  '_route' => 'Invision_InventarioBundle_Inventario_create',);
                }
                not_Invision_InventarioBundle_Inventario_create:

                // Invision_InventarioBundle_Inventario_filters
                if ($pathinfo === '/admin/inventario/filter') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\ListController::filtersAction',  '_route' => 'Invision_InventarioBundle_Inventario_filters',);
                }

                // Invision_InventarioBundle_Inventario_scopes
                if (0 === strpos($pathinfo, '/admin/inventario/scope') && preg_match('#^/admin/inventario/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Inventario_scopes')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Inventario\\ListController::scopesAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/procesos/extra')) {
                // Invision_InventarioBundle_ProcesoExtra_list
                if (rtrim($pathinfo, '/') === '/admin/procesos/extra') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'Invision_InventarioBundle_ProcesoExtra_list');
                    }

                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\ListController::indexAction',  '_route' => 'Invision_InventarioBundle_ProcesoExtra_list',);
                }

                // Invision_InventarioBundle_ProcesoExtra_excel
                if ($pathinfo === '/admin/procesos/extra/excel') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\ExcelController::excelAction',  '_route' => 'Invision_InventarioBundle_ProcesoExtra_excel',);
                }

                // Invision_InventarioBundle_ProcesoExtra_edit
                if (preg_match('#^/admin/procesos/extra/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_ProcesoExtra_edit')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\EditController::indexAction',));
                }

                // Invision_InventarioBundle_ProcesoExtra_update
                if (preg_match('#^/admin/procesos/extra/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_InventarioBundle_ProcesoExtra_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_ProcesoExtra_update')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\EditController::updateAction',));
                }
                not_Invision_InventarioBundle_ProcesoExtra_update:

                // Invision_InventarioBundle_ProcesoExtra_show
                if (preg_match('#^/admin/procesos/extra/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_ProcesoExtra_show')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\ShowController::indexAction',));
                }

                // Invision_InventarioBundle_ProcesoExtra_object
                if (preg_match('#^/admin/procesos/extra/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_ProcesoExtra_object')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\ActionsController::objectAction',));
                }

                // Invision_InventarioBundle_ProcesoExtra_batch
                if ($pathinfo === '/admin/procesos/extra/batch') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_InventarioBundle_ProcesoExtra_batch;
                    }

                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\ActionsController::batchAction',  '_route' => 'Invision_InventarioBundle_ProcesoExtra_batch',);
                }
                not_Invision_InventarioBundle_ProcesoExtra_batch:

                // Invision_InventarioBundle_ProcesoExtra_new
                if ($pathinfo === '/admin/procesos/extra/new') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\NewController::indexAction',  '_route' => 'Invision_InventarioBundle_ProcesoExtra_new',);
                }

                // Invision_InventarioBundle_ProcesoExtra_create
                if ($pathinfo === '/admin/procesos/extra/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_InventarioBundle_ProcesoExtra_create;
                    }

                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\NewController::createAction',  '_route' => 'Invision_InventarioBundle_ProcesoExtra_create',);
                }
                not_Invision_InventarioBundle_ProcesoExtra_create:

                // Invision_InventarioBundle_ProcesoExtra_filters
                if ($pathinfo === '/admin/procesos/extra/filter') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\ListController::filtersAction',  '_route' => 'Invision_InventarioBundle_ProcesoExtra_filters',);
                }

                // Invision_InventarioBundle_ProcesoExtra_scopes
                if (0 === strpos($pathinfo, '/admin/procesos/extra/scope') && preg_match('#^/admin/procesos/extra/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_ProcesoExtra_scopes')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtra\\ListController::scopesAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/colores')) {
                // Invision_InventarioBundle_Color_list
                if (rtrim($pathinfo, '/') === '/admin/colores') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'Invision_InventarioBundle_Color_list');
                    }

                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\ListController::indexAction',  '_route' => 'Invision_InventarioBundle_Color_list',);
                }

                // Invision_InventarioBundle_Color_excel
                if ($pathinfo === '/admin/colores/excel') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\ExcelController::excelAction',  '_route' => 'Invision_InventarioBundle_Color_excel',);
                }

                // Invision_InventarioBundle_Color_edit
                if (preg_match('#^/admin/colores/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Color_edit')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\EditController::indexAction',));
                }

                // Invision_InventarioBundle_Color_update
                if (preg_match('#^/admin/colores/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_InventarioBundle_Color_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Color_update')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\EditController::updateAction',));
                }
                not_Invision_InventarioBundle_Color_update:

                // Invision_InventarioBundle_Color_show
                if (preg_match('#^/admin/colores/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Color_show')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\ShowController::indexAction',));
                }

                // Invision_InventarioBundle_Color_object
                if (preg_match('#^/admin/colores/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Color_object')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\ActionsController::objectAction',));
                }

                // Invision_InventarioBundle_Color_batch
                if ($pathinfo === '/admin/colores/batch') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_InventarioBundle_Color_batch;
                    }

                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\ActionsController::batchAction',  '_route' => 'Invision_InventarioBundle_Color_batch',);
                }
                not_Invision_InventarioBundle_Color_batch:

                // Invision_InventarioBundle_Color_new
                if ($pathinfo === '/admin/colores/new') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\NewController::indexAction',  '_route' => 'Invision_InventarioBundle_Color_new',);
                }

                // Invision_InventarioBundle_Color_create
                if ($pathinfo === '/admin/colores/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_InventarioBundle_Color_create;
                    }

                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\NewController::createAction',  '_route' => 'Invision_InventarioBundle_Color_create',);
                }
                not_Invision_InventarioBundle_Color_create:

                // Invision_InventarioBundle_Color_filters
                if ($pathinfo === '/admin/colores/filter') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\ListController::filtersAction',  '_route' => 'Invision_InventarioBundle_Color_filters',);
                }

                // Invision_InventarioBundle_Color_scopes
                if (0 === strpos($pathinfo, '/admin/colores/scope') && preg_match('#^/admin/colores/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_InventarioBundle_Color_scopes')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\Color\\ListController::scopesAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/inventario')) {
                // nuevo_inventario
                if ($pathinfo === '/admin/inventario/nuevo') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\InventarioController::nuevoAction',  '_route' => 'nuevo_inventario',);
                }

                if (0 === strpos($pathinfo, '/admin/inventario/e')) {
                    // editar_inventario
                    if ($pathinfo === '/admin/inventario/editar') {
                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\InventarioController::editarAction',  '_route' => 'editar_inventario',);
                    }

                    // eliminar_inventario
                    if (rtrim($pathinfo, '/') === '/admin/inventario/eliminar') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'eliminar_inventario');
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\InventarioController::eliminarAction',  '_route' => 'eliminar_inventario',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/inventario')) {
            // busqueda_inventario
            if (rtrim($pathinfo, '/') === '/inventario/busqueda') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'busqueda_inventario');
                }

                return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\InventarioController::busquedaAction',  '_route' => 'busqueda_inventario',);
            }

            // info_inventario
            if (0 === strpos($pathinfo, '/inventario/info') && preg_match('#^/inventario/info/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'info_inventario');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'info_inventario')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\InventarioController::infoAction',));
            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/color')) {
                // nuevo_color
                if ($pathinfo === '/admin/color/nuevo') {
                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ColorController::nuevoAction',  '_route' => 'nuevo_color',);
                }

                if (0 === strpos($pathinfo, '/admin/color/e')) {
                    // editar_color
                    if ($pathinfo === '/admin/color/editar') {
                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ColorController::editarAction',  '_route' => 'editar_color',);
                    }

                    // eliminar_color
                    if ($pathinfo === '/admin/color/eliminar') {
                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ColorController::eliminarAction',  '_route' => 'eliminar_color',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/maleta')) {
                // nueva_maleta
                if (rtrim($pathinfo, '/') === '/admin/maleta/nueva') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'nueva_maleta');
                    }

                    return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\MaletaController::nuevaAction',  '_route' => 'nueva_maleta',);
                }

                if (0 === strpos($pathinfo, '/admin/maleta/e')) {
                    // editar_maleta
                    if (0 === strpos($pathinfo, '/admin/maleta/editar') && preg_match('#^/admin/maleta/editar/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'editar_maleta');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'editar_maleta')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\MaletaController::editarAction',));
                    }

                    // eliminar_maleta
                    if (rtrim($pathinfo, '/') === '/admin/maleta/eliminar') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'eliminar_maleta');
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\MaletaController::eliminarAction',  '_route' => 'eliminar_maleta',);
                    }

                }

                // cargar_maleta
                if (0 === strpos($pathinfo, '/admin/maleta/cargar') && preg_match('#^/admin/maleta/cargar/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'cargar_maleta');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cargar_maleta')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\MaletaController::cargarAction',));
                }

            }

            // colores_codigo_ajax
            if (rtrim($pathinfo, '/') === '/admin/color/codigo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'colores_codigo_ajax');
                }

                return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\MaletaController::coloresCodigoAction',  '_route' => 'colores_codigo_ajax',);
            }

            if (0 === strpos($pathinfo, '/admin/ma')) {
                if (0 === strpos($pathinfo, '/admin/maleta')) {
                    // descargar_maleta
                    if (0 === strpos($pathinfo, '/admin/maleta/descargar') && preg_match('#^/admin/maleta/descargar/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'descargar_maleta');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'descargar_maleta')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\MaletaController::descargarAction',));
                    }

                    // editar_carga_maleta_ajax
                    if (rtrim($pathinfo, '/') === '/admin/maleta/editar/carga/ajax') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'editar_carga_maleta_ajax');
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\MaletaController::editarCargaAction',  '_route' => 'editar_carga_maleta_ajax',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/material')) {
                    // nuevo_material
                    if (rtrim($pathinfo, '/') === '/admin/material/nuevo') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'nuevo_material');
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\MaterialController::nuevoAction',  '_route' => 'nuevo_material',);
                    }

                    if (0 === strpos($pathinfo, '/admin/material/e')) {
                        // editar_material
                        if (0 === strpos($pathinfo, '/admin/material/editar') && preg_match('#^/admin/material/editar/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'editar_material');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'editar_material')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\MaterialController::editarAction',));
                        }

                        // eliminar_material
                        if (rtrim($pathinfo, '/') === '/admin/material/eliminar') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'eliminar_material');
                            }

                            return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\MaterialController::eliminarAction',  '_route' => 'eliminar_material',);
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/p')) {
                if (0 === strpos($pathinfo, '/admin/proceso/extra')) {
                    // nuevo_proceso_extra
                    if (rtrim($pathinfo, '/') === '/admin/proceso/extra/nuevo') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'nuevo_proceso_extra');
                        }

                        return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtraController::nuevoAction',  '_route' => 'nuevo_proceso_extra',);
                    }

                    if (0 === strpos($pathinfo, '/admin/proceso/extra/e')) {
                        // editar_proceso_extra
                        if (0 === strpos($pathinfo, '/admin/proceso/extra/editar') && preg_match('#^/admin/proceso/extra/editar/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'editar_proceso_extra');
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'editar_proceso_extra')), array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtraController::editarAction',));
                        }

                        // eliminar_proceso_extra
                        if (rtrim($pathinfo, '/') === '/admin/proceso/extra/eliminar') {
                            if (substr($pathinfo, -1) !== '/') {
                                return $this->redirect($pathinfo.'/', 'eliminar_proceso_extra');
                            }

                            return array (  '_controller' => 'Invision\\InventarioBundle\\Controller\\ProcesoExtraController::eliminarAction',  '_route' => 'eliminar_proceso_extra',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/perfil')) {
                    // Invision_SoporteBundle_Perfil_list
                    if (rtrim($pathinfo, '/') === '/admin/perfil') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'Invision_SoporteBundle_Perfil_list');
                        }

                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ListController::indexAction',  '_route' => 'Invision_SoporteBundle_Perfil_list',);
                    }

                    // Invision_SoporteBundle_Perfil_excel
                    if ($pathinfo === '/admin/perfil/excel') {
                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ExcelController::excelAction',  '_route' => 'Invision_SoporteBundle_Perfil_excel',);
                    }

                    // Invision_SoporteBundle_Perfil_edit
                    if (preg_match('#^/admin/perfil/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Perfil_edit')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\EditController::indexAction',));
                    }

                    // Invision_SoporteBundle_Perfil_update
                    if (preg_match('#^/admin/perfil/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_Invision_SoporteBundle_Perfil_update;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Perfil_update')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\EditController::updateAction',));
                    }
                    not_Invision_SoporteBundle_Perfil_update:

                    // Invision_SoporteBundle_Perfil_show
                    if (preg_match('#^/admin/perfil/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Perfil_show')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ShowController::indexAction',));
                    }

                    // Invision_SoporteBundle_Perfil_object
                    if (preg_match('#^/admin/perfil/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Perfil_object')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ActionsController::objectAction',));
                    }

                    // Invision_SoporteBundle_Perfil_batch
                    if ($pathinfo === '/admin/perfil/batch') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_Invision_SoporteBundle_Perfil_batch;
                        }

                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ActionsController::batchAction',  '_route' => 'Invision_SoporteBundle_Perfil_batch',);
                    }
                    not_Invision_SoporteBundle_Perfil_batch:

                    // Invision_SoporteBundle_Perfil_new
                    if ($pathinfo === '/admin/perfil/new') {
                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\NewController::indexAction',  '_route' => 'Invision_SoporteBundle_Perfil_new',);
                    }

                    // Invision_SoporteBundle_Perfil_create
                    if ($pathinfo === '/admin/perfil/create') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_Invision_SoporteBundle_Perfil_create;
                        }

                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\NewController::createAction',  '_route' => 'Invision_SoporteBundle_Perfil_create',);
                    }
                    not_Invision_SoporteBundle_Perfil_create:

                    // Invision_SoporteBundle_Perfil_filters
                    if ($pathinfo === '/admin/perfil/filter') {
                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ListController::filtersAction',  '_route' => 'Invision_SoporteBundle_Perfil_filters',);
                    }

                    // Invision_SoporteBundle_Perfil_scopes
                    if (0 === strpos($pathinfo, '/admin/perfil/scope') && preg_match('#^/admin/perfil/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Perfil_scopes')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ListController::scopesAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/usuario')) {
                // Invision_SoporteBundle_Usuario_list
                if (rtrim($pathinfo, '/') === '/admin/usuario') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'Invision_SoporteBundle_Usuario_list');
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ListController::indexAction',  '_route' => 'Invision_SoporteBundle_Usuario_list',);
                }

                // Invision_SoporteBundle_Usuario_excel
                if ($pathinfo === '/admin/usuario/excel') {
                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ExcelController::excelAction',  '_route' => 'Invision_SoporteBundle_Usuario_excel',);
                }

                // Invision_SoporteBundle_Usuario_edit
                if (preg_match('#^/admin/usuario/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Usuario_edit')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\EditController::indexAction',));
                }

                // Invision_SoporteBundle_Usuario_update
                if (preg_match('#^/admin/usuario/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_SoporteBundle_Usuario_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Usuario_update')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\EditController::updateAction',));
                }
                not_Invision_SoporteBundle_Usuario_update:

                // Invision_SoporteBundle_Usuario_show
                if (preg_match('#^/admin/usuario/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Usuario_show')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ShowController::indexAction',));
                }

                // Invision_SoporteBundle_Usuario_object
                if (preg_match('#^/admin/usuario/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Usuario_object')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ActionsController::objectAction',));
                }

                // Invision_SoporteBundle_Usuario_batch
                if ($pathinfo === '/admin/usuario/batch') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_SoporteBundle_Usuario_batch;
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ActionsController::batchAction',  '_route' => 'Invision_SoporteBundle_Usuario_batch',);
                }
                not_Invision_SoporteBundle_Usuario_batch:

                // Invision_SoporteBundle_Usuario_new
                if ($pathinfo === '/admin/usuario/new') {
                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\NewController::indexAction',  '_route' => 'Invision_SoporteBundle_Usuario_new',);
                }

                // Invision_SoporteBundle_Usuario_create
                if ($pathinfo === '/admin/usuario/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_SoporteBundle_Usuario_create;
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\NewController::createAction',  '_route' => 'Invision_SoporteBundle_Usuario_create',);
                }
                not_Invision_SoporteBundle_Usuario_create:

                // Invision_SoporteBundle_Usuario_filters
                if ($pathinfo === '/admin/usuario/filter') {
                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ListController::filtersAction',  '_route' => 'Invision_SoporteBundle_Usuario_filters',);
                }

                // Invision_SoporteBundle_Usuario_scopes
                if (0 === strpos($pathinfo, '/admin/usuario/scope') && preg_match('#^/admin/usuario/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_SoporteBundle_Usuario_scopes')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ListController::scopesAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/usuario')) {
            if (0 === strpos($pathinfo, '/usuario/log')) {
                // usuario_logout
                if (rtrim($pathinfo, '/') === '/usuario/logout') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'usuario_logout');
                    }

                    return array('_route' => 'usuario_logout');
                }

                // usuario_login
                if (rtrim($pathinfo, '/') === '/usuario/login') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'usuario_login');
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\LoginController::loginAction',  '_route' => 'usuario_login',);
                }

            }

            // usuario_pre_logout
            if (rtrim($pathinfo, '/') === '/usuario/pre/logout') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'usuario_pre_logout');
                }

                return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\LoginController::preLogoutAction',  '_route' => 'usuario_pre_logout',);
            }

        }

        // pagina_inicio
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'pagina_inicio');
            }

            return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\DefaultController::portadaAction',  '_route' => 'pagina_inicio',);
        }

        // cambio_clave
        if (0 === strpos($pathinfo, '/cambio_clave') && preg_match('#^/cambio_clave/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'cambio_clave');
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'cambio_clave')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::cambioClaveAction',));
        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/usuario')) {
                // nuevo_usuario
                if (rtrim($pathinfo, '/') === '/admin/usuario/nuevo') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'nuevo_usuario');
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::nuevoAction',  '_route' => 'nuevo_usuario',);
                }

                if (0 === strpos($pathinfo, '/admin/usuario/e')) {
                    // editar_usuario
                    if (0 === strpos($pathinfo, '/admin/usuario/editar') && preg_match('#^/admin/usuario/editar/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'editar_usuario');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'editar_usuario')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::editarAction',));
                    }

                    // eliminar_usuario
                    if (rtrim($pathinfo, '/') === '/admin/usuario/eliminar') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'eliminar_usuario');
                        }

                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::eliminarAction',  '_route' => 'eliminar_usuario',);
                    }

                }

                // horario_usuario
                if (0 === strpos($pathinfo, '/admin/usuario/horario') && preg_match('#^/admin/usuario/horario/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'horario_usuario');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'horario_usuario')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::horarioAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/perfil')) {
                // nuevo_perfil
                if (rtrim($pathinfo, '/') === '/admin/perfil/nuevo') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'nuevo_perfil');
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\PerfilController::nuevoAction',  '_route' => 'nuevo_perfil',);
                }

                if (0 === strpos($pathinfo, '/admin/perfil/e')) {
                    // editar_perfil
                    if (0 === strpos($pathinfo, '/admin/perfil/editar') && preg_match('#^/admin/perfil/editar/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'editar_perfil');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'editar_perfil')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\PerfilController::editarAction',));
                    }

                    // eliminar_perfil
                    if (rtrim($pathinfo, '/') === '/admin/perfil/eliminar') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'eliminar_perfil');
                        }

                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\PerfilController::eliminarAction',  '_route' => 'eliminar_perfil',);
                    }

                }

                // menu_perfil
                if (0 === strpos($pathinfo, '/admin/perfil/menu') && preg_match('#^/admin/perfil/menu/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'menu_perfil');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'menu_perfil')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\PerfilController::menusAction',));
                }

            }

            // bitacora
            if (rtrim($pathinfo, '/') === '/admin/bitacora') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'bitacora');
                }

                return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\BitacoraController::bitacoraAction',  '_route' => 'bitacora',);
            }

            if (0 === strpos($pathinfo, '/admin/tipo/sede')) {
                // nuevo_tipo_sede
                if (rtrim($pathinfo, '/') === '/admin/tipo/sede/nuevo') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'nuevo_tipo_sede');
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSedeController::nuevoAction',  '_route' => 'nuevo_tipo_sede',);
                }

                if (0 === strpos($pathinfo, '/admin/tipo/sede/e')) {
                    // editar_tipo_sede
                    if (0 === strpos($pathinfo, '/admin/tipo/sede/editar') && preg_match('#^/admin/tipo/sede/editar/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'editar_tipo_sede');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'editar_tipo_sede')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSedeController::editarAction',));
                    }

                    // eliminar_tipo_sede
                    if (rtrim($pathinfo, '/') === '/admin/tipo/sede/eliminar') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'eliminar_tipo_sede');
                        }

                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\TipoSedeController::eliminarAction',  '_route' => 'eliminar_tipo_sede',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/sede')) {
                // nueva_sede
                if (rtrim($pathinfo, '/') === '/admin/sede/nueva') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'nueva_sede');
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\SedeController::nuevaAction',  '_route' => 'nueva_sede',);
                }

                if (0 === strpos($pathinfo, '/admin/sede/e')) {
                    // editar_sede
                    if (0 === strpos($pathinfo, '/admin/sede/editar') && preg_match('#^/admin/sede/editar/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'editar_sede');
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'editar_sede')), array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\SedeController::editarAction',));
                    }

                    // eliminar_sede
                    if (rtrim($pathinfo, '/') === '/admin/sede/eliminar') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'eliminar_sede');
                        }

                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\SedeController::eliminarAction',  '_route' => 'eliminar_sede',);
                    }

                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
