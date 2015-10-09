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
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/color')) {
                // Invision_VentaBundle_Color_list
                if (rtrim($pathinfo, '/') === '/admin/color') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'Invision_VentaBundle_Color_list');
                    }

                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ListController::indexAction',  '_route' => 'Invision_VentaBundle_Color_list',);
                }

                // Invision_VentaBundle_Color_excel
                if ($pathinfo === '/admin/color/excel') {
                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ExcelController::excelAction',  '_route' => 'Invision_VentaBundle_Color_excel',);
                }

                // Invision_VentaBundle_Color_edit
                if (preg_match('#^/admin/color/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_VentaBundle_Color_edit')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\EditController::indexAction',));
                }

                // Invision_VentaBundle_Color_update
                if (preg_match('#^/admin/color/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_VentaBundle_Color_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_VentaBundle_Color_update')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\EditController::updateAction',));
                }
                not_Invision_VentaBundle_Color_update:

                // Invision_VentaBundle_Color_show
                if (preg_match('#^/admin/color/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_VentaBundle_Color_show')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ShowController::indexAction',));
                }

                // Invision_VentaBundle_Color_object
                if (preg_match('#^/admin/color/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_VentaBundle_Color_object')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ActionsController::objectAction',));
                }

                // Invision_VentaBundle_Color_batch
                if ($pathinfo === '/admin/color/batch') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_VentaBundle_Color_batch;
                    }

                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ActionsController::batchAction',  '_route' => 'Invision_VentaBundle_Color_batch',);
                }
                not_Invision_VentaBundle_Color_batch:

                // Invision_VentaBundle_Color_new
                if ($pathinfo === '/admin/color/new') {
                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\NewController::indexAction',  '_route' => 'Invision_VentaBundle_Color_new',);
                }

                // Invision_VentaBundle_Color_create
                if ($pathinfo === '/admin/color/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_VentaBundle_Color_create;
                    }

                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\NewController::createAction',  '_route' => 'Invision_VentaBundle_Color_create',);
                }
                not_Invision_VentaBundle_Color_create:

                // Invision_VentaBundle_Color_filters
                if ($pathinfo === '/admin/color/filter') {
                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ListController::filtersAction',  '_route' => 'Invision_VentaBundle_Color_filters',);
                }

                // Invision_VentaBundle_Color_scopes
                if (0 === strpos($pathinfo, '/admin/color/scope') && preg_match('#^/admin/color/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_VentaBundle_Color_scopes')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ListController::scopesAction',));
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

            if (0 === strpos($pathinfo, '/admin/inventario')) {
                // Invision_VentaBundle_Inventario_list
                if (rtrim($pathinfo, '/') === '/admin/inventario') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'Invision_VentaBundle_Inventario_list');
                    }

                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ListController::indexAction',  '_route' => 'Invision_VentaBundle_Inventario_list',);
                }

                // Invision_VentaBundle_Inventario_excel
                if ($pathinfo === '/admin/inventario/excel') {
                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ExcelController::excelAction',  '_route' => 'Invision_VentaBundle_Inventario_excel',);
                }

                // Invision_VentaBundle_Inventario_edit
                if (preg_match('#^/admin/inventario/(?P<pk>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_VentaBundle_Inventario_edit')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\EditController::indexAction',));
                }

                // Invision_VentaBundle_Inventario_update
                if (preg_match('#^/admin/inventario/(?P<pk>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_VentaBundle_Inventario_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_VentaBundle_Inventario_update')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\EditController::updateAction',));
                }
                not_Invision_VentaBundle_Inventario_update:

                // Invision_VentaBundle_Inventario_show
                if (preg_match('#^/admin/inventario/(?P<pk>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_VentaBundle_Inventario_show')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ShowController::indexAction',));
                }

                // Invision_VentaBundle_Inventario_object
                if (preg_match('#^/admin/inventario/(?P<pk>[^/]++)/(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_VentaBundle_Inventario_object')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ActionsController::objectAction',));
                }

                // Invision_VentaBundle_Inventario_batch
                if ($pathinfo === '/admin/inventario/batch') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_VentaBundle_Inventario_batch;
                    }

                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ActionsController::batchAction',  '_route' => 'Invision_VentaBundle_Inventario_batch',);
                }
                not_Invision_VentaBundle_Inventario_batch:

                // Invision_VentaBundle_Inventario_new
                if ($pathinfo === '/admin/inventario/new') {
                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\NewController::indexAction',  '_route' => 'Invision_VentaBundle_Inventario_new',);
                }

                // Invision_VentaBundle_Inventario_create
                if ($pathinfo === '/admin/inventario/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_Invision_VentaBundle_Inventario_create;
                    }

                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\NewController::createAction',  '_route' => 'Invision_VentaBundle_Inventario_create',);
                }
                not_Invision_VentaBundle_Inventario_create:

                // Invision_VentaBundle_Inventario_filters
                if ($pathinfo === '/admin/inventario/filter') {
                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ListController::filtersAction',  '_route' => 'Invision_VentaBundle_Inventario_filters',);
                }

                // Invision_VentaBundle_Inventario_scopes
                if (0 === strpos($pathinfo, '/admin/inventario/scope') && preg_match('#^/admin/inventario/scope/(?P<group>[^/]++)/(?P<scope>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'Invision_VentaBundle_Inventario_scopes')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ListController::scopesAction',));
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
        if (rtrim($pathinfo, '/') === '/cambio_clave') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'cambio_clave');
            }

            return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::cambioClaveAction',  '_route' => 'cambio_clave',);
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
                    if (rtrim($pathinfo, '/') === '/admin/usuario/editar') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'editar_usuario');
                        }

                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::editarAction',  '_route' => 'editar_usuario',);
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
                if (rtrim($pathinfo, '/') === '/admin/usuario/horario') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'horario_usuario');
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::horarioAction',  '_route' => 'horario_usuario',);
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
                    if (rtrim($pathinfo, '/') === '/admin/perfil/editar') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'editar_perfil');
                        }

                        return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\PerfilController::editarAction',  '_route' => 'editar_perfil',);
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
                if (rtrim($pathinfo, '/') === '/admin/perfil/menu') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'menu_perfil');
                    }

                    return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\PerfilController::menusAction',  '_route' => 'menu_perfil',);
                }

            }

            // bitacora
            if (rtrim($pathinfo, '/') === '/admin/bitacora') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'bitacora');
                }

                return array (  '_controller' => 'Invision\\SoporteBundle\\Controller\\BitacoraController::bitacoraAction',  '_route' => 'bitacora',);
            }

            if (0 === strpos($pathinfo, '/admin/inventario')) {
                // nuevo_inventario
                if ($pathinfo === '/admin/inventario/nuevo') {
                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\InventarioController::nuevoAction',  '_route' => 'nuevo_inventario',);
                }

                if (0 === strpos($pathinfo, '/admin/inventario/e')) {
                    // editar_inventario
                    if ($pathinfo === '/admin/inventario/editar') {
                        return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\InventarioController::editarAction',  '_route' => 'editar_inventario',);
                    }

                    // eliminar_inventario
                    if (rtrim($pathinfo, '/') === '/admin/inventario/eliminar') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'eliminar_inventario');
                        }

                        return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\InventarioController::eliminarAction',  '_route' => 'eliminar_inventario',);
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

                return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\InventarioController::busquedaAction',  '_route' => 'busqueda_inventario',);
            }

            // info_inventario
            if (0 === strpos($pathinfo, '/inventario/info') && preg_match('#^/inventario/info/(?P<pk>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'info_inventario');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'info_inventario')), array (  '_controller' => 'Invision\\VentaBundle\\Controller\\InventarioController::infoAction',));
            }

        }

        if (0 === strpos($pathinfo, '/admin/color')) {
            // nuevo_color
            if ($pathinfo === '/admin/color/nuevo') {
                return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\ColorController::nuevoAction',  '_route' => 'nuevo_color',);
            }

            if (0 === strpos($pathinfo, '/admin/color/e')) {
                // editar_color
                if ($pathinfo === '/admin/color/editar') {
                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\ColorController::editarAction',  '_route' => 'editar_color',);
                }

                // eliminar_color
                if ($pathinfo === '/admin/color/eliminar') {
                    return array (  '_controller' => 'Invision\\VentaBundle\\Controller\\ColorController::eliminarAction',  '_route' => 'eliminar_color',);
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
