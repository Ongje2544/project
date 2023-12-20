<?php 
session_start(); 
include "connect_db.php";

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['re_password']) && isset($_POST['email']) && isset($_POST['callnum']) && isset($_POST['lineid']) && isset($_POST['address']) && isset($_POST['zip'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);

	$password = validate($_POST['password']);
	$re_password = validate($_POST['re_password']);

	$fname = validate($_POST['fname']);
	$lname = validate($_POST['lname']);

	$email = validate($_POST['email']);

    $callnum = validate($_POST['callnum']);
	$lineid = validate($_POST['lineid']);

	$address = validate($_POST['address']);

	$zip = validate($_POST['zip']);
	$user = 'user';
	$image = 'avatar.png';

	$user_data = 'uname='. $uname;


	if (empty($uname)) {
		header("Location: register.php?error=กรุณากรอกชื่อผู้ใช้&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: register.php?error=กรุณากรอกอีเมล์&$user_data");
	    exit();
	}

    else if(empty($callnum)){
        header("Location: register.php?error=กรุณากรอกเบอร์โทรศัพท์&$user_data");
	    exit();
	}

    else if(empty($password)){
        header("Location: register.php?error=กรุณากรอกรหัสผ่าน&$user_data");
	    exit();
	}

	else if(empty($re_password)){
        header("Location: register.php?error=กรุณากรอกยืนยันรหัสผ่าน&$user_data");
	    exit();
	}

	else if($password !== $re_password){
        header("Location: register.php?error=รหัสผ่าน/ยืนยันหรัสผ่านไม่ตรงกัน&$user_data");
	    exit();
	}
	
	else{

		// hashing the password
        $password = md5($password);

	    $sql = "SELECT * FROM users WHERE username='$uname' ";
		$result = mysqli_query($conn, $sql);

        $sql1 = "SELECT * FROM users WHERE username='$email' ";
		$result1 = mysqli_query($conn, $sql1);

		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=ชื่อผู้ใช้ถูกใช้งานแแล้ว&$user_data");
	        exit();
		    }elseif (mysqli_num_rows($result1) > 0) {
                header("Location: register.php?error=อีเมล์ถูกใช้งานแล้ว&$user_data");
                exit();
                }else {
                    $sql2 = "INSERT INTO users(username, password, fname, lname, email, callnum ,lineid ,address ,zip ,user ,image) VALUES('$uname', '$password', '$fname', '$lname', '$email', '$callnum', '$lineid', '$address', '$zip' ,'$user' ,'$image')";
                    $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
           	header("Location: ../index.php?success=สร้างผู้ใช้งานสำเร็จ");
	        exit();
            }else {
	           	header("Location: register.php?error=เกิดข้อผิดพลาด&$user_data");
		        exit();
           }
		}
	}
}else{
	header("Location: ../index.php");
	exit();
}