<?php

include '../Database.php';
include '../model/SekolahModel.php';

// class SekolahController
// {
//     private $model;

// function __construct()
// {
$db = new Database();
$conn = $db->DBConnect();
$model = new SekolahModel($conn);
// }

// function index()
// {
$hasil = $model->tampil_data();
$no = 1;
    // }
// }
