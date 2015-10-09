<?php

namespace Admingenerated\InvisionSoporteBundle\BaseUsuarioController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ShowController extends BaseController
{
    public function indexAction($pk)
    {
        $Usuario = $this->getObject($pk);

        

        if (!$Usuario) {
            throw new NotFoundHttpException("The Invision\SoporteBundle\Model\Usuario with Id $pk can't be found");
        }

        return $this->render('InvisionSoporteBundle:UsuarioShow:index.html.twig', $this->getAdditionalRenderParameters($Usuario) + array(
            "Usuario" => $Usuario
        ));
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\Usuario $Usuario your \Invision\SoporteBundle\Model\Usuario object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\Usuario $Usuario)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\SoporteBundle\Model\UsuarioQuery::create();
    }
}
