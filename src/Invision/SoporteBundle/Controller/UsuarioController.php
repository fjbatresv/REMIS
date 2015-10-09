<?php

namespace Invision\SoporteBundle\Controller;

use Exception;
use Invision\SoporteBundle\Form\Type\Usuario\CambioClaveType;
use Invision\SoporteBundle\Form\Type\Usuario\HorarioType;
use Invision\SoporteBundle\Form\Type\Usuario\UsuarioType;
use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\DiaQuery;
use Invision\SoporteBundle\Model\Horario;
use Invision\SoporteBundle\Model\HorarioQuery;
use Invision\SoporteBundle\Model\Usuario;
use Invision\SoporteBundle\Model\UsuarioHorario;
use Invision\SoporteBundle\Model\UsuarioHorarioQuery;
use Invision\SoporteBundle\Model\UsuarioQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class UsuarioController extends Controller {

    public function cambioClaveAction(Request $request) {
        $pk = $request->get('pk');
        $form = $this->createForm(new CambioClaveType());
        $form->handleRequest($request);
        $usuario = UsuarioQuery::create()
                ->findOneById($pk);
        if ($form->isValid()) {
            $valores = $form->getData();
            if ($usuario->getPassword() == sha1($valores['clave_old'])) {
                $usuario->setPassword(sha1($valores['clave']));
                $usuario->save();
                Bitacora::escribir(
                        $this->getUser()->getUsername()
                        , $request->getClientIp()
                        , 'Cambio de clave'
                        , 1
                        , 'usuario'
                        , $usuario->getUsername()
                        , ''
                        , '');
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Tu clave se ha cambiado.',
                    'titulo' => 'Clave modificada',
                    'estado' => 'info',
                    'icono' => 'info'
                ));
                return new RedirectResponse($this->generateUrl('pagina_inicio'));
            } else {
                Bitacora::escribir($this->getUser()->getUsername(), $request->getClientIp(), 'Cambio de clave', 0, 'usuario', $usuario->getUsername(), 'Clave incorrecta', $form['clave_old']->getData());
                $form['clave_old']->addError(new FormError('Clave incorrecta'));
            }
        }
        return $this->render('InvisionSoporteBundle:Usuario:cambioClave.html.twig', array('form' => $form->createView(), 'pk' => $pk));
    }

    public function nuevoAction(Request $request) {
        $form = $this->createForm(new UsuarioType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $comprobacion = UsuarioQuery::create()->findOneByUsername($valores['username']);
            if ($comprobacion) {
                $form['username']->addError(new FormError('Nombre de usuario ya utilizado, ingrese otro'));
            } else {
                if ($valores['clave']) {
                    $usuario = new Usuario();
                    $usuario->setUsername($valores['username']);
                    $usuario->setPassword(sha1($valores['clave']));
                    $usuario->setPerfil($valores['perfil']);
                    $usuario->setEmail($valores['correo']);
                    $usuario->setNombre($valores['nombre']);
                    $usuario->setApellido($valores['apellido']);
                    $usuario->setFechaNacimiento($valores['fecha_nacimiento']);
                    $usuario->setSedeId($valores['sede']->getId());
                    $usuario->save();
                    $this->crearHorario($usuario->getId());
                    Bitacora::escribir(
                            $this->getUser()->getUsername()
                            , $request->getClientIp()
                            , 'Usuario creado'
                            , true
                            , 'usuario'
                            , $usuario->getUsername()
                            , ''
                            , '');
                    $this->get('session')->getFlashBag()->add('notificaciones', array(
                        'mostrar' => true,
                        'mensaje' => 'El usuario "' . $usuario->getUsername() . '" ha sido agregado.',
                        'titulo' => 'Usuario agregado',
                        'estado' => 'success',
                        'icono' => 'check'
                    ));
                    return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_Usuario_list'));
                } else {
                    $form['clave']->addError(new FormError('Ingrese una clave'));
                }
            }
        }
        return $this->render('InvisionSoporteBundle:Usuario:usuario.html.twig', array('form' => $form->createView(), 'pk' => null, 'ruta' => $request->get('_route')));
    }

    public function editarAction(Request $request) {
        $form = $this->createForm(new UsuarioType());
        $form->handleRequest($request);
        $pk = $request->get('pk');
        $usuario = UsuarioQuery::create()
                ->findOneById($pk);
        if ($form->isValid()) {
            $valores = $form->getData();
            $comprobacion = UsuarioQuery::create()->filterByUsername($valores['username'])->where('id <> ' . $pk)->findOne();
            if ($comprobacion) {
                $form['username']->addError(new FormError('Nombre de usuario ya utilizado, ingrese otro'));
            } else {
                $usuario->setUsername($valores['username']);
                $usuario->setPassword(sha1($valores['clave']));
                $usuario->setPerfil($valores['perfil']);
                $usuario->setEmail($valores['correo']);
                $usuario->setNombre($valores['nombre']);
                $usuario->setApellido($valores['apellido']);
                $usuario->setFechaNacimiento($valores['fecha_nacimiento']);
                $usuario->setSedeId($valores['sede']->getId());
                $usuario->save();
                Bitacora::escribir($this->getUser()->getUsername(), $request->getClientIp(), 'edicion de usuario', true, 'usuario', $usuario->getUsername(), '', '');
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'El usuario "' . $usuario->getUsername() . '" ha sido editado.',
                    'titulo' => 'Usuario editado',
                    'estado' => 'success',
                    'icono' => 'pencil'
                ));
                return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_Usuario_list'));
            }
        }
        if (!$form->getData()) {
            $form['username']->setData($usuario->getUsername());
            $form['perfil']->setData($usuario->getPerfil());
            $form['nombre']->setData($usuario->getNombre());
            $form['apellido']->setData($usuario->getApellido());
            $form['correo']->setData($usuario->getEmail());
            if ($usuario->getFechaNacimiento()) {
                $form['fecha_nacimiento']->setData($usuario->getFechaNacimiento()->format('Y-m-d'));
            }
            $form['sede']->setData($usuario->getSede());
        }
        return $this->render('InvisionSoporteBundle:Usuario:usuario.html.twig', array('form' => $form->createView(), 'pk' => $pk, 'ruta' => $request->get('_route')));
    }

    private function crearHorario($pk) {
        $dias = DiaQuery::create()
                ->where("nombre <> 'Sabado'")
                ->where("nombre <> 'Domingo'")
                ->find();
        foreach ($dias as $dia) {
            $comprobacionHorario = HorarioQuery::create()
                    ->filterByDiaId($dia->getId())
                    ->filterByHoraInicio('08:00:00')
                    ->filterByHoraFin('17:00:00')
                    ->findOne();
            if (!$comprobacionHorario) {
                $comprobacionHorario = new Horario();
                $comprobacionHorario->setHoraInicio('08:00:00');
                $comprobacionHorario->setHoraFin('17:00:00');
                $comprobacionHorario->setDiaId($dia->getId());
                $comprobacionHorario->save();
            }
            $usuarioHorario = new UsuarioHorario();
            $usuarioHorario->setUsuarioId($pk);
            $usuarioHorario->setHorarioId($comprobacionHorario->getId());
            $usuarioHorario->save();
        }
    }

    public function eliminarAction(Request $request) {
        $pk = $request->get('pk');
        if ($pk != $this->getUser()->getId()) {
            $usuario = UsuarioQuery::create()
                    ->filterById($pk)
                    ->findOne();
            $nombre = $usuario->getUsername();
            try {
                $con = \Propel::getConnection();
                $con->beginTransaction();
                Bitacora::escribir($this->getUser()->getUsername(), $request->getClientIp(), 'Se elimino e usuario "' . $nombre . '"', true, 'usuario', $pk, '', '');
                $usuario->delete();
                $con->commit();
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Se ha eliminado al usuario "' . $nombre . '"',
                    'titulo' => 'Usuario eliminado',
                    'estado' => 'success',
                    'icono' => 'eraser'
                ));
            } catch (Exception $ex) {
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'No se ha podido eliminar el usuario.',
                    'titulo' => 'Usuario no eliminado',
                    'estado' => 'danger',
                    'icono' => 'ban'
                ));
            }
        } else {
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => '',
                'titulo' => 'No puedes eliminarte a ti mismo.',
                'estado' => 'warning',
                'icono' => 'warning'
            ));
        }
        return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_Usuario_list'));
    }

    public function horarioAction(Request $request) {
        $form = $this->createForm(new HorarioType());
        $form->handleRequest($request);
        $pk = $request->get('pk');
        $dias = DiaQuery::create()
                ->find();

        $usuario = UsuarioQuery::create()
                ->findOneById($pk);
        if ($form->isValid()) {
            $valores = $form->getData();
            $horariosUsados = UsuarioHorarioQuery::create()
                    ->findByUsuarioId($pk);
            if ($horariosUsados) {
                $horariosUsados->delete();
            }
            $diasMarcados = $valores['dia'];
            foreach ($diasMarcados as $diaMarcado) {
                $comprobacionHorario = HorarioQuery::create()
                        ->filterByDiaId($diaMarcado->getId())
                        ->filterByHoraInicio($valores[$diaMarcado->getNombre() . 'Desde'])
                        ->filterByHoraFin($valores[$diaMarcado->getNombre() . 'Hasta'])
                        ->findOne();
                if (!$comprobacionHorario) {
                    $comprobacionHorario = new Horario();
                    $comprobacionHorario->setHoraInicio($valores[$diaMarcado->getNombre() . 'Desde']);
                    $comprobacionHorario->setHoraFin($valores[$diaMarcado->getNombre() . 'Hasta']);
                    $comprobacionHorario->setDiaId($diaMarcado->getId());
                    $comprobacionHorario->save();
                }
                $usuarioHorario = new UsuarioHorario();
                $usuarioHorario->setUsuarioId($pk);
                $usuarioHorario->setHorarioId($comprobacionHorario->getId());
                $usuarioHorario->save();
            }
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Los horarios del usuario "' . $usuario->getNombre() . '" han sido modificados',
                'titulo' => 'Horarios modificados',
                'estado' => 'success',
                'icono' => 'clock-o'
            ));
            Bitacora::escribir($this->getUser()->getUsername(), $request->getClientIp(), 'Modificación de los horarios del usuario "' . $usuario->getUsername() . '"', true, 'usuario', $usuario->getUsername(), '', '');
            return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_Usuario_list'));
        }
        if (!$form->getData()) {
            $horariosUsados = HorarioQuery::create()
                    ->useUsuarioHorarioQuery()
                    ->filterByUsuarioId($pk)
                    ->endUse()
                    ->find();
            $diasUsados = DiaQuery::create()
                    ->useHorarioQuery()
                    ->useUsuarioHorarioQuery()
                    ->filterByUsuarioId($pk)
                    ->endUse()
                    ->endUse()
                    ->find();
            $form['dia']->setData($diasUsados);
            foreach ($horariosUsados as $diaUsado) {

                $form[$diaUsado->getDia()->getNombre() . 'Desde']->setData($diaUsado->getHoraInicio('H:i'));
                $form[$diaUsado->getDia()->getNombre() . 'Hasta']->setData($diaUsado->getHoraFin('H:i'));
            }
        }
        return $this->render('InvisionSoporteBundle:Usuario:horario.html.twig', array('form' => $form->createView(), 'dias' => $dias, 'ruta' => $request->get('_route'), 'pk' => $pk));
    }

}
