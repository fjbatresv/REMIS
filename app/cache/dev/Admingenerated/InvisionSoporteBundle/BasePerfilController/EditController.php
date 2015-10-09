<?php

namespace Admingenerated\InvisionSoporteBundle\BasePerfilController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;

use \PropelException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\SoporteBundle\Form\Type\Perfil\EditType;


class EditController extends BaseController
{
    public function indexAction($pk)
    {
        $Perfil = $this->getObject($pk);

        
        

        if (!$Perfil) {
            throw new NotFoundHttpException("The Invision\SoporteBundle\Model\Perfil with Id $pk can't be found");
        }

        $this->preBindRequest($Perfil);
        $form = $this->createForm($this->getEditType(), $Perfil, $this->getFormOptions($Perfil));

        return $this->render('InvisionSoporteBundle:PerfilEdit:index.html.twig', $this->getAdditionalRenderParameters($Perfil) + array(
            "Perfil" => $Perfil,
            "form" => $form->createView(),
        ));
    }

    public function updateAction($pk)
    {
        $Perfil = $this->getObject($pk);

        

        if (!$Perfil) {
            throw new NotFoundHttpException("The Invision\SoporteBundle\Model\Perfil with Id $pk can't be found");
        }

        $this->preBindRequest($Perfil);
        $form = $this->createForm($this->getEditType(), $Perfil, $this->getFormOptions($Perfil));
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            try {
                
                $this->preSave($form, $Perfil);
                $this->saveObject($Perfil);
                $this->postSave($form, $Perfil);

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans("action.object.edit.success", array(), 'Admingenerator') );

                if($this->get('request')->request->has('save-and-add'))
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_Perfil_new" ));
                if($this->get('request')->request->has('save-and-list'))
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_Perfil_list" ));
                else
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_Perfil_edit", array('pk' => $pk) ));

                        } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $Perfil);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionSoporteBundle:PerfilEdit:index.html.twig', $this->getAdditionalRenderParameters($Perfil) + array(
            "Perfil" => $Perfil,
            "form" => $form->createView(),
        ));
    }

    /**
     * This method is here to make your life better, so overwrite it
     *
     * @param \Exception $exception throwed exception
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Perfil $Perfil your \Invision\SoporteBundle\Model\Perfil object
     */
    public function onException(\Exception $exception, \Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Perfil $Perfil)
    {
        if ($this->container->getParameter('kernel.debug')) {
            throw $exception;
        }
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Invision\SoporteBundle\Model\Perfil $Perfil your \Invision\SoporteBundle\Model\Perfil object
     */
    public function preBindRequest(\Invision\SoporteBundle\Model\Perfil $Perfil)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Perfil $Perfil your \Invision\SoporteBundle\Model\Perfil object
     */
    public function preSave(\Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Perfil $Perfil)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\SoporteBundle\Model\Perfil $Perfil your \Invision\SoporteBundle\Model\Perfil object
     */
    public function postSave(\Symfony\Component\Form\Form $form, \Invision\SoporteBundle\Model\Perfil $Perfil)
    {
    }


    protected function getEditType()
    {
        $type = new EditType();
        $type->setSecurityContext($this->get('security.context'));

        return $type;
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\Perfil $Perfil your \Invision\SoporteBundle\Model\Perfil object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\Perfil $Perfil)
    {
        return array();
    }

    /**
     * Get optional form options.
     *
     * @param \Invision\SoporteBundle\Model\Perfil $Perfil your \Invision\SoporteBundle\Model\Perfil object
     * return array
     **/
    protected function getFormOptions(\Invision\SoporteBundle\Model\Perfil $Perfil)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\SoporteBundle\Model\PerfilQuery::create();
    }

    protected function saveObject(\Invision\SoporteBundle\Model\Perfil $Perfil)
    {
        $Perfil->save();
    }

        protected function getVersions()
    {
        return $this->get('session')->get('Invision\SoporteBundle\PerfilEdit\Versions', array());
    }
    
        protected function setVersions($versions = array())
    {
        $this->get('session')->set('Invision\SoporteBundle\PerfilEdit\Versions', $versions);
    }
    
        protected function saveVersion($pk, $version)
    {
        $versions = $this->getVersions();
        $versions[$pk] = $version;
        $this->setVersions($versions);
    }
    
}
