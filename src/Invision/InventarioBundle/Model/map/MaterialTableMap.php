<?php

namespace Invision\InventarioBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'material' table.
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
 * @package    propel.generator.src.Invision.InventarioBundle.Model.map
 */
class MaterialTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Invision.InventarioBundle.Model.map.MaterialTableMap';

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
        $this->setName('material');
        $this->setPhpName('Material');
        $this->setClassname('Invision\\InventarioBundle\\Model\\Material');
        $this->setPackage('src.Invision.InventarioBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 255, null);
        $this->addColumn('descripcion', 'Descripcion', 'LONGVARCHAR', false, null, null);
        $this->addColumn('costo', 'Costo', 'DOUBLE', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MaterialProcesoExtra', 'Invision\\InventarioBundle\\Model\\MaterialProcesoExtra', RelationMap::ONE_TO_MANY, array('id' => 'material_id', ), 'CASCADE', null, 'MaterialProcesoExtras');
    } // buildRelations()

} // MaterialTableMap
