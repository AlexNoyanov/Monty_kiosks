<?php

// session_start();

require('../connect.php');

// if(!$select_db){
//     die("Connection failed: " . $select_db->error);
// }

if (isset($_POST['time_start'])){
    $date_o = $_POST['time_start'];
    $date_c = $_POST['time_finish'];
    // print json_encode('true');

    $date_o_date = strtotime($date_o);
    $date_c_date = strtotime($date_c);   

    $kiosk_id = $_POST['kiosk_id'];
    $date_open = date("Y-m-d H:i:s", $date_o_date);
    $date_close = date("Y-m-d H:i:s", $date_c_date);

    $query = "SELECT * FROM orders WHERE kiosk_id='$kiosk_id' and date >= '$date_open' and date <= '$date_close'";


    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    
    $labels_data = array();
    $labels = array();
    $data_cups = array();
    $data_syrops = array();
    $data_table = array();
    $data_table_row = array();
    
    $coffee = 0;
    $syrop = 0;
    $milk = 0;
    $price = 0;

    foreach ($result as $row) {

        $data_table_row['num_rec'] = $row['num_rec'];
        $data_table_row['class_id'] = $row['class_id'];
        $data_table_row['product_name'] = $row['product_name'];
        $data_table_row['price'] = $row['price'];
        $data_table_row['date'] = $row['date'];
        $data_table[] = $data_table_row;

        $data_src = $row['date'];
        $phpdate = strtotime($data_src);
        $hour = date('H', $phpdate);
        $labels_data[] = (int)$hour;
        $class_id = $row['class_id'];
        if ($class_id == '1'){
            $coffee = ++$coffee;
        }

        if ($class_id == '2'){
            $syrop = ++$syrop;
        }

        if ($class_id == '3'){
            $milk = ++$milk;
        }
        $price_row = (float)$row['price'];
        $price = $price + $price_row;
    } 

    $min_lable = min($labels_data);
    $max_lable = max($labels_data);

    $labels = range($min_lable,$max_lable);

    $array_length = count($labels);
 
    for ($i = 0; $i < $array_length; ++$i) {
        $data_cups[$i] = 0;
        $data_syrops[$i] = 0;
    }

    foreach ($result as $row) {
        $data_src = $row['date'];
        $phpdate = strtotime($data_src);
        $hour = date('H', $phpdate);
        $class_id = $row['class_id'];
        $key = array_search($hour, $labels);
        if ($class_id == '1'){
            $data_cups[$key] = $data_cups[$key] + 1;
            
        }

        if ($class_id == '2'){
            $data_syrops[$key] = $data_syrops[$key] + 1;
        }
    } 

    // Coffe data:
     /*

               cappuccino           |
|          1 | latte                |
|          6 | americano            |
|          5 | flat_white           |
|          4 | ristretto            |
|          2 | espresso   
    */



          $date_start2 =  $date_open;
          $date_end2 =  $date_close;

          //$date_start2 = "<script> time_start</script>";
          //$date_end2 = "<script> time_end</script>";

          $query2 = "SELECT product_name name,COUNT(product_name) AS Count FROM `orders` WHERE kiosk_id =".$kiosk_id." AND date  >= '".$date_start2."' AND date <= '".$date_end2."'  GROUP BY product_name ORDER BY Count DESC;";

          //echo $query2;

          if($stmt = $connection->query($query2)){

            $php_data_array = Array(); // create PHP array
        
          while ($row = $stmt->fetch_row()) {
        
             $php_data_array[] = $row; // Adding to array
             }
          
          }else{
          echo $connection->error;
          }


    $post_data = json_encode(array('labels' => $labels, 'data_cups' => $data_cups, 'data_syrops' => $data_syrops, 'coffee' => $coffee, 'milk' => $milk, 'syrop' => $syrop, 'price' => $price, 'table' => $data_table, 'data_pieChart' => $php_data_array));

    //now print the data
    print $post_data;
    // echo json_encode($labels);

    exit;

}

print json_encode('false');     
   
?>