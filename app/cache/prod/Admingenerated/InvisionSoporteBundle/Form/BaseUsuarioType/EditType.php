<?php

namespace Admingenerated\InvisionSoporteBundle\Form\BaseUsuarioType;

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

    
        $formOptions = $this->getFormOption('nombre', array(  'required' => false,  'label' => 'Nombre',  'translation_domain' => 'Admin',));
        $builder->add('nombre', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('email', array(  'required' => false,  'label' => 'Email',  'translation_domain' => 'Admin',));
        $builder->add('email', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('salt', array(  'required' => false,  'label' => 'Salt',  'translation_domain' => 'Admin',));
        $builder->add('salt', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('apellido', array(  'required' => false,  'label' => 'Apellido',  'translation_domain' => 'Admin',));
        $builder->add('apellido', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('dpi', array(  'required' => false,  'label' => 'Dpi',  'translation_domain' => 'Admin',));
        $builder->add('dpi', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('perfil_id', array(  'required' => true,  'label' => 'Perfil id',  'translation_domain' => 'Admin',));
        $builder->add('perfil_id', 'integer', $formOptions);

    
        $formOptions = $this->getFormOption('username', array(  'required' => true,  'label' => 'Username',  'translation_domain' => 'Admin',));
        $builder->add('username', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('password', array(  'required' => true,  'label' => 'Password',  'translation_domain' => 'Admin',));
        $builder->add('password', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('direccion', array(  'required' => false,  'label' => 'Direccion',  'translation_domain' => 'Admin',));
        $builder->add('direccion', 'text', $formOptions);

    
        $formOptions = $this->getFormOption('fecha_nacimiento', array(  'required' => false,  'label' => 'Fecha nacimiento',  'translation_domain' => 'Admin',));
        $builder->add('fecha_nacimiento', 'date', $formOptions);

    
        $formOptions = $this->getFormOption('ultimo_cambio_password', array(  'required' => false,  'label' => 'Ultimo cambio password',  'translation_domain' => 'Admin',));
        $builder->add('ultimo_cambio_password', 'date', $formOptions);

    
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
        return 'edit_usuario';
    }

    public function setSecurityContext($securityContext)
    {
        $this->securityContext = $securityContext;
    }

}
