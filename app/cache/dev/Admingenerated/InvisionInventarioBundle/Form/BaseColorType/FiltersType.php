<?php

namespace Admingenerated\InvisionInventarioBundle\Form\BaseColorType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\Expression;

class FiltersType extends AbstractType
{
    protected $securityContext;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    
        $formOptions = $this->getFormOption('id', array(  'required' => false,  'label' => 'Id',  'translation_domain' => 'Admin',));
        $builder->add('id', 'integer', $formOptions);

    
        $formOptions = $this->getFormOption('nombre', array(  'required' => false,  'label' => 'Nombre',  'translation_domain' => 'Admin',));
        $builder->add('nombre', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('created_by', array(  'required' => false,  'label' => 'Created by',  'translation_domain' => 'Admin',));
        $builder->add('created_by', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('updated_by', array(  'required' => false,  'label' => 'Updated by',  'translation_domain' => 'Admin',));
        $builder->add('updated_by', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('created_at', array(  'required' => false,  'label' => 'Created at',  'translation_domain' => 'Admin',));
        $builder->add('created_at', 'datetime', $formOptions);

    
        $formOptions = $this->getFormOption('updated_at', array(  'required' => false,  'label' => 'Updated at',  'translation_domain' => 'Admin',));
        $builder->add('updated_at', 'datetime', $formOptions);

    
    }

    protected function getFormOption($name, array $formOptions)
    {
        return $formOptions;
    }

    public function getName()
    {
        return 'filters_color';
    }

    public function setSecurityContext($securityContext)
    {
        $this->securityContext = $securityContext;
    }

}
