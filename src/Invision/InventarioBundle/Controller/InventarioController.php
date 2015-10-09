<?php

namespace Invision\InventarioBundle\Controller;

use Invision\SoporteBundle\Model\Bitacora;
use Invision\InventarioBundle\Model\Inventario;
use Invision\InventarioBundle\Model\InventarioQuery;
use Invision\InventarioBundle\Form\Type\Inventario\BusquedaType;
use Invision\InventarioBundle\Form\Type\Inventario\InventarioType;
use Propel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception\Exception;

class InventarioController extends Controller {

    public function nuevoAction(Request $request) {
        $form = $this->createForm(new InventarioType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            if ($valores['venta'] > $valores['costo']) {
                $comprobacion = InventarioQuery::create()
                        ->filterByColorId($valores['color']->getId())
                        ->filterByCodigo($valores['codigo'])
                        ->findOne();
                if ($comprobacion) {
                    $comprobacion->setDescripcion($valores['descripcion']);
                    $comprobacion->setCantidad($comprobacion->getCantidad() + $valores['cantidad']);
                    $comprobacion->setCosto($valores['costo']);
                    $comprobacion->setVenta($valores['venta']);
                    $comprobacion->save();
                    $accion = 'editado';
                } else {
                    $accion = 'agregado';
                    $inventarioNuevo = new Inventario();
                    $inventarioNuevo->setCodigo($valores['codigo']);
                    $inventarioNuevo->setCantidad($valores['cantidad']);
                    $inventarioNuevo->setColorId($valores['color']->getId());
                    $inventarioNuevo->setDescripcion($valores['descripcion']);
                    $inventarioNuevo->setCosto($valores['costo']);
                    $inventarioNuevo->setVenta($valores['venta']);
                    $inventarioNuevo->setSedeId($valores['sede']->getId());
//                if ($valores['imagen']) {
//                    $ext = end((explode(".", $form['imagen']->getData()->getClientOriginalName())));
//                    $nombre = $valores['imagen']->getClientOriginalName();
//                    $archivo = hash('sha1', $nombre
//                                    . date('Y-m-d') . uniqid()) . '.' . $ext;
//                    $valores['imagen']->move('Inventario/Fotos/'
//                            , $archivo);
//                    $inventarioNuevo->setImagen($archivo);
//                }
                    $inventarioNuevo->save();
                }
                Bitacora::escribir(
                        $this->getUser()->getUsername()
                        , $request->getClientIp()
                        , 'Se ha ' . $accion . ' el articulo "' . $valores['codigo'] . '"'
                        , 1
                        , 'inventario'
                        , $valores['codigo']
                        , ''
                        , ''
                        , $this->getUser()->getSedeId());
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Se ha ' . $accion . ' el color "' . $valores['codigo'] . '"',
                    'titulo' => 'Articulo ' . $accion,
                    'estado' => 'success',
                    'icono' => 'check'
                ));
                return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Inventario_list'));
            } else {
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'El costo del articulo no puede ser mayor ni igual al precio de venta.',
                    'titulo' => 'Ups! Parece que algo está mal. ',
                    'estado' => 'warning',
                    'icono' => 'warning'
                ));
            }
        }
        return $this->render('InvisionInventarioBundle:Inventario:inventario.html.twig', array(
                    'form' => $form->createView(),
                    'pk' => '',
                    'ruta' => $request->get('_route')
        ));
    }

    public function editarAction(Request $request) {
        $form = $this->createForm(new InventarioType());
        $form->handleRequest($request);
        $pk = $request->get('pk');
        $inventario = InventarioQuery::create()
                ->findOneById($pk);
        if ($form->isValid()) {
            $valores = $form->getData();
            if ($valores['venta'] > $valores['costo']) {
                $comprobacion = InventarioQuery::create()
                        ->filterByCodigo($valores['codigo'])
                        ->filterByColor($valores['color'])
                        ->where('id <> ' . $pk)
                        ->findOne();
                if ($comprobacion) {
                    $form['codigo']->addError(new FormError('Codigo existente, ingrese otro codigo'));
                } else {
                    $inventario->setCodigo($valores['codigo']);
                    $inventario->setColor($valores['color']);
                    $inventario->setDescripcion($valores['descripcion']);
                    $inventario->setCantidad($valores['cantidad']);
                    $inventario->setCosto($valores['costo']);
                    $inventario->setVenta($valores['venta']);
//                if ($valores['imagen'] != null) {
//                    echo '<pre>';
//                    print_r($valores['imagen']);
//                    echo '</pre>';
//                    die();
//                    $ext = end((explode(".", $valores['imagen']->getClientOriginalName())));
//                    $nombre = $valores['imagen']->getClientOriginalName();
//                    $archivo = hash('sha1', $nombre
//                                    . date('Y-m-d') . uniqid()) . '.' . $ext;
//                    $valores['imagen']->move('Inventario/Fotos/'
//                            , $archivo);
//                    $inventario->setImagen($archivo);
//                }
                    $inventario->save();
                    Bitacora::escribir(
                            $this->getUser()->getUsername()
                            , $request->getClientIp()
                            , 'Se ha editado el articulo "' . $valores['codigo'] . '"'
                            , 1
                            , 'inventario'
                            , $valores['codigo']
                            , ''
                            , '');
                    $this->get('session')->getFlashBag()->add('notificaciones', array(
                        'mostrar' => true,
                        'mensaje' => 'Se ha editado el articulo "' . $valores['codigo'] . '"',
                        'titulo' => 'Articulo editado',
                        'estado' => 'success',
                        'icono' => 'pencil'
                    ));
                    return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Inventario_list'));
                }
            } else {
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'El costo del articulo no puede ser mayor ni igual al precio de venta.',
                    'titulo' => 'Ups! Parece que algo está mal. ',
                    'estado' => 'warning',
                    'icono' => 'warning'
                )); 
            }
        }
        if (!$form->getData()) {
            $form['codigo']->setData($inventario->getCodigo());
            $form['color']->setData($inventario->getColor());
            $form['descripcion']->setData($inventario->getDescripcion());
            $form['cantidad']->setData($inventario->getCantidad());
            $form['sede']->setData($inventario->getSede());
            $form['costo']->setData($inventario->getCosto());
            $form['venta']->setData($inventario->getVenta());
        }
        return $this->render('InvisionInventarioBundle:Inventario:inventario.html.twig', array(
                    'form' => $form->createView(),
                    'pk' => $pk,
                    'ruta' => $request->get('_route')
        ));
    }

    public function eliminarAction(Request $request) {
        $pk = $request->get('pk');
        $inventario = InventarioQuery::create()
                ->findOneById($pk);
        $codigo = $inventario->getCodigo();
        try {
            $con = Propel::getConnection();
            $con->beginTransaction();
            $inventario->delete();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se ha eliminado el articulo "' . $codigo . '"'
                    , 1
                    , 'inventario'
                    , $codigo
                    , ''
                    , '');
            $con->commit();
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se ha eliminado el articulo "' . $codigo . '"',
                'titulo' => 'Articulo eliminado',
                'estado' => 'success',
                'icono' => 'eraser'
            ));
        } catch (Exception $ex) {
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'No se ha eliminado el articulo "' . $codigo . '"',
                'titulo' => 'Articulo no eliminado',
                'estado' => 'danger',
                'icono' => 'ban'
            ));
        }
        return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Inventario_list'));
    }

    public function busquedaAction(Request $request) {
        $form = $this->createForm(new BusquedaType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $articulosTmp = InventarioQuery::create();
            if ($valores['codigo']) {
                $articulosTmp->filterByCodigo($valores['codigo']);
            }
            if ($valores['color']) {
                $articulosTmp->filterByColorId($valores['color']->getId());
            }
            if($valores['venta']){
                $articulosTmp->where("venta <= " . $valores['venta']);
            }
            if ($valores['descripcion']) {
                $articulosTmp->where("descripcion like '%" . $valores['descripcion'] . "%'");
            }
            $articulos = $articulosTmp->find();
            return $this->render('InvisionInventarioBundle:Inventario:resultados.html.twig', array(
                        'articulos' => $articulos,
            ));
        }
        return $this->render('InvisionInventarioBundle:Inventario:busqueda.html.twig', array(
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route')
        ));
    }

    public function infoAction(Request $request) {
        $pk = $request->get('pk');
        $articulo = InventarioQuery::create()
                ->findOneById($pk);
        return $this->render('InvisionInventarioBundle:Inventario:informacion.html.twig', array(
                    'articulo' => $articulo
        ));
    }

}
