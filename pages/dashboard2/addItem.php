<?php

include ('../connect.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kioskName = substr($_COOKIE['kiosk'],-2);
        $itemID = $_POST['productID'];
        $itemName = $_POST['product_name'];
        $itemPrice = $_POST['product_price'];
        $itemTitle = $_POST['product_title'];
        $itemDesc = $_POST['product_description'];
        $itemMass = $_POST['product_mass'];
        $date = date('Y-m-d', time());
        $index = rand(100,1000);
        $kiosk_id = $_COOKIE[kiosk];
        $isActive = $_POST['activeItem'];   // 'on' when active else - empty

                        if ($connection->connect_error) {
                          die("Connection failed: " . $connection->connect_error);
                        }
// UPDATE assortment SET product_mass = $itemMass, description = $itemDesc, price = $itemPrice, product_name = $itemName, product_title_name = $itemTitle, date = $date)
                        //$sql = "INSERT INTO assortment(product_id,kiosk_id,class_id,sub_class,product_mass,product_name,product_title_name,description,side,price,def,date ) values(".$index.",".$kioskName.",0,0,0,'".$itemName."','".$itemTitle."','".$itemDesc." ',0,".$itemPrice.",0,'".$date."');";
        $kioskActive = 0;
        $isON = "on";
        if($isActive == $isON){
            $kioskActive = $kiosk_id ;
        }else{
           $kioksActive = 0;
        }
    $sql = "UPDATE assortment SET product_mass = '$itemMass', description = '$itemDesc', price = '$itemPrice', product_name = '$itemName', product_title_name = '$itemTitle', date = '$date' ,kiosk_id = '$kioskActive' WHERE product_id = '$itemID' ";
                        //$sql = "SELECT FLOOR(SUM(price)) Summa FROM orders WHERE kiosk_id = ".$kioskName.";";
                        $result = $connection->query($sql);
                        // $value =  mysqli_fetch_assoc($result);
                        // $summa= $value["Summa"];
                        $connection->close();
                        // echo "Name = ".$itemName."<br>";
                        // echo "Price = ".$itemPrice."<br>";
                        // echo "Title = ".$itemTitle."<br>";
                        // echo "Desc = ".$itemDesc."<br>";
                        //echo $sql;
                        //echo "Checkbox:'$isActive'";
                        //echo "Kiosk ID = '$kiosk_id'";
                        //echo  ;
                        //header('Location:index.php');
                        header("Location:index.php");
    }
    
?>

