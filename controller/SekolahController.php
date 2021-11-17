<?php

include '../Database.php';
include '../model/SekolahModel.php';

class SekolahController
{

    public $model;

    function __construct()
    {
        $db = new Database();
        $conn = $db->DBConnect();
        $this->model = new SekolahModel($conn);
    }

    function index()
    {
        $hasil = $this->model->tampil_data();
        return $hasil;
    }

    function edit()
    {
        $id = $_GET['id'];
        $hasil = $this->model->tampil_data_by_id($id);
        return $hasil;
    }
}
