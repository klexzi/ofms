<?php
ob_start();
session_start();
require('../includes/functions.php');

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
  <?php require('../assets/layouts/head.php'); ?>
  <?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../config/config.php');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $task = $_POST['task_desc'];
    $timeIn = $_POST['timeIn'];
    $date = $_POST['date'];
    $query = mysqli_query($conn, "INSERT INTO `reports` (`userId`,`summary`, `timeIn`, `date`,`departmentId`,`level`)
       VALUES ($id, '$task', '$timeIn', '$date',$dept_id,$level)");
    if (!$query) {
      die("error" . mysqli_error($conn));
    }
  }


  ?>
  </head>

  <body>
<!-- Navbar -->
<?php require('../assets/layouts/navbar.php') ?>
<!-- /. Navbar -->

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
            <h1 class="h2">Reports</h1>
            <!-- <div class="btn-toolbar mb-2 mb-md-0"> -->
              <!-- <div class="btn-group mr-2">
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

          <div class="col-sm-8 col-md-8  offset-2" >
   <form class="pt-5 jumbotron"  action="" method="POST" role="form">
        <legend><h3>REPORT FOR THE DAY</h3></legend>
    
        

        <div class="form-group">
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">TIME IN</label>
                    <input type="time" name="timeIn" id="input" class="form-control" value="" required="required" title="">
            </div>
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">DATE</label>
                    <input type="date" name="date" id="input" class="form-control" value="" required="required" title="">
            </div>

            <label for="task_desc">REPORT SUMMARY</label> 
            <textarea type="text" name="task_desc" id="task_desc" class="form-control" rows="3" required="required" placeholder="Type in the summary of the report"></textarea> 
            <br/>
            

            

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
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
