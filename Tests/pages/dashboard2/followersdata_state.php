<?php

// session_start();

require('../connect.php');

// if(!$select_db){
//     die("Connection failed: " . $select_db->error);
// }

if (isset($_POST['kiosk_id'])){
    $state_left = $_POST['state_left'];
	$state_right = $_POST['state_right'];

    print json_encode($state_left);
    print json_encode($state_right);

    $kiosk_id = $_POST['kiosk_id'];

    print json_encode($kiosk_id);

    // echo "KioskID == ".$kiosk_id;
    // echo $state_left;
    // echo $state_right;

    $query = "UPDATE kiosk SET terminal_left='$state_left', terminal_right='$state_right'  WHERE kiosk_id='$kiosk_id'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));


    //now print the data
    print $result;
    // echo json_encode($labels);

    exit;

}

print json_encode('false');

?>

