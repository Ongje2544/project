<?php
include_once '../../login/connect_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["id_personnel"], $_POST["name_personnel"], $_POST["status_personnel"])) {
        $id_personnel = $_POST["id_personnel"];
        $name_personnel = $_POST["name_personnel"];
        $status_personnel = $_POST["status_personnel"];
        
        $stmt = $db->prepare("UPDATE personnel SET name_personnel = ?, status_personnel = ? WHERE id_personnel = ?");
        $stmt->bind_param('ssi', $name_personnel, $status_personnel, $id_personnel);

        if ($stmt->execute()) {
            header("Location: personnel.php");
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