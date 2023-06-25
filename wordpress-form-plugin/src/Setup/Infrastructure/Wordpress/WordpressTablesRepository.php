<?php

namespace Kp\Setup\Infrastructure\Wordpress;

use Kp\Setup\Domain\TablesRepository;

class WordpressTablesRepository implements TablesRepository
{
    public const FORM_ENTRIES_TABLE_NAME = "wordpress_form_plugin_entries";

    public function createFormEntriesTable() : void
    {
        global $wpdb;

        $charsetCollate = $wpdb->get_charset_collate();

        $tableName = $wpdb->prefix . self::FORM_ENTRIES_TABLE_NAME;

        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS $tableName (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  first_name varchar(512) NOT NULL,
  last_name varchar(512) NOT NULL,
  email varchar(320) NOT NULL,
  subject varchar(512) NOT NULL,
  message text NOT NULL,
  PRIMARY KEY  (id)
) $charsetCollate;
SQL;

        \dbDelta($sql);
    }

    public function removeFormEntriesTable(): void
    {
        global $wpdb;

        $tableName = $wpdb->prefix . self::FORM_ENTRIES_TABLE_NAME;

        $sql = <<<SQL
DROP TABLE $tableName;
SQL;

        \dbDelta($sql);
    }
}
