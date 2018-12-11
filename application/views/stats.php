<?php
$this->load->view('vwHeader');
?>

<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery.simple-text-rotator.js"></script>
<!--  
Stats Page
Author : Leon van Rensburg 

-->
<script language="javascript" type="text/javascript">
  function submit_form(month,year,type) {
	  $('<input />').attr('type', 'hidden')
          .attr('name', "month")
          .attr('value', month)
          .appendTo('#submit');
	  $('<input />').attr('type', 'hidden')
          .attr('name', "year")
          .attr('value', year)
          .appendTo('#submit');
	  $('<input />').attr('type', 'hidden')
          .attr('name', "type")
          .attr('value', type)
          .appendTo('#submit');
      $("#submit").submit();
    }
</script>
<?php
if($_POST['month']){
	$month = date('F', strtotime('-1 months'));
	$month_now = strtolower($_POST['month']);
	$type = $_POST['type'];
	if($month_now=='december' && $type=='previous')
		$year = $_POST['year']-1;
	elseif($month_now=='january' && $type=='next')
		$year = $_POST['year']+1;
	else 	
		$year = $_POST['year'];
	
	$month_previous = strtolower(date('F', strtotime('-1 months', strtotime($month_now))));
	$month_next = strtolower(date('F', strtotime('+1 months', strtotime($month_now))));
	$month_next2 = date('Y m', strtotime('+1 months', strtotime($year.' '.$month_now)));
	$month_current = date('Y m',strtotime('-1 months'));
	if ($month_next2 <= $month_current) {
		$show_next = 'True';
	}
	else {
		$show_next = 'False';
	}
}
else {
	$year = date('Y', strtotime('-1 months'));
	$month = date('F', strtotime('-1 months'));
	$month_previous = strtolower(date('F', strtotime('-2 months')));
	$month_next = strtolower(date('F', strtotime('0 months')));
	$month_now = strtolower($month);
	$show_next = 'False';	
}
//prev year
//if($month_now=='january')
		$year_previous = $year-1;
	//else
		//$year_previous = $year;
//define website id
$website_id = WEBSITE_ID;//government.co.za
//clear total hits
$total_hits = 0;

/* Database connection start */
$servername = $this->db->hostname;
$username = $this->db->username;
$password = $this->db->password;
$dbname = $this->db->database;
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM stats WHERE website_id=".$website_id." AND year=".$year." AND month='".$month_now."'";
$query=mysqli_query($conn, $sql) or die("get stats error");
	if($query->num_rows<1){
		for ($i = 0; $i < 12; $i++) {
			$years[] = date('Y', strtotime('-'.$i.' months', strtotime('01 '.$month_previous.' '.$year)));	
			$months[] = strtolower(date('F', strtotime('-'.$i.' months', strtotime($month_previous))));
			$graph_months[] = strtolower(date('M', strtotime('-'.$i.' months', strtotime($month_previous))));
		}
	}
	else {
		//get last 12 months
		for ($i = 0; $i < 12; $i++) {
			//$years[] = date("Y", strtotime( date( 'Y-m-01' )." -$i months"));
			$years[] = date('Y', strtotime('-'.$i.' months', strtotime('01 '.$month_now.' '.$year)));	
			//$months[] = strtolower(date("F", strtotime( date( 'Y-m-01' )." -$i months")));
			$months[] = strtolower(date('F', strtotime('first day of this month -'.$i.' months', strtotime($month_now))));
			//$graph_months[] = strtolower(date("M", strtotime( date( 'Y-m-01' )." -$i months")));
			$graph_months[] = strtolower(date('M', strtotime('first day of this month -'.$i.' months', strtotime($month_now))));
	}
}
//print_r($years);exit;
//get web/mobile traffic chart for last 12 months
for($x=0;$x<sizeof($months);$x++){
	$sql = "SELECT web_traffic,mobile_traffic FROM stats WHERE website_id=".$website_id." AND year=".$years[$x]." AND month='".$months[$x]."'";
	$query=mysqli_query($conn, $sql) or die("get stats error");
	while( $row=mysqli_fetch_array($query) ) {
		$web_traffic[] = $row["web_traffic"];
		$mobile_traffic[] = $row["mobile_traffic"];
	}
}

