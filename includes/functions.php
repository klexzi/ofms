<?php
// this is where all logic should be done and imported where you want to use it
$link = "/ofms";
$actual_link = $_SERVER['DOCUMENT_ROOT'] . $link;

function redirect_to($location = null)
{
    if ($location != null) {
        header("Location: {$location}");
        exit;
    }
}

require_once("$actual_link/config/config.php");

//function to select a table for the database
//it holds the parameters for table and the condition. table parameter must be passed.
function select($table, $param = "")
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Database Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM $table $param";
    $result = $conn->query($sql);
    if ($result->num_rows < 1) {
        echo "There are no datas in the Table '$table' according to your query conditions";
    }
    if ($result) {
        return $result;
    } else {
        die("error: " . $conn->error);
    }
}

// function to check if a particular data already exist
// data to check is gotten from the param $param 
function check_exist($table, $param)
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Database Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM $table $param";
    $result = $conn->query($sql);
    if (!$result) {
        die("Could not perform query because : " . $conn->error);
    } else {
        if ($result->num_rows > 0) {
            $exist = true;
        } else {
            $exist = false;
        }
        return $exist;
    }
}

// function to insert into the database 
//it also as the capability to check the data already exist by adding a 4th parameter which should be the mysql conditional statement for example "WHERE password = password"
//strings passed into this function should be placed in quotes for mysql to be able to process query
function insert($table, $columns, $values, $param = false)
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Database Connection failed: " . mysqli_connect_error());
    }
    if ($param != false) {
        if (check_exist($table, $param)) {
            return "<script> alert('Data already exist or the insert function was not used properly')</script>";
        } else {
            $sql = "INSERT INTO `$table` ($columns) VALUES ($values)";
            $result = $conn->query($sql);
            if ($result) {
                return true;
            } else {
                die("could not insert data because : " . $conn->error);
            }
        }
    }
    $sql = "INSERT INTO `$table` ($columns) VALUES ($values)";
    $result = $conn->query($sql);
    if ($result) {
        return true;
    } else {
        die("could not insert data because : " . $conn->error);
    }
}
// function to update date in the database 
//it also as the capability to check the data already exist by adding a 4th parameter which should be the mysql conditional statement for example "WHERE password = password"
//strings passed into this function should be placed in quotes for mysql to be able to process query
function update($table, $columns, $values, $param = false)
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Database Connection failed: " . mysqli_connect_error());
    }
    if ($param != false) {
        if (check_exist($table, $param)) {
            return "<script> alert('Data already exist or the insert function was not used properly')</script>";
        } else {
            $sql = "UPDATE `$table` ($columns) VALUES ($values)";
            $result = $conn->query($sql);
            if ($result) {
                return true;
            } else {
                die("could not insert data because : " . $conn->error);
            }
        }
    }
    $sql = "INSERT INTO `$table` ($columns) VALUES ($values)";
    $result = $conn->query($sql);
    if ($result) {
        return true;
    } else {
        die("could not insert data because : " . $conn->error);
    }
}

//function to login
function login($usr, $psw)
{
    $result = check_exist("admin", "WHERE username = '$usr' and password = '$psw' ");
    if ($result) {
        $sel_user = select("admin", "WHERE username = '$usr' and password = '$psw' ");
        if ($sel_user) {
            $sanitize = new validate;
            session_start();
            while ($row = mysqli_fetch_assoc($sel_user)) {
                $_SESSION["ID"] = $row["ID"];
                $_SESSION["surname"] = $sanitize->text($row["surname"]);
                $_SESSION["firstname"] = $sanitize->text($row["firstname"]);
                $_SESSION["email"] = $sanitize->text($row["email"]);
                $_SESSION["phonenum"] = $row["phonenum"];
                $_SESSION["username"] = $sanitize->text($row["username"]);
                $_SESSION["password"] = $row["password"];
            }
        }
    }
}

?>