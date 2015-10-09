<?php

namespace Admingenerated\InvisionVentaBundle\BaseInventarioController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ShowController extends BaseController
{
    public function indexAction($pk)
    {
        $Inventario = $this->getObject($pk);

        

        if (!$Inventario) {
            throw new NotFoundHttpException("The Invision\SoporteBundle\Model\Inventario with Id $pk can't be found");
        }

        return $this->render('InvisionVentaBundle:InventarioShow:index.html.twig', $this->getAdditionalRenderParameters($Inventario) + array(
            "Inventario" => $Inventario
        ));
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\Inventario $Inventario your \Invision\SoporteBundle\Model\Inventario object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\Inventario $Inventario)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\SoporteBundle\Model\InventarioQuery::create();
    }
}
