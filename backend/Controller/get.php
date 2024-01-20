<?php
include('../class.php');
$db = new global_class();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['SubmitType'])) {
        if ($_GET['SubmitType'] == 'GetNewsImages') {
            $getImages = $db->getSMEsImages($_GET['id']);
            $data = [];
            while ($img = $getImages->fetch_assoc()) {
                $images = [
                    "id" => $img['ID'],
                    "smes_id" => $img['SMES_ID'],
                    "file_name" => $img['FILE_NAME']
                ];

                $data[] = $images;
            }

            echo json_encode($data);
        }
    }
}
