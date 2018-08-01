<?php require_once('includes/functions.php');
    require_once('config/config.php');
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
<?php 
  if ($_SERVER['REQUEST_METHOD'] =='POST'){
     $task =  $_POST['task_desc'];
        $timeIn = $_POST['timeIn'];
     
      $query = mysqli_query($conn, "INSERT INTO `reports` (`summary`, `timeIn`)
       VALUES ($task, $timeIn)");
    if (!$query){
        die("error". mysqli_error($conn));
    }
  }


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Report for the day</title>
    <!-- Custom styles for this template -->
    <link href="/ofms/assets/css/styles.css" rel="stylesheet">
  </head>

  <body class="text-center">

  <div class="container " style="margin-top:600px">
  <div class="row">
  <div class="col-sm-8 col-md-8  offset-2" >
   <form class="pt-5 jumbotron"  action="" method="POST" role="form">
        <legend><h3>TASK FOR THE DAY</h3></legend>
    
        

        <div class="form-group">
            <label for="task_desc">TASK DESCRIPTION</label> 
            <textarea type="text" name="task_desc" id="task_desc" class="form-control" rows="3" required="required" placeholder="Type in the task description and actual amount of work hours"></textarea> 
            <br/>
            
            <div class="form-group">
                <label for="input" class="col-sm-2 control-label">TIME IN</label>
                    <input type="text" name="timeIn" id="input" class="form-control" value="" required="required" title="">
            </div>
            

        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
    </div>
    </div>
    </div>
  </body>
</html>
