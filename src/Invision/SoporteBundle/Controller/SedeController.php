<?php

namespace Invision\SoporteBundle\Controller;

use Exception;
use Invision\SoporteBundle\Form\Type\Sede\sedeType;
use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\Sede;
use Invision\SoporteBundle\Model\SedeQuery;
use Propel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RedirectResponse as RedirectResponse2;
use Symfony\Component\HttpFoundation\Request;

class SedeController extends Controller {

    public function nuevaAction(Request $request) {
        $form = $this->createForm(new sedeType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $revision = SedeQuery::create()
                    ->filterByTipoSedeId($valores['tipo']->getId())
                    ->where("nombre = '" . $valores['nombre'] . "'")
                    ->orWhere("direccion = '" . $valores['direccion'] . "'")
                    ->orWhere("telefono = '" . $valores['telefono'] . "'")
                    ->findOne();
            if (!$revision) {
                $sede = new Sede();
                $sede->setNombre($valores['nombre']);
                $sede->setDireccion($valores['direccion']);
                $sede->setTelefono($valores['telefono']);
                $sede->setTipoSedeId($valores['tipo']->getId());
                $sede->save();
                Bitacora::escribir(
                        $this->getUser()->getUsername()
                        , $request->getClientIp()
                        , 'Se agrego la nueva sede "'
                        . $valores['nombre']
                        . '"'
                        , 1
                        , 'sede'
                        , $sede->getId()
                        , null
                        , NULL);
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Se agrego la nueva sede "'
                    . $valores['nombre']
                    . '"',
                    'titulo' => 'Sede agregada',
                    'estado' => 'success',
                    'icono' => 'check'
                ));
                return new RedirectResponse2($this->generateUrl('Invision_SoporteBundle_Sede_list'));
            } else {
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Actualmente existe una sede parecida',
                    'titulo' => 'Datos repetidos',
                    'estado' => 'warning',
                    'icono' => 'warning'
                ));
            }
        }
        return $this->render('InvisionSoporteBundle:Sede:sede.html.twig', array(
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route'),
                    'pk' => null
        ));
    }

    public function editarAction(Request $request) {
        $pk = $request->get('pk');
        $form = $this->createForm(new sedeType());
        $form->handleRequest($request);
        $sede = SedeQuery::create()
                ->findOneById($pk);
        if ($form->isValid()) {
            $valores = $form->getData();
            $revision = SedeQuery::create()
                    ->filterByTipoSedeId($valores['tipo']->getId())
                    ->where('id <> ' . $pk)
                    ->where("nombre = '" . $valores['nombre'] . "'")
                    ->orWhere("direccion = '" . $valores['direccion'] . "'")
                    ->orWhere("telefono = '" . $valores['telefono'] . "'")
                    ->findOne();
            if (!$revision) {
                $sede->setNombre($valores['nombre']);
                $sede->setDireccion($valores['direccion']);
                $sede->setTelefono($valores['telefono']);
                $sede->setTipoSedeId($valores['tipo']->getId());
                $sede->save();
                Bitacora::escribir(
                        $this->getUser()->getUsername()
                        , $request->getClientIp()
                        , 'Se edito la sede "'
                        . $valores['nombre']
                        . '"'
                        , 1
                        , 'sede'
                        , $sede->getId()
                        , null
                        , NULL);
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Se edito la sede "'
                    . $valores['nombre']
                    . '"',
                    'titulo' => 'Sede editada',
                    'estado' => 'success',
                    'icono' => 'pencil'
                ));
                return new RedirectResponse2($this->generateUrl('Invision_SoporteBundle_Sede_list'));
            } else {
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Actualmente existe una sede parecida',
                    'titulo' => 'Datos repetidos',
                    'estado' => 'warning',
                    'icono' => 'warning'
                ));
            }
        }
        if (!$form->getData()) {
            $form['nombre']->setData($sede->getNombre());
            $form['direccion']->setData($sede->getDireccion());
            $form['telefono']->setData($sede->getTelefono());
            $form['tipo']->setData($sede->getTipoSede());
        }
        return $this->render('InvisionSoporteBundle:Sede:sede.html.twig', array(
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route'),
                    'pk' => $pk
        ));
    }

    public function eliminarAction(Request $request) {
        $pk = $request->get('pk');
        $sede = SedeQuery::create()
                ->findOneById($pk);
        $nombre = $sede->getNombre();
        try {
            $con = Propel::getConnection();
            $con->beginTransaction();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se elimino la sede "' . $nombre . '"'
                    , 1
                    , 'sede'
                    , $sede->getId()
                    , null
                    , null);
            $sede->delete();
            $con->commit();
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha eliminado la sede "' . $nombre . '"',
                'titulo' => 'Sede eliminada',
                'estado' => 'success',
                'icono' => 'eraser'
            ));
        } catch (Exception $ex) {
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'No se ha podido eliminar la sede "' . $nombre . '"',
                'titulo' => 'Sede no eliminada',
                'estado' => 'danger',
                'icono' => 'ban'
            ));
        }
        return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_Sede_list'));
    }

}
