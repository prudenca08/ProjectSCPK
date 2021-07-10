<!DOCTYPE html>
<html lang="en">

<head>
  <title>SPK-Pemeringkatan Ranking</title>
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
  <style>
  body {
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    background: linear-gradient(0deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('img/upn.jpeg');
}</style>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-fixed-top auto">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto snip1135">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item dropdown">
          <!-- <a class="nav-link" href="idatamahasiswa.php"></a> -->
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
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
        <li class="nav-item"><a class="nav-link" href="matrikskeputusan.php">Perhitungan SAW</a></li>
    </div>
  </nav>

</body>

</html>