<?php
        $kiosk_id = $_GET['k'];   // Cups 1
        //$fileName =
$myfile = fopen($kiosk_id, "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);
    


    echo "Text file ".$kiosk_id.".txt created successfully!";

//$numbers = [1, 2, 3, 4, 5];
//
//$filename = 'numbers.dat';
//
//try {
//    $f = fopen($filename, 'wb');
//
//    if (!$f) {
//        throw new Exception('Error creating the file ' . $filename);
//    }
//
//    foreach ($numbers as $number) {
//        fputs($f, $number);
//    }
//} catch (\Throwable $e) {
//    echo $e->getMessage();
//} finally {
//    if (!$f) {
//        fclose($f);
//    }
//}
    ?>
