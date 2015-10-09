<?php

namespace Invision\SoporteBundle\Controller;

use Invision\SoporteBundle\Form\Type\TipoSede\tipoSedeType;
use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\TipoSede;
use Invision\SoporteBundle\Model\TipoSedeQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class TipoSedeController extends Controller {

    public function nuevoAction(Request $request) {
        $form = $this->createForm(new tipoSedeType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $revision = TipoSedeQuery::create()
                    ->findOneByNombre($valores['nombre']);
            if (!$revision) {
                $tipo = new TipoSede();
                $tipo->setNombre($valores['nombre']);
                $tipo->setDescripcion($valores['descripcion']);
                $tipo->save();
                Bitacora::escribir(
                        $this->getUser()->getUsername()
                        , $request->getClientIp()
                        , 'Se agrego el nuevo tipo de sede "'
                        . $valores['nombre']
                        . '"'
                        , 1
                        , 'tipo_sede'
                        , $tipo->getId()
                        , null
                        , NULL);
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Se agrego el nuevo tipo de sede "'
                    . $valores['nombre']
                    . '"',
                    'titulo' => 'Tipo de sede agregado',
                    'estado' => 'success',
                    'icono' => 'check'
                ));
                return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_TipoSede_list'));
            } else {
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Actualmente existe un tipo de sede con este nombre',
                    'titulo' => 'Tipo de sede repetido',
                    'estado' => 'warning',
                    'icono' => 'warning'
                ));
            }
        }
        return $this->render('InvisionSoporteBundle:TipoSede:tipoSede.html.twig', array(
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route'),
                    'pk' => null
        ));
    }

    public function editarAction(Request $request) {
        $pk = $request->get('pk');
        $form = $this->createForm(new tipoSedeType());
        $form->handleRequest($request);
        $tipo = TipoSedeQuery::create()
                ->findOneById($pk);
        if ($form->isValid()) {
            $valores = $form->getData();
            $revision = TipoSedeQuery::create()
                    ->filterByNombre($valores['nombre'])
                    ->where('id <> ' . $pk)
                    ->findOne();
            if (!$revision) {
                $tipo->setNombre($valores['nombre']);
                $tipo->setDescripcion($valores['descripcion']);
                $tipo->save();
                Bitacora::escribir(
                        $this->getUser()->getUsername()
                        , $request->getClientIp()
                        , 'Se edito el tipo de sede "'
                        . $valores['nombre']
                        . '"'
                        , 1
                        , 'tipo_sede'
                        , $tipo->getId()
                        , null
                        , NULL);
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Se edito el tipo de sede "'
                    . $valores['nombre']
                    . '"',
                    'titulo' => 'Tipo de sede editado',
                    'estado' => 'success',
                    'icono' => 'pencil'
                ));
                return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_TipoSede_list'));
            } else {
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Actualmente existe un tipo de sede con este nombre',
                    'titulo' => 'Tipo de sede repetido',
                    'estado' => 'warning',
                    'icono' => 'warning'
                ));
            }
        }
        if (!$form->getData()) {
            $form['nombre']->setData($tipo->getNombre());
            $form['descripcion']->setData($tipo->getDescripcion());
        }
        return $this->render('InvisionSoporteBundle:TipoSede:tipoSede.html.twig', array(
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route'),
                    'pk' => $pk
        ));
    }

    public function eliminarAction(Request $request) {
        $pk = $request->get('pk');
        $tipo = TipoSedeQuery::create()
                ->findOneById($pk);
        $nombre = $tipo->getNombre();
        try {
            $con = \Propel::getConnection();
            $con->beginTransaction();

            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se elimino el tipo de sede "' . $nombre . '"'
                    , true
                    , 'tipo_sede'
                    , $pk
                    , null
                    , null);
            $tipo->delete();
            $con->commit();
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha eliminado el tipo de sede "' . $nombre . '"',
                'titulo' => 'Tipo de sede eliminado',
                'estado' => 'success',
                'icono' => 'eraser'
            ));
        } catch (\Exception $ex) {
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'No se ha podido eliminar el tipo de sede "' . $nombre . '".',
                'titulo' => 'Tipo de sede no eliminado',
                'estado' => 'danger',
                'icono' => 'ban'
            ));
        }
        return new RedirectResponse($this->generateUrl('Invision_SoporteBundle_TipoSede_list'));
    }

}