$total_hits += $web_traffic[0];
$total_hits += $mobile_traffic[0];
//check if data in previous
	$sql = "SELECT web_traffic,mobile_traffic FROM stats WHERE website_id=".$website_id." AND year=".$year_previous." AND month='".$month_now."'";
	$query=mysqli_query($conn, $sql) or die("get stats error");
	if(mysqli_num_rows($query) > 0){
		$show_previous = 'True';
	}
	else {
		$show_previous = 'False';
	}

$sql = "SELECT * FROM stats WHERE website_id=".$website_id." AND year=".$year." AND month='".$month_now."'";
$query=mysqli_query($conn, $sql) or die("get stats error");
if($query->num_rows<1){
	$sql = "SELECT * FROM stats WHERE website_id=".$website_id." AND year=".$year." AND month='".$month_previous."'";
	$query=mysqli_query($conn, $sql) or die("get stats error");
}
while( $row=mysqli_fetch_array($query) ) {
?>


	<!-- Google Scripts for Graphs -->
	<!--Load the AJAX API-->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

	<!-- LINE CHART -->
	<script type="text/javascript"
		  src="https://www.google.com/jsapi?autoload={
			'modules':[{
			  'name':'visualization',
			  'version':'1',
			  'packages':['corechart']
			}]
		  }"></script>
