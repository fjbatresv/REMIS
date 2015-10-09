<?php

namespace Admingenerated\InvisionInventarioBundle\BaseMaterialController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;

use \PropelException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\InventarioBundle\Form\Type\Material\EditType;


class EditController extends BaseController
{
    public function indexAction($pk)
    {
        $Material = $this->getObject($pk);

        
        

        if (!$Material) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\Material with Id $pk can't be found");
        }

        $this->preBindRequest($Material);
        $form = $this->createForm($this->getEditType(), $Material, $this->getFormOptions($Material));

        return $this->render('InvisionInventarioBundle:MaterialEdit:index.html.twig', $this->getAdditionalRenderParameters($Material) + array(
            "Material" => $Material,
            "form" => $form->createView(),
        ));
    }

    public function updateAction($pk)
    {
        $Material = $this->getObject($pk);

        

        if (!$Material) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\Material with Id $pk can't be found");
        }

        $this->preBindRequest($Material);
        $form = $this->createForm($this->getEditType(), $Material, $this->getFormOptions($Material));
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
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Material_edit", array('pk' => $pk) ));

                        } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $Material);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionInventarioBundle:MaterialEdit:index.html.twig', $this->getAdditionalRenderParameters($Material) + array(
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


    protected function getEditType()
    {
        $type = new EditType();
        $type->setSecurityContext($this->get('security.context'));

        return $type;
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\Material $Material your \Invision\InventarioBundle\Model\Material object
     * return array
     **/
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

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\InventarioBundle\Model\MaterialQuery::create();
    }

    protected function saveObject(\Invision\InventarioBundle\Model\Material $Material)
    {
        $Material->save();
    }

        protected function getVersions()
    {
        return $this->get('session')->get('Invision\InventarioBundle\MaterialEdit\Versions', array());
    }
    
        protected function setVersions($versions = array())
    {
        $this->get('session')->set('Invision\InventarioBundle\MaterialEdit\Versions', $versions);
    }
    
        protected function saveVersion($pk, $version)
    {
        $versions = $this->getVersions();
        $versions[$pk] = $version;
        $this->setVersions($versions);
    }
    
}
