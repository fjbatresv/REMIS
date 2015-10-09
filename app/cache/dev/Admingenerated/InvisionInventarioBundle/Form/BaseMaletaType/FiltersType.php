<?php

namespace Admingenerated\InvisionInventarioBundle\Form\BaseMaletaType;

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

    
        $formOptions = $this->getFormOption('cantidad', array(  'required' => false,  'label' => 'Cantidad',  'translation_domain' => 'Admin',));
        $builder->add('cantidad', 'integer', $formOptions);

    
        $formOptions = $this->getFormOption('usuario_id', array(  'required' => false,  'label' => 'Usuario id',  'translation_domain' => 'Admin',));
        $builder->add('usuario_id', 'integer', $formOptions);

    
    }

    protected function getFormOption($name, array $formOptions)
    {
        return $formOptions;
    }

    public function getName()
    {
        return 'filters_maleta';
    }

    public function setSecurityContext($securityContext)
    {
        $this->securityContext = $securityContext;
    }

}
