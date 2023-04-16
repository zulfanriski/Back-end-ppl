<?php 

include 'db/db.php';
session_start();

if(!isset($_SESSION['user_id'])){
   header('location:loginMitra.php');
   exit();
}

$id_agro = $_POST['id_agro'];

class Formulir
{
    private $conn;
    private $user_id;
    private $id_agro;
    
    function __construct($conn)
    {
        $this->conn = $conn;
        $this->user_id = $_SESSION['user_id'];
        $this->id_agro = $_POST['id_agro'];
    }

    function register($nama,$alamat,$nomertlp,$alasan,$tgldibuat)
    {
        $nama = mysqli_real_escape_string($this->conn, $nama);
        $alamat = mysqli_real_escape_string($this->conn, $alamat);
        $nomertlp = mysqli_real_escape_string($this->conn, $nomertlp);
        $alasan = mysqli_real_escape_string($this->conn, $alasan);
        $tgldibuat = mysqli_real_escape_string($this->conn, $tgldibuat);

        mysqli_query($this->conn, "INSERT INTO `formulir`(id_mitra, id_Agro, nama, alamat, nomertlp, alasan, tgldibuat) VALUES('$this->user_id','$this->id_agro','$nama','$alamat','$nomertlp','$alasan','$tgldibuat')") or die('query failed');
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomertlp = $_POST['nomertlp'];
    $alasan = $_POST['alasan'];
    $tgldibuat = $_POST['tgldibuat'];
   
    $user_form = new Formulir($conn);
    $user_form->register($nama, $alamat, $nomertlp, $alasan, $tgldibuat);
    header('Location:cariAgro.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="">
<input type="hidden" name="id_agro" value="<?php echo $id_agro; ?>">
    
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama">
    
    <label for="alamat">Alamat:</label>
    <input type="text" id="alamat" name="alamat">
    
    <label for="nomertlp">Nomor Telepon:</label>
    <input type="text" id="nomertlp" name="nomertlp">
    
    <label for="alasan">Alasan:</label>
    <input type="text" id="alasan" name="alasan">
    
    <label for="tgldibuat">Tanggal Dibuat:</label>
    <input type="date" id="tgldibuat" name="tgldibuat">
    
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>