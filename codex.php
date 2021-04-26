<?php
session_start(); 

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "login_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (isset($_POST['uname']))  {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	
	   return $data;
	}

	$uname = validate($_POST['uname']);
		$num1=rand(10000,999999);
 $duration = floor(time()/(60*5));
	srand($duration);
	 date_default_timezone_set('Asia/Manila');
	 $currentDate = date('Y-m-d H:i:s');
	 $currentDate_timestamp = strtotime($currentDate);
	$endDate_months = strtotime("+5 minutes", $currentDate_timestamp);
	 $packageEndDate = date('Y-m-d H:i:s', $endDate_months);
	$_SESSION["current"] = $currentDate;
        $_SESSION["expired"] = $packageEndDate;
	
	
	
	$user_data = 'uname='. $uname;
	if (empty($uname)) {
		header("Location: code.php?error=username is required&$user_data");
	    exit();}
	

		
       else{

	    $sql = "SELECT * FROM account WHERE username='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result)<=0) {
			echo("USERNAME NOT FOUND");
	      
		}
		   else {
           $sql2 = "INSERT INTO authentication (otp,username,curdate,endate) VALUES('$num1','$uname','$currentDate','$packageEndDate')";
			 $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           echo"<script>alert('$num1');window.location='otp.php'</script>";
	         exit();
           }else {
	           	header("Location: code.php?error=unknown error occurred&$user_data");
		        exit();
           }
		
}
	   }
}
else{
	header("Location: code.php?error=Email is required");
	exit();
}
?>