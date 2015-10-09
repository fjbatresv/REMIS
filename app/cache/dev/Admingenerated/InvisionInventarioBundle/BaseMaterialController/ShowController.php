<?php

namespace Admingenerated\InvisionInventarioBundle\BaseMaterialController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ShowController extends BaseController
{
    public function indexAction($pk)
    {
        $Material = $this->getObject($pk);

        

        if (!$Material) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\Material with Id $pk can't be found");
        }

        return $this->render('InvisionInventarioBundle:MaterialShow:index.html.twig', $this->getAdditionalRenderParameters($Material) + array(
            "Material" => $Material
        ));
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\Material $Material your \Invision\InventarioBundle\Model\Material object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\InventarioBundle\Model\Material $Material)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\InventarioBundle\Model\MaterialQuery::create();
    }
}
