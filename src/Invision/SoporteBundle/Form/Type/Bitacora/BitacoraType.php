<?php

namespace Invision\SoporteBundle\Form\Type\Bitacora;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BitacoraType extends BaseAbstractType {

    protected $options = array(
        'name' => 'bitacoraType',
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('inicio', 'text', array(
            'attr' => array(
                'class' => 'form-control',
                'data-inputmask'=> "'alias': 'yyyy-mm-dd'",
                'data-mask'=>"true"
            )
        ));
        $builder->add('fin', 'text', array(
            'attr' => array(
                'class' => 'form-control',
                'data-inputmask'=> "'alias': 'yyyy-mm-dd'",
                'data-mask'=>"true"
            )
        ));
    }

}
