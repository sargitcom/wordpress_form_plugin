<?php

namespace Kp\Install\Domain;

interface TablesRepository
{
    public function createFormEntriesTable() : void;
    public function removeFormEntriesTable() : void;
}
