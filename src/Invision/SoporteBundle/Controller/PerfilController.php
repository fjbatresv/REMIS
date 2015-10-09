<?php

namespace Invision\SoporteBundle\Controller;

use Exception;
use Invision\SoporteBundle\Form\Type\Perfil\MenuType;
use Invision\SoporteBundle\Form\Type\Perfil\PerfilType;
use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\MenuQuery;
use Invision\SoporteBundle\Model\Perfil;
use Invision\SoporteBundle\Model\PerfilMenu;
use Invision\SoporteBundle\Model\PerfilMenuQuery;
use Invision\SoporteBundle\Model\PerfilQuery;
use Propel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PerfilController extends Controller {

    public function nuevoAction(Request $request) {
        $form = $this->createForm(new PerfilType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $comprobacion = PerfilQuery::create()
                    ->filterByNombre($valores['nombre'])
                    ->findOne();
            if ($comprobacion) {
                $form['nombre']->addError(new FormError('Perfil existente, ingrese otro nombre'));
            } else {
                $nuevoPerfil = new Perfil();
                $nuevoPerfil->setNombre($valores['nombre']);
                $nuevoPerfil->setDescripcion($valores['descripcion']);
                $nuevoPerfil->save();
                Bitacora::escribir($this->getUser()->getUsername(), $request->getClientIp(), 'Creacion de Perfil', true, 'perfil', $nuevoPerfil->getNombre(), '', '');
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'El perfil "' . $nuevoPerfil->getNombre() . '" ha sido agregado.',
                    'titulo' => 'Perfil agregado',
                    'estado' => 'success',
                    'icono' => 'check'
                ));
                return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_Perfil_list'));
            }
        }
        return $this->render('InvisionSoporteBundle:Perfil:perfil.html.twig', array('pk' => '', 'ruta' => $request->get('_route'), 'form' => $form->createView()));
    }

    public function editarAction(Request $request) {
        $form = $this->createForm(new PerfilType());
        $form->handleRequest($request);
        $pk = $request->get('pk');
        $perfil = PerfilQuery::create()
                ->findOneById($pk);
        if ($form->isValid()) {
            $valores = $form->getData();
            $comprobacion = PerfilQuery::create()
                    ->filterByNombre($valores['nombre'])
                    ->where("id <> '" . $pk . "'")
                    ->findOne();
            if ($comprobacion) {
                $form['nombre']->addError(new FormError('Perfil existente, ingrese otro nombre'));
            } else {
                $perfil->setNombre($valores['nombre']);
                $perfil->setDescripcion($valores['descripcion']);
                $perfil->save();
                Bitacora::escribir($this->getUser()->getUsername(), $request->getClientIp(), 'Edicion de Perfil', true, 'perfil', $perfil->getNombre(), '', '');
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'El perfil "' . $perfil->getNombre() . '" ha sido editado.',
                    'titulo' => 'Perfil editado',
                    'estado' => 'success',
                    'icono' => 'pencil'
                ));
                return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_Perfil_list'));
            }
        }
        if (!$form->getData()) {
            $form['nombre']->setData($perfil->getNombre());
            $form['descripcion']->setData($perfil->getDescripcion());
        }
        return $this->render('InvisionSoporteBundle:Perfil:perfil.html.twig', array('pk' => $pk, 'ruta' => $request->get('_route'), 'form' => $form->createView()));
    }

    public function eliminarAction(Request $request) {
        $perfil = PerfilQuery::create()->findOneById($request->get('pk'));
        $nombre = $perfil->getNombre();
        try {
            $con = Propel::getConnection();
            $con->beginTransaction();
            $perfil->delete();
            Bitacora::escribir($this->getUser()->getUsername(), $request->getClientIp(), "Eliminacion de perfil", 1, 'perfil', $nombre, '', '');
            $con->commit();
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'El perfil "' . $nombre . '" ha sido eliminado.',
                'titulo' => 'Perfil eliminado',
                'estado' => 'success',
                'icono' => 'eraser'
            ));
        } catch (Exception $ex) {            
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'El perfil "' . $nombre . '" no pudo ser eliminado.',
                'titulo' => 'Perfil no eliminado',
                'estado' => 'danger',
                'icono' => 'ban'
            ));
        }
        return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_Perfil_list'));
    }

    public function menusAction(Request $request) {
        $form = $this->createForm(new MenuType());
        $form->handleRequest($request);
        $pk = $request->get('pk');
        if ($form->isValid()) {

            $menus = $form['Menu']->getData();
            PerfilMenuQuery::create()->filterByPerfilId($pk)->find()->delete();
            foreach ($menus as $menu) {
                $perfilMenu = new PerfilMenu();
                $perfilMenu->setPerfilId($pk);
                $perfilMenu->setMenuId($menu->getId());
                $perfilMenu->save();
            }
            $perfil = PerfilQuery::create()->findOneById($pk);
            Bitacora::escribir($this->getUser()->getUsername(), $request->getClientIp(), 'Asignacion de menus a perfil', 1, 'perfil_menu', $perfil->getNombre(), '', '');
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Los accesos de menu del perfil "' . $perfil->getNombre() . '" han sido editados.',
                'titulo' => 'Perfil editado',
                'estado' => 'success',
                'icono' => 'bars'
            ));
            return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_Perfil_list'));
        }
        if (!$form->getData()) {
            $menu = MenuQuery::create()
                    ->usePerfilMenuQuery()
                    ->filterByPerfilId($pk)
                    ->endUse()
                    ->groupBy('id')
                    ->find();
            $form['Menu']->setData($menu);
            $menus = MenuQuery::create()
                    ->filterByVisible(1)
                    ->find();
        }
        return $this->render('InvisionSoporteBundle:Perfil:perfilMenu.html.twig', array(
                    'form' => $form->createView(),
                    'pk' => $pk,
                    'ruta' => $request->get('_route'),
                    'menus' => $menus
        ));
    }

}
