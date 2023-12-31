<?php

namespace Kp\Shortcode\Infrastructure\Wordpress;

use Kp\Shortcode\Domain\FormPluginShortcode;

class WordpressFormPluginShortcode implements FormPluginShortcode
{
    public function register(): void
    {
        \add_shortcode('kp_wordpress_form', [$this, 'registerWordpressFormShortcode']);
    }

    public function registerWordpressFormShortcode() : string
    {
        $subject = \esc_html__('Subject', 'wordpress-form-plugin');
        $firstName = \esc_html__('First name', 'wordpress-form-plugin');
        $lastName = \esc_html__('Last name', 'wordpress-form-plugin');
        $email = \esc_html__('Email', 'wordpress-form-plugin');
        $message = \esc_html__('Message', 'wordpress-form-plugin');
        $submit = \esc_html__('Submit', 'wordpress-form-plugin');

        $firstNameValue = "";
        $lastNameValue = "";
        $emailValue = "";

        if (\is_user_logged_in()) {
            $currentUser = \wp_get_current_user();
            $firstNameValue = $currentUser->user_firstname;
            $lastNameValue = $currentUser->user_lastname;
            $emailValue = $currentUser->user_email;
        }

        return <<<SHORTCODE
<div class="kp-wordpress-form">
    <form class="kp-wordpress-form-handle" method="post" action="">
        <div class="kp-wordpress-form-field">
            <input class="kp-wordpress-form-input" type="text" name="subject" placeholder="$subject" />
        </div>        
        <div class="kp-wordpress-form-field">
            <input class="kp-wordpress-form-input" type="text" name="first_name" placeholder="$firstName" value="$firstNameValue" />
        </div>
        <div class="kp-wordpress-form-field">
            <input class="kp-wordpress-form-input" type="text" name="last_name" placeholder="$lastName" value="$lastNameValue" />
        </div>
        <div class="kp-wordpress-form-field">
            <input class="kp-wordpress-form-input" type="text" name="email" placeholder="$email" value="$emailValue" />
        </div>
        <div class="kp-wordpress-form-field">
            <textarea class="kp-wordpress-form-input" type="text" name="message" placeholder="$message"></textarea>
        </div>
        <div class="kp-wordpress-form-submit">
            <button type="submit">$submit</button>
        </div>
    </form>
</div>
SHORTCODE;
    }
}
