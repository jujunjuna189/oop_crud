<?php

class SekolahModel
{
    protected $db;
    function __construct($db)
    {
        $this->db = $db;
    }

    function tampil_data()
    {
        $row = $this->db->prepare("SELECT * FROM sekolah");
        $row->execute();
        return $row->fetchAll();
    }

    function tampil_data_by_id($id = '')
    {
        $row = $this->db->prepare("SELECT * FROM sekolah WHERE id = '$id'");
        $row->execute();
        return $row->fetch();
    }
}
