<?php
require('../../login/connect_db.php');

$id_list = $_GET["id_list"];

$sql = "SELECT * FROM list WHERE id_list = $id_list";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="form.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="container-fluid p-4 bg-success text-white text-center">
                <a href="list.php" class="text-white cool-link">
                    <h1 style="font-family: kanit;"><img src="https://www2.bsru.ac.th/news/wp-content/uploads/2015/08/BSRU-icon.png" ."width=60 height=60"> ข้อมูลรายการ การจัดการค่ายวิทยาศาสตร์</h1>
                </a>
            </div>
        </div>
    </div>
    <form action="upload_list.php" method="post">
        <div class="container mt-5">
            <div class="box">
                <h3 class="p-2">ข้อมูลเพิ่มเติม</h3>
                <div class="id" style="font-family: kanit;">
                    <h4>รหัสรายการ:</h4>&nbsp<?php echo $row["id_list"] ?>
                </div>
                <div class="teach" style="font-family: kanit;">
                    <h4>ผู้สอน:</h4>&nbsp<?php echo $row["teach_list"] ?>
                </div>
                <div class="branch" style="font-family: kanit;">
                    <h4>สาขาวิชา:</h4>&nbsp<?php if ($row["branch_list"] == "1") {
                        echo "เกษตรและเทคโนโลยี การเกษตร";
                    } elseif ($row["branch_list"] == "2") {
                        echo "คณิตศาสตร์";
                    } elseif ($row["branch_list"] == "3") {
                        echo "เคมี";
                    } elseif ($row["branch_list"] == "4") {
                        echo "นวัตกรรมและ เทคโนโลยีพอลิเมอร์";
                    } elseif ($row["branch_list"] == "5") {
                        echo "ชีววิทยา";
                    } elseif ($row["branch_list"] == "6") {
                        echo "จุลชีววิทยา";
                    } elseif ($row["branch_list"] == "7") {
                        echo "วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม";
                    } elseif ($row["branch_list"] == "8") {
                        echo "เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์";
                    } elseif ($row["branch_list"] == "9") {
                        echo "วิทยาศาสตร์และ เทคโนโลยีการอาหาร";
                    } elseif ($row["branch_list"] == "10") {
                        echo "อาชีวอนามัยและ ความปลอดภัย";
                    } elseif ($row["branch_list"] == "11") {
                        echo "สาธารณสุขศาสตร์";
                    } elseif ($row["branch_list"] == "12") {
                        echo "เทคนิคการแพทย์";
                    } elseif ($row["branch_list"] == "13") {
                        echo "การแพทย์แผนไทย";
                    } elseif ($row["branch_list"] == "14") {
                        echo "เทคโนโลยีสารสนเทศและ การสื่อสาร";
                    } elseif ($row["branch_list"] == "15") {
                        echo "แอนิเมชั่นและ ดิจิทัลมิเดีย";
                    } elseif ($row["branch_list"] == "16") {
                        echo "นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน";
                    } elseif ($row["branch_list"] == "17") {
                        echo "วิทยาการคอมพิวเตอร์";
                    } elseif ($row["branch_list"] == "18") {
                        echo "คณิตศาสตร์ (ค.บ.)";
                    } elseif ($row["branch_list"] == "19") {
                        echo "ฟิสิกส์ (ค.บ.)";
                    } elseif ($row["branch_list"] == "20") {
                        echo "เคมี (ค.บ.)";
                    } elseif ($row["branch_list"] == "21") {
                        echo "ชีววิทยา (ค.บ.)";
                    } elseif ($row["branch_list"] == "22") {
                        echo "คอมพิวเตอร์ศึกษา (ค.บ.)";
                    }
                    ?>
                </div>
                <div class="name" style="font-family: kanit;">
                    <h4>ชื่อรายการ:</h4>&nbsp<?php echo $row["name_list"] ?>
                </div>
                <div class="price" style="font-family: kanit;">
                    <h4>ราคา:</h4>&nbsp<?php echo $row["price_list"] ?>
                </div>
                <div class="concept mb-5" style="font-family: kanit;">
                    <h4>แนวคิด:</h4>&nbsp<?php echo $row["concept_list"] ?>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>