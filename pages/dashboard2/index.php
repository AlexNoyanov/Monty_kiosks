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

    <?php include_once "../layout/topmenu.php"; ?>
    <?php include_once "../layout/left-sidebar.php"; ?>
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Kiosk data!
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">

      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select parameters</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
                <label>Date range button:</label>

                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
       
      </div>

      <div class="box box-info">
	     <div class="box-body">
        <!--
      	  <div class="btn-group">
            <button type="button" class="btn btn-success pull-right" id="kiosk_terminal_right" onclick="change_kiosk_state(1)">
                Terminal Right
            </button>
	          <button type="button" class="btn btn-danger pull-right" id="kiosk_terminal_left" onclick="change_kiosk_state(0)">
		            Terminal Left
	          </button>
          </div>
        -->
	       </dev>
       </div>



      <div class="box-body">

              <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-coffee"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Coffee</span>
              <span id=cups class="info-box-number">0<small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-flask"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Syrops</span>
              <span id="syrop" class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Milk</span>
              <span id="milk" class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            
            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-usd"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sales</span>
              <span id="price" class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

     </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong id="data_label">Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas style="height: 180px; width: 703px;" id="salesChart" height="180" width="703"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->


                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Goal Completion</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Add Products to Cart</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div style="width: 80%" class="progress-bar progress-bar-aqua"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div style="width: 80%" class="progress-bar progress-bar-red"></div>
                    </div>
                  </div>
                </div>

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>	
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="ordersTable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
          </div>
          <div class="box box-info">
          <!-- /.box -->
          <h4> Active products on Kiosk

             <?php

    // Print all active product for kiosk

    include('../connect.php');

  //$kiosk_id = substr($_COOKIE['kiosk'],-2);
  
    $sqlactive = " SELECT product_name FROM assortment WHERE kiosk_id = ".$kiosk_id;
              if($result = mysqli_query($connection, $sqlactive)){
                  if(mysqli_num_rows($result) > 0){
  
                    echo "<table class='table table-bordered table-hover'>";
                      while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                          echo "<th>" . $row['product_name'] . "</th>";
                          echo "</tr>";
                      }
                      echo "</table>";
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
</h4>
</div>
</h4>     
                    <form method="POST" action="addItem.php">
                      <div class="box box-info">
                      <div class="box-header with-border">
                           <h3 class="box-title">Add product to kisok assortment
                         
          <h3> Product:<select name="products"  id="product-select" style="width: 300px;" onChange="myFunction()"></h3>

    <h4><option value="">--Please select product--</option></h4>                                                                                                                                                                                                 
    <?php 

        include('../connect.php');

    //$sqlactive = " SELECT product_name,price FROM assortment WHERE kiosk_id = ".$kiosk_id;
      $sqlactive = "SELECT DISTINCT * FROM assortment";                                      
              if($result = mysqli_query($connection, $sqlactive)){
                  if(mysqli_num_rows($result) > 0){
                    //$productsArray

        while($row = mysqli_fetch_array($result)){
                          //Load all products and use in selector
                          echo "<option value= ''>".$row['product_id'] ."-".$row['product_name'] . "-".$row['price']."-".$row['product_title_name']."-".$row['description']."-".$row['product_mass']."-".$row['kiosk_id']."</option>";
                      }
                    }
                  }

        mysqli_close($connection);
    ?>
  </select>

<!--   <p>Add selected product to Kiosk</p> -->

<style type="text/css">
  
.buttonGreen{
  background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
}

.buttonGreen2{
  background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      width: 350px;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
}

.buttonRed{
  background-color: #ff4d4d; /* Red */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

</style>

<button type="submit" class = "buttonGreen" >Save changes</button>
<!-- <p id = "itemId" name = "productID"> -->
<p id="demo"></p>
</p>
<h4>
  <input hidden type="number" name="productID" id="itemId">
 Name: <br><input type="text"  name="product_name" id="prod_name"> Is active: <input type="checkbox" id="isActive" name="activeItem"><br>
 Price:<br><input type="number" name="product_price" id="prod_price"><br>
 Title:<br><input type="text" name="product_title" id="prod_title"><br>
 Description:<br><input type="title" name="product_description" id="prod_desc"><br>
 Mass: <br><input type="text" name="product_mass" id="prod_mass">
</h4>
</form>
</div>

</h3>
</div>

<br>

  <script>
function myFunction() {
 
  var sel = document.getElementById("product-select");
  var text= sel.options[sel.selectedIndex].text;
  var data = text.split('-');
  var itemID = data[0];
  var name = data[1];
  var price = data[2];
  var title = data[3];
  var desc = data[4];
  var mass = data[5];
  var kiosk_id = data[6];

  var productName = document.getElementById("product-select").value;
  //var productPrice = document.getElementById("product-select").text;
  var productPrice = text;
  document.getElementById("demo").innerHTML = productName;
  document.getElementById("itemId").value = itemID;
  document.getElementById("prod_name").value = name;
  document.getElementById("prod_price").value = price;
  document.getElementById("prod_title").value = title;
  document.getElementById("prod_desc").value = desc;
  document.getElementById("prod_mass").value = mass;

// Change checkbox status:
// Check for kiosk_id:
  var currentKiosk = "<?php Print($_COOKIE[kiosk]); ?>";

  //alert(currentKiosk);
if(kiosk_id == currentKiosk){
  document.getElementById("isActive").checked = true;
  }else{
// Uncheck
  document.getElementById("isActive").checked = false;
 }
}

</script>

        </div>
    </form>
        <!-- /.col -->

      <div class="col-md-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sales Graph</h3>
<div id="donutchart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>

     google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);

      // Callback that draws the pie chart
      function draw_my_chart() {


        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'language');
        data.addColumn('number', 'Nos');
    for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
    // above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'',
                       pieHole: 0.3,
                       'width':350,
                       'height':350,
             };

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
</script>
</div>
</div>
<style type="text/css">
  
