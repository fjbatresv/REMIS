<?php

namespace Admingenerated\InvisionInventarioBundle\BaseColorController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;



class ShowController extends BaseController
{
    public function indexAction($pk)
    {
        $Color = $this->getObject($pk);

        

        if (!$Color) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\Color with Id $pk can't be found");
        }

        return $this->render('InvisionInventarioBundle:ColorShow:index.html.twig', $this->getAdditionalRenderParameters($Color) + array(
            "Color" => $Color
        ));
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\Color $Color your \Invision\InventarioBundle\Model\Color object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\InventarioBundle\Model\Color $Color)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\InventarioBundle\Model\ColorQuery::create();
    }
}
