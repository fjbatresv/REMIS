<?php

namespace Invision\InventarioBundle\Form\Type\Material;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class materialType extends BaseAbstractType {

    protected $options = array(
        'name' => 'material'
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre', 'text', array(
            'label' => 'Nombre',
            'attr' => array(
                'class' => 'form-control',
                'placeHolder' => 'Nombre del material'
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor obligatorio'
                        ))
            )
        ));
        $builder->add('costo', 'number', array(
            'label' => 'Costo',
            'attr' => array(
                'class' => 'form-control',
                'placeHolder' => 'Costo del material'
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
                'placeHolder' => 'Descripción del material (opcional)'
            )
        ));
    }

}
