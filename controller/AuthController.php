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

    function acak_captcha()
    {
        // membuat gambar dengan menentukan ukuran
        $gbr = imagecreate(200, 50);
        // pengaturan font captcha
        $color = imagecolorallocate($gbr, 253, 252, 252);
        $font = "Allura-Regular.otf";
        $ukuran_font = 20;
        $posisi = 32;

        for ($i = 0; $i <= 5; $i++) {
            // jumlah karakter
            $angka = rand(0, 9);

            $_SESSION["Captcha"] .= $angka;

            $kemiringan = rand(20, 20);

            imagettftext($gbr, $ukuran_font, $kemiringan, 8 + 15 * $i, $posisi, $color, $font, $angka);
        }
    }
}
