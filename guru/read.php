<?php

session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}


include '../connect.php';

$query = "SELECT * FROM guru";
$result = mysqli_query($connect,$query);
$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/read.css">
    <title>Data Guru</title>

<div id="sideNavigation" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>
  <p id="nav">&nbsp S E K O L A H</p>
  <a href="../mapel/read.php">| Mata Pelajaran | </a>
  <a href="../login/logout.php">| Log out | <?php echo $_SESSION ['user']; ?></a>
</div>

<nav class="topnav">
  <a href="#" onclick="openNav()">
    <svg width="20" height="20" id="Open">
        <path d="M0,5 30,5" stroke="#000" stroke-width="4"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="4"/>
    </svg>
  </a>
</nav>

    <h2>-| Data Guru |-</h2>
    <table class="table">
    <tr>
          <th>Kode Guru</th>
          <th>Nama Guru</th>
          <th>Jumlah Jam</th>
          <th>Alamat</th>
          <th>Telepon</th>
          <th>Email</th>
          <th colspan='2'>Aksi</th>
    </tr>
    <div class="cari">
    <form action="search.php" method="get">
    <input type="search" name="cari" placeholder="cari" id="src">


<select name="kategori" id="drop">
<option value="nama_guru">Nama Guru</option>
<option value="kode_guru">Kode Guru</option>
</select>
    <input type="submit" value="Cari&nbsp;&nbsp;">
</form>
</div>

    <script>
function openNav()
{
    document.getElementById("sideNavigation").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
}

function closeNav()
{
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
        echo "<td><a id='edit' href ='form-update.php?kode_guru=".$data['kode_guru']."'>|Edit|</a>  ";
        echo "<td><a id='hapus' href ='delete.php?kode_guru=".$data['kode_guru']."'onclick='return confirm(\"Apakah anda yakin akan menghapus data\")'>|Hapus|</a>  ";
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
    <br>
    <a href="form-create.php" id="tambah">Tambah Data</a>
    <br>
    <br>
    <footer>
    	<h3>Copyright &copy; Devano Ezra </h3>
    </footer>
</div>
</body>
</html>
