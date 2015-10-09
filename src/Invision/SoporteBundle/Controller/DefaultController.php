<?php

namespace Invision\SoporteBundle\Controller;

use Invision\SoporteBundle\Model\MenuQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function portadaAction() {
        return $this->render('InvisionSoporteBundle:Default:portada.html.twig');
        
    }
    
    public function menuAction() {
        $menus = MenuQuery::create()
                ->filterByVisible(1)
                ->usePerfilMenuQuery()
                ->filterByPerfilId($this->getUser()->getPerfilId())
                ->endUse()
                ->find();
        return $this->render('::menuSidebar.html.twig', array('menus' => $menus));
    }

}
