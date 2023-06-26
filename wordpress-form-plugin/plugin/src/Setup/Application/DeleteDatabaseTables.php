<?php

namespace Kp\Setup\Application;

use Kp\Setup\Domain\TablesRepository;
use Kp\Setup\Infrastructure\Wordpress\WordpressTablesRepository;

class DeleteDatabaseTables
{
    public function remove(string $mainFilePath)
    {
        \register_uninstall_hook(
            $mainFilePath,
            [DeleteDatabaseTables::class, 'deleteTables']
        );
    }

    public static function deleteTables()
    {
        $repository = new WordpressTablesRepository();
        $repository->deleteFormEntriesTable();
    }
}