.buttonGreen{
  background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
}

.buttonGreen2{
  background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      width: 350px;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
}

.buttonRed{
  background-color: #ff4d4d; /* Red */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.container { 
  height: 200px;
  position: relative;
  border: 3px solid green; 
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

</style>


<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Buttons</h3>
              <center>
              
              <button type="button"  class="btn btn-success pull-right" style="width: 50%;" onclick="myFunction1()">Calibration </button>
              
              <button type="button" class="btn btn-success pull-right" style="width: 50%;"  onclick="myFunction2()">Return pay Left</button>
              <br><br><br>

              <button type="button" class="btn btn-success pull-right"  style="width: 50%;" onclick="myFunction3()">Return pay Right</button>
              

              <button type="button" class="btn btn-success pull-right"  style="width: 50%;"   onclick="myFunction4()">Lift left</button>
              <br><br><br>
              <button type="button" class="btn btn-success pull-right"  style="width: 50%;"   onclick="myFunction5()">Lift right</button>
              
              <button type="button" class="btn btn-success pull-right"   onclick="myFunction6()" style="background-color: #ff4d4d; width: 50%; /* Red */">Reboot</button>

              <br><br><br>
  
            <button type="button" class="btn btn-success pull-right" style="width: 50%;" id="kiosk_terminal_right" onclick="change_kiosk_state(1)">
                Terminal Right
            </button>
            <button type="button" class="btn btn-danger pull-right"  style="width: 50%;"id="kiosk_terminal_left" onclick="change_kiosk_state(0)">
                Terminal Left
            </button>

            </center>

            </div>
          </div>
        </div>

    
      </section>
      <!-- /.content -->

    </div><!-- /.content-wrapper -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
        
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->

<?php include_once "../layout/footer.php" ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dashboard2.js"></script> -->
<script>

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          console.log(start.format('YYYY-MM-DD H:mm:ss'));
          console.log(end.format('YYYY-MM-DD H:mm:ss'));
          var start = start.format('YYYY-MM-DD H:mm:ss');
          var finish = end.format('YYYY-MM-DD H:mm:ss')
          update_data(start, finish);
        }
    );
  