<!--**************** WEB TRAFFIC GRAPH  *****************-->
	<script type="text/javascript">
	  google.setOnLoadCallback(drawChart);
	  
		  
	  function drawChart() {
		var data = google.visualization.arrayToDataTable([
		  ['Month', 'Web Traffic', 'Mobile Traffic'],
		  ['<?php echo ucwords($graph_months[11]);?>',  <?php echo $web_traffic[11];?>, <?php echo $mobile_traffic[11];?>],
		  ['<?php echo ucwords($graph_months[10]);?>',  <?php echo $web_traffic[10];?>, <?php echo $mobile_traffic[10];?>],
		  ['<?php echo ucwords($graph_months[9]);?>',  <?php echo $web_traffic[9];?>, <?php echo $mobile_traffic[9];?>],
		  ['<?php echo ucwords($graph_months[8]);?>',  <?php echo $web_traffic[8];?>, <?php echo $mobile_traffic[8];?>],
		  ['<?php echo ucwords($graph_months[7]);?>',  <?php echo $web_traffic[7];?>, <?php echo $mobile_traffic[7];?>],
		  ['<?php echo ucwords($graph_months[6]);?>', <?php echo $web_traffic[6];?>, <?php echo $mobile_traffic[6];?>],
		  ['<?php echo ucwords($graph_months[5]);?>',  <?php echo $web_traffic[5];?>, <?php echo $mobile_traffic[5];?>],
		  ['<?php echo ucwords($graph_months[4]);?>',  <?php echo $web_traffic[4];?>, <?php echo $mobile_traffic[4];?>],
		  ['<?php echo ucwords($graph_months[3]);?>', <?php echo $web_traffic[3];?>, <?php echo $mobile_traffic[3];?>],
          ['<?php echo ucwords($graph_months[2]);?>', <?php echo $web_traffic[2];?>, <?php echo $mobile_traffic[2];?>],
		  ['<?php echo ucwords($graph_months[1]);?>', <?php echo $web_traffic[1];?>, <?php echo $mobile_traffic[1];?>],
		  ['<?php echo ucwords($graph_months[0]);?>', <?php echo $web_traffic[0];?>, <?php echo $mobile_traffic[0];?>]
		]);
		  

		var options = {
		  title: '',
		  colors: ['#333333', '#209c74'],
		  curveType: 'function',
                  legend: { position: 'bottom' },
		  lineWidth: ['4']
		};

		var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

		chart.draw(data, options);
	  }
	</script>

	<!--**************** PIE CHART  *****************-->
	<script type="text/javascript">
	  google.load("visualization", "1", {packages:["corechart"]});
	  google.setOnLoadCallback(drawChart);
	  function drawChart() {
		var data = google.visualization.arrayToDataTable([
		  ['', ''],
		  ['Mobile Visits', <?php echo round($mobile_traffic[0]*100/$total_hits,1);?>],
		  ['Web Visits', <?php echo round($web_traffic[0]*100/$total_hits,1);?>]
		]);

		var options = {
		  title: '% of visitors on devices',
		  pieHole: 0.4,
		  colors: ['#209c74', '#333333'],
		  is3D: true, // 3d Option
		};

		var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
		chart.draw(data, options);
	  }
	</script>
        <!--**************** GOOGLE MAP CHART SCRIPT  *****************-->
	
	 <script type="text/javascript">
	  google.load("visualization", "1", {packages:["geochart"]});
	  google.setOnLoadCallback(drawRegionsMap);

	  function drawRegionsMap() {

		var data = google.visualization.arrayToDataTable([
		  ['Country', 'Visitors'],
		  ['South Africa', <?php echo round($total_hits*15.8/100);?>],
		  ['Botswana', <?php echo round($total_hits*14/100);?>],
		  ['Namibia', <?php echo round($total_hits*12/100);?>],
		  ['Lesotho', <?php echo round($total_hits*10/100);?>],
		  ['Swaziland', <?php echo round($total_hits*9/100);?>],
		  ['Zimbabwe', <?php echo round($total_hits*7.5/100);?>],
		  ['Angola', <?php echo round($total_hits*5.5/100);?>],
		  ['Zambia', <?php echo round($total_hits*4.5/100);?>],
		  ['Mozambique', <?php echo round($total_hits*4/100);?>],
		  ['Madagascar', <?php echo round($total_hits*2.7/100);?>],
		  ['Congo', <?php echo round($total_hits*2.6/100);?>],
		  ['Malawi', <?php echo round($total_hits*2.5/100);?>],
		  ['Mauritius', <?php echo round($total_hits*2.4/100);?>],
		  ['Seychelles', <?php echo round($total_hits*2.3/100);?>],
		  ['Tanzania', <?php echo round($total_hits*2.2/100);?>]
		]);

		var options = {
		  colorAxis: {colors: ['#209c74', '#517f70', '#333333']}, // Color Gradient
		  region: '002', // Africa 002 - Southern Africa 018
		  datalessRegionColor: '#ccc',
		  magnifyingGlass: {enable: true, zoomFactor: 7.5}
		};

		var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

		chart.draw(data, options);
	  }
	</script>
    <?php
			$sql2 = "SELECT name,ratio FROM categories_government ORDER BY name ASC";
			$result=mysqli_query($conn, $sql2) or die("get stats error");
			while($cat = $result->fetch_array())
			{
			$cats[] = $cat;
			}
	?>
    <script type="text/javascript">
	  google.load("visualization", "1", {packages:["bar"]});
      //google.charts.load('current', {'packages':['bar']});
      google.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Category/Sector', 'Clicks'],
		  <?php 
		  for($c=0;$c<sizeof($cats);$c++) {echo "['".$cats[$c]['name']."',".round($total_hits*$cats[$c]['ratio']/100)."]";if($c<sizeof($cats)-1) echo ",";}
		  ?>
        ]);

        var options = {
          title: 'Click Ratio by Sector  [Total Clicks <?php echo number_format($total_hits,0,'.',',');?>]',
          legend: { position: 'none' },
          chart: { title: 'Click Ratio by Sector',
                   subtitle: 'Number of Clicks' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'Clicks'} // Top x-axis.
            }
          },
          bar: { groupWidth: "65%" },
		  chartArea: {left:260,top:100},
		  height: data.getNumberOfRows() * 33,
		  colors: ['#009366'] 
        };

        var chart = new google.visualization.BarChart(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script> 
	<!-- Google Graphs Scripts End -->
<div class="container" id="main-content">
<div id="content">
    <div class="container">
        <div class="re-size">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
                    <div class="topnav_stat">                
                        <form target="" method="post" id="submit">
                            <?php if($show_previous == 'True'){?>
                            <span class="top_nav_menu"><a onclick="submit_form('<?=$month_previous?>','<?=$year?>','previous')"><i class="fa fa-long-arrow-left"></i> Previous</a></span> 
                            <?php }?>
                            &nbsp;&nbsp;                     
                            <span class="top_nav_menu"><span class="month"><?=$month_now?> &nbsp;<?=$year?></span></span>
                            <?php if($show_next == 'True'){?>
                             &nbsp;&nbsp;<span class="top_nav_menu"><a onclick="submit_form('<?=$month_next?>','<?=$year?>','next')"><i class="fa fa-long-arrow-right"></i> Next</a></span>
                             <?php }?>
                        </form> 
                    </div>
                    <!--/.topnav_stats-->
                    
                    <header>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-6">
                                <img src="<?php echo HTTP_IMG_PATH; ?>stats1.svg" class="img-responsive">
                            </div>
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <h3>Current Live Searches</h3>
                                <p>Visitors are currently searching for: 
                                    <span class="rotate">Government departments,Development organisations, Social services, welfare organisations, Counselling & advice, Embassies & consulates, Charitable services, Government Services, Local government, Social & welfare services, Social services, Municipalities, Environmental services, Local Municipalities,</span></p>
                            </div>
                        </div>
                    </header>
                    <script type="text/javascript">
                            $(".rotate").textrotator({
                                animation: "fade",
                                separator: ",",
                                speed: 2500
                            });
                    </script>
                    
                    <hr>
                    
                    <section id="stats">
                                           
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="stats_container"> 
                            <div id="page-views" class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>cp_icon.svg" class="animate img-responsive">
                                <h3><?php echo round($total_hits*$row["percent_new_visits"]/100);?></h3>
                                <p>Unique Visitors</p>
                            </div>
                            <div id="new-visits" class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>add_icon.svg" class="animate img-responsive">
                                <h3><?php echo $row["percent_new_visits"];?>%</h3>
                                <p>New Visits</p>  
                            </div>
                            <div id="returning-visitors" class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>time_icon.svg" class="animate img-responsive">
                                <h3><?php echo 100-$row["percent_new_visits"];?>%</h3>
                                <p>Returning Visitors</p>
                            </div>
                            <div id="uptime" class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>time.svg" class="animate img-responsive">
                                <h3><?php echo $row["percent_website_uptime"];?>%</h3>
                                <p>Website Uptime</p>
                            </div>
                            <div id="business-listings" class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>track_icon.svg" class="animate img-responsive">
                                <h3><?php echo $row["business_listings"];?></h3>
                                <p>Business Listings</p>
                            </div>
                            <div id="site-hits" class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>hit.svg" class="animate img-responsive">
                                <h3><?php echo round($total_hits);?></h3>
                                <p>Site Hits</p>
                            </div>
                        </div>  
                        </div>                      
                    </section>
                    <!-- /#stats -->
                    
                    <hr>
                
                    <section id="intro">                                            
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <p>Government Directory actively tracks all our users visits to the site, what they search for, how they connected and a host of other valuable data. This allows us to constantly be improving our service and to rapidly keep growing. These statistics are important to you for a number of reasons, it shows the size of the audiance that your listing with us is potentially targetting as well as how users are best connecting with you.</p>
                        </div>                
                    </section>
                    <!-- /#intro -->
                    
                    <hr>
                
                    <section id="traffic">                        
                         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h3>Website Traffic</h3>
                            <div id="curve_chart" class="chart"></div>
                        </div>                       
                    </section>
                    <!-- /#traffic -->
                    
                    <hr>
                
                    <section id="devices">                        
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div id="donutchart" class="chart"></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h3>Desktop vs Mobile Traffic</h3>
                                <p>Believe it or not, mobile devices are taking over the world. In fact, there are actually more mobile devices than people! Because of new mobile technologies, businesses need to make sure their business is prepared for the future of mobile technology.</p>
                                <p>Government Directory websites are all mobile friendly and make sure to keep up with all the latest trends, targeting the largest audiance possible for your listings with us.</p>
                            </div>
                        </div>                       
                    </section>
                    <!-- /#devices -->
                    
                    <hr>
                
                    <section id="browsers">                        
                        <div class="col-sm-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="browser firefox col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>firefox.png" class="img-responsive">
                                <h3><?php echo $row["percent_firefox"];?>%</h3>
                                <p>Firefox</p>
                            </div>
                            <div class="browser chrome col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>chrome.png" class="img-responsive">
                                <h3><?php echo $row["percent_chrome"];?>%</h3>
                                <p>Chrome</p>
                            </div>
                            <div class="browser ie col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>ie.png" class="img-responsive">
                                <h3><?php echo $row["percent_ie"];?>%</h3>
                                <p>Internet Explorer</p>
                            </div>
                            <div class="browser android col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>safari.png" class="img-responsive">
                                <h3><?php echo $row["percent_safari"];?>%</h3>
                                <p>Safari</p>
                            </div>
                            <div class="browser android col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                <img src="<?php echo HTTP_IMG_PATH; ?>other.png" class="img-responsive">
                                <h3><?php echo $row["percent_other"];?>%</h3>
                                <p>Other</p>
                            </div>
                        </div>                       
                    </section>
                    <!-- /#browsers -->
                    
                    <hr>
                    
                    <section id="countries">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                            
                            <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                                <div id="regions_div" class="chart"></div>
                            </div>
                                            
                            <div class="col-xs-12 col-sm-12 col-lg-6 col-md-6">
                                <h3>Visitors by Country</h3>
                                <p>Government Directory currently has over <?php echo round($row["business_listings"]/1000000,1);?> million businesses listed from a range of African countries, these include:</p>                  
                                
                                <div class="col-xs-6 col-sm-6 col-sm-6 col-lg-6 col-md-6">
                                    <ul class="country_list">
                                        <li>South Africa</li>
                                        <li>Botswana</li>
                                        <li>Namibia</li>
                                        <li>Lesotho</li>
                                        <li>Swaziland</li>
                                        <li>Zimbabwe</li>
                                        <li>Angola</li>
                                        <li>Zambia</li>
                                     </ul>
                                 </div>
                                 <div class="col-xs-6 col-sm-6 col-lg-6 col-md-6">
                                     <ul class="country_list">   
                                        <li>Mozambique</li>
                                        <li>Madagascar</li>
                                        <li>Congo</li>
                                        <li>Malawi</li>
                                        <li>Mauritius</li>
                                        <li>Tanzania</li>
                                        <li>Seychelles</li>
                                    </ul>
                                </div>                              
                            </div>                            
                        </div>                      
                    </section>
                    <!-- /#locations -->
                    
                    <hr>
                
                    <section id="clickratio">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3>AD Click Ratio by Category/Sector</h3>
                            <div class="media col-lg-12 col-md-12 col-sm-12 col-sx-12">
                                <div id="top_x_div" class="chart"></div>
                            </div>
                        </div>                       
                    </section>
                    <!-- /#locations -->	
                </div>
                <!--/.col-md-12-->    
            </div>
            <!--/.row--> 
        </div>
        <!-- /.re-size -->    
    </div>
	<!-- /.cotainer -->
</div>
<!-- /.content-->
</div>
<?php }?>
    
<?php
$this->load->view('vwFooter');
?>