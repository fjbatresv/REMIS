<?php

namespace Admingenerated\InvisionSoporteBundle\BaseSedeController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\SoporteBundle\Form\Type\Sede\NewType;


class NewController extends BaseController
{
    public function indexAction()
    {
        

        $Sede = $this->getNewObject();

        $this->preBindRequest($Sede);
        $form = $this->createForm($this->getNewType(), $Sede, $this->getFormOptions($Sede));

        return $this->render('InvisionSoporteBundle:SedeNew:index.html.twig', $this->getAdditionalRenderParameters($Sede) + array(
            "Sede" => $Sede,
            "form" => $form->createView(),
        ));
    }

    public function createAction()
    {
        

        $Sede = $this->getNewObject();

        $this->preBindRequest($Sede);
        $form = $this->createForm($this->getNewType(), $Sede, $this->getFormOptions($Sede));
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            try {
                $this->preSave($form, $Sede);
                $this->saveObject($Sede);
                $this->postSave($form, $Sede);

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans("action.object.edit.success", array(), 'Admingenerator') );

                if($this->get('request')->request->has('save-and-add'))
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_Sede_new" ));
                if($this->get('request')->request->has('save-and-list'))
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_Sede_list" ));
                else
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_Sede_edit", array('pk' => $Sede->getId()) ));
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $Sede);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionSoporteBundle:SedeNew:index.html.twig', $this->getAdditionalRenderParameters($Sede) + array(
            "Sede" => $Sede,
            "form" => $form->createView(),
        ));
    }

    /**
     * This method is here to make your life better, so overwrite it
     *
     * @param \Exception $exception throwed exception
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Sede $Sede your \Invision\SoporteBundle\Model\Sede object
     */
    public function onException(\Exception $exception, \Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Sede $Sede)
    {
        if ($this->container->getParameter('kernel.debug')) {
            throw $exception;
        }
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Invision\SoporteBundle\Model\Sede $Sede your \Invision\SoporteBundle\Model\Sede object
     */
    public function preBindRequest(\Invision\SoporteBundle\Model\Sede $Sede)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Sede $Sede your \Invision\SoporteBundle\Model\Sede object
     */
    public function preSave(\Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Sede $Sede)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Sede $Sede your \Invision\SoporteBundle\Model\Sede object
     */
    public function postSave(\Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Sede $Sede)
    {
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\Sede $Sede your \Invision\SoporteBundle\Model\Sede object
     * return array
     */
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\Sede $Sede)
    {
        return array();
    }

    /**
     * Get optional form options.
     *
     * @param \Invision\SoporteBundle\Model\Sede $Sede your \Invision\SoporteBundle\Model\Sede object
     * return array
     **/
    protected function getFormOptions(\Invision\SoporteBundle\Model\Sede $Sede)
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
        return new \Invision\SoporteBundle\Model\Sede;
    }

    protected function saveObject(\Invision\SoporteBundle\Model\Sede $Sede)
    {
        $Sede->save();
    }
}
