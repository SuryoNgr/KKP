<?php require_once("../koneksi.php");
    if (!isset($_SESSION)) {
        session_start();

       
  if($_SESSION['level']==""){
    header("location:../login.php?pesan=gagal");
  } 
    } 


    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>XYZ Hotel</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/images/icon/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Chart.js for making a chart -->
        <script type="text/javascript" src="../js/Chart.js"></script>
        <!-- <link href="../assets/css/navbar.css" rel="stylesheet" /> -->

    </head>
    <body class="d-flex flex-column min-vh-100" style="height: 100%">
       <?php include 'navbar.php' ?>
       <h1>Chart</h1>
       <section class="py-5">
        <?php 
        $tipe_room = "";
        $jumlah1 = "";
        $sql = "SELECT room.tipe_room, COUNT(payment.id_payment) AS total
        FROM payment INNER JOIN room ON payment.id_room = room.id_room GROUP BY room.tipe_room";
        $hasil = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_array($hasil)) {
            $tipe_room .= "'".$data['tipe_room']. "', ";
            $jumlah1 .= $data['total']. ", ";
        }
        
        ?>
    </section>

<!-- Chart -->
<canvas id="myChart" width="500" height="500"></canvas>

<canvas id="myChart2" width="500" height="500"></canvas>
      






        <!-- Footer-->
<footer class="foot">
<div class="footer-bottom">
            <p>&copy; 2024 XYZ Hotel. All rights reserved.</p>
          </div>
</footer>
        <!-- Bootstrap core JS-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.sticky.js"></script>
        <script src="../assets/js/main2.js"></script>
        <!-- Core theme JS-->
        <script src="../assets/js/scripts.js"></script>

        <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [<?php echo $tipe_room; ?>],
                datasets: [{
                    label: 'Data Tipe Room',
                    backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                    borderColor: ['rgb(255, 99, 132)'],
                    data: [<?php echo $jumlah1; ?>]
                }]
            },
            options: {
              responsive: false,
                maintainAspectRatio: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart2').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo $tipe_room; ?>],
                datasets: [{
                    label: 'Data Tipe Room',
                    backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                    borderColor: ['rgb(255, 99, 132)'],
                    data: [<?php echo $jumlah1; ?>]
                }]
            },
            options: {
              responsive: false,
                maintainAspectRatio: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    </body>
</html>
