<?php
session_start();

             unset($_SESSION['level']);
             unset($_SESSION['id']);
             unset($_SESSION['staff_id'] );
              unset($_SESSION['name']);
            unset ($_SESSION['dept_id']);

            session_destroy();

            header('location: /ofms/index.php');

 ?>