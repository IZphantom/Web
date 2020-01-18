<?php

use app\database\PersonTable;
use app\model\Person;
use app\database\AddressTable;
use app\model\Address;
use app\model\Log;
use base\controllers\Controller;
use base\database\Connection;
use base\Page;
use base\View\View;

class SiteController extends Controller
{
    private $pageComponent;
    private $component;
    private $model;
    private $log;

    public function afterAction()
    {
        $this->log->save();
    }

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->page->api = true;
        $this->log= new Log();
    }

    public function personGet()
    {
        $post = $this->page->getPost();
        $id = $post['id'];

        $personTable = new PersonTable();
        $addressTable = new AddressTable();

        $data = $personTable->getByCondition('Person_ID', $id);
        $address = $addressTable->getByCondition('Address_ID', $data[0]['Address_ID']);

        unset($data[0]['Address_ID']);
        $data = array_merge($data, $address);

        echo json_encode($data);
    }

    public function personGetAll()
    {
        $table = new PersonTable();
        $data = $table->getAll();

        echo json_encode($data);
    }
    
    public function addressGet()
    {
        $post = $this->page->getPost();
        $id = $post['id'];

        $table = new AddressTable;
        $data = $table->getByCondition('Address_ID', $id);

        $message = ['message' => 'success', 'data' => $data];
        echo json_encode($message);
        $this->log->result = $message;
    }

    public function addressGetAll()
    {
        $table = new AddressTable;
        $data = $table->getAll();

        $message = ['message' => 'success', 'data' => $data];
        echo json_encode($message);
        $this->log->result = $message;
    }
    

    public function personCreate()
    {
        $post = $this->page->getPost();

        $address1 = $post['Address_Line_1'];
        $address2 = $post['Address_Line_2'];
        $city = $post['City'];
        $country = $post['Country'];
        $zip = $post['ZIP'];

        $phone = $post['Phone'];
        $mail = $post['Mail'];
        $dob = $post['DOB'];
        $firstName = $post['First_Name'];
        $lastName = $post['Last_Name'];
        $patronimicName = $post['Patronimic_Name'];

        $personTable = new PersonTable();

        if (!empty($personTable->getByCondition('Last_Name', $lastName)) || !empty($personTable->getByCondition('Mail', $mail))) {
            $message = 'user already exists';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
            return;
        }

        $addressItem = new Address($address1, $address2, $city, $country, $zip);
        $addressTable = new AddressTable();
        $addressStatus = $addressTable->insert($addressItem);

        $addressId = $addressTable->getInsertId();

        if ($addressStatus && $addressId) {
            $message = 'address successfully created';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
        }
        else {
            $message = 'address created error';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
            return;
        }

        $person = new Person($addressId, $phone, $mail, $dob, $firstName, $lastName, $patronimicName);

        if ($personTable->insert($person)) {
            $message = 'person successfully created';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
        }
        else {
            $message = 'person created error';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
        }
    }

    public function personDelete(){
        
        $post = $this->page->getPost();
        $id = $post['id'];

        $PersonTable = new PersonTable();
        $person = $PersonTable->getByCondition('Person_ID', $id);

        if (empty($person)) {
            $message = 'there is no user with this id';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
            return;
        }

        $addressTable = new AddressTable();
        if (empty($addressTable->getByCondition('Address_ID', $person[0]['Address_ID']))) {
            $message = 'there is no address with this id';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
            return;
        }

        if ($PersonTable->deleteByCondition('Person_ID', $id)) {
            $message = 'person deleted';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
        }
        else {
            $message = 'person deleted error';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
            return;
        }

        $addressTable->deleteByCondition('Address_ID', $person[0]['Address_ID']);
    }

    public function personUpdate(){
        $post = $this->page->getPost();
        
        $personTable = new PersonTable();

        $id = $post['Person_ID'];
        $conditions = [];

        foreach ($post as $key => $value) {
            if ($key == 'Person_ID')
                continue;
            else
                $conditions[$key] = $value;
        }

        if ($personTable->update('Person_ID', $id, $conditions)) {
            $message = 'person successfully updated';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
        }
        else {
            $message = 'error in update person';
            echo json_encode(['message' => $message]);
            $this->log->post = json_encode($post);
            $this->log->result = $message;
        }
    }

    public function personSearch(){
        $post = $this->page->getPost();
        $mail = $post['Mail'];
        
        $PersonTable = new PersonTable();
        $person = $PersonTable->getByCondition('Mail', $mail);

        if (!empty($person)) {
            $message = ['message' => 'mail found', 'data' => $person[0]];
            echo json_encode($message);
            $this->log->post = json_encode($post);
            $this->log->result = $message;

        }
        $message = 'mail not found';
        echo json_encode(['message' => $message]);
        $this->log->post = json_encode($post);
        $this->log->result = $message;

    }
}