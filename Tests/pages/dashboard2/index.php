<?php
    session_start();

    if (!isset($_SESSION['kiosk_id'])){
        header("Location: ../login/");
    }

    $kiosk_id = $_SESSION['kiosk_id'];
  // include_once "followersdata.php";
    $active_menu = "dashboard2";
    include_once "../layout/header.php";
?>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- Put Page-level css and javascript libraries here -->
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

  <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- bootstrap color picker -->
  <script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
  <!-- bootstrap time picker -->
  <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>  
  <!-- ChartJS -->
  <script src="../../plugins/chartjs/Chart.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="../../dist/js/pages/dashboard2.js"></script> -->
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="../../dist/js/demo.js"></script> -->

  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">

  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- <script src="buttonActions.js">
</script> -->

  <div class="wrapper">
<!--     <?php include_once "../layout/topmenu.php"; ?>
    <?php include_once "../layout/left-sidebar.php";?> 
    

    <!-- Content Wrapper. Contains page content
    <div class="content-wrapper">
       <!-- Content Header (Page header)  -->

      <section class="content-header">
        <h1>
          Admin page
        </h1>
      </section>


<script type="text/javascript">
  
function change_kiosk_state(side,kioskName) {

  //var leftBtnName = "kiosk_terminal_left";
  //var leftBtnName = leftBtnName + kioskName;

  var rBtnID = "kiosk_terminal_right" + kioskName;
  var lBtnID = "kiosk_terminal_left" + kioskName;

  //alert(lBtnID);

  var class_left = document.getElementById(lBtnID).getAttribute("class");
  var class_right = document.getElementById(rBtnID).getAttribute("class");

  var state_left = 0;
  var state_right = 0;

  if (side == 0){
    if (class_left == 'btn btn-danger pull-right'){
      state_left = 1;
    }
    if (class_right == 'btn btn-success pull-right'){
      state_right = 1;
    }
  }

  if (side == 1){
    if (class_right == 'btn btn-danger pull-right'){
      state_right = 1;
    }
    if (class_left == 'btn btn-success pull-right'){
      state_left = 1;
    }

  }

    var kiosk_id = kioskName;
    var send_data = {'kiosk_id': kiosk_id, 'state_left': state_left, 'state_right': state_right}
    $.ajax({
        type: 'POST',
        data: send_data,
        // contentType: 'application/jsonp',
        url: 'followersdata_state.php',
        success: function(response) {
            console.log(response);
            //var data = JSON.parse(response);
            alert("Operation is done!!!");
            kiosk_info(kiosk_id);
      },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
            // document.location.reload(true);
      alert("Something wrong!!! Try again.");
        }
    });
  //alert("Kiosk:"+ kioskName + " Value:" + side );
  }

  function kiosk_info (kName) {
    var kiosk_id = kName;
    var send_data = {'kiosk_id': kiosk_id}
    $.ajax({
        type: 'POST',
        data: send_data,
        // contentType: 'application/jsonp',
        url: 'followersdata_kiosk.php',
        success: function(response) {
            console.log(response);
      //alert("INFO: Operation is done!!!");
            var data = JSON.parse(response);
            var t_l = data['terminal_left'];
            var t_r = data['terminal_right'];
            //alert(data);

      //console.log(document.getElementById("kiosk_terminal_left").getAttribute("class"));

        var rBtnID = "kiosk_terminal_right" + kioskName;
        var lBtnID = "kiosk_terminal_left" + kioskName;

            if (t_l == 1){
        (document.getElementById(lBtnID)).setAttribute("class", "btn btn-success pull-right");
      } else {
        (document.getElementById(lBtnID)).setAttribute("class", "btn btn-danger pull-right");
      }

      if (t_r == 1){
        (document.getElementById(rBtnID)).setAttribute("class", "btn btn-success pull-right");
      } else {
        (document.getElementById(rBtnID)).setAttribute("class", "btn btn-danger pull-right");
      }

        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
            // document.location.reload(true);
      alert("Something wrong!!! Try again.");
        }
    });
  }

    $(document).ready(function() {
      for (var i = 1; i <= 50; i++) {
            kiosk_info(i);
      }
  });

</script>

<?php 

include('../connect.php');

