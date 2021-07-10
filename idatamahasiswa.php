<!DOCTYPE html>
<?php
    include('koneksi.php');
?>
<html lang="en">

<head>
  <title>SPK</title>
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
        <h3>Input Data Mahasiswa </h3>
      </div>
      <div class="card-body">
        <?php 
        $carikode = mysqli_query($konek_db, "select max(NIM) from tb_mahasiswa");
        $datakode = mysqli_fetch_array($carikode);
        if ($datakode) {
        $nilaikode = substr($datakode[0], 1);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $hasilkode = "S".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else {
        $hasilkode = "S001";
        }
        ?>
        <form name="frm" id="myForm" method="post" enctype="multipart/form-data">
          <div class="form-group has-feedback">
            <label for="nim">NIM :</label>
            <input type="text" name="nim" class="form-control" required name="id" data-error="Isi kolom dengan benar"
              value="<?php echo $hasilkode; ?>" readonly>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors" role="alert"></div>
          </div>
          <div class="form-group has-feedback">
            <label for="nama">Nama :</label>
            <input type="text" name="nama" class="form-control" required name="nama"
              data-error="Isi kolom dengan benar">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors" role="alert"></div>
          </div>
          <div class="form-group has-feedback">
            <label for="tgllahir">Tanggal Lahir :</label>
            <input type="text" id="coldate1" name="tgllahir" class="form-control IP_calendar" alt="date"
              title="Y/m/d"><br>
          </div>
          <div class="form-group has-feedback">
            <label for="asalkampus">Asal Kampus :</label>
            <input type="text" name="asalkampus" class="form-control" data-error="Isi kolom dengan benar">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors" role="alert"></div>
          </div>
          <div class="form-group has-feedback">
            <label for="notelp">No Telp :</label>
            <input type="text" name="notelp" class="form-control" required data-error="Isi kolom dengan benar">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors" role="alert"></div>
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-primary" onclick="return checkInput()">Simpan</button>
      </div>

      <?php		

                    if(isset($_POST['submit'])){
                    $nim                = $_POST['nim'];
                    $nama                = $_POST['nama'];
                    $tgllahir            = $_POST['tgllahir'];
                    $asalkampus         = $_POST['asalkampus'];
                    $notelp              = $_POST['notelp'];
                    $query="INSERT INTO tb_mahasiswa SET NIM='$nim', nama='$nama', tgllahir='$tgllahir',asalkampus='$asalkampus', notelp='$notelp'";
                    $result=mysqli_query($konek_db, $query);
                        if($result){
                            ?>
      <div class="alert alert-success fade in">
        <a href="idatanilai.php" class="close" data-dismiss="alert" aria-label="close">×</a>
        <strong>Success!</strong> Data Berhasil Diinputkan.
      </div>;
      <?php
            }
          }
          ?>
      </form>
    </div>

    <script type="text/javascript">
      $(function () {
        $("#datepicker").datepicker();
      });

      function checkInput() {
        return confirm('Data sudah benar ?');
      }
    </script>


</body>

</html>