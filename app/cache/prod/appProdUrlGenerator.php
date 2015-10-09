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
    private static $declaredRoutes = array(
        'Invision_VentaBundle_Color_list' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ListController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/color/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Color_excel' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ExcelController::excelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/color/excel',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Color_edit' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\EditController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/color',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Color_update' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\EditController::updateAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/color',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Color_show' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ShowController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/color',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Color_object' => array (  0 =>   array (    0 => 'pk',    1 => 'action',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ActionsController::objectAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'action',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/color',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Color_batch' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ActionsController::batchAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/color/batch',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Color_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\NewController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/color/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Color_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\NewController::createAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/color/create',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Color_filters' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ListController::filtersAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/color/filter',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Color_scopes' => array (  0 =>   array (    0 => 'group',    1 => 'scope',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Color\\ListController::scopesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'scope',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'group',    ),    2 =>     array (      0 => 'text',      1 => '/admin/color/scope',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_list' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ListController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/perfil/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_excel' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ExcelController::excelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/perfil/excel',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_edit' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\EditController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/perfil',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_update' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\EditController::updateAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/perfil',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_show' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ShowController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/perfil',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_object' => array (  0 =>   array (    0 => 'pk',    1 => 'action',  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ActionsController::objectAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'action',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/perfil',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_batch' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ActionsController::batchAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/perfil/batch',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\NewController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/perfil/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\NewController::createAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/perfil/create',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_filters' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ListController::filtersAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/perfil/filter',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Perfil_scopes' => array (  0 =>   array (    0 => 'group',    1 => 'scope',  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Perfil\\ListController::scopesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'scope',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'group',    ),    2 =>     array (      0 => 'text',      1 => '/admin/perfil/scope',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_list' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ListController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/usuario/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_excel' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ExcelController::excelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/usuario/excel',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_edit' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\EditController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/usuario',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_update' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\EditController::updateAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/usuario',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_show' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ShowController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/usuario',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_object' => array (  0 =>   array (    0 => 'pk',    1 => 'action',  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ActionsController::objectAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'action',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/usuario',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_batch' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ActionsController::batchAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/usuario/batch',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\NewController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/usuario/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\NewController::createAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/usuario/create',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_filters' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ListController::filtersAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/usuario/filter',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_SoporteBundle_Usuario_scopes' => array (  0 =>   array (    0 => 'group',    1 => 'scope',  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\Usuario\\ListController::scopesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'scope',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'group',    ),    2 =>     array (      0 => 'text',      1 => '/admin/usuario/scope',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_list' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ListController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/inventario/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_excel' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ExcelController::excelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/inventario/excel',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_edit' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\EditController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/edit',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/inventario',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_update' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\EditController::updateAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/inventario',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_show' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ShowController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/show',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/inventario',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_object' => array (  0 =>   array (    0 => 'pk',    1 => 'action',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ActionsController::objectAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'action',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/admin/inventario',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_batch' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ActionsController::batchAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/inventario/batch',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_new' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\NewController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/inventario/new',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_create' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\NewController::createAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/inventario/create',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_filters' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ListController::filtersAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/inventario/filter',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'Invision_VentaBundle_Inventario_scopes' => array (  0 =>   array (    0 => 'group',    1 => 'scope',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\Inventario\\ListController::scopesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'scope',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'group',    ),    2 =>     array (      0 => 'text',      1 => '/admin/inventario/scope',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'usuario_logout' => array (  0 =>   array (  ),  1 =>   array (  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/usuario/logout/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'usuario_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\LoginController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/usuario/login/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'usuario_pre_logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\LoginController::preLogoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/usuario/pre/logout/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'pagina_inicio' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\DefaultController::portadaAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'cambio_clave' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::cambioClaveAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/cambio_clave/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'nuevo_usuario' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::nuevoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/usuario/nuevo/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'editar_usuario' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::editarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/usuario/editar/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'eliminar_usuario' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::eliminarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/usuario/eliminar/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'horario_usuario' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\UsuarioController::horarioAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/usuario/horario/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'nuevo_perfil' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\PerfilController::nuevoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/perfil/nuevo/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'editar_perfil' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\PerfilController::editarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/perfil/editar/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'eliminar_perfil' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\PerfilController::eliminarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/perfil/eliminar/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'menu_perfil' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\PerfilController::menusAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/perfil/menu/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'bitacora' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\SoporteBundle\\Controller\\BitacoraController::bitacoraAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/bitacora/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'nuevo_inventario' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\InventarioController::nuevoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/inventario/nuevo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'editar_inventario' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\InventarioController::editarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/inventario/editar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'eliminar_inventario' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\InventarioController::eliminarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/inventario/eliminar/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'busqueda_inventario' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\InventarioController::busquedaAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/inventario/busqueda/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'info_inventario' => array (  0 =>   array (    0 => 'pk',  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\InventarioController::infoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'pk',    ),    2 =>     array (      0 => 'text',      1 => '/inventario/info',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'nuevo_color' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\ColorController::nuevoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/color/nuevo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'editar_color' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\ColorController::editarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/color/editar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'eliminar_color' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'Invision\\VentaBundle\\Controller\\ColorController::eliminarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/admin/color/eliminar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
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

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}