function GetTableData($kioskName){
  //require("dbconn.php");
  include('../connect.php');

   $dateEnd = "2021-02-11 23:59:59";
   $dateStart = "2021-02-11 00:00:00";

    $dateStart = date("Y-m-d 00:00:00");
    //$dateStart .= " 00:00:00";

    $dateEnd = date("Y-m-d 23:59:59");
    //$dateEnd .= " 23:59:59";

    // echo "<br> Date start:".$dateStart;
    // echo "<br> Date end:".$dateEnd;

    // $dateStart = strval($dateStart);
    // $dateEnd = strval($dateEnd);

    // $dStrt = (string)$dateStart;
    // $dEnd = (string)$dateEnd;

    $sqlCount = "SELECT Count(product_id) AS Count, Sum(price) AS Sum from orders WHERE kiosk_id = '$kioskName' and date >= '$dateStart' and date <= '$dateEnd';";

    //echo $sqlCount;

  if($sqlresult = mysqli_query($connection, $sqlCount)){
      $data = $row = mysqli_fetch_array($sqlresult);
      // echo $data['Count'];
      // echo $data['Sum'];
      return $data;
    }else{
    return "0";
   }
 }

 function GetLastData($kioskName){

  include('../connect.php');

    $dateStart = date("Y-m-d 00:00:00");

    $dateEnd = date("Y-m-d 23:59:59");

  $sqlDate = "SELECT date from orders  WHERE kiosk_id = '$kioskName' and date >= '$dateStart' and date <= '$dateEnd' ORDER BY date DESC LIMIT 1";

  //echo $sqlDate;

   if($sqlresult = mysqli_query($connection, $sqlDate) ){
      $data = mysqli_fetch_array($sqlresult);
      //echo $data;
      return $data;
    }else{
    return "No orders";
   }
 }

 function getColor($orderDate) {
  //Setting Moscow timezone
    if (function_exists('date_default_timezone_set'))
          date_default_timezone_set('Europe/Moscow');

  $timeNow = date("Y-m-d G:i:s ");
  $timeNow = strtotime($timeNow);
  $tDateNow = strtotime($orderDate);
  $diffDate = floor(abs($timeNow - $tDateNow)/3600);

  //echo "<br> TIME DIFFERENCE (HOURS):".$diffDate;

  $resultColor = "#fffff";
  $white = "#ffffff";
  $red = "#f56c5f";

  //$diffDate = 3;

  if($diffDate > 1){
    $resultColor = $red;
  }else{
    $resultColor = $white;
  }

  return $resultColor;
 }

//  ==== Automatically generate <div> for each Kiosk from table "kiosk": ====

$sqlactive = "SELECT kiosk_id FROM kiosk";
              if($result = mysqli_query($connection, $sqlactive)){
                  if(mysqli_num_rows($result) > 0){
  
                      while($row = mysqli_fetch_array($result) ){
                        // Generate data for each kiosk here:
                          echo "<div class='box box-info'><div class='box-body'>";
                          echo "<div style = '' >";
                          echo "<h3>Kiosk #".$row['kiosk_id'];
                          
                          $kioskName = $row['kiosk_id'];

                          // Button ID name generate for each kiosk:
                          $buttonIDRight = "kiosk_terminal_right";
                          $buttonIDRight .= $kioskName;

                          $buttonIDLeft = "kiosk_terminal_left";
                          $buttonIDLeft .= $kioskName;

                          $lastOrderDate = GetLastData($kioskName);
                          $lastDate = $lastOrderDate['date'];

                          $tableColor = getColor($lastDate);
                          //$tableColor = "#FF0000";

                          //echo "<div class='box box-info'> <div class='box-header with-border'><h3 class='box-title'>Buttons</h3>";
                          echo "<button type='button' class='btn btn-success pull-right' style='width:200px;' id='$buttonIDRight' onclick='change_kiosk_state(1,\"$kioskName\")'>Terminal Right</button><button type='button' class='btn btn-danger pull-right'  style='width: 200px;'id='$buttonIDLeft' onclick='change_kiosk_state(0,\"$kioskName\")'>Terminal Left</button>";
                          echo "</div><BR></h3>";

                          // Generate table:
                          echo "<table class='table table-bordered table-hover'>";
                          echo "<tr style = 'background-color:#d6d2d2;'>  <th>Sales today</th> <th>Sales Sum</th> <th>Last order time</th>  </tr>";

                          $sqlData = GetTableData($row['kiosk_id']);
                          $sales = $sqlData['Count'];
                          $summa = $sqlData['Sum'];

                          echo "<tr > <th style = 'width:250px;'> $sales </th> <th style = 'width:250px;'> $summa</th> <th style = ' width:250px; background-color: $tableColor; '> $lastDate </th></tr>";

                          echo "</table>";

                          echo "</div></div>";
                      }
                      //echo "</table>";
                      //echo "</table>";
                      // Free result set
                      mysqli_free_result($result);
                  } else{
                      echo "No records matching your query were found.";
                  }
              } else{
                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
              }
              // Close connection
              mysqli_close($connection);

?>


