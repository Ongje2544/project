<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>
    <?php
include_once '../../login/connect_db.php';

$id_list = $_GET["id_list"];

$sql = "DELETE FROM list WHERE id_list = $id_list";
$result=mysqli_query($conn,$sql);

if($result){
    ?>
    <script>swal({
    title:"ลบข้อมูลเรียบร้อย!",
    text: "กด 'ตกลง' เพื่อกลับไปหน้าหลัก.",
    type: "success",
        }, function(){
            window.location.href = "list.php";
        });
    </script>
<?php
}
else
{
    echo mysqli_error($conn);
}

?>
</body>
</html>
