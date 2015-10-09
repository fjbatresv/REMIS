<?php

namespace Admingenerated\InvisionInventarioBundle\BaseMaterialController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\InventarioBundle\Form\Type\Material\NewType;


class NewController extends BaseController
{
    public function indexAction()
    {
        

        $Material = $this->getNewObject();

        $this->preBindRequest($Material);
        $form = $this->createForm($this->getNewType(), $Material, $this->getFormOptions($Material));

        return $this->render('InvisionInventarioBundle:MaterialNew:index.html.twig', $this->getAdditionalRenderParameters($Material) + array(
            "Material" => $Material,
            "form" => $form->createView(),
        ));
    }

    public function createAction()
    {
        

        $Material = $this->getNewObject();

        $this->preBindRequest($Material);
        $form = $this->createForm($this->getNewType(), $Material, $this->getFormOptions($Material));
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            try {
                $this->preSave($form, $Material);
                $this->saveObject($Material);
                $this->postSave($form, $Material);

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans("action.object.edit.success", array(), 'Admingenerator') );

                if($this->get('request')->request->has('save-and-add'))
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Material_new" ));
                if($this->get('request')->request->has('save-and-list'))
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Material_list" ));
                else
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Material_edit", array('pk' => $Material->getId()) ));
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $Material);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionInventarioBundle:MaterialNew:index.html.twig', $this->getAdditionalRenderParameters($Material) + array(
            "Material" => $Material,
            "form" => $form->createView(),
        ));
    }

    /**
     * This method is here to make your life better, so overwrite it
     *
     * @param \Exception $exception throwed exception
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Material $Material your \Invision\InventarioBundle\Model\Material object
     */
    public function onException(\Exception $exception, \Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Material $Material)
    {
        if ($this->container->getParameter('kernel.debug')) {
            throw $exception;
        }
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Invision\InventarioBundle\Model\Material $Material your \Invision\InventarioBundle\Model\Material object
     */
    public function preBindRequest(\Invision\InventarioBundle\Model\Material $Material)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Material $Material your \Invision\InventarioBundle\Model\Material object
     */
    public function preSave(\Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Material $Material)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Material $Material your \Invision\InventarioBundle\Model\Material object
     */
    public function postSave(\Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Material $Material)
    {
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\Material $Material your \Invision\InventarioBundle\Model\Material object
     * return array
     */
    protected function getAdditionalRenderParameters(\Invision\InventarioBundle\Model\Material $Material)
    {
        return array();
    }

    /**
     * Get optional form options.
     *
     * @param \Invision\InventarioBundle\Model\Material $Material your \Invision\InventarioBundle\Model\Material object
     * return array
     **/
    protected function getFormOptions(\Invision\InventarioBundle\Model\Material $Material)
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
        return new \Invision\InventarioBundle\Model\Material;
    }

    protected function saveObject(\Invision\InventarioBundle\Model\Material $Material)
    {
        $Material->save();
    }
}
