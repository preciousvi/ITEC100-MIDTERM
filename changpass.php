<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <link rel="stylesheet" type="text/css" href="change.css">
</head>
</head>
<body>
  <div class="forgot">
    <h1> Forgot Password </h1>
     <form action="change_function.php" method="post">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

<label> Username </label>
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


      <label>Password</label>
      <input type="password" 
                 name="password" 
                 placeholder="Password"><br>

      <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>
        <button type="submit">Update Password</button>
              <a href="index.php" class="ca">Already have an account?</a>
          
     </form>
</body>
</html>