<?php
ob_start();
session_start();
require_once('includes/functions.php');

// get the value from the form field
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $emailErr = $passwordErr = $login_asErr = "";
  $login = false;
  // validate username
 if (!empty($_POST['email'])) {
   $email = trim($_POST['email']);
   $login = true;
 } else {
   $emailErr = "please enter your email address";
   $login = false;
 }

 //validate password
 if ( !empty($_POST['password'])) {
   $password = trim($_POST['password']);
   $login = true;
 } else {
   $passwordErr = 'please enter your password';
   $login = false;
 }

 //get the login as type 
 if ( isset($_POST['login_as']) && !empty($_POST['login_as']) ){
   $login_as = $_POST['login_as'];
   $login = true;
 } else {
   $login_asErr = 'please select your department';
   $login = false;
 }

 //if login is true
  if( $login === true) {
    // query the database
    $table_name = 'staffs';
    $params = "WHERE email='$email' AND password='$password' AND dept_id = $login_as";
    // select user details from the database
    //check if the user exist in the db 
    $staffExist = check_exist($table_name,$params);
    
    if ($staffExist === true ) {

          $result =  select($table_name,$params);
              //fetch the level of the user 
              $record = mysqli_fetch_assoc($result);
              $staffLevel = $record['level'];
            // redirect user
            switch ($staffLevel) {
                case 1:
                redirect_to("dashboard1.php?level=$staffLevel");
                break;
                case 2:
                redirect_to("dashboard2.php?level=$staffLevel");
                break;
                case 3:
                redirect_to("dashboard3.php?level=$staffLevel");
                break;
                case 4:
                redirect_to("dashboard4.php?level=$staffLevel");
                break;
                case 5:
                redirect_to("superuser.php?level=$staffLevel");
                break;
              default:
                redirect_to("index.php");
                break;
            }

    } else {
      $staffNotFound = '';
      $staffNotFound = 'Staff does not exist';
    }
     
   
  } //end of login  true

} // end of server request method 



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Signin Template for Bootstrap</title>
    <!-- Custom styles for this template -->
    <link href="/ofms/assets/css/styles.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-signin">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <span class="text-danger"><?php if(isset($emailErr)) { echo $emailErr;} ?></span>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <span class="text-danger"><?php if(isset($passwordErr)) { echo $passwordErr;} ?></span>
         <label class="sr-only" for="login as">Login as</label>
         <select  class="form-control" name="login_as" id="">
          <option value="">login as</option>
           <?php 
             // select all departments in the database 
             $table_name = "departments";
             $records =  select($table_name);
             while ($departments = mysqli_fetch_assoc($records)){
               echo "<option value=". $departments['id']." >". $departments['dept_name'] . "</option>";
             }
           ?>
           
         </select>
         <span class="text-danger"><?php if(isset($login_asErr)) { echo $login_asErr;} ?></span>
         <span class="text-danger"><?php if(isset($staffNotFound)) { echo $staffNotFound;} ?></span>
    <br/>
      <button class="btn btn-lg btn-primary btn-block" style="background-color: #cc1db8; border-color: #cc1db8;" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">Tanta Innovative &copy; <?php echo date('Y'); ?> </p>
    </form>
  </body>
</html>
<?php ob_end_flush(); ?>