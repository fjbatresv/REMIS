<?php

namespace Admingenerated\InvisionSoporteBundle\BaseTipoSedeController;

use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;




class ActionsController extends BaseController
{
    /**
     * Call custom object action based on $action parameter
     */
    public function objectAction($pk, $action)
    {
        $methodName = 'attemptObject'.ucfirst(strtolower($this->cleanMethodName($action)));
        if (!method_exists($this, $methodName)) {
            throw new NotFoundHttpException(sprintf('Undefined "%s" method. Does object action "%s" exist in your generator file?', $methodName, $action));
        }

        return $this->$methodName($pk);
    }

    /**
     * Call custom batch action based on $action parameter
     */
    public function batchAction()
    {
        $action = $this->get('request')->get('action');
        $selected = $this->get('request')->get('selected');

        if (!$selected || !$action) {
            $this->get('session')->getFlashBag()->add(
                'warning',
                $this->get('translator')->trans(
                    "action.batch.warning",
                    array(),
                    'Admingenerator'
                )
            );

            return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_list"));
        }

        $methodName = 'attemptBatch'.ucfirst(strtolower($this->cleanMethodName($action)));
        if (!method_exists($this, $methodName)) {
            throw new NotFoundHttpException(sprintf('Undefined "%s" method. Does batch action "%s" exist in your generator file?', $methodName, $action));
        }

        return $this->$methodName($selected);
    }

            
    /**
     * This function handles common object actions behaviour like
     * checking CSRF protection token or credentials.
     *
     * To customize your action look into:
     * executeObjectDelete() - holds action logic
     * successObjectDelete() - called if action was successfull
     * errorObjectDelete()   - called if action errored
     */
    protected function attemptObjectDelete($pk)
    {
        $TipoSede = $this->getObject($pk);

        try {
                if ('POST' == $this->get('request')->getMethod()) {
                // Check CSRF token for action
$intention = $this->getRequest()->getRequestUri();
$this->isCsrfTokenValid($intention);


                $this->executeObjectDelete($TipoSede);

                return $this->successObjectDelete($TipoSede);
            }

        } catch (\Exception $e) {
            return $this->errorObjectDelete($e, $TipoSede);
        }

        return $this->render(
            'InvisionSoporteBundle:TipoSedeActions:index.html.twig',
            $this->getAdditionalRenderParameters($TipoSede, 'delete') + array(
                "TipoSede" => $TipoSede,
                "title" => $this->get('translator')->trans(
                    "action.object.delete.confirm",
                    array('%name%' => 'delete'),
                    'Admingenerator'
                ),
                "actionRoute" => "Invision_SoporteBundle_TipoSede_object",
                "actionParams" => array("pk" => $pk, "action" => "delete")
            )
        );
    }


    protected function executeObjectDelete(\Invision\SoporteBundle\Model\TipoSede $TipoSede)
    {
        $TipoSede->delete();
    }


    /**
     * This is called when action is successfull
     * Default behavior is redirecting to list with success message
     *
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede Your \Invision\SoporteBundle\Model\TipoSede object
     * @return Response Must return a response!
     */
    protected function successObjectDelete(\Invision\SoporteBundle\Model\TipoSede $TipoSede)
    {
        $this->get('session')->getFlashBag()->add(
            'success',
            $this->get('translator')->trans(
                "action.object.delete.success",
                array('%name%' => 'delete'),
                'Admingenerator'
            )
        );

        return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_list"));
    }


    /**
     * This is called when action throws an exception
     * Default behavior is redirecting to list with error message
     *
     * @param \Exception $e Exception
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede Your \Invision\SoporteBundle\Model\TipoSede object
     * @return Response Must return a response!
     */
    protected function errorObjectDelete(\Exception $e, \Invision\SoporteBundle\Model\TipoSede $TipoSede = null)
    {
        $this->get('session')->getFlashBag()->add(
            'error',
            $this->get('translator')->trans(
                "action.object.delete.error",
                array('%name%' => 'delete'),
                'Admingenerator'
            )
        );

        return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_list"));
    }

    
                
    /**
     * This function handles common batch actions behaviour like
     * checking CSRF protection token or credentials.
     *
     * @param array $selected Selected \Invision\SoporteBundle\Model\TipoSede primary keys
     *
     * To customize your action look into:
     * executeBatchDelete() - holds action logic
     * successBatchDelete() - called if action was successfull
     * errorBatchDelete()   - called if action errored
     */
    protected function attemptBatchDelete(array $selected)
    {
        try {
                
            
            // Check CSRF token for batch action
$intention = 'Invision_SoporteBundle_TipoSede_batch';
$this->isCsrfTokenValid($intention);


            $this->executeBatchDelete($selected);

            return $this->successBatchDelete();

        } catch (\Exception $e) {
            return $this->errorBatchDelete($e);
        }
    }
    

    protected function executeBatchDelete(array $selected)
    {
        \Invision\SoporteBundle\Model\TipoSedeQuery::create()
            ->filterByPrimaryKeys($selected)
            ->delete();
    }

    
    /**
     * This is called when batch action is successfull
     * Default behavior is redirecting to list with success message
     *
     * @return Response Must return a response!
     */
    protected function successBatchDelete()
    {
        $this->get('session')->getFlashBag()->add(
            'success',
            $this->get('translator')->trans(
                "action.batch.delete.success", array(), 'Admingenerator'
            )
        );

        return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_list"));
    }
    

    /**
     * This is called when batch action throws an exception
     * Default behavior is redirecting to list with error message
     *
     * @param \Exception $e Exception
     * @return Response Must return a response!
     */
    protected function errorBatchDelete(\Exception $e)
    {
        $this->get('session')->getFlashBag()->add(
            'error',
            $this->get('translator')->trans(
                "action.batch.delete.error", array(), 'Admingenerator'
            )
        );

        return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_list"));
    }
    
    
    /**
     * Check crsf token provided for action
     *
     * @throw InvalidCsrfTokenException if token is invalid
     */
    protected function isCsrfTokenValid($intention)
    {
        $token = $this->getRequest()->request->get('_csrf_token');
        if (!$this->get('form.csrf_provider')->isCsrfTokenValid($intention, $token)) {
            throw new InvalidCsrfTokenException();
        }
    }



    
    protected function getObject($pk)
    {
        $TipoSede = $this->getObjectQuery($pk)->findPk($pk);

        if (!$TipoSede) {
            throw new \InvalidArgumentException("No Invision\SoporteBundle\Model\TipoSede found on Id : $pk");
        }

        return $TipoSede;
    }


    protected function getObjectQuery($pk)
    {
        return \Invision\SoporteBundle\Model\TipoSedeQuery::create();
    }

    /**
     * Get additional parameters for rendering.
     *
     * @param \Invision\SoporteBundle\Model\TipoSede $TipoSede Your \Invision\SoporteBundle\Model\TipoSede object
     * @param string $action Action
     * @return array Additional render parameters
     */
    protected function getAdditionalRenderParameters(\Invision\SoporteBundle\Model\TipoSede $TipoSede, $action)
    {
        return array();
    }

    /**
     * Remove invalid characters for method name.
     *
     * @return string
     */
    protected function cleanMethodName($method)
    {
        return preg_replace('/[^\w]+/', '', $method);
    }
}
