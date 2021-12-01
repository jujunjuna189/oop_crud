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

    function simpanData($data)
    {
        $rowsSql = array();
        $toBind = array();

        $coloumnNames = array_keys($data[0]);

        foreach ($data as $arrayIndex => $row) {
            $params = array();
            foreach ($row as $coloumnName => $coloumnValue) {
                $param = ":" . $coloumnName . $arrayIndex;
                $params[] = $param;
                $toBind[$param] = $coloumnValue;
            }
            $rowsSql[] = "(" . implode(", ", $params) . ")";
        }

        $sql = "INSERT INTO sekolah (" . implode(", ", $coloumnNames) . ") VALUES " . implode(", ", $rowsSql);
        $row = $this->db->prepare($sql);

        foreach ($toBind as $param => $val) {
            $row->bindValue($param, $val);
        }

        return $row->execute();
    }

    function updateData($data, $id)
    {
        $setPart = array();
        foreach ($data as $key => $value) {
            $setPart[] = $key . "=:" . $key;
        }

        $sql = "UPDATE sekolah SET " . implode(', ', $setPart) . " WHERE id = :id";

        $row = $this->db->prepare($sql);

        $row->bindValue(':id', $id);
        foreach ($data as $param => $val) {
            $row->bindValue($param, $val);
        }
        return $row->execute();
    }

    function hapusData($id)
    {
        $sql = "DELETE FROM sekolah WHERE id = ?";
        $row = $this->db->prepare($sql);
        return $row->execute(array($id));
    }
}
