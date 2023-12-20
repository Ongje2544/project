<?php
include_once '../../login/connect_db.php';

$targetDir = "upload/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES["file"]["name"]) && isset($_POST['status']) && isset($_POST['nameperson'])) {
        $image_personnel = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $image_personnel;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

        if (in_array($fileType, $allowTypes)) {
            $status_personnel = $_POST['status'];
            $name_personnel = $_POST['nameperson'];

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $insert = $db->query("INSERT INTO personnel (name_personnel, image_personnel, uploaded_personnel, status_personnel) VALUES ('$name_personnel', '$image_personnel', NOW(), '$status_personnel')");

                if ($insert) {
                    $statusMsg = "The file <b>" . $image_personnel . "</b> has been uploaded successfully.";
                    header("Location: personnel.php");
                    exit();
                } else {
                    $statusMsg = "File upload failed. Please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to be uploaded.";
        }
    } else {
        $statusMsg = "Please select a file to upload, and enter status, and enter the name.";
    }
}
?>