<?php

namespace Invision\SoporteBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'usuario_horario' table.
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
class UsuarioHorarioTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Invision.SoporteBundle.Model.map.UsuarioHorarioTableMap';

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
        $this->setName('usuario_horario');
        $this->setPhpName('UsuarioHorario');
        $this->setClassname('Invision\\SoporteBundle\\Model\\UsuarioHorario');
        $this->setPackage('src.Invision.SoporteBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('usuario_id', 'UsuarioId', 'INTEGER', 'usuario', 'id', true, null, null);
        $this->addForeignKey('horario_id', 'HorarioId', 'INTEGER', 'horario', 'id', true, null, null);
        $this->addColumn('created_by', 'CreatedBy', 'VARCHAR', false, 50, null);
        $this->addColumn('updated_by', 'UpdatedBy', 'VARCHAR', false, 50, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Usuario', 'Invision\\SoporteBundle\\Model\\Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Horario', 'Invision\\SoporteBundle\\Model\\Horario', RelationMap::MANY_TO_ONE, array('horario_id' => 'id', ), null, null);
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
        );
    } // getBehaviors()

} // UsuarioHorarioTableMap