function DrowPieChart2(data){

var my_2d = data;

  	  google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);

      // Callback that draws the pie chart

        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'language');
        data.addColumn('number', 'Nos');
    for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
    // above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'',
                       pieHole: 0.3,
                       'width':350,
                       'height':250,
             };

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);

}

  function DrowPieChart(coffee_data,syrops_data,table_data){

    console.log(coffee_data);
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);

    var colors = ["#f56954", "#00a65a", "#f39c12", "#00c0ef", "#3c8dbc", "#d2d6de", "#00c90a","#BCE527","#27D7E5","#274AE5","#E527E5","#E52738","#B427E5","#2786E5","#E59427","#D7E527","#61E527","#3DEE4A","#EE3D45"];
   
    //var tdata = 
    //alert(JSON.stringify(table_data)['product_name']);
    //var tData = JSON.parse(table_data);

    //alert(tData);
    //var itemName = 

    //alert(coffee_data);
    var sumCoffe = 0;
    var sumSyrops = 0;

       for (var j = 0; j < syrops_data.length; j++) {
      sumSyrops = sumSyrops+syrops_data[j];
    }

    for (var i = 0; i < coffee_data.length; i++) {
      sumCoffe = sumCoffe+coffee_data[i];
    }

    //alert(sumCoffe);
    //alert(sumSyrops);

    var PieData = [
    {
      value: sumCoffe,
      color: "#f56954",
      highlight: "#f56954",
      label: "Coffe"
    },
    {
      value: sumSyrops,
      color: "#00a65a",
      highlight: "#00a65a",
      label: "Syrop"
    }
    ];

    //PieData = coffee_data;

    var pieOptions = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke: true,
    //String - The colour of each segment stroke
    segmentStrokeColor: "#fff",
    //Number - The width of each segment stroke
    segmentStrokeWidth: 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps: 100,
    //String - Animation easing effect
    animationEasing: "easeOutBounce",
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate: true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: false,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
    //String - A tooltip template
    tooltipTemplate: "<%=value %> <%=label%> cups"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
    //-----------------
    //- END PIE CHART -
    //-----------------
  }

  function SetTiltInfo(cups, syrops, milk, price){

    document.getElementById("cups").innerHTML = cups;
    document.getElementById("syrop").innerHTML = syrops;
    document.getElementById("milk").innerHTML = milk;
    document.getElementById("price").innerHTML = price;
  }

  function DrowChart(label_in, data_cups, data_syrops, time_start, time_end){
    var date_start = new Date(time_start);
    var date_end = new Date(time_end);

    //alert("Date start = "+time_start+"  Date end = " + time_end);

    $('#salesChart').replaceWith('<canvas style="height: 180px; width: 703px;" id="salesChart" height="180" width="703"></canvas>');

    $('#data_label').replaceWith('<strong id="data_label">Sales: ' +  moment(time_start).format("MMMM D, YYYY") + '  -  ' + moment(time_end).format("MMMM D, YYYY") + '</strong>');

    // Get context with jQuery - using jQuery's .get() method.
    var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas);

    var salesChartData = {
    labels: label_in,
    datasets: [
      {
        label: "Cups",
        fillColor: "rgb(210, 214, 222)",
        strokeColor: "rgb(210, 214, 222)",
        pointColor: "rgb(210, 214, 222)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgb(220,220,220)",
        data: data_cups,
      },
      {
        label: "Syrops",
        fillColor: "rgba(60,141,188,0.9)",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: data_syrops,
      }
    ]
    };

    var salesChartOptions = {
    //Boolean - If we should show the scale at all
    showScale: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: false,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(0,0,0,.05)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - Whether the line is curved between points
    bezierCurve: true,
    //Number - Tension of the bezier curve between points
    bezierCurveTension: 0.3,
    //Boolean - Whether to show a dot for each point
    pointDot: false,
    //Number - Radius of each point dot in pixels
    pointDotRadius: 4,
    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth: 1,
    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius: 20,
    //Boolean - Whether to show a stroke for datasets
    datasetStroke: true,
    //Number - Pixel width of dataset stroke
    datasetStrokeWidth: 2,
    //Boolean - Whether to fill the dataset with a color
    datasetFill: true,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
    };

    // Create the line chart
    salesChart.Line(salesChartData, salesChartOptions); 

    //bove row adds the JavaScript two dimensional array data into required chart format
    var chartOptions = {title:'',
                       pieHole: 0.3,
                       'width':360,
                       'height':250,
             };

        // Instantiate and draw the chart
        //var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        //chart.draw(salesChartData, chartOptions);
  }

    function updateTable(data){
        console.log('update');
        // console.log(data);
        $("#ordersTable > tbody").html("");
        
        _.each(data,function(val,key){
            drawRow(val)
        });

        $('#ordersTable').DataTable();
    }

    function drawRow(rowData) {
                        
        var row = $("<tr/>")
        $("#ordersTable").append(row);    
        row.append($("<td contenteditable=true class='time'>" + rowData.num_rec + "</td>"));
        row.append($("<td contenteditable=true class='h_pan'>" + rowData.product_name + "</td>"));
        row.append($("<td contenteditable=true class='h_tilt'>" + rowData.price + "</td>"));
        row.append($("<td contenteditable=true class='l_base'>" + rowData.date + "</td>"));            
    }

  function update_data (time_s, time_f) {
    var time_start = time_s;
    var time_finish = time_f;
    var kiosk_id = "<?php echo $kiosk_id ?>";
    var send_data = {'kiosk_id': kiosk_id, 'time_start' : time_start, 'time_finish' : time_finish}
    $.ajax({
        type: 'POST',
        data: send_data,
        // contentType: 'application/jsonp', 
        url: 'followersdata.php',                         
        success: function(response) {
            // console.log(response);
            var data = JSON.parse(response);
            var l = data['labels'];
            var dc = data['data_cups'];
            var ds = data['data_syrops'];
            var coffee = data['coffee'];
            var milk = data['milk'];
            var syrop = data['syrop'];
            var price = data['price'];
            var table = data['table'];

            var chartData = data['data_pieChart'];

            DrowChart(l, dc, ds, time_s, time_f);
            SetTiltInfo(coffee, syrop, milk, price);
            updateTable(table);
            //DrowPieChart(dc,ds,table);
            DrowPieChart2(chartData);
            //DrowMyPieChart(dc);
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
            // document.location.reload(true);
        }
    });
  }

