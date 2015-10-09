<?php

namespace Invision\SoporteBundle\Form\Type\TipoSede;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class tipoSedeType extends BaseAbstractType {
    
    protected $options = array(
        'name' => 'tipoSede'
    );
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre', 'text', array(
            'label' => 'Nombre',
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => 'Nombre del tipo de sede'
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor obligatorio'
                ))
            )
        ));
        $builder->add('descripcion', 'textarea', array(
            'label' => 'Descripción',
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => 'Descripción del tipo de sede'
            )
        ));
    }
    
}
