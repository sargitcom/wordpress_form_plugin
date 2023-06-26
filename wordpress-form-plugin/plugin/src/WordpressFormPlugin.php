<?php

namespace Kp;

use Kp\Assets\Application\RegisterAssets;
use Kp\Setup\Application\CreateDatabaseTables;
use Kp\Shortcode\Application\RegisterShortCodes;

class WordpressFormPlugin
{
    private CreateDatabaseTables $createDatabaseTables;
    private RegisterAssets $registerAssets;
    private RegisterShortCodes $registerShortCodes;

    public function __construct(
        CreateDatabaseTables $createDatabaseTables,
        RegisterAssets $registerAssets,
        RegisterShortCodes $registerShortCodes

    ) {
        $this->createDatabaseTables = $createDatabaseTables;
        $this->registerAssets = $registerAssets;
        $this->registerShortCodes = $registerShortCodes;
    }

    public function run(string $mainFilePath)
    {
        $this->createDatabaseTables->create($mainFilePath);
        $this->registerAssets->register();
        $this->registerShortCodes->register();
    }
}
