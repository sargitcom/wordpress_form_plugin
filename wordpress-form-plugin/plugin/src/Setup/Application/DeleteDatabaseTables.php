<?php

namespace Kp\Setup\Application;

use Kp\Setup\Domain\TablesRepository;

class DeleteDatabaseTables
{
    private TablesRepository $tablesRepository;

    public function __construct(TablesRepository $tablesRepository)
    {
        $this->tablesRepository = $tablesRepository;
    }

    public function remove(string $mainFilePath)
    {
        \register_uninstall_hook($mainFilePath, [$this, 'deleteTables']);
    }

    public function deleteTables()
    {
        $this->tablesRepository->deleteFormEntriesTable();
    }
}
