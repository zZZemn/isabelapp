<?php
include('db.php');
date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }

    public function login($table, $username)
    {
        $query = $this->conn->prepare("SELECT * FROM `$table` WHERE `USERNAME` = '$username'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function checkUserId($table, $id)
    {
        $query = $this->conn->prepare("SELECT * FROM `$table` WHERE `ID` = '$id'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
}
