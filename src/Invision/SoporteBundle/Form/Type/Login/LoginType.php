<?php

namespace Invision\SoporteBundle\Form\Type\Login;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class LoginType extends BaseAbstractType {

    protected $options = array(
        'name' => 'loginType',
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('username', 'text', array(
            'attr' => array(
                'placeholder' => 'Nombre de usuario',
                'class' => 'form-control'
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                        ))
            )
        ));
        $builder->add('password', 'password', array(
            'attr' => array(
                'placeholder' => 'Clave',
                'class' => 'form-control'
            ),
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                        ))
            )
        ));
    }

}
