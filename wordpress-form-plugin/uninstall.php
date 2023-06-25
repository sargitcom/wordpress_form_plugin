<?php

require_once(__DIR__ . 'vendor/autoload.php');

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();

global $wpdb;

$tableName = $wpdb->prefix . \Kp\Setup\Infrastructure\Wordpress\WordpressTablesRepository::FORM_ENTRIES_TABLE_NAME;

$sql = <<<SQL
DROP TABLE IF EXISTS $tableName;  
SQL;

$wpdb->query($sql);
