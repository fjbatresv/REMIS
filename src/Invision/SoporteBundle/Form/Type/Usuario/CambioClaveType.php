<?php

namespace Invision\SoporteBundle\Form\Type\Usuario;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CambioClaveType extends BaseAbstractType {

    protected $options = array(
        'name' => 'cambioClaveType',
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('clave', 'repeated', array("constraints" => array(new NotBlank(array('message' => 'Valor Obligatorio'))),
            'type' => 'password',
            'invalid_message' => 'Las claves no coinciden',
            'options' => array('attr' => array('class' => 'password-field')),
            'required' => true,
            'first_options' => array('attr' => array('class' => 'form-control'),"constraints" => array(new Length(array('min' => 6, 'minMessage' => 'Se necesita por lo menos 6 caracteres'))), 'label' => 'Clave'),
            'attr' => array('class' => 'form-control'),
            'second_options' => array('attr' => array('class' => 'form-control'),"constraints" => array(new Length(array('min' => 6, 'minMessage' => 'Se necesita por lo menos 6 caracteres'))), 'label' => 'Repetir Clave'),));
        $builder->add('clave_old', 'password', array(
            'attr' => array(
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
