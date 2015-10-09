<?php

namespace Invision\SoporteBundle\Form\Type\Perfil;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class PerfilType extends BaseAbstractType {

    protected $options = array(
        'name' => 'loginType',
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre', 'text', array(
            'constraints' => new NotBlank(array(
                'message' => 'Valor Obligatorio'
                    ))
        ));
        $builder->add('descripcion', 'text', array(
            'constraints' => new NotBlank(array(
                'message' => 'Valor Obligatorio'
                    ))
        ));
    }

}
