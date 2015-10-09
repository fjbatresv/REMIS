<?php

namespace Admingenerated\InvisionSoporteBundle\Form\BaseSedeType;

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

    
        $formOptions = $this->getFormOption('direccion', array(  'required' => false,  'label' => 'Direccion',  'translation_domain' => 'Admin',));
        $builder->add('direccion', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('telefono', array(  'required' => false,  'label' => 'Telefono',  'translation_domain' => 'Admin',));
        $builder->add('telefono', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('tipo_sede_id', array(  'required' => false,  'label' => 'Tipo sede id',  'translation_domain' => 'Admin',));
        $builder->add('tipo_sede_id', 'integer', $formOptions);

    
    }

    protected function getFormOption($name, array $formOptions)
    {
        return $formOptions;
    }

    public function getName()
    {
        return 'filters_sede';
    }

    public function setSecurityContext($securityContext)
    {
        $this->securityContext = $securityContext;
    }

}
