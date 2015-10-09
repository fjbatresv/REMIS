<?php

namespace Invision\InventarioBundle\Controller;

use Exception;
use Invision\InventarioBundle\Form\Type\Maleta\cargarType;
use Invision\InventarioBundle\Form\Type\Maleta\editarCargaType;
use Invision\InventarioBundle\Form\Type\Maleta\maletaType;
use Invision\InventarioBundle\Model\InventarioQuery;
use Invision\InventarioBundle\Model\Maleta;
use Invision\InventarioBundle\Model\MaletaDetalle;
use Invision\InventarioBundle\Model\MaletaDetalleQuery;
use Invision\InventarioBundle\Model\MaletaQuery;
use Invision\SoporteBundle\Model\Bitacora;
use Propel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MaletaController extends Controller {

    public function nuevaAction(Request $request) {
        $form = $this->createForm(new maletaType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $maleta = new Maleta();
            $maleta->setCantidad($valores['cantidad']);
            $maleta->setUsuarioId($valores['usuario']->getId());
            $maleta->save();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se agrego la maleta del usuario "' . $valores['usuario']->getUsername() . '"'
                    , 1
                    , 'maleta'
                    , $maleta->getId()
                    , ''
                    , '', $this->getUser()->getSedeId());
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se agrego la maleta del usuario "' . $valores['usuario']->getUsername() . '"',
                'titulo' => 'Maleta agregada',
                'estado' => 'success',
                'icono' => 'check'
            ));
            return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Maleta_list'));
        }
        return $this->render('InvisionInventarioBundle:Maleta:maleta.html.twig', array(
                    'form' => $form->createView(),
                    'pk' => null,
                    'ruta' => $request->get('_route')
        ));
    }

    public function editarAction(Request $request) {
        $pk = $request->get('pk');
        $maleta = MaletaQuery::create()
                ->findOneById($pk);
        $form = $this->createForm(new maletaType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $valores = $form->getData();
            $maleta->setCantidad($valores['cantidad']);
            $maleta->setUsuarioId($valores['usuario']->getId());
            $maleta->save();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se edito la maleta del usuario "' . $valores['usuario']->getUsername() . '"'
                    , 1
                    , 'maleta'
                    , $maleta->getId()
                    , ''
                    , '', $this->getUser()->getSedeId());
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se edito la maleta del usuario "' . $valores['usuario']->getUsername() . '"',
                'titulo' => 'Maleta editada',
                'estado' => 'success',
                'icono' => 'pencil'
            ));
            return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Maleta_list'));
        }
        if (!$form->getData()) {
            $form['cantidad']->setData($maleta->getCantidad());
            $form['usuario']->setData($maleta->getUsuario());
        }
        return $this->render('InvisionInventarioBundle:Maleta:maleta.html.twig', array(
                    'form' => $form->createView(),
                    'pk' => $pk,
                    'ruta' => $request->get('_route')
        ));
    }

    public function eliminarAction(Request $request) {
        $pk = $request->get('pk');
        $maleta = MaletaQuery::create()
                ->findOneById($pk);
        $usuario = $maleta->getUsuario()->getUsername();
        try {
            $con = Propel::getConnection();
            $con->beginTransaction();
            Bitacora::escribir(
                    $this->getUser()->getUsername()
                    , $request->getClientIp()
                    , 'Se elimino la maleta del usuario "' . $usuario . '"'
                    , 1
                    , 'maleta'
                    , $maleta->getId()
                    , ''
                    , '', $this->getUser()->getSedeId());
            $maleta->delete();
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'Se elimino la maleta del usuario "' . $usuario . '"',
                'titulo' => 'Maleta eliminada',
                'estado' => 'success',
                'icono' => 'eraser'
            ));
            $con->commit();
        } catch (Exception $ex) {
            $this->get('session')->getFlashBag()->add('notificaciones', array(
                'mostrar' => true,
                'mensaje' => 'No see elimino la maleta del usuario "' . $usuario . '"',
                'titulo' => 'Maleta no eliminada',
                'estado' => 'danger',
                'icono' => 'ban'
            ));
        }
        return new RedirectResponse($this->generateUrl('Invision_InventarioBundle_Maleta_list'));
    }

    public function cargarAction(Request $request) {
        $pk = $request->get('pk');
        $maleta = MaletaQuery::create()
                ->findOneById($pk);
        $form = $this->createForm(new cargarType());
        $form->handleRequest($request);
        if ($form->isValid()) {
            $articulos = MaletaDetalleQuery::create()
                    ->filterByMaletaId($pk)
                    ->withColumn('SUM(cantidad)', 'total')
                    ->findOne();
            $valores = $form->getData();
            if ($maleta->getCantidad() >= $articulos->getTotal() + $valores['cantidad']) {
                $articulo = InventarioQuery::create()
                        ->filterByCodigo($valores['codigo']->getCodigo())
                        ->filterByColorId($valores['color']->getId())
                        ->findOne();
                if ($articulo->getCantidad() >= $valores['cantidad']) {
                    $con = \Propel::getConnection();
                    $con->beginTransaction();
                    if ($articulo->getCantidad() == $valores['cantidad']) {
                        $this->get('session')->getFlashBag()->add('notificaciones', array(
                            'mostrar' => true,
                            'mensaje' => 'Ya no hay inventario del articulo con codigo "'
                            . $articulo->getCodigo() . '", en color "'
                            . $articulo->getColor()->getNombre() . '"',
                            'titulo' => 'Inventario vacio',
                            'estado' => 'info',
                            'icono' => 'info'
                        ));
                    }
                    $articulo->setCantidad($articulo->getCantidad() - $valores['cantidad']);
                    $revision = MaletaDetalleQuery::create()
                            ->filterByMaletaId($pk)
                            ->filterByInventarioId($articulo->getId())
                            ->findOne();
                    if ($revision) {
                        $detalle = $revision;
                        $detalle->setCantidad($valores['cantidad'] + $detalle->getCantidad());
                    } else {
                        $detalle = new MaletaDetalle();
                        $detalle->setCantidad($valores['cantidad']);
                    }
                    $detalle->setInventarioId($articulo->getId());
                    $detalle->setMaletaId($pk);
                    $detalle->save();
                    $articulo->save();
                    Bitacora::escribir(
                            $this->getUser()->getUsername()
                            , $request->getClientIp()
                            , 'Se agregaron "' . $valores['cantidad']
                            . '" articulos a la maleta del usuario "'
                            . $maleta->getUsuario()->getUsername() . '"'
                            , 1
                            , 'maleta_detalle'
                            , $maleta->getId()
                            , ''
                            , '', $this->getUser()->getSedeId());
                    $con->commit();
                    $this->get('session')->getFlashBag()->add('notificaciones', array(
                        'mostrar' => true,
                        'mensaje' => 'Se han agregado "' . $valores['cantidad'] . '" elementos a la maleta',
                        'titulo' => 'Articulos agregados',
                        'estado' => 'success',
                        'icono' => 'check'
                    ));
                } else {
                    $this->get('session')->getFlashBag()->add('notificaciones', array(
                        'mostrar' => true,
                        'mensaje' => 'No hay suficiente en el inventario para cumplir con la solicitud | Existen "'
                        . $articulo->getCantidad() . '" existencias',
                        'titulo' => 'Existencia insuficiente',
                        'estado' => 'warning',
                        'icono' => 'warning'
                    ));
                }
            } else {
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'No puedes sobre pasar el limite de "'
                    . $maleta->getCantidad() . '" articulos en está maleta.',
                    'titulo' => 'Maleta sobrecargada',
                    'estado' => 'warning',
                    'icono' => 'warning'
                ));
            }
        }
        $articulos = MaletaDetalleQuery::create()
                ->findByMaletaId($pk);
