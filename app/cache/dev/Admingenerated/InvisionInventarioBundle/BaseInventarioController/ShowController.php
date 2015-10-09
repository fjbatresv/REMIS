<?php

namespace Admingenerated\InvisionInventarioBundle\BaseInventarioController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ShowController extends BaseController
{
    public function indexAction($pk)
    {
        $Inventario = $this->getObject($pk);

        

        if (!$Inventario) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\Inventario with Id $pk can't be found");
        }

        return $this->render('InvisionInventarioBundle:InventarioShow:index.html.twig', $this->getAdditionalRenderParameters($Inventario) + array(
            "Inventario" => $Inventario
        ));
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\Inventario $Inventario your \Invision\InventarioBundle\Model\Inventario object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\InventarioBundle\Model\Inventario $Inventario)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\InventarioBundle\Model\InventarioQuery::create();
    }
}
