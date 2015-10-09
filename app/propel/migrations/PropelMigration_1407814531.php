<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1407814531.
 * Generated on 2014-08-12 03:35:31 
 */
class PropelMigration_1407814531
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

ALTER TABLE `maleta` DROP FOREIGN KEY `maleta_FK_2`;

ALTER TABLE `maleta` DROP FOREIGN KEY `maleta_FK_1`;

DROP INDEX `maleta_FI_1` ON `maleta`;

ALTER TABLE `maleta` DROP `inventario_id`;

CREATE INDEX `maleta_FI_1` ON `maleta` (`usuario_id`);

ALTER TABLE `maleta` ADD CONSTRAINT `maleta_FK_1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `usuario` (`id`);

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

ALTER TABLE `maleta` DROP FOREIGN KEY `maleta_FK_1`;

DROP INDEX `maleta_FI_1` ON `maleta`;

ALTER TABLE `maleta`
    ADD `inventario_id` INTEGER NOT NULL AFTER `id`;

CREATE INDEX `maleta_FI_1` ON `maleta` (`inventario_id`);

ALTER TABLE `maleta` ADD CONSTRAINT `maleta_FK_1`
    FOREIGN KEY (`inventario_id`)
    REFERENCES `inventario` (`id`);

ALTER TABLE `maleta` ADD CONSTRAINT `maleta_FK_2`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `usuario` (`id`);

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}