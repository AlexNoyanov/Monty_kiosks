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



      <div class="box box-info">
       <div class="box-body">
        Kiosk #1


        </div>
          </div>

     <div class="box box-info">
       <div class="box-body">
        Kiosk #2


        </div>
          </div>

      <div class="box box-info">
       <div class="box-body">
        Kiosk #3


        </div>
          </div>


