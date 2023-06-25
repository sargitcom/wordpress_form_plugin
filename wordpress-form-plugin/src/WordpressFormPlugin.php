<?php

namespace KP;

use KP\Install\Application\CreateDatabaseTables;
use KP\Shortcode\Application\RegisterShortCodes;

class WordpressFormPlugin
{
    private CreateDatabaseTables $createDatabaseTables;
    private RegisterShortCodes $registerShortCodes;

    public function __construct(
        CreateDatabaseTables $createDatabaseTables,
        RegisterShortCodes $registerShortCodes
    ) {
        $this->createDatabaseTables = $createDatabaseTables;
        $this->registerShortCodes = $registerShortCodes;
    }

    public function run()
    {
        $this->createDatabaseTables->create();
        $this->registerShortCodes->register();
    }
}
