<?php

namespace Invision\SoporteBundle\Form\Type\Sede;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class sedeType extends BaseAbstractType {

    protected $options = array(
        'name' => 'sede'
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre', 'text', array(
            'label' => 'Nombre',
            'attr' => array(
                'class' => 'form-control',
                'placeHolder' => 'Nombre de la sede'
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor obligatorio'
                        ))
            )
        ));
        $builder->add('direccion', 'text', array(
            'label' => 'Dirección',
            'attr' => array(
                'class' => 'form-control',
                'placeHolder' => 'Dirección de la sede'
            )
        ));
        $builder->add('telefono', 'text', array(
            'label' => 'Telefono',
            'attr' => array(
                'class' => 'form-control',
                'placeHolder' => 'Telefono de la sede'
            )
        ));
        $builder->add('tipo', 'model', array(
            'label' => 'Tipo de sede',
            'attr' => array(
                'class' => 'form-control'
            ),
            'class' => 'Invision\SoporteBundle\Model\TipoSede',
            'property' => 'nombre',
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor obligatorio'
                        ))
            )
        ));
    }

}
