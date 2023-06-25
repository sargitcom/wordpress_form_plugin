<?php

namespace Kp\Setup\Domain;

interface TablesRepository
{
    public function createFormEntriesTable() : void;
    public function removeFormEntriesTable() : void;
}
