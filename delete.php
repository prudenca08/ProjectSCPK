<?php
include('koneksi.php');
$query="DELETE from tb_mahasiswa where NIM='".$_GET['id']."'";
mysqli_query($konek_db, $query);
header("location:vdatamahasiswa.php");
?>