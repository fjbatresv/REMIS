<?php

namespace Invision\InventarioBundle\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'maleta_detalle' table.
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
class MaletaDetalleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src.Invision.InventarioBundle.Model.map.MaletaDetalleTableMap';

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
        $this->setName('maleta_detalle');
        $this->setPhpName('MaletaDetalle');
        $this->setClassname('Invision\\InventarioBundle\\Model\\MaletaDetalle');
        $this->setPackage('src.Invision.InventarioBundle.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('cantidad', 'Cantidad', 'INTEGER', true, null, null);
        $this->addForeignKey('inventario_id', 'InventarioId', 'INTEGER', 'inventario', 'id', true, null, null);
        $this->addForeignKey('maleta_id', 'MaletaId', 'INTEGER', 'maleta', 'id', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Maleta', 'Invision\\InventarioBundle\\Model\\Maleta', RelationMap::MANY_TO_ONE, array('maleta_id' => 'id', ), null, null);
        $this->addRelation('Inventario', 'Invision\\InventarioBundle\\Model\\Inventario', RelationMap::MANY_TO_ONE, array('inventario_id' => 'id', ), 'CASCADE', null);
    } // buildRelations()

} // MaletaDetalleTableMap
