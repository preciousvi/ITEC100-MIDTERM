
<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
     
     </button></center><br/>
	<center><button type="submit">  
		<a href="log_activity.php" >View Activity</a></h1> 
	</button></center>
	</button></center><br/>
	<center><button type="submit">  
		<a href="logout.php" class="logoutt">Logout</a>
	</button></center>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>                            		                            