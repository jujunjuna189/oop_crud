<?php

class AuthModel
{
    protected $db;
    function __construct($db)
    {
        $this->db = $db;
    }

    function proses_login($username, $password)
    {
        $row = $this->db->prepare('SELECT * FROM tbl_user WHERE username=? AND password=md5(?)');
        $row->execute(array($username, $password));
        $count = $row->rowCount();

        if ($count > 0) {
            return $row->fetch();
        } else {
            return 'gagal';
        }
    }
}
