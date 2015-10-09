<?php

namespace Admingenerated\InvisionInventarioBundle\BaseMaletaController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ShowController extends BaseController
{
    public function indexAction($pk)
    {
        $Maleta = $this->getObject($pk);

        

        if (!$Maleta) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\Maleta with Id $pk can't be found");
        }

        return $this->render('InvisionInventarioBundle:MaletaShow:index.html.twig', $this->getAdditionalRenderParameters($Maleta) + array(
            "Maleta" => $Maleta
        ));
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\Maleta $Maleta your \Invision\InventarioBundle\Model\Maleta object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\InventarioBundle\Model\Maleta $Maleta)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\InventarioBundle\Model\MaletaQuery::create();
    }
}
