<?php

namespace Invision\InventarioBundle\Controller;

use Exception;
use Invision\InventarioBundle\Form\Type\Material\materialType;
use Invision\InventarioBundle\Model\Material;
use Invision\InventarioBundle\Model\MaterialQuery;
use Invision\SoporteBundle\Model\Bitacora;
use Propel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class MaterialController extends Controller {

    public function nuevoAction(Request $request) {
        $form = $this->createForm(new materialType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $material = new Material();
            $material->setNombre($valores['nombre']);
            $material->setDescripcion($valores['descripcion']);
            $material->setCosto($valores['costo']);
            $material->save();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se agrego el material "' . $valores['nombre'] . '"'
                    , 1
                    , 'material'
                    , $material->getNombre()
                    , ''
                    , ''
                    , $this->getUser()->getSedeId());
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha agregado el material "' . $valores['nombre'] . '"',
                'titulo' => 'Material agregado',
                'estado' => 'success',
                'icono' => 'check'
            ));
            return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Material_list'));
        }
        return $this->render('InvisionInventarioBundle:Material:material.html.twig', array(
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route'),
                    'pk' => null
        ));
    }

    public function editarAction(Request $request) {
        $pk = $request->get('pk');
        $material = MaterialQuery::create()
                ->findOneById($pk);
        $form = $this->createForm(new materialType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $material->setNombre($valores['nombre']);
            $material->setDescripcion($valores['descripcion']);
            $material->setCosto($valores['costo']);
            $material->save();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se edito el material "' . $valores['nombre'] . '"'
                    , 1
                    , 'material'
                    , $material->getNombre()
                    , ''
                    , ''
                    , $this->getUser()->getSedeId());
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha editado el material "' . $valores['nombre'] . '"',
                'titulo' => 'Material editado',
                'estado' => 'success',
                'icono' => 'pencil'
            ));
            return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Material_list'));
        }
        if (!$form->getData()) {
            $form['nombre']->setData($material->getNombre());
            $form['descripcion']->setData($material->getDescripcion());
            $form['costo']->setData($material->getCosto());
        }
        return $this->render('InvisionInventarioBundle:Material:material.html.twig', array(
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route'),
                    'pk' => $pk
        ));
    }

    public function eliminarAction(Request $request) {
        $pk = $request->get('pk');
        $material = MaterialQuery::create()
                ->findOneById($pk);
        $nombre = $material->getNombre();
        try {
            $con = Propel::getConnection();
            $con->beginTransaction();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se elimino el material "' . $nombre . '"'
                    , 1
                    , 'material'
                    , $nombre
                    , ''
                    , ''
                    , $this->getUser()->getSedeId());
            $material->delete();
            $con->commit();
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha eliminado el material "' . $nombre . '"',
                'titulo' => 'Material eliminado',
                'estado' => 'success',
                'icono' => 'eraser'
            ));
        } catch (Exception $ex) {
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'No se ha eliminado el material "' . $nombre . '"',
                'titulo' => 'Material no eliminado',
                'estado' => 'danger',
                'icono' => 'ban'
            ));
        }
        return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Material_list'));
    }

}
