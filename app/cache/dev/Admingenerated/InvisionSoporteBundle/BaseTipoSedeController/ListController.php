<?php

namespace Admingenerated\InvisionSoporteBundle\BaseTipoSedeController;

use Invision\SoporteBundle\Form\Type\TipoSede\FiltersType;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;


use Admingenerator\GeneratorBundle\Controller\Propel\BaseController as BaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\PropelAdapter as PagerAdapter;

class ListController extends BaseController
{
    public function indexAction()
    {
        

        $this->parseRequestForPager();

        $form = $this->getFilterForm();

        return $this->render('InvisionSoporteBundle:TipoSedeList:index.html.twig', $this->getAdditionalRenderParameters() + array(
            'TipoSedes' => $this->getPager(),
            'form'                      => $form->createView(),
            'sortColumn'                => $this->getSortColumn(),
            'sortOrder'                 => $this->getSortOrder(),
            'scopes'                    => $this->getScopes(),
        ));
    }
    /**
     * Check if request contains pager parameters and
     * persist them in session if any.
     */
    protected function parseRequestForPager()
    {
        if ($this->get('request')->query->get('page'))
        {
          $this->setPage($this->get('request')->query->get('page'));
        }

        if ($this->get('request')->query->get('perPage'))
        {
          $this->setPerPage($this->get('request')->query->get('perPage'));
        }

        if ($this->get('request')->query->get('sort'))
        {
          $this->setSort($this->get('request')->query->get('sort'), $this->get('request')->query->get('order_by','ASC'));
        }
    }

    /**
     * Store in the session service the current page
     *
     * @param integer $page The page number
     */
    protected function setPage($page)
    {
        $this->get('session')->set('Invision\SoporteBundle\TipoSedeList\Page', $page);
    }

    /**
     * Return the stored page
     *
     * @return integer $page The page number
     */
    protected function getPage()
    {
        return $this->get('session')->get('Invision\SoporteBundle\TipoSedeList\Page', 1);
    }

    /**
     * Store in the session service the perPage
     *
     * @param integer $perPage The perPage number
     */
    protected function setPerPage($perPage)
    {
        $this->get('session')->set('Invision\SoporteBundle\TipoSedeList\PerPage', $perPage);
    }

    /**
     * Return the stored perPage
     *
     * @return integer $perPage The perPage number
     */
    protected function getPerPage()
    {
        return $this->get('session')->get('Invision\SoporteBundle\TipoSedeList\PerPage', 10);
    }

    protected function getPager()
    {
        $paginator = new Pagerfanta(new PagerAdapter($this->getQuery()));
        $paginator->setMaxPerPage($this->getPerPage());
        $paginator->setCurrentPage($this->getPage(), false, true);

        return $paginator;
    }
    /**
     * Store in the session service the current sort
     *
     * @param string $column The column
     * @param string $order_by The order sorting (ASC,DESC)
     */
    protected function setSort($column, $order_by)
    {
        $this->get('session')->set('Invision\SoporteBundle\TipoSedeList\Sort', $column);

        if ($order_by == 'desc') {
            $this->get('session')->set('Invision\SoporteBundle\TipoSedeList\OrderBy', 'DESC');
        } else {
             $this->get('session')->set('Invision\SoporteBundle\TipoSedeList\OrderBy', 'ASC');
        }
    }

    /**
     * Return the stored sort
     *
     * @return string The column to sort
     */
    protected function getSortColumn()
    {
        return $this->get('session')->get('Invision\SoporteBundle\TipoSedeList\Sort');
        }

    /**
     * Return the stored sort order
     *
     * @return string the order mode ASC|DESC
     */
    protected function getSortOrder()
    {
        return $this->get('session')->get('Invision\SoporteBundle\TipoSedeList\OrderBy', 'ASC');
        }

