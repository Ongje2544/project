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
                <h3 class="p-2">แก้ไขข้อมูลรายการ</h3>
                <div class="id" style="font-family: kanit;">
                    <i class="far fa-id-card"></i>
                    <input class="text-secondary" type="text" name="id_list" placeholder="กรุณากรอกรหัสรายการ" value="<?php echo $row["id_list"] ?>" readonly>
                </div>
                <div class="teach" style="font-family: kanit;">
                    <i class="fas fa-user-graduate"></i>
                    <input type="text" name="teach_list" placeholder="กรุณากรอกผู้สอน" size="25" maxlength="50" ” value="<?php echo $row["teach_list"] ?>" required />
                </div>
                <div class="branch" style="font-family: kanit;">
                <i class="fas fa-code-branch"></i>
                <?php
                if($row["branch_list"] == "1")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1' selected='seleted'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "2")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2' selected='seleted'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "3")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3' selected='seleted'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "4")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4' selected='seleted'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "5")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5' selected='seleted'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "6")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6' selected='seleted'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "7")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7' selected='seleted'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "8")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8' selected='seleted'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "9")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9' selected='seleted'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "10")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10' selected='seleted'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "11")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11' selected='seleted'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "12")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12' selected='seleted'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "13")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13' selected='seleted'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "14")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14' selected='seleted'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "15")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15' selected='seleted'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "16")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16' selected='seleted'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "17")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17' selected='seleted'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "18")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18' selected='seleted'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "19")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19' selected='seleted'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "20")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20' selected='seleted'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "21")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21' selected='seleted'>ชีววิทยา (ค.บ.)</option>
                    <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                elseif($row["branch_list"] == "22")
                {
                echo "<select class='form-select' name='branch_list'>
                    <option value='1'>เกษตรและเทคโนโลยี การเกษตร</option>
                    <option value='2'>คณิตศาสตร์</option>
                    <option value='3'>เคมี</option>
                    <option value='4'>นวัตกรรมและ เทคโนโลยีพอลิเมอร์</option>
                    <option value='5'>ชีววิทยา</option>
                    <option value='6'>จุลชีววิทยา</option>
                    <option value='7'>วิทยาศาสตร์และ เทคโนโลยีสิ่งแวดล้อม</option>
                    <option value='8'>เทคโนโลยีคอมพิวเตอร์อิเล็กทรอนิกส์ และฟิสิกส์</option>
                    <option value='9'>วิทยาศาสตร์และ เทคโนโลยีการอาหาร</option>
                    <option value='10'>อาชีวอนามัยและ ความปลอดภัย</option>
                    <option value='11'>สาธารณสุขศาสตร์</option>
                    <option value='12'>เทคนิคการแพทย์</option>
                    <option value='13'>การแพทย์แผนไทย</option>
                    <option value='14'>เทคโนโลยีสารสนเทศและ การสื่อสาร</option>
                    <option value='15'>แอนิเมชั่นและ ดิจิทัลมิเดีย</option>
                    <option value='16'>นวัตกรรมการจัดการเกษตรและ ซัพพลายเซน</option>
                    <option value='17'>วิทยาการคอมพิวเตอร์</option>
                    <option value='18'>คณิตศาสตร์ (ค.บ.)</option>
                    <option value='19'>ฟิสิกส์ (ค.บ.)</option>
                    <option value='20'>เคมี (ค.บ.)</option>
                    <option value='21'>ชีววิทยา (ค.บ.)</option>
                    <option value='22' selected='seleted'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                    </select>";
                }
                ?>
                </div>
                <div class="name" style="font-family: kanit;">
                    <i class="fas fa-list"></i>
                    <input type="text" name="name_list" placeholder="กรุณากรอกชื่อรายการ" size="25" maxlength="50" ” value="<?php echo $row["name_list"] ?>" required />
                </div>
                <div class="price" style="font-family: kanit;">
                    <i class="far fa-money-bill-alt"></i>
                    <input type="text" name="price_list" placeholder="กรุณากรอกราคารายการ" size="25" maxlength="50" ” value="<?php echo $row["price_list"] ?>" required />
                </div>
                <div class="concept" style="font-family: kanit;">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <textarea rows="10" type="text" name="concept_list" placeholder="กรุณากรอกแนวคิด(concept)"  required><?php echo $row["concept_list"] ?></textarea>
                </div>
                <div class="pt-3 pb-4">
                    <button class="btn btn-outline-info bt">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>