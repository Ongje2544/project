<?php 
session_start(); 
include "connect_db.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$password = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: ../index.php?error=กรุณากรอกชื่อผู้ใช้");
	    exit();
	}else if(empty($password)){
        header("Location: ../index.php?error=กรุณากรอกรหัสผ่าน");
	    exit();
	}else{
		// hashing the password
        $password = md5($password);

        
		$sql = "SELECT * FROM users WHERE username='$uname' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $password) {
            	$_SESSION['username'] = $row['username'];
				$_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
            	$_SESSION['email'] = $row['email'];
                $_SESSION['callnum'] = $row['callnum'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['address'] = $row['address'];
            	$_SESSION['zip'] = $row['zip'];
            	header("Location: ../logged/index.php");
		        exit();
            }else{
				header("Location: ../index.php?error=ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
		        exit();
			}
		}else{
			header("Location: ../index.php?error=ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}