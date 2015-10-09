<?php

namespace Invision\SoporteBundle\Listener;

use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\MenuQuery;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class PermisoListener {

    private $container;
    private $router;

    public function __construct(ContainerInterface $container = null, $router) {
        $this->container = $container;
        $this->router = $router;
    }

    public function onKernelRequest(GetResponseEvent $event) {
        $request = $this->container->get('request');
        $ruta = $request->get('_route');
        $pagina_inicio = $this->router->generate('pagina_inicio');
        if ($this->container->get('security.context')->isGranted('ROLE_USUARIO')) {
            if ($ruta == 'pagina_inicio' || $ruta == '_wdt' || $ruta == 'usuario_pre_logout' || $ruta == '' || $ruta == 'usuario_login') {
                return true;
            } else {

                $usuario = $this->container->get('security.context')->getToken()->getUser();
                $rutasPerfil = MenuQuery::create()
                        ->usePerfilMenuQuery()
                        ->filterByPerfilId($usuario->getPerfilId())
                        ->endUse()
                        ->find();
                $comprobacionRuta = false;
                $rutas = MenuQuery::create()->find();
                foreach ($rutasPerfil as $rutaPerfil) {
                    if($rutaPerfil->getRuta() == $ruta){
                        $comprobacionRuta = true;
                    }
                    foreach ($rutas as $rutaDb) {
                        if ($rutaPerfil->getId() == $rutaDb->getSuperior() && $rutaDb->getRuta() == $ruta) {
                            $comprobacionRuta = true;
                        }
                    }
                }
                if ($comprobacionRuta) {
                    return true;
                } else {
                    return true;
//                    Bitacora::escribir($usuario->getUsername(), $request->getClientIp(), 'Ingreso a menu', 0, 'perfil_menu', $usuario->getPerfil()->getNombre(), 'Intento de ingresar a ruta no permitida', $ruta);
                    $response = new RedirectResponse($pagina_inicio);
                    $event->setResponse($response);
                }
            }
        }
    }

}
