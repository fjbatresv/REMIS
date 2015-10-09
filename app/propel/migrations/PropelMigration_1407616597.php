<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1407616597.
 * Generated on 2014-08-09 20:36:37 
 */
class PropelMigration_1407616597
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

CREATE TABLE `usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45),
    `email` VARCHAR(100),
    `salt` VARCHAR(255),
    `apellido` VARCHAR(45),
    `dpi` VARCHAR(255) NOT NULL,
    `perfil_id` INTEGER NOT NULL,
    `username` VARCHAR(45) NOT NULL,
    `password` VARCHAR(45) NOT NULL,
    `direccion` VARCHAR(100),
    `fecha_nacimiento` DATE,
    `ultimo_cambio_password` DATE,
    `created_by` VARCHAR(50),
    `updated_by` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `usuario_FI_1` (`perfil_id`),
    CONSTRAINT `usuario_FK_1`
        FOREIGN KEY (`perfil_id`)
        REFERENCES `perfil` (`id`)
) ENGINE=INNODB;

CREATE TABLE `bitacora`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `descripcion` VARCHAR(255) NOT NULL,
    `direccion` VARCHAR(15) NOT NULL,
    `fecha_hora` DATETIME NOT NULL,
    `usuario` VARCHAR(255),
    `tabla` VARCHAR(100),
    `dato_tabla` INTEGER,
    `error` VARCHAR(255),
    `dato_error` VARCHAR(255),
    `estado` INTEGER NOT NULL,
    `created_by` VARCHAR(50),
    `updated_by` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=INNODB;

CREATE TABLE `dia`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=INNODB;

CREATE TABLE `horario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `dia_id` INTEGER NOT NULL,
    `hora_inicio` TIME NOT NULL,
    `hora_fin` TIME NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `horario_FI_1` (`dia_id`),
    CONSTRAINT `horario_FK_1`
        FOREIGN KEY (`dia_id`)
        REFERENCES `dia` (`id`)
) ENGINE=INNODB;

CREATE TABLE `usuario_horario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario_id` INTEGER NOT NULL,
    `horario_id` INTEGER NOT NULL,
    `created_by` VARCHAR(50),
    `updated_by` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `usuario_horario_FI_1` (`usuario_id`),
    INDEX `usuario_horario_FI_2` (`horario_id`),
    CONSTRAINT `usuario_horario_FK_1`
        FOREIGN KEY (`usuario_id`)
        REFERENCES `usuario` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `usuario_horario_FK_2`
        FOREIGN KEY (`horario_id`)
        REFERENCES `horario` (`id`)
) ENGINE=INNODB;

CREATE TABLE `perfil`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45) NOT NULL,
    `descripcion` VARCHAR(100) NOT NULL,
    `created_by` VARCHAR(50),
    `updated_by` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=INNODB;

CREATE TABLE `menu`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45) NOT NULL,
    `ruta` VARCHAR(45) NOT NULL,
    `icono` VARCHAR(45) NOT NULL,
    `superior` INTEGER(45) NOT NULL,
    `visible` INTEGER(45) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=INNODB;

CREATE TABLE `perfil_menu`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `perfil_id` INTEGER NOT NULL,
    `menu_id` INTEGER NOT NULL,
    `created_by` VARCHAR(50),
    `updated_by` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `perfil_menu_FI_1` (`perfil_id`),
    INDEX `perfil_menu_FI_2` (`menu_id`),
    CONSTRAINT `perfil_menu_FK_1`
        FOREIGN KEY (`perfil_id`)
        REFERENCES `perfil` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `perfil_menu_FK_2`
        FOREIGN KEY (`menu_id`)
        REFERENCES `menu` (`id`)
) ENGINE=INNODB;

CREATE TABLE `color`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45) NOT NULL,
    `created_by` VARCHAR(50),
    `updated_by` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=INNODB;

CREATE TABLE `inventario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(100) NOT NULL,
    `color_id` INTEGER NOT NULL,
    `cantidad` INTEGER NOT NULL,
    `descripcion` TEXT,
    `created_by` VARCHAR(50),
    `updated_by` VARCHAR(50),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `inventario_FI_1` (`color_id`),
    CONSTRAINT `inventario_FK_1`
        FOREIGN KEY (`color_id`)
        REFERENCES `color` (`id`)
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

DROP TABLE IF EXISTS `usuario`;

DROP TABLE IF EXISTS `bitacora`;

DROP TABLE IF EXISTS `dia`;

DROP TABLE IF EXISTS `horario`;

DROP TABLE IF EXISTS `usuario_horario`;

DROP TABLE IF EXISTS `perfil`;

DROP TABLE IF EXISTS `menu`;

DROP TABLE IF EXISTS `perfil_menu`;

DROP TABLE IF EXISTS `color`;

DROP TABLE IF EXISTS `inventario`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}