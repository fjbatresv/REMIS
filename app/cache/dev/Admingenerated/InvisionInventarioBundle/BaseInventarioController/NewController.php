<?php

namespace Admingenerated\InvisionInventarioBundle\BaseInventarioController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\InventarioBundle\Form\Type\Inventario\NewType;


class NewController extends BaseController
{
    public function indexAction()
    {
        

        $Inventario = $this->getNewObject();

        $this->preBindRequest($Inventario);
        $form = $this->createForm($this->getNewType(), $Inventario, $this->getFormOptions($Inventario));

        return $this->render('InvisionInventarioBundle:InventarioNew:index.html.twig', $this->getAdditionalRenderParameters($Inventario) + array(
            "Inventario" => $Inventario,
            "form" => $form->createView(),
        ));
    }

    public function createAction()
    {
        

        $Inventario = $this->getNewObject();

        $this->preBindRequest($Inventario);
        $form = $this->createForm($this->getNewType(), $Inventario, $this->getFormOptions($Inventario));
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            try {
                $this->preSave($form, $Inventario);
                $this->saveObject($Inventario);
                $this->postSave($form, $Inventario);

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans("action.object.edit.success", array(), 'Admingenerator') );

                if($this->get('request')->request->has('save-and-add'))
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Inventario_new" ));
                if($this->get('request')->request->has('save-and-list'))
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Inventario_list" ));
                else
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Inventario_edit", array('pk' => $Inventario->getId()) ));
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $Inventario);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionInventarioBundle:InventarioNew:index.html.twig', $this->getAdditionalRenderParameters($Inventario) + array(
            "Inventario" => $Inventario,
            "form" => $form->createView(),
        ));
    }

    /**
     * This method is here to make your life better, so overwrite it
     *
     * @param \Exception $exception throwed exception
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Inventario $Inventario your \Invision\InventarioBundle\Model\Inventario object
     */
    public function onException(\Exception $exception, \Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Inventario $Inventario)
    {
        if ($this->container->getParameter('kernel.debug')) {
            throw $exception;
        }
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Invision\InventarioBundle\Model\Inventario $Inventario your \Invision\InventarioBundle\Model\Inventario object
     */
    public function preBindRequest(\Invision\InventarioBundle\Model\Inventario $Inventario)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Inventario $Inventario your \Invision\InventarioBundle\Model\Inventario object
     */
    public function preSave(\Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Inventario $Inventario)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Inventario $Inventario your \Invision\InventarioBundle\Model\Inventario object
     */
    public function postSave(\Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Inventario $Inventario)
    {
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\Inventario $Inventario your \Invision\InventarioBundle\Model\Inventario object
     * return array
     */
    protected function getAdditionalRenderParameters(\Invision\InventarioBundle\Model\Inventario $Inventario)
    {
        return array();
    }

    /**
     * Get optional form options.
     *
     * @param \Invision\InventarioBundle\Model\Inventario $Inventario your \Invision\InventarioBundle\Model\Inventario object
     * return array
     **/
    protected function getFormOptions(\Invision\InventarioBundle\Model\Inventario $Inventario)
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
        return new \Invision\InventarioBundle\Model\Inventario;
    }

    protected function saveObject(\Invision\InventarioBundle\Model\Inventario $Inventario)
    {
        $Inventario->save();
    }
}
