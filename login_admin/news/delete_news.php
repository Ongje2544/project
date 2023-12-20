<?php
// Include the database connection file
include_once '../../login/connect_db.php';

// Check if product ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the product based on the ID
    $delete = $db->query("DELETE FROM news WHERE id_news = $id");

    if ($delete) {
        echo "News deleted successfully.";
    } else {
        echo "News deleting product.";
    }
} else {
    echo "News ID not provided.";
}
?>
