<?php

namespace app\model;

use base\model\Model;

class Adress extends Model
{
    public $Adress_ID;
    public $Adress_Line_1;
    public $Adress_Line_2;
    public $City;
    public $Country;
    public $ZIP;


    public function __construct($Adress_ID, $Adress_Line_1, $Adress_Line_2, $City, $Country, $ZIP)
    {
        $this->Adress_ID = $Adress_ID;
        $this->Adress_Line_1 = $Adress_Line_1;
        $this->Adress_Line_2 = $Adress_Line_2;
        $this->City = $City;
        $this->Country = $Country;
        $this->ZIP = $ZIP;


    }
}