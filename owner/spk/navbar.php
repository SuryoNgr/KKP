
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&family=PT+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/style1.css" type="text/css">
</head>
<body>
  <nav>
    <div class="logo"><h1>XYZ-SPK</h1></div>
    <script>
      function drpdn(){
        document.getElementById("custom").classList.toggle('custom-dd-show');
      }
    </script>
    <ul class="menu">
      <li><a href="../halaman_owner.php">Home</a><i class="bi bi-chevron-right panah"></i></li>
      <li><a href="kriteria.php">Kriteria</a><i class="bi bi-chevron-right panah"></i></li>
      <li><a href="alternatif.php">Alternatif</a><i class="bi bi-chevron-right panah"></i></li>
      <li><a href="bobot_kriteria.php">Perbandingan Kriteria</a><i class="bi bi-chevron-right panah"></i></li>
      <li onClick="drpdn()"><span>Perbandingan Alternatif</span><i class="bi bi-chevron-right panah"></i>
        <ul class="custom-dd" id="custom">
          <?php
						if (getJumlahKriteria() > 0) {
							for ($i=0; $i <= (getJumlahKriteria()-1); $i++) { 
								echo "<a class='item' href='bobot.php?c=".($i+1)."'><li>".getKriteriaNama($i)."<hr></li></a>";
							}
						}
					?>
        </ul>
      </li>
      <li><a href="hasil.php">Ranking</a></li>
    </ul>
  </nav>

</body>
</html>