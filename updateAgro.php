<?php

include 'controller/pelakuagro.php';
session_start();
$user_id = $_SESSION['user_id'];
$userUpdater = new UserUpdater($conn, $user_id);
$userUpdater->updateProfile();
$messages = $userUpdater->getMessages();
error_reporting(E_ALL ^ E_NOTICE);


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `pelakuagro` WHERE id_agro = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update nama usaha :</span>
            <input type="text" name="update_namausaha" value="<?php echo $fetch['namausaha']; ?>" class="box">
            <span>update deskripsi :</span>
            <input type="text" name="update_deskripsi" value="<?php echo $fetch['deskripsi']; ?>" class="box">
            <span>update your pic :</span>
            
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>