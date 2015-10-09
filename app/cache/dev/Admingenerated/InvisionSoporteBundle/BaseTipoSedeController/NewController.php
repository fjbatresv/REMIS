<?php

namespace Admingenerated\InvisionSoporteBundle\BaseTipoSedeController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\SoporteBundle\Form\Type\TipoSede\NewType;


class NewController extends BaseController
{
    public function indexAction()
    {
        

        $TipoSede = $this->getNewObject();

        $this->preBindRequest($TipoSede);
        $form = $this->createForm($this->getNewType(), $TipoSede, $this->getFormOptions($TipoSede));

        return $this->render('InvisionSoporteBundle:TipoSedeNew:index.html.twig', $this->getAdditionalRenderParameters($TipoSede) + array(
            "TipoSede" => $TipoSede,
            "form" => $form->createView(),
        ));
    }

    public function createAction()
    {
        

        $TipoSede = $this->getNewObject();

        $this->preBindRequest($TipoSede);
        $form = $this->createForm($this->getNewType(), $TipoSede, $this->getFormOptions($TipoSede));
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            try {
                $this->preSave($form, $TipoSede);
                $this->saveObject($TipoSede);
                $this->postSave($form, $TipoSede);

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans("action.object.edit.success", array(), 'Admingenerator') );

                if($this->get('request')->request->has('save-and-add'))
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_new" ));
                if($this->get('request')->request->has('save-and-list'))
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_list" ));
                else
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_edit", array('pk' => $TipoSede->getId()) ));
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $TipoSede);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionSoporteBundle:TipoSedeNew:index.html.twig', $this->getAdditionalRenderParameters($TipoSede) + array(
            "TipoSede" => $TipoSede,
            "form" => $form->createView(),
        ));
    }

    /**
     * This method is here to make your life better, so overwrite it
     *
     * @param \Exception $exception throwed exception
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede your \Invision\SoporteBundle\Model\TipoSede object
     */
    public function onException(\Exception $exception, \Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\TipoSede $TipoSede)
    {
        if ($this->container->getParameter('kernel.debug')) {
            throw $exception;
        }
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede your \Invision\SoporteBundle\Model\TipoSede object
     */
    public function preBindRequest(\Invision\SoporteBundle\Model\TipoSede $TipoSede)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede your \Invision\SoporteBundle\Model\TipoSede object
     */
    public function preSave(\Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\TipoSede $TipoSede)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede your \Invision\SoporteBundle\Model\TipoSede object
     */
    public function postSave(\Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\TipoSede $TipoSede)
    {
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede your \Invision\SoporteBundle\Model\TipoSede object
     * return array
     */
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\TipoSede $TipoSede)
    {
        return array();
    }

    /**
     * Get optional form options.
     *
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede your \Invision\SoporteBundle\Model\TipoSede object
     * return array
     **/
    protected function getFormOptions(\Invision\SoporteBundle\Model\TipoSede $TipoSede)
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
        return new \Invision\SoporteBundle\Model\TipoSede;
    }

    protected function saveObject(\Invision\SoporteBundle\Model\TipoSede $TipoSede)
    {
        $TipoSede->save();
    }
}
