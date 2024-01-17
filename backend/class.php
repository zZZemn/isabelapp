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

    public function checkSmesId($smesType, $id)
    {
        if ($smesType == 'accommodation') {
            $query = $this->conn->prepare("SELECT * FROM `accommodation` WHERE `ACCOM_ID` = '$id'");
        } elseif ($smesType == 'seller') {
            $query = $this->conn->prepare("SELECT * FROM `seller` WHERE `SELLER_ID` = '$id'");
        } elseif ($smesType == 'restaurant') {
            $query = $this->conn->prepare("SELECT * FROM `restaurant` WHERE `RESTO_ID` = '$id'");
        } else {
            return $smesType;
        }

        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }
}
