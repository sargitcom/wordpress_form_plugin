<?php

if (!defined('WP_UNINSTALL_PLUGIN')) exit();

global $wpdb;

$tableName = $wpdb->prefix . 'wordpress_form_plugin_entries';

$sql = <<<SQL
DROP TABLE IF EXISTS $tableName;  
SQL;

$wpdb->query($sql);
