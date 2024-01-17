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

    public function SMEsSignup($table, $name, $address, $username, $password)
    {
        $smesId = $table . '-' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $checkSmesId = $this->checkSmesId($table, $smesId);
        while ($checkSmesId->num_rows > 0) {
            $smesId = $table . '-' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $checkSmesId = $this->checkSmesId($table, $smesId);
        }

        if ($table == 'accommodation') {
            $query = $this->conn->prepare("INSERT INTO `accommodation`(`ACCOM_ID`, `USERNAME`, `PASSWORD`, `ACCOM_NAME`, `ADDRESS`, `STATUS`) VALUES ('$smesId', '$username', '$password', '$name', '$address', '2')");
        } elseif ($table == 'seller') {
            $query = $this->conn->prepare("INSERT INTO `seller`(`SELLER_ID`, `USERNAME`, `PASSWORD`, `STORE_NAME`, `ADDRESS`, `STATUS`) VALUES ('$smesId', '$username', '$password', '$name', '$address', '2')");
        } elseif ($table == 'restaurant') {
            $query = $this->conn->prepare("INSERT INTO `restaurant`(`RESTO_ID`, `USERNAME`, `PASSWORD`, `RESTO_NAME`, `ADDRESS`, `STATUS`) VALUES ('$smesId', '$username', '$password', '$name', '$address', '2')");
        } else {
            return 400;
        }

        if ($query->execute()) {
            return 200;
        }
    }
}
