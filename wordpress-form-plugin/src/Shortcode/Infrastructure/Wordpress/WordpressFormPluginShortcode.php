<?php

namespace KP\Shortcode\Infrastructure;

use KP\Shortcode\Domain\FormPluginShortcode;

class WordpressFormPluginShortcode implements FormPluginShortcode
{
    public function register(): void
    {
        \add_shortcode('kp_wordpress_form', [$this, 'registerWordpressFormShortcode']);
    }

    public function registerWordpressFormShortcode() : string
    {
        return <<<SHORTCODE
<div class="kp-wordpress-form"></div>
SHORTCODE;;
    }
}
