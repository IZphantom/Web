<?php

namespace app\database;

use base\database\Database;
use base\model\Table;

class LogsTable extends Table
{
    public $tableName;

    public function __construct()
    {
        parent::__construct();

        $this->tableName = 'Logs';
    }

    public function getInsertId() {
        return $this->database->getInsertId();
    }
}