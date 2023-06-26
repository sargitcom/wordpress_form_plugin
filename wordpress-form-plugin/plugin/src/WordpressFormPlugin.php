<?php

namespace Kp;

use Kp\Setup\Application\CreateDatabaseTables;
use Kp\Shortcode\Application\RegisterShortCodes;

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

    public function run(string $mainFilePath)
    {
        $this->createDatabaseTables->create($mainFilePath);
        $this->registerShortCodes->register();
    }
}
