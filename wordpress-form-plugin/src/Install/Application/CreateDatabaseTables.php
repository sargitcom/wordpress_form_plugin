<?php

namespace KP\Install\Application;

use KP\Install\Domain\TablesRepository;

class CreateDatabaseTables
{
    private TablesRepository $tablesRepository;

    public function __construct(TablesRepository $tablesRepository)
    {
        $this->tablesRepository = $tablesRepository;
    }

    public function create()
    {
        \register_activation_hook($this, 'createTables');
    }

    public function createTables()
    {
        $this->tablesRepository->createFormEntriesTable();
    }
}