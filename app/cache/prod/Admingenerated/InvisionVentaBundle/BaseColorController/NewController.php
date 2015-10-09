<?php

namespace Admingenerated\InvisionVentaBundle\BaseColorController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\VentaBundle\Form\Type\Color\NewType;


class NewController extends BaseController
{
    public function indexAction()
    {
        

        $Color = $this->getNewObject();

        $this->preBindRequest($Color);
        $form = $this->createForm($this->getNewType(), $Color, $this->getFormOptions($Color));

        return $this->render('InvisionVentaBundle:ColorNew:index.html.twig', $this->getAdditionalRenderParameters($Color) + array(
            "Color" => $Color,
            "form" => $form->createView(),
        ));
    }

    public function createAction()
    {
        

        $Color = $this->getNewObject();

        $this->preBindRequest($Color);
        $form = $this->createForm($this->getNewType(), $Color, $this->getFormOptions($Color));
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            try {
                $this->preSave($form, $Color);
                $this->saveObject($Color);
                $this->postSave($form, $Color);

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans("action.object.edit.success", array(), 'Admingenerator') );

                if($this->get('request')->request->has('save-and-add'))
                  return new RedirectResponse($this->generateUrl("Invision_VentaBundle_Color_new" ));
                if($this->get('request')->request->has('save-and-list'))
                  return new RedirectResponse($this->generateUrl("Invision_VentaBundle_Color_list" ));
                else
                  return new RedirectResponse($this->generateUrl("Invision_VentaBundle_Color_edit", array('pk' => $Color->getId()) ));
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $Color);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionVentaBundle:ColorNew:index.html.twig', $this->getAdditionalRenderParameters($Color) + array(
            "Color" => $Color,
            "form" => $form->createView(),
        ));
    }

    /**
     * This method is here to make your life better, so overwrite it
     *
     * @param \Exception $exception throwed exception
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Color $Color your \Invision\SoporteBundle\Model\Color object
     */
    public function onException(\Exception $exception, \Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Color $Color)
    {
        if ($this->container->getParameter('kernel.debug')) {
            throw $exception;
        }
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Invision\SoporteBundle\Model\Color $Color your \Invision\SoporteBundle\Model\Color object
     */
    public function preBindRequest(\Invision\SoporteBundle\Model\Color $Color)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Color $Color your \Invision\SoporteBundle\Model\Color object
     */
    public function preSave(\Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Color $Color)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Color $Color your \Invision\SoporteBundle\Model\Color object
     */
    public function postSave(\Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Color $Color)
    {
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\Color $Color your \Invision\SoporteBundle\Model\Color object
     * return array
     */
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\Color $Color)
    {
        return array();
    }

    /**
     * Get optional form options.
     *
     * @param \Invision\SoporteBundle\Model\Color $Color your \Invision\SoporteBundle\Model\Color object
     * return array
     **/
    protected function getFormOptions(\Invision\SoporteBundle\Model\Color $Color)
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
        return new \Invision\SoporteBundle\Model\Color;
    }

    protected function saveObject(\Invision\SoporteBundle\Model\Color $Color)
    {
        $Color->save();
    }
}
