<?php

namespace app\database;

use base\database\Database;
use base\model\Table;

class PersonTable extends Table
{
    public $tableName;

    public function __construct()
    {
        parent::__construct();

        $this->tableName = 'Person';
    }
}