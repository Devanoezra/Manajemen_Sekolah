<?php

session_start();

if(!(isset($_SESSION['user'])))
{
    header("location: ../login/form-login.php");
}


include '../connect.php';

$query ="SELECT kode_mapel, mapel, alokasi_waktu, semester, nama_guru
         FROM matapelajaran LEFT JOIN guru
         USING (kode_guru)
         ORDER BY kode_mapel";

$result = mysqli_query($connect, $query);
$num = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/read.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    </style>
</head>

<div id="sideNavigation" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; </a>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <a href="form-create.php"> | Tambah Data | </a>
  <a href="../guru/read.php"> | Data Guru |</a>
  <a href="../login/logout.php"> | Log out |</a>
</div>

<nav class="topnav">
  <a href="#" onclick="openNav()">
    <svg width="20" height="20" id="Open">
        <path d="M0,5 30,5" stroke="#000" stroke-width="4"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="4"/>
        <path d="M0,23 30,23" stroke="#000" stroke-width="4"/>
    </svg>
  </a>
</nav>
        <h2>Mata Pelajaran</h2>

<form action="search.php" method="get" class="cari">
<input type="search" name="cari" placeholder="cari" id="src">

<select name="kategori" id="drop">

<option value="kode_mapel">Kode Mapel</option>
<option value="mapel">Nama Mapel</option>
<option value="alokasi_waktu">Alokasi Waktu</option>

</select>
<input type="submit" value="Cari">
</form>
      <table>
          <tr>
              <th>No</th>
              <th>Kode</th>
              <th>Mata Pelajaran</th>
              <th>Alokasi Waktu</th>
              <th>Semester</th>
              <th>Guru Pengajar</th>
              <th colspan="2">Aksi</th>
              <?php

              if($num > 0)
              {
                  $no = 1;
                  while($data = mysqli_fetch_assoc($result)){ ?>

                    <tr>
                    <td> <?php echo $no; ?></td>
                    <td> <?php echo $data ['kode_mapel']; ?></td>
                    <td> <?php echo $data ['mapel']; ?></td>
                    <td> <?php echo $data ['alokasi_waktu']; ?></td>
                    <td> <?php echo $data ['semester']; ?></td>
                    <td>
                        <?php
                               if($data['nama_guru'] != NULL)
                               { echo $data['nama_guru'];}
                               else{ echo "-";}
                           ?>
                    </td>
                    <td> <a href="form-update.php?kode_mapel=<?php echo $data['kode_mapel']; ?>" id="edit" >Edit </a> </td>
                    <td><a id="hapus" href="delete.php?kode_mapel=<?php echo $data ['kode_mapel'];  ?>"onclick="return confirm('Anda Yakin ingin menghapus data?')">Hapus</a></td>
                    </tr>

                    <?php
                    $no++;
                  }
              }

              else
              {
                  echo "<tr> <td colspan='5'>Tidak ada data </td></tr>";
              }
              ?>

          </tr>
      </table>
      <br>
      <a href="form-create.php" id="tambah">Tambah Data</a>
    </form>
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
