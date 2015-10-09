<?php

namespace Invision\InventarioBundle\Form\Type\Color;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class ColorType extends BaseAbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre', 'text', array(
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                    ))
            )
        ));
    }

}
