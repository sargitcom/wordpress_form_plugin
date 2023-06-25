<?php

namespace Kp\Setup\Application;

use Kp\Setup\Domain\TablesRepository;

class CreateDatabaseTables
{
    private TablesRepository $tablesRepository;

    public function __construct(TablesRepository $tablesRepository)
    {
        $this->tablesRepository = $tablesRepository;
    }

    public function create(string $mainFilePath)
    {
        \register_activation_hook($mainFilePath, [$this, 'createTables']);
    }

    public function createTables()
    {
        $this->tablesRepository->createFormEntriesTable();
    }
}
