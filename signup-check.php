<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname;


		
		
	
	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
		
}
	else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Email is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}
else if (strlen($pass)<=7){
	header("Location: signup.php?error=Password is atleast 8 digits&$user_data");
	    exit();
}
	
	
	else if(!preg_match("#[A-Z]+#",$pass)) {
		header("Location: signup.php?error=Password must contain 1Upper CASE&$user_data");
	    exit();
	}
	else if(!preg_match("#[a-z]+#",$pass)){
		header("Location: signup.php?error=Password must contain 1lower CASE&$user_data");
	    exit();
	}
	else if(!preg_match("#[0-9]+#",$pass)){
		header("Location: signup.php?error=Password must contain Number&$user_data");
	    exit();
	}
	elseif(!preg_match("#[\W]+#",$pass))  {
		header("Location: signup.php?error=Password must contain Special Character&$user_data");
	    exit();
	}
	
		else if(filter_var($name, FILTER_VALIDATE_EMAIL) == false){
			header("Location: signup.php?error=Invalid Email&$user_data");
	    exit();
		}
	



	else{

		
       

	    $sql = "SELECT * FROM account WHERE username='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO account(username, password, email) VALUES('$uname', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
}


else{
	header("Location: signup.php");
	exit();
}
?>	