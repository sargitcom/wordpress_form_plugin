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
 * init plugin
 */

try {
    $builder = new DI\ContainerBuilder();

    $builder->addDefinitions([
        \Kp\Install\Domain\TablesRepository::class => \DI\create(
            \Kp\Install\Infrastructure\Wordpress\WordpressTablesRepository::class
        ),

        \Kp\Shortcode\Domain\FormPluginShortcode::class => \DI\create(
            \Kp\Shortcode\Infrastructure\WordpressFormPluginShortcode::class
        ),
    ]);

    $container = $builder->build();

    $wpFormPlugin = $container->get(KP\WordpressFormPlugin::class);
    $wpFormPlugin->run(__FILE__);
} catch (\DI\DependencyException | \DI\NotFoundException | Exception $e) {
    // ... error here, typically do something to log errors and return info to the user
}