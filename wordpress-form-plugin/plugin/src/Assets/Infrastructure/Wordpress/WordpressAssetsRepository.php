<?php

namespace Kp\Assets\Infrastructure\Wordpress;

use Kp\Assets\Domain\AssetsRepository;

class WordpressAssetsRepository implements AssetsRepository
{
    public function registerUserScripts(): void
    {
        \add_action('init', function () {
            \wp_register_script( "my_form_script", WP_PLUGIN_URL . '/plugin/js/script.js', array('jquery') );
            \wp_localize_script( 'my_form_script', 'myAjax', array( 'ajaxurl' => \admin_url( 'admin-ajax.php' )));

            \wp_enqueue_script( 'jquery' );
            wp_enqueue_script( 'my_form_script' );
        });
    }

    public function registerAdminUserScripts(): void
    {
        \add_action('wp_admin', function () {

        });
    }
}