//_________________
// My Pie Chart JS
//-----------------
function DrowMyPieChart(data2d){
  var my_2d = data2d;
      //google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);  
}


  function change_kiosk_state(side) {

	var class_left = document.getElementById("kiosk_terminal_left").getAttribute("class");
	var class_right = document.getElementById("kiosk_terminal_right").getAttribute("class");

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

    var kiosk_id = "<?php echo $kiosk_id ?>";
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
	    kiosk_info ();

      },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
            // document.location.reload(true);
	    alert("Something wrong!!! Try again.");
        }
    });
  }

  function kiosk_info () {
    var kiosk_id = "<?php echo $kiosk_id ?>";
    var send_data = {'kiosk_id': kiosk_id}
    $.ajax({
        type: 'POST',
        data: send_data,
        // contentType: 'application/jsonp',
        url: 'followersdata_kiosk.php',
        success: function(response) {
            console.log(response);
	    //alert("Operation is done!!!");

            var data = JSON.parse(response);
	          var t_l = data['terminal_left'];
            var t_r = data['terminal_right'];

	    //console.log(document.getElementById("kiosk_terminal_left").getAttribute("class"));

            if (t_l == 1){
	      (document.getElementById("kiosk_terminal_left")).setAttribute("class", "btn btn-success pull-right");
	    } else {
	      (document.getElementById("kiosk_terminal_left")).setAttribute("class", "btn btn-danger pull-right");
	    }

	    if (t_r == 1){
	      (document.getElementById("kiosk_terminal_right")).setAttribute("class", "btn btn-success pull-right");
	    } else {
	      (document.getElementById("kiosk_terminal_right")).setAttribute("class", "btn btn-danger pull-right");
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

    kiosk_info();

  });


</script>
