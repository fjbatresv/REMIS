<?php

namespace Admingenerated\InvisionInventarioBundle\BaseMaletaController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\InventarioBundle\Form\Type\Maleta\NewType;


class NewController extends BaseController
{
    public function indexAction()
    {
        

        $Maleta = $this->getNewObject();

        $this->preBindRequest($Maleta);
        $form = $this->createForm($this->getNewType(), $Maleta, $this->getFormOptions($Maleta));

        return $this->render('InvisionInventarioBundle:MaletaNew:index.html.twig', $this->getAdditionalRenderParameters($Maleta) + array(
            "Maleta" => $Maleta,
            "form" => $form->createView(),
        ));
    }

    public function createAction()
    {
        

        $Maleta = $this->getNewObject();

        $this->preBindRequest($Maleta);
        $form = $this->createForm($this->getNewType(), $Maleta, $this->getFormOptions($Maleta));
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            try {
                $this->preSave($form, $Maleta);
                $this->saveObject($Maleta);
                $this->postSave($form, $Maleta);

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans("action.object.edit.success", array(), 'Admingenerator') );

                if($this->get('request')->request->has('save-and-add'))
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Maleta_new" ));
                if($this->get('request')->request->has('save-and-list'))
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Maleta_list" ));
                else
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Maleta_edit", array('pk' => $Maleta->getId()) ));
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $Maleta);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionInventarioBundle:MaletaNew:index.html.twig', $this->getAdditionalRenderParameters($Maleta) + array(
            "Maleta" => $Maleta,
            "form" => $form->createView(),
        ));
    }

    /**
     * This method is here to make your life better, so overwrite it
     *
     * @param \Exception $exception throwed exception
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Maleta $Maleta your \Invision\InventarioBundle\Model\Maleta object
     */
    public function onException(\Exception $exception, \Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Maleta $Maleta)
    {
        if ($this->container->getParameter('kernel.debug')) {
            throw $exception;
        }
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Invision\InventarioBundle\Model\Maleta $Maleta your \Invision\InventarioBundle\Model\Maleta object
     */
    public function preBindRequest(\Invision\InventarioBundle\Model\Maleta $Maleta)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Maleta $Maleta your \Invision\InventarioBundle\Model\Maleta object
     */
    public function preSave(\Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Maleta $Maleta)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Maleta $Maleta your \Invision\InventarioBundle\Model\Maleta object
     */
    public function postSave(\Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Maleta $Maleta)
    {
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\Maleta $Maleta your \Invision\InventarioBundle\Model\Maleta object
     * return array
     */
    protected function getAdditionalRenderParameters(\Invision\InventarioBundle\Model\Maleta $Maleta)
    {
        return array();
    }

    /**
     * Get optional form options.
     *
     * @param \Invision\InventarioBundle\Model\Maleta $Maleta your \Invision\InventarioBundle\Model\Maleta object
     * return array
     **/
    protected function getFormOptions(\Invision\InventarioBundle\Model\Maleta $Maleta)
    {
        return array();
    }

    protected function getNewType()
    {
        $type = new NewType();
        $type->setSecurityContext($this->get('security.context'));

        return $type;
    }
    
    protected function getNewObject()
    {
        return new \Invision\InventarioBundle\Model\Maleta;
    }

    protected function saveObject(\Invision\InventarioBundle\Model\Maleta $Maleta)
    {
        $Maleta->save();
    }
}
