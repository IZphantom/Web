<?php

namespace app\model;

use base\model\Model;

class Person extends Model
{
    public $Person_ID;
    public $Name_ID;
    public $Adress_ID;
    public $Phone;
    public $Mail;
    public $DOB;
    public $Gender;


    public function __construct($Person_ID, $Name_ID, $Adress_ID, $Phone, $Mail, $DOB, $Gender)
    {
        $this->Person_ID = $Person_ID;
        $this->Name_ID = $Name_ID;
        $this->Adress_ID = $Adress_ID;
        $this->Phone = $Phone;
        $this->Mail = $Mail;
        $this->DOB = $DOB;
        $this->Gender = $Gender;




    }
}