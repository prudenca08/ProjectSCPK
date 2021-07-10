<!DOCTYPE html>
<html lang="en">
<?php
    include('koneksi.php');
?>

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
  <style>
    .card-body {
      background-color: #fff !important;
    }
  </style>
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
    <div class="card m-5">
      <div class="card-body">
        <ul class="nav nav-tabs nav-justified">
          <li class="nav-item">
            <a class="nav-link" href="matrikskeputusan.php">Matriks Keputusan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="nilaibobot.php">Nilai Bobot</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="normalisasi.php">Normalisasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="perangkingan.php">Perangkingan</a>
          </li>
        </ul>
        <?php
          $sql="SELECT MAX(UAS), MAX(UTS), MAX(nilaitugas), MAX(nilaitesmasuk)FROM tb_nilai";
          $result=mysqli_query($konek_db,$sql); //row melihat dari sql 
          while($row=mysqli_fetch_array($result)){
              $MaxUAS           =$row[0];
              $MaxUTS           =$row[1];
              $MaxNilaitugas    =$row[2];
              $MaxNilaitesmasuk =$row[3]; 
          }
        ?>
        <br>
        <div class="panel panel-info">
          <div class="panel-body">
            <table width="100%" class="table table-sm table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>NIM</th>
                  <th>UAS</th>
                  <th>UTS</th>
                  <th>Nilai Tugas</th>
                  <th>Nilai Tes Masuk</th>
                  <th>Total Nilai</th>
                  <th>Rangking</th>
                </tr>
              </thead>
              <?php
        
        $sql="SELECT NIM, UAS, UTS, nilaitugas, nilaitesmasuk, 
                     B_UAS, B_UTS, B_nilaitugas, B_tesmasuk 
                     FROM tb_nilai, tb_bobot ORDER BY UAS DESC, UTS DESC, nilaitugas DESC, nilaitesmasuk DESC";
        $result=mysqli_query($konek_db,$sql) or die(mysql_error()); //row melihat dari sql 
        $rangking =0;
        while($row = mysqli_fetch_array($result)){
            $rangking++;
            $NIM          =$row[0];
            $cUAS         =$row[5]*($row[1]/$MaxUAS);  
            $cUTS         =$row[6]*($row[2]/$MaxUTS);
            $cTugas       =$row[7]*($row[3]/$MaxNilaitugas);
            $cTes         =$row[8]*($row[4]/$MaxNilaitesmasuk);
            $total        =$cUAS + $cUTS + $cTugas + $cTes; 
           echo "      
        			<tr>  
                    <td>".$NIM."</td> 
					<td>".$cUAS."</td>
                    <td>".$cUTS."</td>
                    <td>".$cTugas."</td>
                    <td>".$cTes."</td>
                    <td>".$total."</td>
                    <td>".$rangking."</td>
                    </tr>   
        	";        
        
            }
        ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>

</html>