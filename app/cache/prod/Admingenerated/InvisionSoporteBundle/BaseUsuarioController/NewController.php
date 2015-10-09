<?php

namespace Admingenerated\InvisionSoporteBundle\BaseUsuarioController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\SoporteBundle\Form\Type\Usuario\NewType;


class NewController extends BaseController
{
    public function indexAction()
    {
        

        $Usuario = $this->getNewObject();

        $this->preBindRequest($Usuario);
        $form = $this->createForm($this->getNewType(), $Usuario, $this->getFormOptions($Usuario));

        return $this->render('InvisionSoporteBundle:UsuarioNew:index.html.twig', $this->getAdditionalRenderParameters($Usuario) + array(
            "Usuario" => $Usuario,
            "form" => $form->createView(),
        ));
    }

    public function createAction()
    {
        

        $Usuario = $this->getNewObject();

        $this->preBindRequest($Usuario);
        $form = $this->createForm($this->getNewType(), $Usuario, $this->getFormOptions($Usuario));
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            try {
                $this->preSave($form, $Usuario);
                $this->saveObject($Usuario);
                $this->postSave($form, $Usuario);

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans("action.object.edit.success", array(), 'Admingenerator') );

                if($this->get('request')->request->has('save-and-add'))
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_Usuario_new" ));
                if($this->get('request')->request->has('save-and-list'))
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_Usuario_list" ));
                else
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_Usuario_edit", array('pk' => $Usuario->getId()) ));
            } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $Usuario);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error', $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionSoporteBundle:UsuarioNew:index.html.twig', $this->getAdditionalRenderParameters($Usuario) + array(
            "Usuario" => $Usuario,
            "form" => $form->createView(),
        ));
    }

    /**
     * This method is here to make your life better, so overwrite it
     *
     * @param \Exception $exception throwed exception
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Usuario $Usuario your \Invision\SoporteBundle\Model\Usuario object
     */
    public function onException(\Exception $exception, \Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Usuario $Usuario)
    {
        if ($this->container->getParameter('kernel.debug')) {
            throw $exception;
        }
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Invision\SoporteBundle\Model\Usuario $Usuario your \Invision\SoporteBundle\Model\Usuario object
     */
    public function preBindRequest(\Invision\SoporteBundle\Model\Usuario $Usuario)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Usuario $Usuario your \Invision\SoporteBundle\Model\Usuario object
     */
    public function preSave(\Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Usuario $Usuario)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Usuario $Usuario your \Invision\SoporteBundle\Model\Usuario object
     */
    public function postSave(\Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Usuario $Usuario)
    {
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\Usuario $Usuario your \Invision\SoporteBundle\Model\Usuario object
     * return array
     */
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\Usuario $Usuario)
    {
        return array();
    }

    /**
     * Get optional form options.
     *
     * @param \Invision\SoporteBundle\Model\Usuario $Usuario your \Invision\SoporteBundle\Model\Usuario object
     * return array
     **/
    protected function getFormOptions(\Invision\SoporteBundle\Model\Usuario $Usuario)
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
        return new \Invision\SoporteBundle\Model\Usuario;
    }

    protected function saveObject(\Invision\SoporteBundle\Model\Usuario $Usuario)
    {
        $Usuario->save();
    }
}
