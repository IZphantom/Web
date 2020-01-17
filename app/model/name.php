<?php

namespace app\model;

use base\model\Model;

class Name extends Model
{
    public $Name_ID;
    public $First_name;
    public $Last_name;
    public $Patronimic_name;



    public function __construct($Name_ID, $First_name, $Last_name, $Patronimic_name, $Adress_ID, $Phone, $Mail, $DOB, $Gender)
    {
        $this->Name_ID = $Name_ID;
        $this->First_name = $First_name;
        $this->Last_name = $Last_name;
        $this->Patronimic_name = $Patronimic_name;




    }
}