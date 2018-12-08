<?php

include '../connect.php';

$kode_mapel = $_GET['kode_mapel'];

$query = "DELETE from matapelajaran where kode_mapel = '$kode_mapel'";

$result = mysqli_query($connect,$query);

$num = mysqli_affected_rows($connect);

if($num > 0){
  header("location:read.php");
}
else{
  echo"<p>Gagal ubah data <br></p>";
}
echo"<p><a href='read.php'>Lihat Data</a></p>";
 ?>