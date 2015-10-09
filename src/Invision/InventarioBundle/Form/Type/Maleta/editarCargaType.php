<?php

namespace Invision\InventarioBundle\Form\Type\Maleta;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class editarCargaType extends BaseAbstractType {

    protected $options = array(
        'name' => 'editarCarga'
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('cantidad', 'integer', array(
            'label' => 'Cantidad',
            'attr' => array(
                'class' => 'form-control',
                'placeHolder' => 'Cantidad del articulo'
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor obligatorio'
                        ))
            )
        ));
    }

}
