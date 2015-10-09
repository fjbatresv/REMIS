<?php

namespace Invision\SoporteBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'horario' table.
 *
 *
 * This class was autogenerated by Propel 1.7.1 on:
 *
 * Wed Aug 13 05:38:47 2014
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.src.Invision.SoporteBundle.Model.map
 */
class HorarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Invision.SoporteBundle.Model.map.HorarioTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('horario');
        $this->setPhpName('Horario');
        $this->setClassname('Invision\\SoporteBundle\\Model\\Horario');
        $this->setPackage('src.Invision.SoporteBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('dia_id', 'DiaId', 'INTEGER', 'dia', 'id', true, null, null);
        $this->addColumn('hora_inicio', 'HoraInicio', 'TIME', true, null, null);
        $this->addColumn('hora_fin', 'HoraFin', 'TIME', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Dia', 'Invision\\SoporteBundle\\Model\\Dia', RelationMap::MANY_TO_ONE, array('dia_id' => 'id', ), null, null);
        $this->addRelation('UsuarioHorario', 'Invision\\SoporteBundle\\Model\\UsuarioHorario', RelationMap::ONE_TO_MANY, array('id' => 'horario_id', ), null, null, 'UsuarioHorarios');
    } // buildRelations()

} // HorarioTableMap