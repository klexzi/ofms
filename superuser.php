<?php
ob_start();
session_start();
require_once('includes/functions.php');


//               $_SESSION['level'] = $record['level'];
//               $_SESSION['id'] = $record['id'];
//               $_SESSION['staff_id'] = $record['staff_id'];
//               $_SESSION['name'] = $record['name'];
//               $_SESSION['dept_id'] = $record['dept_id'];

if(!isset($_SESSION['id'])){
   redirect_to("$link/index.php");
} else {
   $level = $_SESSION['level'];
   $dept_id = $_SESSION['dept_id'];
   $staff_id = $_SESSION['staff_id'];
   $id = $_SESSION['id'];
}
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="/ofms/assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
  <?php include('assets/layouts/navbar.php') ?>

    <div class="container-fluid">
      <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <!-- <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="reports.php">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="write-report.php">
                  <span data-feather="layers"></span>
                  Write Report
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="requests.php">
                  <span data-feather="layers"></span>
                 Requests
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="send-request.php">
                  <span data-feather="layers"></span>
                 Send Request
                </a>
              </li>
            </ul>

            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Current month
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul> -->
          <!-- </div> -->
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div> -->
          </div>

          <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
          <div class="container">
            <div class="row">
              <div class="col-md-3 ">
              <div class="card shadow">
                <div class="card-body"> <a class="nav-link" href="requests.php">
                  <span data-feather="bar-chart-2"></span>
                   View Requests
                </a>   </div>
                </div>
              </div>
              <div class="col-md-3">
              <div class="card shadow">
                <div class="card-body"> <a class="nav-link" href="reports.php">
                  <span data-feather="bar-chart-2"></span>
                  View My Reports
                </a></div>
                </div>
              </div>
              <div class="col-md-3">
              <div class="card shadow">
                <div class="card-body"> <a class="nav-link" href="all-reports.php">
                  <span data-feather="bar-chart-2"></span>
                  View All Reports
                </a></div>
                </div>
              </div>
              <div class="col-md-3">
              <div class="card shadow">
                <div class="card-body"> <a class="nav-link" href="all-requests.php">
                  <span data-feather="bar-chart-2"></span>
                  View All Requests
                </a></div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
<?php ob_end_flush() ?>