    public function filtersAction()
    {
        if ($this->get('request')->get('reset')) {
            $this->setFilters(array());

            return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_list"));
        }

        if ($this->getRequest()->getMethod() == "POST") {
            $form = $this->getFilterForm();
            $form->bind($this->get('request'));

            if ($form->isValid()) {
                $filters = $form->getViewData();
            }
        }

        if ($this->getRequest()->getMethod() == "GET") {
            $filters = $this->getRequest()->query->all();
        }

        if (isset($filters)) {
            $this->setFilters($filters);
        }

        return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_list"));
    }

    protected function setFilters($filters)
    {
        $this->get('session')->set('Invision\SoporteBundle\TipoSedeList\Filters', $filters);
    }
    
    protected function getFilters()
    {
        return $this->get('session')->get('Invision\SoporteBundle\TipoSedeList\Filters', array());
    }
        public function scopesAction()
    {
        if ($this->get('request')->get('reset')) {
            $this->setScopes(array());

            return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_list"));
        }

        $this->setScope($this->get('request')->get('group'), $this->get('request')->get('scope'));

        return new RedirectResponse($this->generateUrl("Invision_SoporteBundle_TipoSede_list"));
    }

    /**
     * Store in the session service the current scopes
     *
     * @param array the scopes
     */
    protected function setScopes($scopes)
    {
        $this->get('session')->set('Invision\SoporteBundle\TipoSedeList\Scopes', $scopes);
    }

    /**
    * Change the value of one Scope
    *
    * @param string the group name
    * @param string the scope name
    */
    protected function setScope($groupName, $scopeName)
    {
        $scopes = $this->getScopes();
        $scopes[$groupName] = $scopeName;
        $this->setScopes($scopes);
    }

    protected function getScopes()
    {
        return $this->get('session')->get('Invision\SoporteBundle\TipoSedeList\Scopes', $this->getDefaultScopes());
    }

    protected function getDefaultScopes()
    {
        $scopes = array();

        
        return $scopes;
    }

    /*
    * @return string|null the scope setted for the current group
    */
    protected function getScope($groupName)
    {
        $scopes = $this->getScopes();

        return isset($scopes[$groupName]) ? $scopes[$groupName] : null ;
    }


    /**
     * Get additional parameters for rendering.
     *
     * return array
     */
    protected function getAdditionalRenderParameters()
    {
        return array();
    }

    /**
     * This function is for your convinience. Overwrite it if you need to
     * process the query.
     */
    protected function processQuery($query)
    {
        return $query;
    }

    protected function getQuery()
    {
        $query = $this->buildQuery();

        $this->processQuery($query);
        $this->processSort($query);
        $this->processFilters($query);
        $this->processScopes($query);

        return $query;
    }

    protected function buildQuery()
    {
        return \Invision\SoporteBundle\Model\TipoSedeQuery::create();
    }

    protected function processSort($query)
    {
        if ($this->getSortColumn()) {
            if (!strstr($this->getSortColumn(), '.')) { //direct column
                $query->orderBy($this->getSortColumn(), $this->getSortOrder());
            } else {
                list($table, $column) = explode('.', $this->getSortColumn(), 2);
                $this->addJoinFor($table, $query);
                $query->orderBy($this->getSortColumn(), $this->getSortOrder());
            }
        }
    }

    protected function getFilterForm()
    {
        $filters = $this->getFilters();
                return $this->createForm($this->getFiltersType(), $this->getFilters());
    }

    protected function addJoinFor($table, $query)
    {
        $query->leftJoin($table);
    }

    protected function processFilters($query)
    {
        $filterObject = $this->getFilters();

        $queryFilter = $this->getQueryFilter();
        $queryFilter->setQuery($query);

        
    }

    protected function processScopes($query)
    {
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



    protected function getFiltersType()
    {
        $type = new FiltersType();
        $type->setSecurityContext($this->get('security.context'));

        return $type;
    }

        /**
     * @return \Admingenerator\GeneratorBundle\QueryFilter\QueryFilterInterface
     */
    protected function getQueryFilter()
    {
        return $this->get('admingenerator.queryfilter.propel');
    }

}
