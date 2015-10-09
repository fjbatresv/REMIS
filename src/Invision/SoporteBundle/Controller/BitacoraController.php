<?php

namespace Invision\SoporteBundle\Controller;

use Invision\SoporteBundle\Form\Type\Bitacora\BitacoraType;
use Invision\SoporteBundle\Model\BitacoraQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BitacoraController extends Controller {

    public function BitacoraAction(Request $request) {
        $form = $this->createForm(new BitacoraType());
        $form->handleRequest($request);
        $bitacora = array();
        if ($form->isValid()) {
            $valores = $form->getData();
            $bitacora = BitacoraQuery::create()
                    ->where("created_at >= '" . $valores['inicio'] . "'")
                    ->where("created_at <= '" . $valores['fin'] . "'")
                    ->find();
        }
        if (!$form->getData()) {
            $form['inicio']->setData(date('Y-m-01'));
            $form['fin']->setData(date('Y-m-t'));
        }
        return $this->render('InvisionSoporteBundle:Bitacora:bitacora.html.twig', array('form' => $form->createView(), 'ruta' => $request->get('_route'), 'bitacoras' => $bitacora));
    }

}
