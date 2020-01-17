<?php

use app\database\PersonTable;
use app\model\Person;
use app\database\AdressTable;
use app\model\Adress;
use app\database\NameTable;
use app\model\Name;
use base\controllers\Controller;
use base\database\Connection;
use base\Page;
use base\View\View;

class SiteController extends Controller
{
    private $pageComponent;
    private $component;
    private $model;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->page->api = true;
    }

    public function personGet()
    {
        $post = $this->page->getPost();
        $id = $post['id'];

        $table = new PersonTable();
        $data = $table->getByCondition('Person_ID', $id);

        echo json_encode($data);
    }

    public function personGetAll()
    {
        $table = new PersonTable();
        $data = $table->getAll();

        echo json_encode($data);
    }
    
    public function adressGet()
    {
        $post = $this->page->getPost();
        $id = $post['id'];

        $table = new AdressTable;
        $data = $table->getByCondition('Adress_ID', $id);

        echo json_encode($data);
    }

    public function adressGetAll()
    {
        $table = new AdressTable;
        $data = $table->getAll();

        echo json_encode($data);
    }

    public function nameGet()
    {
        $post = $this->page->getPost();
        $id = $post['id'];

        $table = new NameTable;
        $data = $table->getByCondition('Name_ID', $id);

        echo json_encode($data);
    }

    public function nameGetAll()
    {
        $table = new NameTable;
        $data = $table->getAll();

        echo json_encode($data);
    }
    


    public function personCreate()
    {
        $post = $this->page->getPost();

        $this->model = new Person($post['Person_ID'], $post['Name_ID'], $post['Address_ID'], $post['Phone'], $post['Mail'], $post['DOB'], $post['Gender']);

        $PersonTable = new PersonTable();

        $NameTable = new NameTable();

        $Name = $NameTable->getByCondition('Name_ID', $post['Name_ID']);
        if (count($Name)) {
            if ($Name[0]['Name_ID'] == 2) {
                echo json_encode("Человек с таким именем уже существует");
                return;
            }

            $update = $NameTable->update('Name_ID', $post['Name_ID'], ['id_status' => 2]);

            if ($update) {
                $insert = $PersonTable->insert($this->model);

                if ($insert) {
                    echo json_encode("Запрос успешен");
                }
                else {
                    echo json_encode("Человек с такой парой ФИО-Адрес уже существует!");
                }
            }
            else {
                echo json_encode("Ошибка добавления человека!");
                return;
            }
        }
    }
}