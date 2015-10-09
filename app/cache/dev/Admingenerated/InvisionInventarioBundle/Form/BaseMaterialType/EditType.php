<?php

namespace Admingenerated\InvisionInventarioBundle\Form\BaseMaterialType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use JMS\SecurityExtraBundle\Security\Authorization\Expression\Expression;

class EditType extends AbstractType
{
    protected $securityContext;

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    
        $formOptions = $this->getFormOption('id', array(  'required' => true,  'label' => 'Id',  'translation_domain' => 'Admin',));
        $builder->add('id', 'integer', $formOptions);

    
        $formOptions = $this->getFormOption('nombre', array(  'required' => true,  'label' => 'Nombre',  'translation_domain' => 'Admin',));
        $builder->add('nombre', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('descripcion', array(  'required' => false,  'label' => 'Descripcion',  'translation_domain' => 'Admin',));
        $builder->add('descripcion', 'textarea', $formOptions);

    
        $formOptions = $this->getFormOption('costo', array(  'required' => true,  'label' => 'Costo',  'translation_domain' => 'Admin',));
        $builder->add('costo', 'number', $formOptions);

    
    }

    protected function getFormOption($name, array $formOptions)
    {
        return $formOptions;
    }

    public function getName()
    {
        return 'edit_material';
    }

    public function setSecurityContext($securityContext)
    {
        $this->securityContext = $securityContext;
    }

}
