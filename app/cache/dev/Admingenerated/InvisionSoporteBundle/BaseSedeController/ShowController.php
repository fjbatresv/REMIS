<?php

namespace Admingenerated\InvisionSoporteBundle\BaseSedeController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ShowController extends BaseController
{
    public function indexAction($pk)
    {
        $Sede = $this->getObject($pk);

        

        if (!$Sede) {
            throw new NotFoundHttpException("The Invision\SoporteBundle\Model\Sede with Id $pk can't be found");
        }

        return $this->render('InvisionSoporteBundle:SedeShow:index.html.twig', $this->getAdditionalRenderParameters($Sede) + array(
            "Sede" => $Sede
        ));
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\Sede $Sede your \Invision\SoporteBundle\Model\Sede object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\Sede $Sede)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\SoporteBundle\Model\SedeQuery::create();
    }
}
