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
        return $hasil = $row->fetchAll();
    }
}
