<?php

namespace Admingenerated\InvisionSoporteBundle\BasePerfilController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ShowController extends BaseController
{
    public function indexAction($pk)
    {
        $Perfil = $this->getObject($pk);

        

        if (!$Perfil) {
            throw new NotFoundHttpException("The Invision\SoporteBundle\Model\Perfil with Id $pk can't be found");
        }

        return $this->render('InvisionSoporteBundle:PerfilShow:index.html.twig', $this->getAdditionalRenderParameters($Perfil) + array(
            "Perfil" => $Perfil
        ));
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\Perfil $Perfil your \Invision\SoporteBundle\Model\Perfil object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\Perfil $Perfil)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\SoporteBundle\Model\PerfilQuery::create();
    }
}
