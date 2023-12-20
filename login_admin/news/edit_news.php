<?php
include_once '../../login/connect_db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = $db->query("SELECT * FROM news WHERE id_news = $id");

    if ($query->num_rows == 1) {
        $row = $query->fetch_assoc();
        $name_news = $row['name_news'];
        $descript_news = $row['descript_news'];
        $imageURL = 'upload/' . $row['image_news'];
    } else {
        echo "news not found.";
        exit();
    }
} else {
    echo "news ID not provided.";
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
    <img src="<?php echo $imageURL; ?>" alt="news Image" style="max-width: 200px;"><br><br>
    <form action="update_news.php" method="POST">
        <input type="hidden" name='id_news' value='<?php echo $id; ?>'>
        ชื่อ: <input type="text" name='name_news' value='<?php echo $name_news; ?>'><br>
        ตำแหน่ง: <input type="text" name='descript_news' value='<?php echo $descript_news; ?>'><br>
        <input type="submit" value="Save Changes">
    </form>
</body>

</html>
