<?php
/**
 * Plugin Name:       Wordpress form plugin
 * Description:       Plugin that let`s you insert form using shortcode or guttenberg block
 * Requires at least: 7.4
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
    $container = $builder->build();

    $wpFormPlugin = $container->get('WordpressFormPlugin');
    $wpFormPlugin->run();
} catch (\DI\DependencyException | \DI\NotFoundException | Exception $e) {
    echo 'Error during init of a Wordpress Form Plugin';
}
