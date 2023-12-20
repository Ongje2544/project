<?php
include_once '../../login/connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_news'], $_POST['name_news'], $_POST['descript_news'])) {
        $id_news = $_POST['id_news'];
        $name_news = $_POST['name_news'];
        $descript_news = $_POST['descript_news'];
        
        $stmt = $db->prepare("UPDATE news SET name_news = ?, descript_news = ? WHERE id_news = ?");
        $stmt->bind_param('ssi', $name_news, $descript_news, $id_news);

        if ($stmt->execute()) {
            header("Location: news.php");
            exit();
        } else {
            echo "Failed to update name. Please try again.";
        }
    } else {
        echo "Invalid data received.";
    }
} else {
    echo "Invalid request method.";
}
?>