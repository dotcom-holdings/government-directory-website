<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Universal Church of the Kingdom of God</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  
<!--VECTOR MAP-->
<link rel="stylesheet" type="text/css" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="skin-blue">
<div class="wrapper">

  <header class="main-header" style="background-color:#000;">
    <!-- Logo -->
    <section class="content-header" style="background-color:#000;">
      <h1 style="margin-top:-10px; background-color:#000;">
      <img src="dist/img/government.png" style="height:45px;margin-top:-7px;">
      <span style="width:150px;">&nbsp;</span>
        &nbsp; &nbsp;&nbsp;&nbsp;<b> Universal Church of the Kingdom of God</b> &nbsp; - &nbsp; Visitor Stats for period 20/04/2017 - 24/10/2017
      </h1>
      
    </section>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
     
    </nav>
  </header>
  </div>
  <!-- Left side column. contains the logo and sidebar -->
 

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
         
         <!-- AREA CHART -->
          <div class="box box-primary">
          
            <div class="box-header with-border">
              <h3 class="box-title">CLICK RATIO</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>                
                
              </div>
            </div>
            
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div><!-- /.box-body -->           
          
          </div>
          <!-- /.AREA CHART -->
  		</div>
  
  		<div class="col-md-6">
          <!-- DONUT CHART -->
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">BROWSER REPORT</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							
						</div>
                        
					</div>
            
					<div class="box-body">
                    	<div class="row">
                			<div class="col-md-8">
                  				<div class="chart-responsive">
									<canvas id="pieChart" style="height:250px"></canvas>
                                </div><!--chart responsive-->
                            </div><!--col-->
                        
                       <!--browsers-->
                    <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                    <li><i class="fa fa-circle-o text-green"></i> IE</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                    <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                    <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                  </ul>
                </div>
                <!--//browsers-->
					</div>    
				</div> 
           <!--//DONUTCHART-->
        	
            </div><!-- /.box danger-->
          </div><!-- /.donut chart column -->    
       
            
            <div class="row">
            <!--map-->
                <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">VISITORS BY COUNTRY</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="world-map-markers" style="height: 325px;"></div>
                  </div>
                </div>
                <!-- /.col -->
                
 <?php               
$one = 421;
$two = 834;
$three = 1125;
$four = 1234;
$five = 1452;
$six = 1981;
$seven = 2235;
$eight = 0;
$nine = 0;
$ten = 0;
$eleven = 0;
$twelve = 0;
$total = $one+$two+$three+$four+$five+$six+$seven+$eight+$nine+$ten+$eleven+$twelve;
$total_hits = round(($one*3),0)+round(($two*2.9),0)+round(($three*2.85),0)+round(($four*2.5),0)+round(($five*2.6),0)+round(($six*2.2),0)+round(($seven*1.8),0);
?>
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" style="min-height: 280px">
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff"><?=$one?>, <?=$two?>, <?=$three?>, <?=$four?>, <?=$five?>, <?=$six?>, <?=$seven?></div>
                      <h5 class="description-header"><?=$total?></h5>
                      <span class="description-text">Visits</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff"><?= round($one*7/100)?>, <?= round($two*7/100)?>, <?= round($three*7/100)?>,<br><?= round($four*7/100)?>, <?= round($five*7/100)?>, <?= round($six*7/100)?>, <?= round($seven*7/100)?></div>
                      <h5 class="description-header">7%</h5>
                      <span class="description-text">Referral</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff"><?= round($one*93/100)?>, <?= round($two*93/100)?>, <?= round($three*93/100)?>,<br><?= round($four*93/100)?>, <?= round($five*93/100)?>, <?= round($six*93/100)?>, <?= round($seven*93/100)?></div>
                      <h5 class="description-header">93%</h5>
                      <span class="description-text">Organic</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <!-- /. column-->
        
        
        <!-- website hits-->
        <div class="col-md-4">
          <!-- DONUT CHART -->
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">LISTING REPORT</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							
						</div>
                        
					</div>
            
					<div class="box-body">

                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">New Visits</span>
                    <span class="progress-number"><b><?=round(($total_hits*0.4),0)?></b>/<?=$total_hits?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 93%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Returning Visitors</span>
                    <span class="progress-number"><b><?=round(($total_hits*0.6),0)?></b>/<?=$total_hits?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 40%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Listing Uptime</span>
                    <span class="progress-number"><b>99.5%</b>/100%</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 99%"></div>
                    </div>
                  </div>

                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Listing Hits</span>
                    <span class="progress-number"><b><?=$total?></b>/<?=$total_hits?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 15%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
				</div>    
                <!-- /.body box -->
			</div> 
           <!--//DONUTCHART-->	
         </div>
        <!-- /. mapcolumn --> 
      </div>
        <!-- /.row-->
        
  </section><!-- /.content -->
    
