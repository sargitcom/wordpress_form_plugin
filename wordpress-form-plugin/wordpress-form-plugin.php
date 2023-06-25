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

require_once(__DIR__ . '/vendor/autoload.php');

try {
    $builder = new DI\ContainerBuilder();
    $container = $builder->build();

    $wpFormPlugin = $container->get('WordpressFormPlugin');
    $wpFormPlugin->run();
} catch (\DI\DependencyException $e) {
    // handle errors here...
} catch (\DI\NotFoundException $e) {
    // handle errors here...
} catch (Exception $e) {
    // handle errors here...
}
