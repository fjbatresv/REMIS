<?php

namespace Admingenerated\InvisionInventarioBundle\BaseProcesoExtraController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ShowController extends BaseController
{
    public function indexAction($pk)
    {
        $ProcesoExtra = $this->getObject($pk);

        

        if (!$ProcesoExtra) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\ProcesoExtra with Id $pk can't be found");
        }

        return $this->render('InvisionInventarioBundle:ProcesoExtraShow:index.html.twig', $this->getAdditionalRenderParameters($ProcesoExtra) + array(
            "ProcesoExtra" => $ProcesoExtra
        ));
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra your \Invision\InventarioBundle\Model\ProcesoExtra object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\InventarioBundle\Model\ProcesoExtraQuery::create();
    }
}
