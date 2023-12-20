<?php
include_once '../../login/connect_db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $db->query("SELECT * FROM personnel WHERE id_personnel = $id");

    if ($query->num_rows == 1) {
        $row = $query->fetch_assoc();
        $name_personnel = $row['name_personnel'];
        $status_personnel = $row['status_personnel'];
        $imageURL = 'upload/' . $row['image_personnel'];
    } else {
        echo "Personnel not found.";
        exit();
    }
} else {
    echo "Personnel ID not provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้บุคลลากร</title>
</head>

<body>
    <h1>แก้ไขบุคลลากร</h1>
    <img src="<?php echo $imageURL; ?>" alt="Product Image" style="max-width: 200px;"><br><br>
    <form action="update_personnel.php" method="POST">
        <input type="hidden" name='id_personnel' value='<?php echo $id; ?>'>
        ชื่อ: <input type="text" name='name_personnel' value='<?php echo $name_personnel; ?>'><br>
        ตำแหน่ง: <input type="text" name='status_personnel' value='<?php echo $status_personnel; ?>'><br>
        <input type="submit" value="Save Changes">
    </form>
</body>

</html>
