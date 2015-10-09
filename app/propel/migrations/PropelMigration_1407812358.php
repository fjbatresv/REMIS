<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1407812358.
 * Generated on 2014-08-12 02:59:18 
 */
class PropelMigration_1407812358
{

    public function preUp($manager)
    {
        // add the pre-migration code here
    }

    public function postUp($manager)
    {
        // add the post-migration code here
    }

    public function preDown($manager)
    {
        // add the pre-migration code here
    }

    public function postDown($manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE `maleta`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `inventario_id` INTEGER NOT NULL,
    `cantidad` INTEGER NOT NULL,
    `usuario_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `maleta_FI_1` (`inventario_id`),
    INDEX `maleta_FI_2` (`usuario_id`),
    CONSTRAINT `maleta_FK_1`
        FOREIGN KEY (`inventario_id`)
        REFERENCES `inventario` (`id`),
    CONSTRAINT `maleta_FK_2`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
) ENGINE=INNODB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'default' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `maleta`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}