<?php

namespace Invision\InventarioBundle\Form\Type\Maleta;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class maletaType extends BaseAbstractType {

    protected $options = array(
        'name' => 'maleta'
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('cantidad', 'integer', array(
            'invalid_message' => 'Solamente se permiten números',
            'label' => 'Cantidad maxima',
            'attr' => array(
                'class' => 'form-control',
                'placeHolder' => 'Cantidad maxima que puede contener la maleta',
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor obligatorio'
                        ))
            )
        ));
        $builder->add('usuario', 'model', array(
            'label' => 'Usuario',
            'attr' => array(
                'class' => 'form-control',
                'placeHolder' => 'Usuario responsable',
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor obligatorio'
                        ))
            ),
            'class' => 'Invision\SoporteBundle\Model\Usuario',
            'property' => 'username',
        ));
    }

}
