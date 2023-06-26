<?php if (!defined('WP_UNINSTALL_PLUGIN')) exit();

require_once(__DIR__ . '/vendor/autoload.php');

$repository = new \Kp\Setup\Infrastructure\Wordpress\WordpressTablesRepository();
$repository->deleteFormEntriesTable();