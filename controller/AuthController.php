<?php
include '../Database.php';
include '../model/AuthModel.php';

class AuthController
{

    public $model;

    function __construct()
    {
        $db = new Database();
        $conn = $db->DBConnect();
        $this->model = new AuthModel($conn);
    }

    function proses_login()
    {
        if (isset($_POST['login'])) {
            $username = strip_tags($_POST['username']);
            $password = strip_tags($_POST['password']);
            $result = $this->model->proses_login($username, $password);

            if ($result  == 'gagal') {
                header("Location:login.php");
            } else {
                session_start();
                $_SESSION['nama_pengguna'] = $result['nama_pengguna'];
                $_SESSION['username'] = $result['username'];
                header("Location:content.php?action=Login&&status=success");
            }
        }
    }
}
