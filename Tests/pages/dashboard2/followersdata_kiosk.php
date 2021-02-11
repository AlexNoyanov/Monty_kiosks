<?php

// session_start();

require('../connect.php');

// if(!$select_db){
//     die("Connection failed: " . $select_db->error);
// }

if (isset($_POST['kiosk_id'])){

    $kiosk_id = $_POST['kiosk_id'];

    $query = "SELECT * FROM kiosk WHERE kiosk_id='$kiosk_id'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $terminal_left = 0;
    $terminal_right = 0;

    foreach ($result as $row) {

        $terminal_left = $row['terminal_left'];
	$terminal_right = $row['terminal_right'];
    }

    $arr = array('terminal_right' => $terminal_right, 'terminal_left' => $terminal_left);


    $post_data = json_encode($arr);

    //now print the data
    print $post_data;
    // echo json_encode($labels);

    exit;

}

print json_encode('false');     
   
?>
