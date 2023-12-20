<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login and register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="hero">
        <div class="form-box">
            <center>
                <p class="Hder">สมัครสมาชิก</p>
            </center>
            <form action="register-check.php" method="post" id="register" class="input-group">
                <input type="text" name="fname" class="input-field" placeholder="ชื่อ" required title="กรุณาใส่ชื่อ">
                <input type="text" name="lname" class="input-field" placeholder="นามสกุล" required title="กรุณาใส่นามสกุล">
                <input type="text" name="uname"class="input-field" placeholder="ชื่อผู้ใช้" required title="กรุณาใส่ชื่อผู้ใช้ (ชื่อควรเป็นภาษาอังกฤษ เช่น Porama201 เป็นต้น)" pattern="[a-zA-Z0-9]{5-255}">
                <input type="password" name="password" class="input-field" placeholder="รหัสผ่าน" required title="กรุณาใส่รหัสผ่าน 8-16 ที่กำหนดไว้" pattern="[a-zA-Z0-9]{8,16}">
                <input type="password" name="re_password" class="input-field" placeholder="ยืนยันรหัสผ่าน" required title="กรุณาใส่รหัสผ่านอีกครั้ง">
                <input type="email" name="email" class="input-field" placeholder="อีเมล" required title="กรุณาใส่อีเมล">                
                <input type="text" name="callnum" class="input-field" placeholder="เบอร์โทรศัพท์" pattern="[0-9]{10}"required title="กรุณาใส่เบอร์ที่ติดต่อได้">
                <input type="text" name="lineid" class="input-field" placeholder="Line ID (ถ้ามี)" title="ใส่ Line ID (ถ้ามี)">
                <input type="text" name="address" class="input-field" placeholder="ที่อยู่" required title="กรุณาใส่ที่อยู่">
                <input type="zip" name="zip" class="input-field" placeholder="รหัสไปรษณีย์" inputmode="numeric" pattern="[0-9]{5}" required title="กรุณาใส่ที่อยู่ไปรษณีย์">
                <span><input type="checkbox" class="check-box" required>ฉันยอมรับ<a href="rule.php" target="_blank">เงื่อนไข</a></span>
                <button type="submit" class="submit-btn">ยืนยันการสมัคร</button>
            </form>
        </div>
        <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>   
     	<?php } ?>

        <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
    </div>
</body>
</html>