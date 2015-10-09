<?php

namespace Admingenerated\InvisionInventarioBundle\BaseColorController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;

use \PropelException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Invision\InventarioBundle\Form\Type\Color\EditType;


class EditController extends BaseController
{
    public function indexAction($pk)
    {
        $Color = $this->getObject($pk);

        
        

        if (!$Color) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\Color with Id $pk can't be found");
        }

        $this->preBindRequest($Color);
        $form = $this->createForm($this->getEditType(), $Color, $this->getFormOptions($Color));

        return $this->render('InvisionInventarioBundle:ColorEdit:index.html.twig', $this->getAdditionalRenderParameters($Color) + array(
            "Color" => $Color,
            "form" => $form->createView(),
        ));
    }

    public function updateAction($pk)
    {
        $Color = $this->getObject($pk);

        

        if (!$Color) {
            throw new NotFoundHttpException("The Invision\InventarioBundle\Model\Color with Id $pk can't be found");
        }

        $this->preBindRequest($Color);
        $form = $this->createForm($this->getEditType(), $Color, $this->getFormOptions($Color));
        $form->bind($this->get('request'));

        if ($form->isValid()) {
            try {
                
                $this->preSave($form, $Color);
                $this->saveObject($Color);
                $this->postSave($form, $Color);

                $this->get('session')->getFlashBag()->add('success', $this->get('translator')->trans("action.object.edit.success", array(), 'Admingenerator') );

                if($this->get('request')->request->has('save-and-add'))
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Color_new" ));
                if($this->get('request')->request->has('save-and-list'))
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Color_list" ));
                else
                  return new RedirectResponse($this->generateUrl("Invision_InventarioBundle_Color_edit", array('pk' => $pk) ));

                        } catch (\Exception $e) {
                $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
                $this->onException($e, $form, $Color);
            }

        } else {
            $this->get('session')->getFlashBag()->add('error',  $this->get('translator')->trans("action.object.edit.error", array(), 'Admingenerator') );
        }

        return $this->render('InvisionInventarioBundle:ColorEdit:index.html.twig', $this->getAdditionalRenderParameters($Color) + array(
            "Color" => $Color,
            "form" => $form->createView(),
        ));
    }

    /**
     * This method is here to make your life better, so overwrite it
     *
     * @param \Exception $exception throwed exception
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Color $Color your \Invision\InventarioBundle\Model\Color object
     */
    public function onException(\Exception $exception, \Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Color $Color)
    {
        if ($this->container->getParameter('kernel.debug')) {
            throw $exception;
        }
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Invision\InventarioBundle\Model\Color $Color your \Invision\InventarioBundle\Model\Color object
     */
    public function preBindRequest(\Invision\InventarioBundle\Model\Color $Color)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Color $Color your \Invision\InventarioBundle\Model\Color object
     */
    public function preSave(\Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Color $Color)
    {
    }

    /**
     * This method is here to make your life better, so overwrite  it
     *
     * @param \Symfony\Component\Form\Form $form the valid form
     * @param \Invision\InventarioBundle\Model\Color $Color your \Invision\InventarioBundle\Model\Color object
     */
    public function postSave(\Symfony\Component\Form\Form $form, \Invision\InventarioBundle\Model\Color $Color)
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
     * @param \Invision\InventarioBundle\Model\Color $Color your \Invision\InventarioBundle\Model\Color object
     * return array
     **/
    protected function getAdditionalRenderParameters(\Invision\InventarioBundle\Model\Color $Color)
    {
        return array();
    }

    /**
     * Get optional form options.
     *
     * @param \Invision\InventarioBundle\Model\Color $Color your \Invision\InventarioBundle\Model\Color object
     * return array
     **/
    protected function getFormOptions(\Invision\InventarioBundle\Model\Color $Color)
    {
        return array();
    }

    protected function getObject($pk)
    {
        return $this->getQuery($pk)->findPk($pk);
    }

    protected function getQuery($pk)
    {
        return \Invision\InventarioBundle\Model\ColorQuery::create();
    }

    protected function saveObject(\Invision\InventarioBundle\Model\Color $Color)
    {
        $Color->save();
    }

        protected function getVersions()
    {
        return $this->get('session')->get('Invision\InventarioBundle\ColorEdit\Versions', array());
    }
    
        protected function setVersions($versions = array())
    {
        $this->get('session')->set('Invision\InventarioBundle\ColorEdit\Versions', $versions);
    }
    
        protected function saveVersion($pk, $version)
    {
        $versions = $this->getVersions();
        $versions[$pk] = $version;
        $this->setVersions($versions);
    }
    
}
