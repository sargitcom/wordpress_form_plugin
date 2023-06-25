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
<div class="kp-wordpress-form">
    <form class="kp-wordpress-form-handle" method="post" action="">
        <div class="kp-wordpress-form-field">
            <input class="kp-wordpress-form-input" type="text" name="subject" />
        </div>        
        <div class="kp-wordpress-form-field">
            <input class="kp-wordpress-form-input" type="text" name="first_name" />
        </div>
        <div class="kp-wordpress-form-field">
            <input class="kp-wordpress-form-input" type="text" name="last_name" />
        </div>
        <div class="kp-wordpress-form-field">
            <input class="kp-wordpress-form-input" type="text" name="email" />
        </div>
        <div class="kp-wordpress-form-field">
            <input class="kp-wordpress-form-input" type="text" name="message" />
        </div>    
    </form>
</div>
SHORTCODE;;
    }
}
