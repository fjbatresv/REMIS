<?php

namespace Invision\InventarioBundle\Form\Type\Inventario;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class InventarioType extends BaseAbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('codigo', 'text', array(
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                        ))
            ),
            'attr' => array(
                'placeholder' => 'Código del articulo',
            ),
            'label' => 'Código'
        ));
        $builder->add('color', 'model', array(
            'class' => 'Invision\InventarioBundle\Model\Color',
            'property' => 'nombre',
            'constraints' => new NotBlank(array(
                'message' => 'Valor Obligatorio'
                    )),
            'attr' => array(
                'placeholder' => 'Color del articulo',
            )
        ));
        $builder->add('costo', 'number', array(
            'invalid_message' => 'Solamente se permiten números',
            'label' => 'Costo',
            'constraints' => new NotBlank(array(
                'message' => 'Valor Obligatorio',
                    )),
            'attr' => array(
                'placeholder' => 'Ingrese el precio de venta del articulo',
            )
        ));
        $builder->add('venta', 'number', array(
            'invalid_message' => 'Solamente se permiten números',
            'label' => 'Venta',
            'constraints' => new NotBlank(array(
                'message' => 'Valor Obligatorio',
                    )),
            'attr' => array(
                'placeholder' => 'Ingrese el precio de venta del articulo',
            )
        ));
        $builder->add('cantidad', 'integer', array(
            'invalid_message' => 'Ingrese un dato numerico',
            'constraints' => new NotBlank(array(
                'message' => 'Valor Obligatorio',
                    )),
            'attr' => array(
                'placeholder' => 'Cantidad de existencias',
            )
        ));
        $builder->add('descripcion', 'textarea', array(
            'constraints' => new NotBlank(array(
                'message' => 'Valor Obligatorio'
                    )),
            'attr' => array(
                'placeholder' => 'Ingrese la descripción del articulo',
            )
        ));
        $builder->add('sede', 'model', array(
            'label' => 'Sede',
            'attr' => array(
                'class' => 'form-control'
            ),
            'class' => 'Invision\SoporteBundle\Model\Sede',
            'property' => 'nombre'
        ));
//        $builder->add('imagen', 'file', array(
//            'label' => 'Imagen',
//            'attr' => array(
//                'class' => 'form-control'
//            ),
//        ));
    }

}
