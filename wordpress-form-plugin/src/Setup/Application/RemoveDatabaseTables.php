<?php

namespace Kp\Setup\Application;

use Kp\Setup\Domain\TablesRepository;

class RemoveDatabaseTables
{
    private TablesRepository $tablesRepository;

    public function __construct(TablesRepository $tablesRepository)
    {
        $this->tablesRepository = $tablesRepository;
    }

    public function removeTables(string $mainFilePath) : void
    {
        \register_uninstall_hook($mainFilePath, [$this, 'removeEntryTable']);
    }

    public function removeEntryTable()
    {
        $this->tablesRepository->removeFormEntriesTable();
    }
}
