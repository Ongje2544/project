<?php
session_start();


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    include_once '../../login/connect_db.php';
    $findresult = mysqli_query($db, "SELECT * FROM users");
    $res = mysqli_fetch_array($findresult);
    $fname = $res['fname'];
    $lname = $res['lname'];
    $username = $res['username'];

    if (!isset($_POST["id_list"]) && !isset($_POST["branch_list"])) {

        $branch_list = '0';
        $id_list = "";

        $sql = "SELECT * FROM list";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>ระบบการจัดการค่ายฝึกอบรมค่ายวิทยาศาสตร์ มหาวิทยาลัยราชภัฎบ้านสมเด็จเจ้าพระยา</title>
            <!--Link Google Font Mitr-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="list.css">
            <link rel="stylesheet" href="stylebar.css">
            <link rel="stylesheet" href="stylepop.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

                body {
                    font-family: kanit;
                }
            </style>
        </head>

        <body>
            <div class="navbar">
                <div class="container-fluid mt-2">
                    <a class="mainBSRU" href="../index.php" style="text-decoration: none;">BSRU</a>
                    <a class="cart text-right" href="order.php" style="text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                        </svg>
                    </a>
                    <a class="cart ms-4 me-3" id="profile" href="#" style="text-decoration: none;">
                        <?= $fname ?> <?= $lname ?>
                    </a>
                </div>
                <div class="ms-3 mt-3 mb-1">
                    <div class="subMain">
                        <div class="subBSRU">
                            <a class="sub" href="../aboutus.php" style="text-decoration: none;">เกี่ยวกับเรา</a>
                            <a class="sub" href="../personnel.php" style="text-decoration: none;">บุคลากร</a>
                            <a class="sub" href="../news.php" style="text-decoration: none;">ข่าวสาร</a>
                            <a class="sub" href="../service.php" style="text-decoration: none;">บริการ</a>
                        </div>
                        <div class="menu">
                            <a class="subright" href="index.php" style="text-decoration: none;">รายการ</a>
                        </div>
                        <div class="ht">
                            <a class="subright" href="history.php" style="text-decoration: none;">ประวัติการจอง</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="container-fluid" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-lg-10 container p-4 rounded-4" style="background-color: #95ffab;">
                        <form action="index.php" method="post">
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
                                <table class="table tb table-striped table-hover" cellspacing="0" cellpadding="4" style="font-weight: 300;">
                                    <thead>
                                        <tr class="table-success">
                                            <th scope="col">#</th>
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
                                                <tr>
                                                    <th scope="row"><?php print $i; ?></th>
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
                                                        <a href="order.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                            <button type="button" class="btn btn-outline-success box">
                                                                🛒 จอง
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
                                                <tr>
                                                    <th scope="row"><?php print $i; ?></th>
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
                                                        <a href="order.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                            <button type="button" class="btn btn-outline-success box">
                                                                🛒 จอง
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
                                                <tr>
                                                    <th scope="row"><?php print $i; ?></th>
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
                                                        <a href="order.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                            <button type="button" class="btn btn-outline-success box">
                                                                🛒 จอง
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
                                                <tr>
                                                    <th scope="row"><?php print $i; ?></th>
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
                                                        <a href="order.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                            <button type="button" class="btn btn-outline-success box">
                                                                🛒 จอง
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
            <div class="popup">
                <div class="popup-case">
                    <div class="popup-content">
                        <img src="../logo/close.png" alt="Close" class="close">
                        <?php $query = $db->query("SELECT * FROM users");
                        if ($query->num_rows > 0) {
                            $row = $query->fetch_assoc();
                            $imageURL = '../../upload/' . $row['image'];
                        ?>
                            <div class="container">
                                <div>
                                    <img src="<?php echo $imageURL ?>" alt="" width="200px" class="mt-4 img-fluid rounded-circle" style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.30);">
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="popup-info">
                            <p class="pt-3">ชื่อ : <?= $fname ?> <?= $lname ?></p>
                            <p class="pb-3">ชื่อผู้ใช้ : <?= $username ?> </p>
                        </div>
                        <div class="mg">
                            <a class="pop-edit me-3" href="../editprofile.php">แก้ไขโปรไฟล์</a>
                            <a class="pop-logout" href="logout.php">ออกจากระบบ</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <script>
                document.querySelector("#profile").addEventListener("click", function() {
                    document.querySelector(".popup-case").classList.add("active");
                })
                document.querySelector("#profile").addEventListener("click", function() {
                    document.querySelector(".popup-content").classList.add("active");
                })
                document.querySelector("#profile").addEventListener("click", function() {
                    document.querySelector(".close").classList.add("at_close");
                })
                document.querySelector(".close").addEventListener("click", function() {
                    document.querySelector(".popup-case").classList.remove("active");
                })
                document.querySelector(".close").addEventListener("click", function() {
                    document.querySelector(".popup-content").classList.remove("active");
                })
                document.querySelector(".close").addEventListener("click", function() {
                    document.querySelector(".close").classList.remove("at_close");
                })

                //สไล เปลี่ยนหน้า
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>

        </html>

    <?php
    } elseif (isset($_POST["id_list"]) && isset($_POST["branch_list"])) {
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
            <title>ระบบการจัดการค่ายฝึกอบรมค่ายวิทยาศาสตร์ มหาวิทยาลัยราชภัฎบ้านสมเด็จเจ้าพระยา</title>
            <!--Link Google Font Mitr-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="list.css">
            <link rel="stylesheet" href="stylebar.css">
            <link rel="stylesheet" href="stylepop.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

                body {
                    font-family: kanit;
                }
            </style>
        </head>

        <body>
            <div class="navbar">
                <div class="container-fluid mt-2">
                    <a class="mainBSRU" href="../index.php" style="text-decoration: none;">BSRU</a>
                    <a class="cart text-right" href="order.php" style="text-decoration: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                        </svg>
                    </a>
                    <a class="cart ms-4 me-3" id="profile" href="#" style="text-decoration: none;">
                        <?= $fname ?> <?= $lname ?>
                    </a>
                </div>
                <div class="ms-3 mt-3 mb-1">
                    <div class="subMain">
                        <div class="subBSRU">
                            <a class="sub" href="../aboutus.php" style="text-decoration: none;">เกี่ยวกับเรา</a>
                            <a class="sub" href="../personnel.php" style="text-decoration: none;">บุคลากร</a>
                            <a class="sub" href="../news.php" style="text-decoration: none;">ข่าวสาร</a>
                            <a class="sub" href="../service.php" style="text-decoration: none;">บริการ</a>
                        </div>
                        <div class="menu">
                            <a class="subright" href="index.php" style="text-decoration: none;">รายการ</a>
                        </div>
                        <div class="ht">
                            <a class="subright" href="history.php" style="text-decoration: none;">ประวัติการจอง</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="container-fluid" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-lg-10 container p-4 rounded-4" style="background-color: #95ffab;">
                        <form action="index.php" method="post">
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
                                <table class="table tb table table-striped table-hover" cellspacing="0" cellpadding="4" style="font-weight: 300;">
                                    <thead>
                                        <tr class="table-success">
                                            <th scope="col">#</th>
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
                                                <tr>
                                                    <th scope="row"><?php print $i; ?></th>
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
                                                        <a href="order.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                            <button type="button" class="btn btn-outline-success box">
                                                                🛒 จอง
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
                                                <tr>
                                                    <th scope="row"><?php print $i; ?></th>
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
                                                        <a href="order.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                            <button type="button" class="btn btn-outline-success box">
                                                                🛒 จอง
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
                                                <tr>
                                                    <th scope="row"><?php print $i; ?></th>
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
                                                        <a href="order.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                            <button type="button" class="btn btn-outline-success box">
                                                                🛒 จอง
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
                                                <tr>
                                                    <th scope="row"><?php print $i; ?></th>
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
                                                        <a href="order.php?id_list=<?php echo $row["id_list"] ?>" style="text-decoration: none;">
                                                            <button type="button" class="btn btn-outline-success box">
                                                                🛒 จอง
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
            <div class="popup">
                <div class="popup-case">
                    <div class="popup-content">
                        <img src="../logo/close.png" alt="Close" class="close">
                        <?php $query = $db->query("SELECT * FROM users");
                        if ($query->num_rows > 0) {
                            $row = $query->fetch_assoc();
                            $imageURL = '../../upload/' . $row['image'];
                        ?>
                            <div class="container">
                                <div>
                                    <img src="<?php echo $imageURL ?>" alt="" width="200px" class="mt-4 img-fluid rounded-circle" style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.30);">
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="popup-info">
                            <p class="pt-3">ชื่อ : <?= $fname ?> <?= $lname ?></p>
                            <p class="pb-3">ชื่อผู้ใช้ : <?= $username ?> </p>
                        </div>
                        <div class="mg">
                            <a class="pop-edit me-3" href="../editprofile.php">แก้ไขโปรไฟล์</a>
                            <a class="pop-logout" href="logout.php">ออกจากระบบ</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <script>
                document.querySelector("#profile").addEventListener("click", function() {
                    document.querySelector(".popup-case").classList.add("active");
                })
                document.querySelector("#profile").addEventListener("click", function() {
                    document.querySelector(".popup-content").classList.add("active");
                })
                document.querySelector("#profile").addEventListener("click", function() {
                    document.querySelector(".close").classList.add("at_close");
                })
                document.querySelector(".close").addEventListener("click", function() {
                    document.querySelector(".popup-case").classList.remove("active");
                })
                document.querySelector(".close").addEventListener("click", function() {
                    document.querySelector(".popup-content").classList.remove("active");
                })
                document.querySelector(".close").addEventListener("click", function() {
                    document.querySelector(".close").classList.remove("at_close");
                })

                //สไล เปลี่ยนหน้า
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>

        </html>
<?php
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>