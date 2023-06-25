<?php

namespace KP;

use KP\Shortcode\Application\RegisterShortCodes;

class WordpressFormPlugin
{
    private RegisterShortCodes $registerShortCodes;

    public function __construct(
        RegisterShortCodes $registerShortCodes
    ) {
        $this->registerShortCodes = $registerShortCodes;
    }

    public function run()
    {
        $this->registerShortCodes->register();
    }
}
