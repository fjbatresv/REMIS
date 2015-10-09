<?php

namespace Invision\InventarioBundle\Form\Type\Inventario;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BusquedaType extends BaseAbstractType {

    protected $options = array(
        'name' => 'busquedaInventario'
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('codigo', 'text', array(
            'label' => 'Código',
            'attr' => array(
                'class' => 'form-control'
            )
        ));
        $builder->add('venta', 'number', array(
            'label' => 'Precio de venta',
            'attr' => array(
                'class' => 'form-control'
            )
        ));
        $builder->add('color', 'model', array(
            'class' => 'Invision\InventarioBundle\Model\Color',
            'property' => 'nombre',
            'empty_data' => null,
            'empty_value' => 'Todos los colores...',
            'attr' => array(
                'class' => 'form-control'
            )
        ));
        $builder->add('descripcion', 'textarea', array(
            'label' => 'Descripción',
            'attr' => array(
                'class' => 'form-control'
            )
        ));
    }

}
