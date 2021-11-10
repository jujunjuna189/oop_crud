<?php

class Database
{
    function DBConnect()
    {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'db_oop_jun';

        try {
            $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $dbConnection->exec("set names utf8");
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        } catch (PDOException $e) {
            return 'Connection failed: ' . $e->getMessage();
        }
    }
}
