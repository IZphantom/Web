<?php

namespace app\model;

use base\model\Model;

class Person extends Model
{
    public $Address_ID;
    public $Phone;
    public $Mail;
    public $DOB;
    public $First_name;
    public $Last_name;
    public $Patronimic_name;


    public function __construct($Address_ID, $Phone, $Mail, $DOB, $First_name, $Last_name, $Patronimic_name)
    {
        $this->Address_ID = $Address_ID;
        $this->Phone = $Phone;
        $this->Mail = $Mail;
        $this->DOB = $DOB;
        $this->First_name = $First_name;
        $this->Last_name = $Last_name;
        $this->Patronimic_name = $Patronimic_name;
        




    }
}