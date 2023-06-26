<?php
/**
 * Plugin Name:       Wordpress form plugin
 * Description:       Plugin that let`s you insert form using shortcode or guttenberg block
 * Requires at least: 5.1
 * Requires PHP:      7.4
 * Version:           1.0.0
 * Author:            Kamil Konrad Pietrzkiewicz
 * License:           Commercial
 * Text Domain:       wordpress-form-plugin
 *
 * @package           wordpress-form-plugin
 */

/**
 * load autoloader
 */
require_once(__DIR__ . '/vendor/autoload.php');

/**
 * load database upgrade tool
 */

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

/**
 * consts
 */

define('FORM_ENTRIES_TABLE_NAME', "wordpress_form_plugin_entries");

/**
 * setup
 */

\register_activation_hook(__FILE__, 'createFormEntriesTable');

function createFormEntriesTable() : void
{
    global $wpdb;

    $charsetCollate = $wpdb->get_charset_collate();

    $tableName = $wpdb->prefix . FORM_ENTRIES_TABLE_NAME;

    $sql = <<<SQL
CREATE TABLE IF NOT EXISTS $tableName (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  first_name varchar(512) NOT NULL,
  last_name varchar(512) NOT NULL,
  email varchar(320) NOT NULL,
  subject varchar(512) NOT NULL,
  message text NOT NULL,
  PRIMARY KEY  (id)
) $charsetCollate;
SQL;

    \dbDelta($sql);
}

/**
 * init plugin
 */

try {
    $builder = new DI\ContainerBuilder();

    $builder->addDefinitions([
        \Kp\Setup\Domain\TablesRepository::class => \DI\create(
            \Kp\Setup\Infrastructure\Wordpress\WordpressTablesRepository::class
        ),

        \Kp\Shortcode\Domain\FormPluginShortcode::class => \DI\create(
            \Kp\Shortcode\Infrastructure\WordpressFormPluginShortcode::class
        ),
    ]);

    $container = $builder->build();

    $wpFormPlugin = $container->get(Kp\WordpressFormPlugin::class);
    $wpFormPlugin->run(__FILE__);
} catch (\DI\DependencyException | \DI\NotFoundException | Exception $e) {
    // ... error here, typically do something to log errors and return info to the user
}
