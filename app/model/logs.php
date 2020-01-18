<?php

namespace app\model;

use app\database\LogsTable;
use base\model\Model;

class Log extends Model
{
    public $url;
    public $type;
    public $get = NULL;
    public $post = NULL;
    public $result = NULL;
    public $date;



    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->type = $_SERVER['REQUEST_METHOD'];
        $this->date = date ("Y-n-d H:i:s");



    }

    public function save(){
        $table = new LogsTable();
        return $table->insert($this);
    }
}