<?php

namespace Invision\SoporteBundle\Controller;

use Invision\SoporteBundle\Form\Type\Login\LoginType;
use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\UsuarioQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginController extends Controller {

    public function loginAction(Request $request) {
        $securityContext = $this->get('security.context');
        if (!$securityContext->isGranted('ROLE_USUARIO')) {
            $form = $this->createForm(new LoginType());
            $form->handleRequest($request);
            if ($form->isValid()) {
                $valores = $form->getData();
                $usuario = UsuarioQuery::create()
                        ->filterByUsername($valores['username'])
                        ->filterByPassword(sha1($valores['password']))
                        ->findOne();
                if ($usuario) {
                    $sesion = $request->getSession();
                    $token = new UsernamePasswordToken($usuario, null, 'frontend', array('ROLE_USUARIO'));
                    $securityContext->setToken($token);
                    $sesion->set('frontend', serialize($token));
                    $event = new InteractiveLoginEvent($request, $token);
                    $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
                    Bitacora::escribir($usuario->getUsername(), $this->getRequest()->getClientIp(), 'Acceso', true, 'usuario', 'login', null, null, $usuario->getSedeId());
                    return new RedirectResponse($this->generateUrl('pagina_inicio'));
                } else {
                    Bitacora::escribir(null, $this->getRequest()->getClientIp(), 'Acceso', false, 'usuario', 'ingreso', 'acceso', $valores['username'] . $valores['password'], null);
                    $form['password']->addError(new FormError('Datos incorrectos'));
                }
            }
            return $this->render('InvisionSoporteBundle:Login:login.html.twig', array('form' => $form->createView()));
        } else {
            return new RedirectResponse($this->generateUrl('pagina_inicio'));
        }
    }

    public function preLogoutAction(Request $request) {
        Bitacora::escribir(
                $this->getUser()->getUsername()
                , $request->getClientIp()
                , 'Salida', true
                , 'usuario'
                , 'Salida'
                , 'Salida'
                , null);
        return new RedirectResponse($this->generateUrl('usuario_logout'));
    }

}
