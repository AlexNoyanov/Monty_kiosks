<?php

  session_start();

  require('../connect.php');

  if (isset($_POST['user']) and isset($_POST['pass'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];
      
      // Save kiosk name to the cookie as a global variable:
      $cookie_name = "kiosk";
      $cookie_value = substr($username,-1);
      // echo $cookie_value;
      setcookie($cookie_name,$cookie_value,time()+(86400 * 30), "/"); // 1 Day save
      
      // To get cookie data:

    $query = "SELECT * FROM kiosk WHERE login='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result); 

    $data = array();
    foreach ($result as $row) {
      $data[] = $row;
    }
    //free memory associated with result
    $result->close();

    if ($count == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['kiosk_id']= $data[0]["kiosk_id"];
        header("Location: ../../pages/dashboard2/"); 
        exit;
    } else {
        $fmsg = "Ошибка";
        header("Location: index.php"); 
    }
 
   }

   if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    $now = time();
    $date_o =  mktime(0, 0, 0, date("m", $now)  , date("d", $now), date("Y", $now));
    $date_c =  mktime(23, 59, 59, date("m", $now)  , date("d", $now), date("Y", $now));

    $date_open = date("Y-m-d H:i:s", $date_o);
    $date_close = date("Y-m-d H:i:s", $date_c);


    echo "Hello" . "\n";
    echo $date_open . "\n";
    echo $date_close . "\n";

   }
  ?>
