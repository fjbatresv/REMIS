<?php

namespace Invision\InventarioBundle\Controller;

use Exception;
use Invision\InventarioBundle\Form\Type\ProcesoExtra\procesoExtraType;
use Invision\InventarioBundle\Model\ProcesoExtra;
use Invision\InventarioBundle\Model\ProcesoExtraQuery;
use Invision\SoporteBundle\Model\Bitacora;
use Propel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ProcesoExtraController extends Controller {

    public function nuevoAction(Request $request) {
        $form = $this->createForm(new procesoExtraType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $proceso = new ProcesoExtra();
            $proceso->setNombre($valores['nombre']);
            $proceso->setCosto($valores['costo']);
            $proceso->setDescripcion($valores['descripcion']);
            $proceso->save();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se agrego el proceso extra "' . $valores['nombre'] . '"'
                    , 1
                    , 'proceso_extra'
                    , $proceso->getNombre()
                    , ''
                    , ''
                    , $this->getUser()->getSedeId());
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha agregado el proceso "' . $valores['nombre'] . '"',
                'titulo' => 'Proceso agregado',
                'estado' => 'success',
                'icono' => 'check'
            ));
            return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_ProcesoExtra_list'));
        }
        return $this->render('InvisionInventarioBundle:ProcesoExtra:procesoExtra.html.twig', array(
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route'),
                    'pk' => null
        ));
    }

    public function editarAction(Request $request) {
        $pk = $request->get('pk');
        $proceso = ProcesoExtraQuery::create()
                ->findOneById($pk);
        $form = $this->createForm(new procesoExtraType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $proceso->setNombre($valores['nombre']);
            $proceso->setCosto($valores['costo']);
            $proceso->setDescripcion($valores['descripcion']);
            $proceso->save();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se edito el proceso extra "' . $valores['nombre'] . '"'
                    , 1
                    , 'proceso_extra'
                    , $proceso->getNombre()
                    , ''
                    , ''
                    , $this->getUser()->getSedeId());
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha editado el proceso "' . $valores['nombre'] . '"',
                'titulo' => 'Proceso editado',
                'estado' => 'success',
                'icono' => 'pencil'
            ));
            return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_ProcesoExtra_list'));
        }
        if (!$form->getData()) {
            $form['nombre']->setData($proceso->getNombre());
            $form['descripcion']->setData($proceso->getDescripcion());
            $form['costo']->setData($proceso->getCosto());
        }
        return $this->render('InvisionInventarioBundle:ProcesoExtra:procesoExtra.html.twig', array(
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route'),
                    'pk' => $pk
        ));
    }

    public function eliminarAction(Request $request) {
        $pk = $request->get('pk');
        $proceso = ProcesoExtraQuery::create()
                ->findOneById($pk);
        $nombre = $proceso->getNombre();
        try {
            $con = Propel::getConnection();
            $con->beginTransaction();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se elimino el proceso extra "' . $nombre . '"'
                    , 1
                    , 'proceso_extra'
                    , $nombre
                    , ''
                    , ''
                    , $this->getUser()->getSedeId());
            $proceso->delete();
            $con->commit();
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha eliminado el proceso "' . $nombre . '"',
                'titulo' => 'Proceso eliminado',
                'estado' => 'success',
                'icono' => 'eraser'
            ));
        } catch (Exception $ex) {
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'No se ha eliminado el proceso "' . $nombre . '"',
                'titulo' => 'Proceso no eliminado',
                'estado' => 'danger',
                'icono' => 'ban'
            ));
        }
        return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_ProcesoExtra_list'));
    }

}
