<?php

include '../connect.php';

$cari = $_GET['cari'];
$kategori = $_GET['kategori'];

$query = "SELECT * FROM guru WHERE $kategori LIKE '%$cari%'";
$result = mysqli_query($connect,$query);
$num = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/read.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Guru</title>

<div id="sideNavigation" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>
  <p id="nav">S E K O L A H</p>
  <a href="../mapel/read.php">| Matapelajaran |</a>
  <a href="../login/logout.php">| Log out | </a>
</div>

<nav class="topnav">
  <a href="#" onclick="openNav()">
    <svg width="20" height="20" id="icoOpen">
        <path d="M0,5 30,5" stroke="#000" stroke-width="4"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="4"/>
    </svg>
  </a>
</nav>

    <h2>Data Guru</h2>
<br>
    <table class="table">
    <tr>
          <th>No.</th>
          <th>Nama Guru</th>
          <th>Jumlah jam</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>E-mail</th>
          <th colspan='2'>Aksi</th>
    </tr>

    <script>
function openNav() {
    document.getElementById("sideNavigation").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
}

function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}


</script>


    <?php
    if($num > 0)
    {
        $no = 1;
        while($data = mysqli_fetch_assoc($result))
        {
        echo "<tr>";
        echo "<td>". $data ['kode_guru'] . "</td>";
        echo "<td>" . $data ['nama_guru']. "</td>";
        echo "<td>" .  $data ['jumlah_jam'] . "</td>";
        echo "<td>" .  $data ['alamat'] . "</td>";
        echo "<td>" .  $data ['telp'] . "</td>";
        echo "<td>" .  $data ['email'] . "</td>";
        echo "<td><a id='edit' href ='form-update.php?kode_guru=".$data['kode_guru']."'> Edit</a>  ";
        echo "<td><a id='hapus' href ='delete.php?kode_guru=".$data['kode_guru']."'onclick='return confirm(\"Apakah anda yakin akan menhapus data\")'>Hapus</a>  ";
        echo "</tr>";

        $no++;
        }
    }
    else
    {
        echo "<td colspan = '3'>Tidak ada data </td>";
    }
    ?>

    </table>
    <br>
    <a href="../guru/read.php"><input type="submit" value="Kembali" id="back"></a>
    <br>
    <script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 500);
}

function showPage() {
  document.getElementById("Div").style.display = "block";
}
</script>
</div>
</body>
</html>
