<?php

namespace Admingenerated\InvisionSoporteBundle\BaseTipoSedeController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;

use \PropelException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\SoporteBundle\Form\Type\TipoSede\EditType;


class EditController extends BaseController
{
    public function indexAction($pk)
    {
        $TipoSede = $this->getObject($pk);

        
        

        if (!$TipoSede) {
            throw new NotFoundHttpException("The Invision\SoporteBundle\Model\TipoSede with Id $pk can't be found");
        }

        $this->preBindRequest($TipoSede);
        $form = $this->createForm($this->getEditType(), $TipoSede, $this->getFormOptions($TipoSede));

        return $this->render('InvisionSoporteBundle:TipoSedeEdit:index.html.twig', $this->getAdditionalRenderParameters($TipoSede) + array(
            "TipoSede" => $TipoSede,
            "form" => $form->createView(),
        ));
    }

    public function updateAction($pk)
    {
        $TipoSede = $this->getObject($pk);

        

        if (!$TipoSede) {
            throw new NotFoundHttpException("The Invision\SoporteBundle\Model\TipoSede with Id $pk can't be found");
        }

        $this->preBindRequest($TipoSede);
        $form = $this->createForm($this->getEditType(), $TipoSede, $this->getFormOptions($TipoSede));
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
                  return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_edit", array('pk' => $pk) ));

                        } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $TipoSede);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionSoporteBundle:TipoSedeEdit:index.html.twig', $this->getAdditionalRenderParameters($TipoSede) + array(
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


    protected function getEditType()
    {
        $type = new EditType();
        $type->setSecurityContext($this->get('security.context'));

        return $type;
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede your \Invision\SoporteBundle\Model\TipoSede object
     * return array
     **/
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

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\SoporteBundle\Model\TipoSedeQuery::create();
    }

    protected function saveObject(\Invision\SoporteBundle\Model\TipoSede $TipoSede)
    {
        $TipoSede->save();
    }

        protected function getVersions()
    {
        return $this->get('session')->get('Invision\SoporteBundle\TipoSedeEdit\Versions', array());
    }
    
        protected function setVersions($versions = array())
    {
        $this->get('session')->set('Invision\SoporteBundle\TipoSedeEdit\Versions', $versions);
    }
    
        protected function saveVersion($pk, $version)
    {
        $versions = $this->getVersions();
        $versions[$pk] = $version;
        $this->setVersions($versions);
    }
    
}
