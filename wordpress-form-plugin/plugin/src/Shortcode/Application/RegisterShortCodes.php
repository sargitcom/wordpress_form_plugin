<?php

namespace Kp\Shortcode\Application;

use Kp\Shortcode\Domain\FormPluginShortcode;

class RegisterShortCodes
{
    private FormPluginShortcode $formPluginShortcode;

    public function __construct(FormPluginShortcode $formPluginShortcode)
    {
        $this->formPluginShortcode = $formPluginShortcode;
    }

    public function register()
    {
        \add_action('init', [$this, 'addShortcodes']);
    }

    public function addShortcodes()
    {
        $this->formPluginShortcode->register();
    }
}
