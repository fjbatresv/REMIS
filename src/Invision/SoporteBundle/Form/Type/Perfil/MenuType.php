<?php

namespace Invision\SoporteBundle\Form\Type\Perfil;

use Propel\PropelBundle\Form\BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MenuType extends BaseAbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('Menu', 'model', array(
            'class' => 'Invision\SoporteBundle\Model\Menu',
            'property' => 'Nombre',
            'attr' => array(
                'class' => ''
            ),
            'multiple' => true,
            'expanded' => true,
        ));
    }

}
