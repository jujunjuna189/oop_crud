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
        session_start();
        if (!empty($_SESSION)) {
            $hasil = $this->model->tampil_data();
            return $hasil;
        } else {
            header('Location:login.php');
        }
    }

    function setting_notif()
    {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            $bg = $_GET['status'] == 'success' ? 'info' : 'danger';

            $data['action'] = $action;
            $data['bg'] = $bg;

            return $data;
        }
    }

    function edit()
    {
        $id = $_GET['id'];
        $hasil = $this->model->tampil_data_by_id($id);
        return $hasil;
    }

    function simpanData()
    {
        if (isset($_POST['add_data'])) {
            $nis = $_POST['nis'];
            $nama_sekolah = $_POST['nama_sekolah'];
            $alamat_sekolah = $_POST['alamat_sekolah'];
            $longitude = $_POST['longitude'];
            $latitude = $_POST['latitude'];

            $data[] = array(
                'nis'               => $nis,
                'nama_sekolah'      => $nama_sekolah,
                'alamat_sekolah'    => $alamat_sekolah,
                'longitude'         => $longitude,
                'latitude'          => $latitude,
            );

            $result = $this->model->simpanData($data);

            if ($result) {
                header("location:content.php?action=Add&&status=success");
            } else {
                header("location:content.php?action=Add&&status=failed");
            }
        }
    }

    function updateData()
    {
        if (isset($_POST['edit_data'])) {
            $id = $_GET['id'];

            $nis = $_POST['nis'];
            $nama_sekolah = $_POST['nama_sekolah'];
            $alamat_sekolah = $_POST['alamat_sekolah'];
            $longitude = $_POST['longitude'];
            $latitude = $_POST['latitude'];

            $data = array(
                'nis'               => $nis,
                'nama_sekolah'      => $nama_sekolah,
                'alamat_sekolah'    => $alamat_sekolah,
                'longitude'         => $longitude,
                'latitude'          => $latitude,
            );

            $result = $this->model->updateData($data, $id);

            if ($result) {
                header("location:content.php?action=Update&&status=success");
            } else {
                header("location:content.php?action=Update&&status=failed");
            }
        }
    }

    function hapusData()
    {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];

            $result = $this->model->hapusData($id);

            if ($result) {
                header("Location:content.php?action=Update&&status=success");
            } else {
                header("Location:content.php?action=Update&&status=failed");
            }
        }
    }

    function logout()
    {
        if (isset($_POST['logout'])) {
            session_start();
            session_destroy();
            header('Location:login.php?signout=yes');
        }
    }
}
