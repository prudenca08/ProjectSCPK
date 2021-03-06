<!DOCTYPE html>
<html lang="en">
<?php
    include('koneksi.php');
?>


<head>
  <title>SPK-Penentuan Ranking Mahasiswa</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light mx-auto">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto snip1135">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item dropdown">
          <!-- <a class="nav-link" href="idatamahasiswa.php"></a> -->
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Input Data
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="idatamahasiswa.php">Data Mahasiswa</a>
            <a class="dropdown-item" href="idatanilai.php">Data Nilai</a>
            <a class="dropdown-item" href="idatabobot.php">Data Bobot</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <!-- <a class="nav-link" href="idatamahasiswa.php"></a> -->
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            View Data
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="vdatamahasiswa.php">Data Mahasiswa</a>
            <a class="dropdown-item" href="vdatanilai.php">Data Nilai</a>
            <a class="dropdown-item" href="vdatabobot.php">Data Bobot</a>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="matrikskeputusan.php">Hitung SAW</a></li>
    </div>
  </nav>
  <div class="container">
    <div class="card shadow my-5">
      <div class="card-header text-center">
        <h3>Edit Data Mahasiswa </h3>
      </div>
      <div class="card-body">
        <form name="frm" id="myForm" method="post" enctype="multipart/form-data">
          <div class="form-group has-feedback">
            <label class="control-label col-sm-3" for="uas">Bobot UAS :</label>
            <div class="col">
              <?php
                       $tampil = "SELECT * FROM tb_bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='uas' class='form-control' id='bobotuas' value='".$data[0]."'><br>";
                    }
                ?>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-3" for="uts">Bobot UTS :</label>
            <div class="col">
              <?php
                       $tampil = "SELECT * FROM tb_bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='uts' class='form-control' id='bobotuts' value='".$data[1]."'><br>";
                    }
                ?>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-3" for="tugas">Bobot Nilai Tugas :</label>
            <div class="col">
              <?php
                       $tampil = "SELECT * FROM tb_bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='tugas' class='form-control' id='bobottugas' value='".$data[2]."'><br>";
                    }
                ?>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label class="control-label col-sm-3" for="tes">Bobot Tes Masuk :</label>
            <div class="col">
              <?php
                       $tampil = "SELECT * FROM tb_bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='tes' class='form-control' id='bobottes' value='".$data[3]."'><br>";
                    }
                ?>
            </div>
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-success"
          onclick="return checkInput()">Simpan</button><br><br>

        <?php		

    if(isset($_POST['submit'])){
        $uas            = $_POST['uas'];
        $uts            = $_POST['uts'];
        $tugas         = $_POST['tugas'];
        $tes            = $_POST['tes'];
        $bobot = $uas+$uts+$tugas+$tes;
        if($bobot>1){
             ?>
        <div class="alert alert-warning fade in">
          <a href="vdatabobot.php" class="close" data-dismiss="alert" aria-label="close">??</a>
          <strong>SALAH!</strong> Bobot Berlebih.
        </div>;
        <?php
        }
            else{
        $query="UPDATE tb_bobot SET B_UAS='$uas', B_UTS='$uts', B_nilaitugas='$tugas', B_tesmasuk='$tes'";
        $result=mysqli_query($konek_db, $query);
            if($result){
                ?>
        <div class="alert alert-success">
          <a href="vdatabobot.php" class="close" data-dismiss="alert" aria-label="close">??</a>
          <strong>Success!</strong> Data Berhasil Diupdate.
        </div>;
        <?php
                    }
                }
}

    ?>
        </form>
      </div>
    </div>


    <script language="JavaScript" type="text/javascript">
      function checkInput() {
        return confirm('Data sudah benar ?');
      }
    </script>


    <script language="JavaScript" type="text/javascript">
      function checkInput() {
        return confirm('Data sudah benar ?');
      }
    </script>



</body>

</html>