<?php
session_start();


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    include_once '../../login/connect_db.php';
    $findresult = mysqli_query($db, "SELECT * FROM users");
    $res = mysqli_fetch_array($findresult);
    $fname = $res['fname'];
    $lname = $res['lname'];
    $username = $res['username'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!--Link Google Font Mitr-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="stylebar.css">
        <link rel="stylesheet" href="stylepop.css">
        <link rel="stylesheet" href="order.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            body {
                font-family: kanit;
            }
        </style>
    </head>

    <body style="background-color:rgb(240, 240, 240) ;">
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
        <div class="ms-3 mt-3 mb-3">
            <h3>รายการสั่งจอง</h3>
        </div>
        <?php

        $a = 1;
        $b = 1;
        $c = 2;
        if ($c == $a + $b) {
        ?>
            <div class="box">
                <div class="ms-2 me-2 mb-5">
                    <table class="table table-sm table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ชื่อรายการ</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">ดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 1; $i <= 10; $i++) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td>ทำนายค่าก๊าซเรือนกระจกที่ลดลงจากการคัดแยกขยะ</td>
                                    <td>ค่าใช้จ่ายต่อนักเรียน 1 คน 30 คน x 300 บาท = 9,000 บาท เวลา 9.00-12.00 น. (มัธยมระดับชั้นเดียวกัน-ปรับเนื้อหาตามกลุ่มสาระวิทยาศาสตร์)</td>
                                    <td>
                                        <a href="delete_list.php?id_list=<?php echo $row["id_list"] ?>" onclick="return confirm('ลบรายการนี้, แน่ใจหรือไม่?')" style="text-decoration: none;">
                                            <button type="button" class="btn btn-outline-danger box">
                                                🗑️ ลบ
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="form-group date">
                <label for="date">ใส่วันดำเนินกิจกรรมที่กำหนด</label>
                <input type="date" name="date" class="form-control" id="date">
            </div>
            <div class="form-group address">
                <label for="address">ใส่สถานที่จัดกิจกรรม</label>
                <textarea rows="3" type="text" name="address" class="form-control" id="address"></textarea>
            </div>
            <div class="form-group info">
                <label for="info">ใส่ข้อมูลเพิ่มเติม</label>
                <textarea rows="2" type="text" name="info" class="form-control" id="info"></textarea>
            </div>
            <div class="form-group check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    ฉันยอมรับ<a href="rule.php" target="_blank">เงื่อนไข</a>
                </label>
            </div>
            <div class="form-group submit">
                <button name="submit" class="btn btn-primary">ดำเนินการจอง</button>
            </div>
        <?php
        } else {
        ?>
            <div class="ms-5 mt-5 mb-3">
                <h5 style="font-size: 18px; font-weight: 400;">ไม่มีรายการสั่งจอง</h5>
                <a href="index.php" style="text-decoration: none; font-size: 16px; font-weight: 350;">กลับไปหน้ารายการ</a>
            </div>
        <?php
        }
        ?>
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

} else {
    header("Location: ../index.php");
    exit();
}
?>