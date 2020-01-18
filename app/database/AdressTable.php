<?php

namespace app\database;

use base\database\Database;
use base\model\Table;

class AddressTable extends Table
{
    public $tableName;

    public function __construct()
    {
        parent::__construct();

        $this->tableName = 'Address';
    }

    public function getInsertId() {
        return $this->database->getInsertId();
    }
}