<?php

namespace Kp;

use Kp\Shortcode\Application\RegisterShortCodes;

class WordpressFormPlugin
{
    private RegisterShortCodes $registerShortCodes;

    public function __construct(RegisterShortCodes $registerShortCodes)
    {
        $this->registerShortCodes = $registerShortCodes;
    }

    public function run(string $mainFilePath)
    {
        $this->registerShortCodes->register();
    }
}
