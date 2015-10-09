<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1407726852.
 * Generated on 2014-08-11 03:14:12 
 */
class PropelMigration_1407726852
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

ALTER TABLE `bitacora` CHANGE `descripcion` `descripcion` TEXT NOT NULL;

ALTER TABLE `bitacora`
    ADD `sede_id` INTEGER NOT NULL AFTER `estado`;

CREATE INDEX `bitacora_FI_1` ON `bitacora` (`sede_id`);

ALTER TABLE `bitacora` ADD CONSTRAINT `bitacora_FK_1`
    FOREIGN KEY (`sede_id`)
    REFERENCES `sede` (`id`);

ALTER TABLE `inventario`
    ADD `sede_id` INTEGER NOT NULL AFTER `imagen`;

CREATE INDEX `inventario_FI_2` ON `inventario` (`sede_id`);

ALTER TABLE `inventario` ADD CONSTRAINT `inventario_FK_2`
    FOREIGN KEY (`sede_id`)
    REFERENCES `sede` (`id`);

ALTER TABLE `usuario`
    ADD `sede_id` INTEGER NOT NULL AFTER `ultimo_cambio_password`;

CREATE INDEX `usuario_FI_2` ON `usuario` (`sede_id`);

ALTER TABLE `usuario` ADD CONSTRAINT `usuario_FK_2`
    FOREIGN KEY (`sede_id`)
    REFERENCES `sede` (`id`);

CREATE TABLE `material`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT,
    `costo` DOUBLE NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=INNODB;

CREATE TABLE `proceso_extra`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT,
    `costo` DOUBLE NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=INNODB;

CREATE TABLE `tipo_sede`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `descripcion` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=INNODB;

CREATE TABLE `sede`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(50) NOT NULL,
    `direccion` VARCHAR(50),
    `telefono` VARCHAR(255),
    `tipo_sede_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `sede_FI_1` (`tipo_sede_id`),
    CONSTRAINT `sede_FK_1`
        FOREIGN KEY (`tipo_sede_id`)
        REFERENCES `tipo_sede` (`id`)
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

DROP TABLE IF EXISTS `material`;

DROP TABLE IF EXISTS `proceso_extra`;

DROP TABLE IF EXISTS `tipo_sede`;

DROP TABLE IF EXISTS `sede`;

ALTER TABLE `bitacora` DROP FOREIGN KEY `bitacora_FK_1`;

DROP INDEX `bitacora_FI_1` ON `bitacora`;

ALTER TABLE `bitacora` CHANGE `descripcion` `descripcion` VARCHAR(255) NOT NULL;

ALTER TABLE `bitacora` DROP `sede_id`;

ALTER TABLE `inventario` DROP FOREIGN KEY `inventario_FK_2`;

DROP INDEX `inventario_FI_2` ON `inventario`;

ALTER TABLE `inventario` DROP `sede_id`;

ALTER TABLE `usuario` DROP FOREIGN KEY `usuario_FK_2`;

DROP INDEX `usuario_FI_2` ON `usuario`;

ALTER TABLE `usuario` DROP `sede_id`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}