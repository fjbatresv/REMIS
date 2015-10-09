<?php

namespace Admingenerated\InvisionInventarioBundle\BaseInventarioController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;

use \PropelException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\InventarioBundle\Form\Type\Inventario\EditType;


class EditController extends BaseController
{
    public function indexAction($pk)
    {
        $Inventario = $this->getObject($pk);

        
        

        if (!$Inventario) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\Inventario with Id $pk can't be found");
        }

        $this->preBindRequest($Inventario);
        $form = $this->createForm($this->getEditType(), $Inventario, $this->getFormOptions($Inventario));

        return $this->render('InvisionInventarioBundle:InventarioEdit:index.html.twig', $this->getAdditionalRenderParameters($Inventario) + array(
            "Inventario" => $Inventario,
            "form" => $form->createView(),
        ));
    }

    public function updateAction($pk)
    {
        $Inventario = $this->getObject($pk);

        

        if (!$Inventario) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\Inventario with Id $pk can't be found");
        }

        $this->preBindRequest($Inventario);
        $form = $this->createForm($this->getEditType(), $Inventario, $this->getFormOptions($Inventario));
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
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Inventario_edit", array('pk' => $pk) ));

                        } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $Inventario);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionInventarioBundle:InventarioEdit:index.html.twig', $this->getAdditionalRenderParameters($Inventario) + array(
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


    protected function getEditType()
    {
        $type = new EditType();
        $type->setSecurityContext($this->get('security.context'));

        return $type;
    }


    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\InventarioBundle\Model\Inventario $Inventario your \Invision\InventarioBundle\Model\Inventario object
     * return array
     **/
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

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\InventarioBundle\Model\InventarioQuery::create();
    }

    protected function saveObject(\Invision\InventarioBundle\Model\Inventario $Inventario)
    {
        $Inventario->save();
    }

        protected function getVersions()
    {
        return $this->get('session')->get('Invision\InventarioBundle\InventarioEdit\Versions', array());
    }
    
        protected function setVersions($versions = array())
    {
        $this->get('session')->set('Invision\InventarioBundle\InventarioEdit\Versions', $versions);
    }
    
        protected function saveVersion($pk, $version)
    {
        $versions = $this->getVersions();
        $versions[$pk] = $version;
        $this->setVersions($versions);
    }
    
}
