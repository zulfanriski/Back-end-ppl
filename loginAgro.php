<?php

include 'controller/pelakuagro.php';

session_start();


$login = new Login();

if(isset($_POST['submit'])){
   $login->validateUser($_POST['nama'], $_POST['password']);
}
if(isset($_POST['nama'])) {
   $login->validateUser($_POST['nama'], $_POST['password']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="nama" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
     <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="registerAgro.php">regiser now</a></p>
   </form>

</div>

</body>
</html>
