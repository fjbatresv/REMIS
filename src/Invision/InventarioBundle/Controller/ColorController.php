<?php

namespace Invision\InventarioBundle\Controller;

use Exception;
use Invision\SoporteBundle\Model\Bitacora;
use Invision\SoporteBundle\Model\Color;
use Invision\SoporteBundle\Model\ColorQuery;
use Invision\InventarioBundle\Form\Type\Color\ColorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ColorController extends Controller {

    public function nuevoAction(Request $request) {
        $form = $this->createForm(new ColorType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $comprobacion = ColorQuery::create()
                    ->filterByNombre($valores['nombre'])
                    ->findOne();
            if ($comprobacion) {
                $form['nombre']->addError(new FormError('Color ya registrado, ingrese otro.'));
            } else {
                $color = new Color();
                $color->setNombre($valores['nombre']);
                $color->save();
            }
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se agrego el color "' . $color->getNombre() . '"'
                    , 1
                    , 'color'
                    , $color->getNombre()
                    , ''
                    , '');
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha agregado el color "' . $color->getNombre() . '"',
                'titulo' => 'Color agregado',
                'estado' => 'success',
                'icono' => 'check'
            ));
            return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Color_list'));
        }
        return $this->render('InvisionInventarioBundle:Color:color.html.twig', array(
                    'pk' => '',
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route')
        ));
    }

    public function editarAction(Request $request) {
        $form = $this->createForm(new ColorType());
        $form->handleRequest($request);
        $pk = $request->get('pk');
        $color = ColorQuery::create()->findOneById($pk);
        if ($form->isValid()) {
            $valores = $form->getData();
            $comprobacion = ColorQuery::create()
                    ->filterByNombre($valores['nombre'])
                    ->where('id <> ' . $pk)
                    ->findOne();
            if ($comprobacion) {
                $form['nombre']->addError(new FormError('Color existente, ingrese otro color'));
            } else {
                $color->setNombre($valores['nombre']);
                $color->save();
            }
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se ha editado el color "' . $color->getNombre() . '"'
                    , 1
                    , 'color'
                    , $color->getNombre()
                    , ''
                    , '');
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha editado el color "' . $color->getNombre() . '"',
                'titulo' => 'Color editado',
                'estado' => 'success',
                'icono' => 'pencil'
            ));
            return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Color_list'));
        }
        if (!$form->getData()) {
            $form['nombre']->setData($color->getNombre());
        }
        return $this->render('InvisionInventarioBundle:Color:color.html.twig', array(
                    'pk' => $pk,
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route')
        ));
    }

    public function eliminarAction(Request $request) {
        $pk = $request->get('pk');
        $color = ColorQuery::create()->findOneById($pk);
        $nombre = $color->getNombre();
        try {
            $con = \Propel::getConnection();
            $con->beginTransaction();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se ha eliminado el color "' . $color->getNombre() . '"'
                    , 1
                    , 'color'
                    , $color->getNombre()
                    , ''
                    , '');
            $color->delete();
            $con->commit();
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha eliminado el color "' . $nombre . '"',
                'titulo' => 'Color eliminado',
                'estado' => 'success',
                'icono' => 'eraser'
            ));
        } catch (Exception $ex) {
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'No se ha podido eliminar el color "' . $nombre . '"',
                'titulo' => 'Color no eliminado',
                'estado' => 'danger',
                'icono' => 'ban'
            ));
        }
        return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Color_list'));
    }

}
