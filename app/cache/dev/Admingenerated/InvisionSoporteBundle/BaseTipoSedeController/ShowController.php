<?php

namespace Admingenerated\InvisionSoporteBundle\BaseTipoSedeController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ShowController extends BaseController
{
    public function indexAction($pk)
    {
        $TipoSede = $this->getObject($pk);

        

        if (!$TipoSede) {
            throw new NotFoundHttpException("The Invision\SoporteBundle\Model\TipoSede with Id $pk can't be found");
        }

        return $this->render('InvisionSoporteBundle:TipoSedeShow:index.html.twig', $this->getAdditionalRenderParameters($TipoSede) + array(
            "TipoSede" => $TipoSede
        ));
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede your \Invision\SoporteBundle\Model\TipoSede object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\TipoSede $TipoSede)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\SoporteBundle\Model\TipoSedeQuery::create();
    }
}
