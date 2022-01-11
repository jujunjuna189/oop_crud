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
            session_start();
            if ($_POST['code'] == $_SESSION['code']) {
                $username = strip_tags($_POST['username']);
                $password = strip_tags($_POST['password']);
                $result = $this->model->proses_login($username, $password);

                if ($result  == 'gagal') {
                    header("Location:login.php");
                } else {
                    $_SESSION['nama_pengguna'] = $result['nama_pengguna'];
                    $_SESSION['username'] = $result['username'];
                    header("Location:content.php?action=Login&&status=success");
                }
            } else {
                header("Location:login.php?chaptcha=chaptcha");
            }
        }
    }

    function acakCaptcha()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

        //untuk menyatakan $pass sebagai array
        $pass = array();

        //masukkan -2 dalam string length
        $panjangAlpha = strlen($alphabet) - 2;
        for ($i = 0; $i < 5; $i++) {
            $n = rand(0, $panjangAlpha);
            $pass[] = $alphabet[$n];
        }

        //ubah array menjadi string
        return implode($pass);
    }
}
