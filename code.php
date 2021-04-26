<html>
<head>
	<title>
	
	</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
		<form action="codex.php" method="post">
			
			
		<p> Username </p>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="username" 
                      placeholder="Username"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Username"><br>
          <?php }?>
			<input type="submit" value="Send">
		</form>
	<?php 
?>
		</body>
	</html>

