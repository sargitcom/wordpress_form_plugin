<?php

namespace Kp;

use Kp\Setup\Application\CreateDatabaseTables;
use Kp\Setup\Application\DeleteDatabaseTables;
use Kp\Shortcode\Application\RegisterShortCodes;

class WordpressFormPlugin
{
    private CreateDatabaseTables $createDatabaseTables;
    private DeleteDatabaseTables $deleteDatabaseTables;
    private RegisterShortCodes $registerShortCodes;

    public function __construct(
        CreateDatabaseTables $createDatabaseTables,
        DeleteDatabaseTables $deleteDatabaseTables,
        RegisterShortCodes $registerShortCodes
    ) {
        $this->createDatabaseTables = $createDatabaseTables;
        $this->deleteDatabaseTables = $deleteDatabaseTables;
        $this->registerShortCodes = $registerShortCodes;
    }

    public function run(string $mainFilePath)
    {
        $this->createDatabaseTables->create($mainFilePath);
        $this->deleteDatabaseTables->remove($mainFilePath);
        $this->registerShortCodes->register();
    }
}
