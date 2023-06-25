<?php

namespace Kp;

use Kp\Setup\Application\CreateDatabaseTables;
use Kp\Setup\Application\RemoveDatabaseTables;
use Kp\Shortcode\Application\RegisterShortCodes;

class WordpressFormPlugin
{
    private CreateDatabaseTables $createDatabaseTables;
    private RemoveDatabaseTables $removeDatabaseTables;
    private RegisterShortCodes $registerShortCodes;

    public function __construct(
        CreateDatabaseTables $createDatabaseTables,
        RemoveDatabaseTables $removeDatabaseTables,
        RegisterShortCodes $registerShortCodes
    ) {
        $this->createDatabaseTables = $createDatabaseTables;
        $this->removeDatabaseTables = $removeDatabaseTables;
        $this->registerShortCodes = $registerShortCodes;
    }

    public function run(string $mainFilePath)
    {
        $this->createDatabaseTables->create($mainFilePath);
        $this->removeDatabaseTables->removeTables($mainFilePath);
        $this->registerShortCodes->register();
    }
}
