<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1407908288.
 * Generated on 2014-08-13 05:38:08 
 */
class PropelMigration_1407908288
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

CREATE TABLE `material_proceso_extra`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `material_id` INTEGER NOT NULL,
    `proceso_extra_id` INTEGER NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `material_proceso_extra_FI_1` (`material_id`),
    INDEX `material_proceso_extra_FI_2` (`proceso_extra_id`),
    CONSTRAINT `material_proceso_extra_FK_1`
        FOREIGN KEY (`material_id`)
        REFERENCES `material` (`id`),
    CONSTRAINT `material_proceso_extra_FK_2`
        FOREIGN KEY (`proceso_extra_id`)
        REFERENCES `proceso_extra` (`id`)
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

DROP TABLE IF EXISTS `material_proceso_extra`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
    }

}