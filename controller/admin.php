<?php 
include 'db/db.php';

class Login {

    private $conn;
 
    public function __construct() {
       $this->conn = new mysqli('localhost','root','','new');
       if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
       }
    }
 
    public function validateUser($nama, $password) {
       $nama = mysqli_real_escape_string($this->conn, $nama);
       $password = mysqli_real_escape_string($this->conn, $password);
 
       $select = mysqli_query($this->conn, "SELECT * FROM `admin` WHERE name = '$nama' AND password = '$password'") or die('query failed');
 
       if(mysqli_num_rows($select) > 0){
          $row = mysqli_fetch_assoc($select);
          $_SESSION['user_id'] = $row['id_admin'];
          header('Location: homeAdmin.php');
       }else{
          $message[] = 'incorrect nama or password!';
       }
    }
    }

    class UserUpdater {
        private $conn;
        private $user_id;
        private $message;
     
        public function __construct($conn, $userId) {
           $this->conn = $conn;
           $this->user_id = $userId;
           $this->message = array();
        }
     
        public function updateProfile() {
           if(isset($_POST['update_profile'])){
            $update_name = mysqli_real_escape_string($this->conn, $_POST['update_name']);
            $update_email = mysqli_real_escape_string($this->conn, $_POST['update_email']);
            $update_namausaha = mysqli_real_escape_string($this->conn, $_POST['update_namausaha']);
            $update_deskripsi = mysqli_real_escape_string($this->conn, $_POST['update_deskripsi']);
            mysqli_query($this->conn, "UPDATE `admin` SET name = '$update_name', email = '$update_email', nomertlp = '$update_namausaha', alamat = '$update_deskripsi' WHERE id_admin = '$this->user_id'") or die('query failed');
              
              $update_image = $_FILES['update_image']['name'];
              $update_image_size = $_FILES['update_image']['size'];
              $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
              $update_image_folder = 'uploaded_img/'.$update_image;
     
              if(!empty($update_image)){
                 if($update_image_size > 2000000){
                    $this->message[] = 'image is too large';
                 }else{
                    $image_update_query = mysqli_query($this->conn, "UPDATE `admin` SET image = '$update_image' WHERE id_admin = '$this->user_id'") or die('query failed');
                    if($image_update_query){
                       move_uploaded_file($update_image_tmp_name, $update_image_folder);
                    }
                    $this->message[] = 'image updated succssfully!';
                 }
              }
           }
        }
     
        public function getMessages() {
           return $this->message;
        }
     }

?>