//        echo '<pre>';
//        print_r($articulos);
//        echo '<pre>';
//        die();
        return $this->render('InvisionInventarioBundle:Maleta:cargar.html.twig', array(
                    'form' => $form->createView(),
                    'ruta' => $request->get('_route'),
                    'pk' => $pk,
                    'articulos' => $articulos,
                    'maleta' => $maleta
        ));
    }

    public function descargarAction(Request $request) {
        $pk = $request->get('pk');
        $detalle = MaletaDetalleQuery::create()
                ->findOneById($pk);
        $articulo = InventarioQuery::create()
                ->findOneById($detalle->getInventarioId());
        $con = \Propel::getConnection();
        $con->beginTransaction();
        $articulo->setCantidad($articulo->getCantidad() + $detalle->getCantidad());
        $articulo->save();
        $maleta = $detalle->getMaleta();
        $detalle->delete();
        Bitacora::escribir(
                $this->getUser()->getUsername()
                , $request->getClientIp()
                , 'Se elimino un articulo de la maleta del usuario "' . $maleta->getUsuario()->getUsername() . '"'
                , 1
                , 'maleta_detalle'
                , $maleta->getId()
                , ''
                , '', $this->getUser()->getSedeId());
        $con->commit();
        $this->get('session')->getFlashBag()->add('notificaciones', array(
            'mostrar' => true,
            'mensaje' => 'Se elimino un articulo de la maleta',
            'titulo' => 'Articulo eliminado',
            'estado' => 'success',
            'icono' => 'eraser'
        ));
        return new RedirectResponse($this->generateUrl('cargar_maleta', array(
                    'pk' => $maleta->getId()
        )));
    }

    public function coloresCodigoAction(Request $request) {
        $pk = $request->get('pk');
        $inventarios = InventarioQuery::create()
                ->findByCodigo($pk);

        $respuesta = array();
        foreach ($inventarios as $inventario) {
            $respuesta[] = array(
                'nombre' => $inventario->getColor()->getNombre(),
                'id' => $inventario->getColorId()
            );
        }
        return new Response(json_encode($respuesta));
    }

    public function editarCargaAction(Request $request) {
        $pk = $request->get('pk');
        $detalle = MaletaDetalleQuery::create()
                ->findOneById($pk);
        $form = $this->createForm(new editarCargaType());
        $form->handleRequest($request);
        if ($request->isMethod('post')) {
            $fform = $this->createForm(new editarCargaType());
            $fform->bind($request->get('editarCarga'));
            if ($fform->isValid()) {
                $valores = $fform->getData();
                $articulo = InventarioQuery::create()
                        ->findOneById($detalle->getInventarioId());
                $detalles = MaletaDetalleQuery::create()
                        ->filterByMaletaId($detalle->getMaletaId())
                        ->withColumn('SUM(cantidad)', 'total')
                        ->findOne();

                if ($valores['cantidad'] <= $articulo->getCantidad() + $detalle->getCantidad()) {
                    if (($detalles->getTotal() - $detalle->getCantidad()) + $valores['cantidad'] <= $detalle->getMaleta()->getCantidad()) {
                        if ($valores['cantidad'] == $articulo->getCantidad() + $detalle->getCantidad()) {
                            $this->get('session')->getFlashBag()->add('notificaciones', array(
                                'mostrar' => true,
                                'mensaje' => 'Ya no hay inventario del articulo con codigo "'
                                . $articulo->getCodigo() . '", en color "'
                                . $articulo->getColor()->getNombre() . '"',
                                'titulo' => 'Inventario vacio',
                                'estado' => 'info',
                                'icono' => 'info'
                            ));
                        }
                        $articulo->setCantidad(($articulo->getCantidad() + $detalle->getCantidad()) - $valores['cantidad']);
                        $articulo->save();
                        $detalle->setCantidad($valores['cantidad']);
                        $detalle->save();
                        Bitacora::escribir(
                                $this->getUser()->getUsername()
                                , $request->getClientIp()
                                , 'Se edito la cantidad del articulo "'
                                . $detalle->getInventario()->getCodigo() . '" de color "'
                                . $detalle->getInventario()->getColor()->getNombre()
                                . '" en la maleta del usuario "'
                                . $detalle->getMaleta()->getUsuario()->getUsername() . '"'
                                , 1
                                , 'maleta_detalle'
                                , $detalle->getMaletaId()
                                , ''
                                , '', $this->getUser()->getSedeId());
                        $this->get('session')->getFlashBag()->add('notificaciones', array(
                            'mostrar' => true,
                            'mensaje' => 'Se edito un articulo de la maleta',
                            'titulo' => 'Articulo editado',
                            'estado' => 'success',
                            'icono' => 'pencil'
                        ));
                    } else {
                        $this->get('session')->getFlashBag()->add('notificaciones', array(
                            'mostrar' => true,
                            'mensaje' => 'No puedes sobre pasar el limite de "'
                            . $detalle->getMaleta()->getCantidad() . '" articulos en está maleta.',
                            'titulo' => 'Maleta sobrecargada',
                            'estado' => 'warning',
                            'icono' => 'warning'
                        ));
                    }
                } else {
                    $this->get('session')->getFlashBag()->add('notificaciones', array(
                        'mostrar' => true,
                        'mensaje' => 'No hay suficiente en el inventario para cumplir con la solicitud | Existen "'
                        . $articulo->getCantidad() . '" existencias',
                        'titulo' => 'Existencia insuficiente',
                        'estado' => 'warning',
                        'icono' => 'warning'
                    ));
                }
            } else {
                $this->get('session')->getFlashBag()->add('notificaciones', array(
                    'mostrar' => true,
                    'mensaje' => 'Parece que has ingresado mal algun dato.',
                    'titulo' => 'Articulo no editado',
                    'estado' => 'warning',
                    'icono' => 'warning'
                ));
            }
            $respuesta[] = array(
                'ruta' => $this->generateUrl('cargar_maleta', array('pk' => $detalle->getMaletaId()))
            );
            return new Response(json_encode($respuesta));
        }
        if (!$form->getData()) {
            $form['cantidad']->setData($detalle->getCantidad());
        }
        return new Response($this->renderView('InvisionInventarioBundle:Maleta:editarCarga.html.twig', array(
                    'form' => $form->createView(),
                    'detalle' => $detalle
        )));
    }

}
