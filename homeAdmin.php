<?php

include 'db/db.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:loginAdmin.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:loginAdmin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
   <style>
      img {
         width: 200px;
         height: 200px;
      }
   </style>
</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id_admin = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name']; ?></h3>
      <a href="updateAdmin.php" class="btn">update profile</a>
      <a href="loginAdmin.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <br>
      <p><a href="lihatformulir.php">Kemitraan</a>
      <br>
      <p><a href="lihatagro.php">Lihat akun agro</a>
      <br>
      <p><a href="lihatmitra.php">Lihat akun mitra</a>


      <a href="updateMitra.php" class="btn">kemitraan</a>
   </div>

</div>

</body>
</html>