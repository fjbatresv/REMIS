<?php

namespace Invision\InventarioBundle\Form\Type\ProcesoExtra;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class procesoExtraType extends BaseAbstractType {

    protected $options = array(
        'name' => 'procesoExtra'
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre', 'text', array(
            'label' => 'Nombre',
            'attr' => array(
                'class' => 'form-control',
                'placeHolder' => 'Nombre del proceso'
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
                'placeHolder' => 'Costo del proceso'
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
                'placeHolder' => 'Descripción del proceso (opcional)'
            )
        ));
    }

}
