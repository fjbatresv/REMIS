<?php

namespace Invision\InventarioBundle\Form\Type\Maleta;

use Invision\InventarioBundle\Model\InventarioQuery;
use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class cargarType extends BaseAbstractType {

    protected $options = array(
        'name' => 'cargarMaleta'
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('cantidad', 'integer', array(
            'invalid_message' => 'Solamente se permiten números',
            'label' => 'Cantidad',
            'attr' => array(
                'class' => 'form-control',
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor obligatorio'
                        ))
            )
        ));
        $builder->add('codigo', 'model', array(
            'label' => 'Articulo',
            'attr' => array(
                'class' => 'form-control',
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor obligatorio'
                        ))
            ),
            'class' => 'Invision\InventarioBundle\Model\Inventario',
            'property' => 'codigo',
            'index_property' => 'codigo',
            'query' => InventarioQuery::create()
                    ->groupByCodigo()
        ));
        $builder->add('color', 'model', array(
            'label' => 'Color',
            'attr' => array(
                'class' => 'form-control',
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor obligatorio'
                        ))
            ),
            'class' => 'Invision\InventarioBundle\Model\Color',
            'property' => 'nombre',
        ));
    }

}
