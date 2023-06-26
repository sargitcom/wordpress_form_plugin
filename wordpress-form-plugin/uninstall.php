<?php

if (!defined('WP_UNINSTALL_PLUGIN')) exit();

global $wpdb;

$tableName = $wpdb->prefix . 'wordpress_form_plugin_entries';

$sql = <<<SQL
DROP TABLE IF EXISTS $tableName;  
SQL;

$wpdb->query($sql);

deleteFolder(__DIR__ . '/vendor');

function deleteFolder(string $dir)
{
    if (!is_dir($dir)) {
        return;
    }
    $objects = scandir($dir);
    foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
            if (filetype($dir."/".$object) == "dir")
                deleteFolder($dir."/".$object);
            else unlink   ($dir."/".$object);
        }
    }
    reset($objects);
    rmdir($dir);
}
