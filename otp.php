<html>
<head>
	<title>
		OTP
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
		<form action="otp_function.php" method="post">
			
			
		<p> Authentication Code </p>
          <?php if (isset($_GET['num1'])) { ?>
               <input type="text" 
                      name="num1" 
                      placeholder="Username"
                      value="<?php echo $_GET['num1']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="num1" 
                      placeholder="type the code here"><br>
          <?php }?>
			<input type="submit" value="Send">
		</form>
	<?php 
?>
		</body>
	</html>