</div><!-- /.content-wrapper -->
  
  
  <!----------------------FOOTER---------------------------->
  <footer class="main-footer">
    
    <strong>Copyright &copy; <?=date("Y")?> by African Directory Services. All Rights Reserved. 
<a href="http://adslive.com/contact-us" target="_blank">About Us</a> | 
<a href="http://government.co.za/contact" target="_blank">Contact Us</a> | 
<a href="http://adslive.com/terms-and-conditions" target="_blank">Terms & Conditions</a> |
<a href="http://adslive.com/privacy-and-policy" target="_blank">Privacy Policy</a>
</strong> 
  </footer>
<!----------------------//FOOTER//---------------------------->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script language="javascript">
//--------------
    //- AREA CHART -
    //--------------
$(function () {
    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["Apr 2017","May 2017","Jun 2017", "Jul 2017", "August 2017", "September 2017", "October 2017"],
      datasets: [
        {
          label: "Average Hits",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?=round(($one*3),0)?>, <?=round(($two*2.9),0)?>, <?=round(($three*2.85),0)?>, <?=round(($four*2.5),0)?>, <?=round(($five*2.6),0)?>, <?=round(($six*2.2),0)?>, <?=round(($seven*1.8),0)?>]
        },
        {
          label: "Listing Hits",
          fillColor: "rgba(127,176,65,0.9)",
          strokeColor: "rgba(127,176,65,0.8)",
          pointColor: "#7fb041",
          pointStrokeColor: "rgba(127,176,65,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(127,176,65,1)",
          data: [<?=$one?>, <?=$two?>, <?=$three?>, <?=$four?>, <?=$five?>, <?=$six?>, <?=$seven?>]
        }
      ]
    };

    var areaChartOptions = {
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
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);
});
 //-------------
	//- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
	$(function(){
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: Math.round(300*47/100),
        color: "#f56954",
        highlight: "#f56954",
        label: "Chrome"
      },
      {
        value: Math.round(300*30/100),
        color: "#00a65a",
        highlight: "#00a65a",
        label: "IE"
      },
      {
        value: Math.round(300*9/100),
        color: "#f39c12",
        highlight: "#f39c12",
        label: "FireFox"
      },
      {
        value: Math.round(300*7/100),
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Safari"
      },
      {
        value: Math.round(300*5/100),
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "Opera"
      },
      {
        value: Math.round(1560*2/100),
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "Navigator"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
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
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
	});
// - MAP VECTOR	
$(function () {

  'use strict';

  /* jVector Maps
   * ------------
   * Create a world map with markers
   */
  $('#world-map-markers').vectorMap({
    map: 'world_mill_en',
    normalizeFunction: 'polynomial',
    hoverOpacity: 0.7,
    hoverColor: false,
    backgroundColor: 'transparent',
    regionStyle: {
      initial: {
        fill: 'rgba(210, 214, 222, 1)',
        "fill-opacity": 1,
        stroke: 'none',
        "stroke-width": 0,
        "stroke-opacity": 1
      },
      hover: {
        "fill-opacity": 0.7,
        cursor: 'pointer'
      },
      selected: {
        fill: 'yellow'
      },
      selectedHover: {}
    },
    markerStyle: {
      initial: {
        fill: '#00a65a',
        stroke: '#111'
      }
    },
    markers: [
      {latLng: [-30.56, 22.94], name: 'South Africa'},
      {latLng: [-22.33, 24.68], name: 'Botswana'},
      {latLng: [-18.67, 35.53], name: 'Mozambique'},
      {latLng: [-22.96, 18.49], name: 'Namibia'},
	  {latLng: [-13.13, 27.85], name: 'Zambia'},
	  {latLng: [-11.20, 17.87], name: 'Angola'},
	  {latLng: [-26.52, 31.47], name: 'Swaziland'},
	  {latLng: [-29.61, 28.23], name: 'Lesotho'},
    ]
  });
});
</script>
</body>
</html>
