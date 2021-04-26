<?php 
session_start();

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "login_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
if (isset($_SESSION['username']))  {
	
$activity="LogOut";
	 $duration = floor(time()/(60*5));
	srand($duration);
	 date_default_timezone_set('Asia/Manila');
	 $currentDate = date('Y-m-d H:i:s');
	 $currentDate_timestamp = strtotime($currentDate);
	$endDate_months = strtotime("+5 minutes", $currentDate_timestamp);
	 $packageEndDate = date('Y-m-d H:i:s', $endDate_months);
	$_SESSION["current"] = $currentDate;
        $_SESSION["expired"] = $packageEndDate;

$sql="INSERT INTO log_activities (id,username,activity,time) VALUES ('', '{$_SESSION['username']}','$activity','$currentDate')";
$result2 = mysqli_query($conn, $sql);
	
session_unset();
session_destroy();
}
header("Location: index.php");