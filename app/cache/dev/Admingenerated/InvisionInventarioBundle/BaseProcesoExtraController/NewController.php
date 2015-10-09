<?php

namespace Admingenerated\InvisionInventarioBundle\BaseProcesoExtraController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\InventarioBundle\Form\Type\ProcesoExtra\NewType;


class NewController extends BaseController
{
    public function indexAction()
    {
        

        $ProcesoExtra = $this->getNewObject();

        $this->preBindRequest($ProcesoExtra);
        $form = $this->createForm($this->getNewType(), $ProcesoExtra, $this->getFormOptions($ProcesoExtra));

        return $this->render('InvisionInventarioBundle:ProcesoExtraNew:index.html.twig', $this->getAdditionalRenderParameters($ProcesoExtra) + array(
            "ProcesoExtra" => $ProcesoExtra,
            "form" => $form->createView(),
        ));
    }

    public function createAction()
    {
        

        $ProcesoExtra = $this->getNewObject();

        $this->preBindRequest($ProcesoExtra);
        $form = $this->createForm($this->getNewType(), $ProcesoExtra, $this->getFormOptions($ProcesoExtra));
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            try {
                $this->preSave($form, $ProcesoExtra);
                $this->saveObject($ProcesoExtra);
                $this->postSave($form, $ProcesoExtra);

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans("action.object.edit.success", array(), 'Admingenerator') );

                if($this->get('request')->request->has('save-and-add'))
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_ProcesoExtra_new" ));
                if($this->get('request')->request->has('save-and-list'))
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_ProcesoExtra_list" ));
                else
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_ProcesoExtra_edit", array('pk' => $ProcesoExtra->getId()) ));
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $ProcesoExtra);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionInventarioBundle:ProcesoExtraNew:index.html.twig', $this->getAdditionalRenderParameters($ProcesoExtra) + array(
            "ProcesoExtra" => $ProcesoExtra,
            "form" => $form->createView(),
        ));
    }

    /**
     * This method is here to make your life better, so overwrite it
     *
     * @param \Exception $exception throwed exception
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra your \Invision\InventarioBundle\Model\ProcesoExtra object
     */
    public function onException(\Exception $exception, \Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra)
    {
        if ($this->container->getParameter('kernel.debug')) {
            throw $exception;
        }
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra your \Invision\InventarioBundle\Model\ProcesoExtra object
     */
    public function preBindRequest(\Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra your \Invision\InventarioBundle\Model\ProcesoExtra object
     */
    public function preSave(\Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra your \Invision\InventarioBundle\Model\ProcesoExtra object
     */
    public function postSave(\Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra)
    {
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra your \Invision\InventarioBundle\Model\ProcesoExtra object
     * return array
     */
    protected function getAdditionalRenderParameters(\Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra)
    {
        return array();
    }

    /**
     * Get optional form options.
     *
     * @param \Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra your \Invision\InventarioBundle\Model\ProcesoExtra object
     * return array
     **/
    protected function getFormOptions(\Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra)
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
        return new \Invision\InventarioBundle\Model\ProcesoExtra;
    }

    protected function saveObject(\Invision\InventarioBundle\Model\ProcesoExtra $ProcesoExtra)
    {
        $ProcesoExtra->save();
    }
}
