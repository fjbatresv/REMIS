<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1407815933.
 * Generated on 2014-08-12 03:58:53 
 */
class PropelMigration_1407815933
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

ALTER TABLE `maleta` DROP FOREIGN KEY `maleta_FK_1`;

ALTER TABLE `maleta` ADD CONSTRAINT `maleta_FK_1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `usuario` (`id`)
    ON DELETE CASCADE;

CREATE TABLE `maleta_detalle`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `cantidad` INTEGER NOT NULL,
    `inventario_id` INTEGER NOT NULL,
    `maleta_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `maleta_detalle_FI_1` (`maleta_id`),
    CONSTRAINT `maleta_detalle_FK_1`
        FOREIGN KEY (`maleta_id`)
        REFERENCES `maleta` (`id`)
        ON DELETE CASCADE
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

DROP TABLE IF EXISTS `maleta_detalle`;

ALTER TABLE `maleta` DROP FOREIGN KEY `maleta_FK_1`;

ALTER TABLE `maleta` ADD CONSTRAINT `maleta_FK_1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `usuario` (`id`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}