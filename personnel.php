<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    header("Location: logged/index.php");
    exit();
} else {
?>

    <?php
    include_once 'login/connect_db.php';
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
        <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styleindex.css">
        <link rel="stylesheet" href="stylepop.css">
        <link rel="stylesheet" href="footer.css">
        <link rel="stylesheet" href="personnel.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>

    <body class="background" style="font-family: mitr;">
        <div class="navBar">
            <div class="container-fluid">
                <div class="row ps-3 pt-3 pb-2 justify-content-between align-items-center">
                    <div class="col-lg-4">
                        <center><a href="index.php">
                                <img src="logo/LogoBSRU.png" width="300">
                            </a></center>
                    </div>
                    <div class="col topbar">
                        <center><a class="btn text-decoration-none" href="aboutus.php">
                                &nbspเกี่ยวกับเรา
                            </a>

                            <a class="btn text-decoration-none" href="personnel.php">
                                &nbspบุคลากร
                            </a>
                            <a class="btn text-decoration-none" href="news.php">
                                &nbspข่าวสาร
                            </a>
                            <a class="btn text-decoration-none" href="service.php">
                                &nbspบริการ
                            </a>
                        </center>
                    </div>
                    <div class="col-lg-3 justify-content-end">
                        <a class="links-register" href="login/register.php">ลงทะเบียน</a>
                        <a class="links-login" id="login" href="#">เข้าสู่ระบบ</a>
                    </div>
                </div>
                <div class="row ps-5 pt-1 pb-3 justify-content-between align-items-center">
                    <div class="col-10">
                        <img src="logo/Sci-Lab.png" class="sci">
                    </div>
                    <div class="col-2">
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-2">
            <?php
            $query = $db->query("SELECT * FROM personnel ORDER BY uploaded_personnel DESC");
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $imageURL = 'login_admin/personnel/upload/' . $row['image_personnel'];
            ?>
                    <center>
                        <div class="case">
                            <div class="row">
                                <div class="col-lg-5">
                                    <img src="<?php echo $imageURL ?>" alt="" width="200" height="200" style="border-radius: 15px; margin-left: 3rem;">
                                </div>
                                <div class="col-lg-7 pt-5">
                                    <h3 style="font-size: 35px;"><?php echo $row['name_personnel']; ?></h3>
                                    <h4 style="font-size: 28px;"><?php echo $row['status_personnel']; ?></h4>
                                </div>
                            </div>
                        </div>
                    </center>
                <?php
                }
            } else {
                ?>
                <center>
                    <h1 class="mt-5">No image found...</h1>
                    <img src="https://media.makeameme.org/created/nothing-absolutely-nothing-37ab272bb4.jpg" alt="" style="margin: 5rem;">
                </center>
            <?php
            }
            ?>
        </div>
        </div>
        <footer class="footer">
        <div class="footer_container">
            <div class="footer_top">
                <div class="footer-info">
                    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d567.8769142770467!2d100.48986815754665!3d13.732280362529934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e298fe8dcd0d13%3A0x8166225c8081ce3a!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4Lij4Liy4LiK4Lig4Lix4LiP4Lia4LmJ4Liy4LiZ4Liq4Lih4LmA4LiU4LmH4LiI4LmA4LiI4LmJ4Liy4Lie4Lij4Liw4Lii4Liy!5e0!3m2!1sth!2sth!4v1695123810885!5m2!1sth!2sth" width="300" height="200" style="border:0; border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                </div>
                <div class="footer-info">
                    <h5 class="mb-3 mt-4" style="color: white;">ติดต่อ</h5>
                    <p class="info" style="color: white;">1061 ซ.อิสรภาพ 15 แขวง หิรัญรูจี เขตธนบุรี กรุงเทพมหานคร 10600</p>
                    <p class="info" style="color: white;">bansomdejchaopraya@bsru.ac.th</p>
                    <p class="info" style="color: white;">090-XXX-XXXX</p>
                </div>
                <div class="footer-list">
                    <ul class="footer-list-item">
                        <h5 class="mt-4" style="color: white;">เมนู</h5>
                        <li>
                            <a href="index.php" class="text-decoration-none footer-link pt-3">หน้าหลัก</a>
                        </li>
                        <li>
                            <a href="aboutus.php" class="text-decoration-none footer-link">เกี่ยวกับเรา</a>
                        </li>
                        <li>
                            <a href="personnel.php" class="text-decoration-none footer-link">บุคลากร</a>
                        </li>
                        <li>
                            <a href="news.php" class="text-decoration-none footer-link">ข่าวสาร</a>
                        </li>
                        <li>
                            <a href="service.php" class="text-decoration-none footer-link">บริการ</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-icon">
                    <ul class="footer-list-item">
                        <h5 class="mt-4" style="color: white;">ติดตาม</h5>
                        <li>
                            <a href="" class="footer-icon-link"><i class="fa-brands fa-facebook"> &nbspfacebook</i></a>
                        </li>
                        <li>
                            <a href="" class="footer-icon-link"><i class="fa-brands fa-twitter"> &nbsptwitter</i></a>
                        </li>
                        <li>
                            <a href="" class="footer-icon-link"><i class="fa-brands fa-instagram"> &nbspinstagram</i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
        <div class="popup">
            <div class="popup-case">
                <form action="login/login-check.php" method="post" id="login" class="popup-content">
                    <img src="logo/close.png" alt="Close" class="close">
                    <img src="logo/logopopup.png" width="200" height="75" alt="Logo" class="m-3">
                    <input type="text" name="uname" placeholder="ชื่อผู้ใช้">
                    <input type="password" name="password" placeholder="รหัสผ่าน">
                    <button type="submit" class="btn">Login</button>
                    <p>ยังไม่มีบัญชีหากยังไม่ <a href="login/register.php">สมัคร?</a></p>
                </form>
            </div>
        </div>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <script>
            document.querySelector("#login").addEventListener("click", function() {
                document.querySelector(".popup-case").classList.add("active");
            })
            document.querySelector("#login").addEventListener("click", function() {
                document.querySelector(".popup-content").classList.add("active");
            })
            document.querySelector("#login").addEventListener("click", function() {
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

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    </html>
<?php
}
?>