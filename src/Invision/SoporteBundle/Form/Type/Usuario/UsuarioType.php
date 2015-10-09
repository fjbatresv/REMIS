<?php

namespace Invision\SoporteBundle\Form\Type\Usuario;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UsuarioType extends BaseAbstractType {

    protected $options = array(
        'name' => 'usuarioType',
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('username', 'text', array(
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                        ))
            ),
            'attr' => array('class' => 'form-control'),
        ));
        $builder->add('clave', 'repeated', array(
            'type' => 'password',
            'invalid_message' => 'Las claves no coinciden',
            'options' => array('attr' => array('class' => 'password-field')),
            'required' => true,
            'first_options' => array('attr' => array('class' => 'form-control'), "constraints" => array(new Length(array('min' => 6, 'minMessage' => 'Se necesita por lo menos 6 caracteres'))), 'label' => 'Clave'),
            'attr' => array('class' => 'form-control'),
            'second_options' => array('attr' => array('class' => 'form-control'), "constraints" => array(new Length(array('min' => 6, 'minMessage' => 'Se necesita por lo menos 6 caracteres'))), 'label' => 'Repetir Clave'),));
        $builder->add('fecha_nacimiento', 'text', array(
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                        ))
            ),
            'attr' => array('class' => 'form-control', 'data-inputmask' => "'alias': 'yyyy-mm-dd'", 'data-mask' => "true"),
        ));
        $builder->add('nombre', 'text', array(
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                        ))
            ),
            'attr' => array('class' => 'form-control'),
        ));
        $builder->add('apellido', 'text', array(
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                        ))
            ),
            'attr' => array('class' => 'form-control'),
        ));
        $builder->add('perfil', 'model', array(
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                        ))
            ),
            'attr' => array('class' => 'form-control'),
            'class' => 'Invision\SoporteBundle\Model\Perfil',
            'property' => 'nombre'
        ));
        $builder->add('correo', 'email', array(
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                        ))
            ),
            'attr' => array('class' => 'form-control'),
        ));
        $builder->add('sede', 'model', array(
            'constraints' => array(
                new NotBlank(array(
                    'message' => 'Valor Obligatorio'
                        ))
            ),
            'attr' => array('class' => 'form-control'),
            'class' => 'Invision\SoporteBundle\Model\Sede',
            'property' => 'nombre'
        ));
    }

}
