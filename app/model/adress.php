<?php

namespace app\model;

use base\model\Model;

class Address extends Model
{
    public $Address_Line_1;
    public $Address_Line_2;
    public $City;
    public $Country;
    public $ZIP;


    public function __construct($Address_Line_1, $Address_Line_2, $City, $Country, $ZIP)
    {
        $this->Address_Line_1 = $Address_Line_1;
        $this->Address_Line_2 = $Address_Line_2;
        $this->City = $City;
        $this->Country = $Country;
        $this->ZIP = $ZIP;


    }
}