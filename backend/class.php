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


    public function SMEsSignup($smesId, $table, $name, $address, $username, $password)
    {
        $checkUsername = $this->conn->prepare("SELECT * FROM `$table` WHERE `USERNAME` = '$username'");
        if ($checkUsername->execute()) {
            $usernameCheck = $checkUsername->get_result();
            if ($usernameCheck->num_rows > 0) {
                return 'Username is already existing!';
            }
        } else {
            return 400;
        }

        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        if ($table == 'accommodation') {
            $sql = "INSERT INTO `accommodation`(`ACCOM_ID`, `USERNAME`, `PASSWORD`, `ACCOM_NAME`, `ADDRESS`, `STATUS`) VALUES ('$smesId', '$username', '$passwordHashed', '$name', '$address', '2')";
        } elseif ($table == 'seller') {
            $sql = "INSERT INTO `seller`(`SELLER_ID`, `USERNAME`, `PASSWORD`, `STORE_NAME`, `ADDRESS`, `STATUS`) VALUES ('$smesId', '$username', '$passwordHashed', '$name', '$address', '2')";
        } elseif ($table == 'restaurant') {
            $sql = "INSERT INTO `restaurant`(`RESTO_ID`, `USERNAME`, `PASSWORD`, `RESTO_NAME`, `ADDRESS`, `STATUS`) VALUES ('$smesId', '$username', '$passwordHashed', '$name', '$address', '2')";
        } else {
            return 400;
        }

        $query = $this->conn->prepare($sql);
        if ($query->execute()) {
            return 200;
        }
    }

    public function getSMEsImages($id)
    {
        $query = $this->conn->prepare("SELECT * FROM `smes_img` WHERE `SMES_ID` = '$id'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function checkSMEsImgFileName($name)
    {
        $query = $this->conn->prepare("SELECT * FROM `smes_img` WHERE `FILE_NAME` = '$name'");
        if ($query->execute()) {
            $result = $query->get_result();
            return $result;
        }
    }

    public function uploadSMEsImage($id, $file)
    {
        $fileName = 'SMESIMG-' . str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
        $checkFileName = $this->checkSMEsImgFileName($fileName);
        while ($checkFileName->num_rows > 0) {
            $fileName = 'SMESIMG-' . str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
            $checkFileName = $this->checkSMEsImgFileName($fileName);
        }

        if (!empty($_FILES['accomImage']['size'])) {
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $destinationDirectory = __DIR__ . '../SMEsImg/';
            $newFileName = $fileName . '.' . $extension;
            $destination = $destinationDirectory . $newFileName;
            if (is_uploaded_file($file_tmp)) {
                if (move_uploaded_file($file_tmp, $destination)) {
                    $query = $this->conn->prepare("INSERT INTO `smes_img`(`SMES_ID`, `FILE_NAME`) VALUES ('$id','$newFileName')");
                    if ($query->execute()) {
                        return 200;
                    }
                } else {
                    return $destination;
                }
            } else {
                return "Error: File upload failed or file not found.";
            }
        } else {
            return 'File is empty';
        }
    }

    public function deleteSMEsImage($id, $fileName)
    {
        $fileToDelete = __DIR__ . '/SMEsImg/' . $fileName;
        $query = $this->conn->prepare("DELETE FROM `smes_img` WHERE `ID` = '$id'");
        if (file_exists($fileToDelete)) {
            if (unlink($fileToDelete) && $query->execute()) {
                return 200;
            } else {
                echo "Error deleting the file.";
            }
        } else {
            echo "File does not exist.";
            echo $fileToDelete;
        }
    }


    // Accommodation
    public function editAccomDetails($post)
    {
        $id = $post['accomId'];
        $name = $post['accomName'];
        $description = $post['accomDescription'];
        $address = $post['accomAddress'];
        $map = $post['accomMap'];
        $email = $post['accomEmail'];
        $contactNo = $post['accomContactNo'];
        $fb = $post['accomFB'];
        $ig = $post['accomIG'];

        $query = $this->conn->prepare("UPDATE `accommodation` SET `ACCOM_NAME`='$name',`ADDRESS`='$address',`MAP`='$map',`DESCRIPTION`='$description',`EMAIL`='$email',`CONTACT_NO`='$contactNo',`FACEBOOK_LINK`='$fb',`INSTAGRAM_LINK`='$ig',`STATUS`='1' WHERE `ACCOM_ID` = '$id'");
        if ($query->execute()) {
            return 200;
        }
    }

    // Resto
    public function editRestoDetails($post)
    {
        $id = $post['restoId'];
        $name = $post['restoName'];
        $description = $post['restoDescription'];
        $address = $post['restoAddress'];
        $map = $post['restoMap'];
        $email = $post['restoEmail'];
        $contactNo = $post['restoContactNo'];
        $fb = $post['restoFB'];
        $ig = $post['restoIG'];

        $query = $this->conn->prepare("UPDATE `restaurant` SET `RESTO_NAME`='$name',`ADDRESS`='$address',`MAP`='$map',`DESCRIPTION`='$description',`EMAIL`='$email',`CONTACT_NO`='$contactNo',`FACEBOOK_LINK`='$fb',`INSTAGRAM_LINK`='$ig',`STATUS`='1' WHERE `RESTO_ID` = '$id'");
        if ($query->execute()) {
            return 200;
        }
    }

    // Seller
    public function editSellerDetails($post)
    {
        $id = $post['sellerId'];
        $name = $post['sellerName'];
        $address = $post['sellerAddress'];
        $map = $post['sellerMap'];
        $email = $post['sellerEmail'];
        $contactNo = $post['sellerContactNo'];
        $fb = $post['sellerFB'];
        $ig = $post['sellerIG'];

        $query = $this->conn->prepare("UPDATE `seller` SET `STORE_NAME`='$name',`ADDRESS`='$address',`MAP`='$map',`EMAIL`='$email',`CONTACT_NO`='$contactNo',`FACEBOOK_LINK`='$fb',`INSTAGRAM_LINK`='$ig',`STATUS`='1' WHERE `SELLER_ID` = '$id'");
        if ($query->execute()) {
            return 200;
        }
    }
}
