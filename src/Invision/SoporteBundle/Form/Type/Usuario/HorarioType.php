<?php

namespace Invision\SoporteBundle\Form\Type\Usuario;

use Invision\SoporteBundle\Model\DiaQuery;
use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class HorarioType extends BaseAbstractType {

    protected $options = array(
        'name' => 'horarioType',
    );

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('dia', 'model', array(
            'class' => 'Invision\SoporteBundle\Model\Dia',
            'expanded' => true,
            'multiple' => true,
        ));
        $dias = DiaQuery::create()->find();
        foreach ($dias as $dia) {
            $builder->add($dia->getNombre() . 'Desde', 'text', array(
                'attr' => array(
                    'class' => 'timepicker'
                )
            ));
            $builder->add($dia->getNombre() . 'Hasta', 'text', array(
                'attr' => array(
                    'class' => 'timepicker'
                )
            ));
        }
    }

}
