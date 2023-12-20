<?php
include_once '../../login/connect_db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = $db->query("DELETE FROM personnel WHERE id_personnel = $id");

    if ($delete) {
        echo "Personnel deleted successfully.";
    } else {
        echo "Error deleting personnel.";
    }
} else {
    echo "Personnel ID not provided.";
}
?>
