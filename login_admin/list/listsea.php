<?php
include_once '../../login/connect_db.php';

$id_list = $_POST["id_list"];
$branch_list = $_POST["branch_list"];

$sql = "SELECT * FROM list";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$id_list = $_POST["id_list"];
$sql1 = "SELECT * FROM list WHERE id_list LIKE '%$id_list%' ORDER BY id_list ASC";
$result1 = mysqli_query($conn, $sql1);

$branch_list = $_POST["branch_list"];
$sql2 = "SELECT * FROM list WHERE branch_list='$branch_list'";
$result2 = mysqli_query($conn, $sql2);

$sql3 = "SELECT * FROM list WHERE id_list LIKE '%$id_list%' AND branch_list='$branch_list'";
$result3 = mysqli_query($conn, $sql3);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="list.css">
    <style>
        .tb {
            border-collapse: collapse;
            border-radius: 1em;
            overflow: hidden;
        }

        a:hover.a {
            box-shadow: inset 100px 0 0 0 #54b3d6;
            color: white;
            background-color: red;
        }

        .a {
            word-wrap: break-word;
            width: 25rem;

        }

        .b {
            word-break: break-word;
            width: 25rem;
        }
    </style>
</head>

<body style="background-color: #e2ffde;">
    <div class="container-fluid">
        <div class="row">
            <?php
            $sql = "SELECT * FROM list";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            ?>
            <div class="container-fluid p-4 bg-success text-white text-center" style="font-family: kanit; font-weight: bold">
                <a class="text-white cool-link" href="list.php" style="text-decoration: none;">
                    <h1><img src="https://www2.bsru.ac.th/news/wp-content/uploads/2015/08/BSRU-icon.png" ."width=60 height=60"> ข้อมูลรายการ การจัดการค่ายวิทยาศาสตร์</h1>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 30px;">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-lg-10 container p-4 rounded-4" style="background-color: #95ffab;">
                <form action="listsea.php" method="post">
                    <div class="col-3">
                        <label class="form-label pt-2" for="id_list" style="font-size: 18px; font-family: kanit; font-weight:bold">รหัสรายการ:</label>
                        <div class="input-group" id="id_list">
                            <span class="input-group-text" id="id_list">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="กรอกรหัสรายการ" aria-label="Input group example" aria-describedby="basic-addon1" name="id_list" id="id_list" size="25" maxlength="50">
                        </div>
                    </div>
                    <label class="form-label" for="branch" style="font-size: 18px; font-family: kanit; font-weight:bold">เลือกสาขา:</label>
                    <div class="input-group" id="branch">
                        <span class="input-group-text" id="branch">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diagram-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H11a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 5 7h2.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM3 11.5A1.5 1.5 0 0 1 4.5 10h1A1.5 1.5 0 0 1 7 11.5v1A1.5 1.5 0 0 1 5.5 14h-1A1.5 1.5 0 0 1 3 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1A1.5 1.5 0 0 1 9 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                            </svg>
                        </span>
                        <select class="form-select" name='branch_list' id="branch">
                            <option value='0' selected='seleted'>--ทุกสาขา--</option>
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
                            <option value='22'>คอมพิวเตอร์ศึกษา (ค.บ.)</option>
                        </select>
                    </div>

                    <div class="pt-3 ps-2">
                        <button type="find" class="btn btn-secondary">
                            🔍 ค้นหา
                        </button>
                    </div>
                </form>
                <div class="pt-3 ps-2 pb-2">
                    <h3 style="font-weight:bold;">เพิ่มรายการ</h3>
                    <form action="add_list.php" method="POST" enctype="multipart/form-data">
                        <div class="col-3">
                            <label class="form-label pt-2" for="id_list" style="font-size: 18px; font-family: kanit; font-weight:bold">รหัสรายการ:</label>
                            <div class="input-group" id="id_list">
                                <span class="input-group-text" id="id_list">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" placeholder="กรอกรหัสรายการ" aria-label="Input group example" aria-describedby="basic-addon1" name="id_list" id="id_list" size="25" maxlength="50" required pattern="[0-9]{5}">
                            </div>
                        </div>
                        <label class="form-label" for="teach" style="font-size: 18px; font-family: kanit; font-weight:bold">ชื่อผู้สอน:</label>
                        <div class="input-group" id="teach">
                            <span class="input-group-text" id="teach">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="กรอกชื่อผู้สอน" aria-label="Input group example" aria-describedby="basic-addon1" name="teach_list" id="teach" size="25" maxlength="50" required>
                        </div>
                        <label class="form-label" for="branch" style="font-size: 18px; font-family: kanit; font-weight:bold">เลือกสาขา:</label>
                        <div class="input-group" id="branch">
                            <span class="input-group-text" id="branch">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-diagram-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H11a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 5 7h2.5V6A1.5 1.5 0 0 1 6 4.5v-1zM8.5 5a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1zM3 11.5A1.5 1.5 0 0 1 4.5 10h1A1.5 1.5 0 0 1 7 11.5v1A1.5 1.5 0 0 1 5.5 14h-1A1.5 1.5 0 0 1 3 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm4.5.5a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1A1.5 1.5 0 0 1 9 12.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                                </svg>
                            </span>
                            <select class="form-select" name='branch_list' id="branch">
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
                            </select>
                        </div>
                        <label class="form-label" for="name" style="font-size: 18px; font-family: kanit; font-weight:bold">ชื่อรายการ:</label>
                        <div class="input-group" id="name">
                            <span class="input-group-text" id="name">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z" />
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="กรอกชื่อรายการ" aria-label="Input group example" aria-describedby="basic-addon1" name="name_list" id="name" size="25" maxlength="50" required>
                        </div>
                        <label class="form-label" for="price" style="font-size: 18px; font-family: kanit; font-weight:bold">ราคารายการ:</label>
                        <div class="input-group" id="price">
                            <span class="input-group-text" id="price">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="กรอกราคา" aria-label="Input group example" aria-describedby="basic-addon1" name="price_list" id="price" size="25" maxlength="50" required>
                        </div>
                        <label class="form-label" for="concept" style="font-size: 18px; font-family: kanit; font-weight:bold">แนวคิด Concept:</label>
                        <div class="input-group" id="concept">
                            <span class="input-group-text" id="concept">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" placeholder="กรอกเนื้อหาของรายการ" aria-label="Input group example" aria-describedby="basic-addon1" name="concept_list" id="concept" size="25" maxlength="50" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-4">
                            🎓 เพิ่มรายการ
                        </button>
                    </form>
                </div>
                <div class="row">
                    <?php
                    if (!empty($statusMsg)) { ?>
                        <div class="alert alert-secondary" role="alert">
                            <?php
                            echo $statusMsg;
                            ?>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="container pt-2 mt-2">
                    <center>
                        <table class="table tb" cellspacing="0" cellpadding="4">
                            <thead>
                                <tr style="background-color: #31dd76;">
                                    <th>#</th>
                                    <th>รหัสรายการ</th>
                                    <th class="text-center">ชื่อรายการ</th>
                                    <th class="text-center">ราคา</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <?php
                            if ($branch_list == '0' && $id_list == "") {
                                for ($i = 1; $i < $row = mysqli_fetch_assoc($result); $i++) {
                            ?>
                                    <tbody>
                                        <tr style="background-color: #fffbf1;">
                                            <td><?php print $i; ?></td>
                                            <td><?= $row['id_list'] ?></td>
                                            <td class="a"><?= $row['name_list'] ?> <a href="concept_list.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                                                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                                    </svg>
                                                </a></td>
                                            <td class="b"><?= $row['price_list'] ?></td>
                                            <td>
                                                <a href="update_list.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                    <button type="button" class="btn btn-primary">
                                                        ✍🏻 แก้ไข
                                                    </button>
                                                </a>&nbsp;
                                                <a href="delete_list.php?id_list=<?php echo $row["id_list"] ?>" onclick="return confirm('ลบรายการนี้, แน่ใจหรือไม่?')" style="text-decoration: none;">
                                                    <button type="button" class="btn btn-outline-danger box">
                                                        🗑️ ลบ
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                            } elseif ($branch_list != '0' && $id_list != "") {
                                for ($i = 1; $i < $row = mysqli_fetch_assoc($result3); $i++) {
                                ?>
                                    <tbody>
                                        <tr style="background-color: #fffbf1;">
                                            <td><?php print $i; ?></td>
                                            <td><?= $row['id_list'] ?></td>
                                            <td class="a"><?= $row['name_list'] ?> <a href="concept_list.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                                                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                                    </svg>
                                                </a></td>
                                            <td class="b"><?= $row['price_list'] ?></td>
                                            <td>
                                                <a href="update_list.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                    <button type="button" class="btn btn-primary">
                                                        ✍🏻 แก้ไข
                                                    </button>
                                                </a>&nbsp;
                                                <a href="delete_list.php?id_list=<?php echo $row["id_list"] ?>" onclick="return confirm('ลบรายการนี้, แน่ใจหรือไม่?')" style="text-decoration: none;">
                                                    <button type="button" class="btn btn-outline-danger box">
                                                        🗑️ ลบ
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                            <?php
                                }
                            }
                            ?>
                            <?php
                            if ($branch_list != '0' && $id_list == "") {
                                for ($i = 1; $i < $row = mysqli_fetch_assoc($result2); $i++) {
                            ?>
                                    <tbody>
                                        <tr style="background-color: #fffbf1;">
                                            <td><?php print $i; ?></td>
                                            <td><?= $row['id_list'] ?></td>
                                            <td class="a"><?= $row['name_list'] ?> <a href="concept_list.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                                                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                                    </svg>
                                                </a></td>
                                            <td class="b"><?= $row['price_list'] ?></td>
                                            <td>
                                                <a href="update_list.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                    <button type="button" class="btn btn-primary">
                                                        ✍🏻 แก้ไข
                                                    </button>
                                                </a>&nbsp;
                                                <a href="delete_list.php?id_list=<?php echo $row["id_list"] ?>" onclick="return confirm('ลบรายการนี้, แน่ใจหรือไม่?')" style="text-decoration: none;">
                                                    <button type="button" class="btn btn-outline-danger box">
                                                        🗑️ ลบ
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                            } elseif ($branch_list == '0' && $id_list != "") {
                                for ($i = 1; $i < $row = mysqli_fetch_assoc($result1); $i++) {
                                ?>
                                    <tbody>
                                        <tr style="background-color: #fffbf1;">
                                            <td><?php print $i; ?></td>
                                            <td><?= $row['id_list'] ?></td>
                                            <td class="a"><?= $row['name_list'] ?> <a href="concept_list.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                                                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                                    </svg>
                                                </a></td>
                                            <td class="b"><?= $row['price_list'] ?></td>
                                            <td>
                                                <a href="update_list.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                    <button type="button" class="btn btn-primary">
                                                        ✍🏻 แก้ไข
                                                    </button>
                                                </a>&nbsp;
                                                <a href="delete_list.php?id_list=<?php echo $row["id_list"] ?>" onclick="return confirm('ลบรายการนี้, แน่ใจหรือไม่?')" style="text-decoration: none;">
                                                    <button type="button" class="btn btn-outline-danger box">
                                                        🗑️ ลบ
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </center>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>