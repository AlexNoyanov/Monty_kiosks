<?php
        $kiosk_id = $_GET['k'];   //
        $s1 = $_GET['s1'];
        // $s2 = $_GET['s2'];
        // $s3 = $_GET['s3'];
        // $s4 = $_GET['s4'];
        // $s5 = $_GET['s5'];
        // $s6 = $_GET['s6'];
        // $s7 = $_GET['s7'];
        $currentDate = date("Y-m-d:h:i:sa");
    
        // MIN/MAX values for percents:
    $s1Min = 3;
    $s1Max = 18;
    
    $s2Min = 3;
    $s2Max = 50;
    
    $s3Min = 3;
    $s3Max = 50;
    
    $s4Min = 4;
    $s4Max = 35;
    
    $s5Min = 4;
    $s5Max = 25;
    
    $s6Min = 4;
    $s6Max = 25;
    
    $s7Min = 4;
    $s7Max = 25;
    
    // Calculating all percents:
    // min - 100%
    // x - y %
    // max - 0%
    
    // Thus it will be:
    // min - min = 0 => 100%
    // x - min => y %
    // max - min => 0%
    
    // y = [1-(x-min)/(max-min)] * 100%

    
    function GetPercents($min,$max,$value){
        //var_dump(round($number, 2));
        //$res = ($max - $value)/($max-$min) * 100;
        $res = (1-($value-$min)/($max-$min)) * 100;
        //return($max - $value)/($max-$min) * 100;
        return (round($res, 2));
    }
    
    //$s1p = (round((1-($s1-$s1Min)/($s1Max-$s1Min)) * 100, 2));

    //$s1p = $s1;

    // To get value: (s1p/100)
    // $s2p = (round((1-($s2-$s2Min)/($s2Max-$s2Min)) * 100, 2));
    // $s3p = (round((1-($s3-$s3Min)/($s3Max-$s3Min)) * 100, 2));
    // $s4p = (round((1-($s4-$s4Min)/($s4Max-$s4Min)) * 100, 2));
    // $s5p = (round((1-($s5-$s5Min)/($s5Max-$s5Min)) * 100, 2));
    // $s6p = (round((1-($s6-$s6Min)/($s6Max-$s6Min)) * 100, 2));
    // $s7p = $_GET['s7'];
    
        //$fileName =
    $txt = $currentDate." ".$s1." \n";
    //$txt = $currentDate."|".$s1p."|".$s2p."|".$s3p."|".$s4p."|".$s5p."|".$s6p."|".$s7p."\n";

        $myfile = fopen($kiosk_id, "a") or die("Unable to open file!");
            
        fwrite($myfile, $txt);
    //}

//$txt = "Minnie Mouse\n";
//fwrite($myfile, $txt);
fclose($myfile);
    
    echo "Text file ".$kiosk_id.".txt created successfully!";


    ?>
