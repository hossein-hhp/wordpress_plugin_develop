<?php

function createDB() // Create Table
{
    global $wpdb, $table_prefix;
    $table_name = $table_prefix . "a_table_template";

    if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
        $sql = "CREATE TABLE `$table_name` (
            id int(10)  NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`),
            FirstName varchar(255),
            LastName varchar(255),
            cash int(20) NOT NULL DEFAULT 0,
            `status` tinyint(1) NOT NULL DEFAULT 0
        ) ENGINE = MyISAM CHARSET utf8;";

        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
        dbDelta($sql);

        $wpdb->insert($table_name, array("FirstName" => "hossein", "LastName" => "hosseinpour", "cash" => 100000000, "status" => 1)); // default data in DataBase
        $wpdb->insert($table_name, array("FirstName" => "X", "LastName" => "x", "cash" => 58000, "status" => 0)); // default data in DataBase
    }
}

function deleteDB() // Delete Table
{
    global $wpdb, $table_prefix;
    $table_name = $table_prefix . "a_table_template";

    $wpdb->query("DROP TABLE IF EXISTS `$table_name` ");
}
