<?php
include_once '../../login/connect_db.php';

$targetDir = "upload/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES["file"]["name"]) && isset($_POST['descript']) && isset($_POST['namenews'])) {
        $image_news = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $image_news;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

        if (in_array($fileType, $allowTypes)) {
            $descript_news = $_POST['descript'];
            $name_news = $_POST['namenews'];

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $insert = $db->query("INSERT INTO news (name_news, image_news, uploaded_news, descript_news) VALUES ('$name_news', '$image_news', NOW(), '$descript_news')");

                if ($insert) {
                    $statusMsg = "The file <b>" . $image_news . "</b> has been uploaded successfully.";
                    header("Location: news.php");
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

