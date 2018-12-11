<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!------------------------------------JQUERY LIB -------------------------------------------->
    <title> Government South Africa - General Statistics</title>
   
    
   
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" />
    <!-- Bootstrap core CSS -->
    
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap4/bootstrap.min.css" />
   
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap4/mdb.min.css" />

    <!-- Customizer -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap4/customizer.min.css" />

    <!-- Your custom styles (optional) -->
  
    
	
</head>
<style>

	
	</style>
<body class="fixed-sn black-skin">

  
	
    <!--Double navigation-->
    <header >
        <!-- Sidebar navigation -->
        <ul id="slide-out" class="side-nav fixed sn-bg-1 custom-scrollbar">
            <!-- Logo -->
            <li>
                   <br> <center><img src="<?php echo HTTP_IMG_PATH; ?>identity1.fw.png" alt="" width="183" height="43" /></center>
                <br>
            </li>
            <!--/. Logo -->
            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="home.html" class="waves-effect">Dahboard v1</a>
                                </li>
                                <li><a href="home%20v2.html" class="waves-effect">Dahboard v2</a>
                                </li>
                                <li><a href="home%20v3.html" class="waves-effect">Dahboard v3</a>
                                </li>
                            </ul>
                        </div></li>
                    <li><a href="<?php echo HTTP_BASE_PATH; ?>home" id="about">Home</a></li>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home/about" id="about">About Us</a></li>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home/contact" id="contact">Contact Us</a></li> 
            <?php if ($loggedin) { ?>                
                 <li><a href="<?php echo HTTP_BASE_PATH; ?>home/view_stats">Profile</a></li>
                <li><a href="<?php echo HTTP_BASE_PATH; ?>home/logout">Logout</a></li>
            <?php } else {?>
                <li><a href="<?php echo HTTP_BASE_PATH; ?>home/register">Register</a></li>
                <li><a href="<?php echo HTTP_BASE_PATH; ?>home/do_login">Login</a></li>
            <?php } ?>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>statistics/stats">Stats</a></li>
            <li><a id="business_add_btn" href="<?php echo HTTP_BASE_PATH; ?>home/postad">Add your business</a></li>
                    
                </ul>
            </li>
            <!--/. Side navigation links -->
            <div class="sidenav-bg"style="background-color:#018C63 ;color: black;"></div>
        </ul>
        <!--/. Sidebar navigation -->
        
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav" style="background-color:#018C63;Color: black;">
           
            <!-- SideNav slide-out button -->
            <div class="float-left" >
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
                
            </div>
            
            <!-- Breadcrumb-->
            <ol class="breadcrumb hidden-lg-down">
                <li class="breadcrumb-item active" style="color: #333">Analytics</li>
            </ol>
            
            <!--Navbar links-->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

                <?php if ($loggedin) { ?> 
                 
			<ul class="nav navbar-nav nav-flex-icons ml-auto">
				
           <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user" style="color: #333"></i> <span class="hidden-sm-down" style="color: #333">Profile</span>
                    </a>
                    <div class="dropdown-menu dropdown-ins dropdown-menu-right" aria-labelledby="userDropdown">
                        <a  class="dropdown-item" href="<?php echo HTTP_BASE_PATH; ?>home/logout">Logout</a>
                    </div>
                </li>
                
            </ul>
             <?php }?>
            </ul>
            <!--/Navbar links-->
            
        </nav>
        <!-- /.Navbar -->
        
    </header>
    <!--/.Double navigation-->

    <!--Main layout-->
        <main class="">

        <div class="container-fluid">

            <!-- First row -->
            
            <!-- /.First row -->

            <!--Section: Main Chart--> 
            <!--/Section: Main chart-->
           
            <h3><br>  Government South Africa</h3>
            <h5 style="color:#333">We have displayed <span class="badge blue darken-2 animated pulse infinite"><?php echo $get_ads_shown + 9856324;?></span> adverts so far.</h5> 
            
             <h2><span class="badge blue"><?php echo $this->session->flashdata('add_video');?></span></h2>
             <h2><span class="badge blue"><?php echo $this->session->flashdata('class_ad_upgrade');?></span></h2>
             <h2><span class="badge blue"><?php echo $this->session->flashdata('add_banner');?></span></h2>
             
   <br>        
<h3>Analytics For 
<div class="btn-group">
    <button class="btn btn-default btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <strong> <?php  echo $year;?></strong>
    </button>
    <div class="dropdown-menu">
        
        <?php 
		$ayears = range ( 2010, date( 'Y'));

foreach ( $ayears as $ayear )
{
		?>
        <form action="<?php echo base_url() ?>statistics/stats/<?php  echo $month;?>/<?php  echo $ayear;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($year==$ayear){echo 'active';}?>" value="<?php  echo $ayear;?>">
        </form>
        <?php }?>
       
        
      </div>
</div>
</h3>
<hr><br>
<div class="row"> 
                    <!--First column-->
                    <div class="col-md-3 mb-1">
                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card">

                            <!--Card Data-->
                            <div class="admin-up">
                                <i class="fa  fa-television  blue darken-2"></i>
                                <div class="data">
                                    <p> PROFILE VIEWS</p> 
                                    <h6 ><div id="div1"><img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" /></div>
                                 
                                    <script>
$(document).ready(function(){
  
        $("#div1").load("<?php echo base_url() ?>statistics/get_profile_views_company/<?php echo $year;?>");
 
});
</script>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-block">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text" style="padding: 10px">The total amount of company profile views.</p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                    </div>
                    <!--/First column-->

                    <!--Second column-->
                    <div class="col-md-3 mb-1">
                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card">

                            <!--Card Data-->
                            <div class="admin-up">
                                <i class="fa fa-hand-pointer-o blue darken-2"></i>
                                <div class="data">
                                    <p> ADVERT CLICKS</p>
                                    <h6><div id="div2"><img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" /></div><script>
$(document).ready(function(){
  
        $("#div2").load("<?php echo base_url() ?>statistics/get_advert_views_company/<?php echo $year;?>");
 
});
</script>  
                                    </h6>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-block">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text" style="padding: 10px">The total amount of advert views on this website.</p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                    </div>
                    <!--/Second column-->
                    <!--Third column-->
                    <div class="col-md-3 mb-1">
                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card">

                            <!--Card Data-->
                            <div class="admin-up">
                                <i class="fa fa-desktop blue darken-2"></i>
                                <div class="data">
                                    <p>DEVICES REACHED</p>
                                    <h6><div id="div3"><img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
 </div><script>
$(document).ready(function(){
  
        $("#div3").load("<?php echo base_url() ?>statistics/get_pcs_reached/<?php echo $year;?>");
 
});
</script>  </h6>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-block">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text" style="padding: 10px">People that are reached by this website in <?php echo $year;?>.</p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                    </div>
                    <!--/Third column-->

                    <!--Fourth column-->
                    <div class="col-md-3 mb-1">
                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card">

                            <!--Card Data-->
                            <div class="admin-up">
                                <i class="fa fa-group blue darken-2"></i>
                                <div class="data">
                                    <p>NEW VISITORS</p>
                                    <h6> <div id="div4"><img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
					 </div><script>
					$(document).ready(function(){

							$("#div4").load("<?php echo base_url() ?>statistics/get_new_visits/<?php echo $year;?>");

					});
					</script> </h6>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-block">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text" style="padding: 10px">The number of new visitors this month.</p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                    </div>
                    <!--/Fourth column-->
					
                </div>
			
                <br><strong style="font-size: 24px; color: #333;">
                General Statistics </strong><br><hr>
                <div class="row mb-1"> 
                
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3> 
                      		<div id="div5">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

											$("#div5").load("<?php echo base_url() ?>statistics/get_listing_count/<?php echo $year;?>");

									});
								  </script>
                        
                       </h3>
                        <p>Company Listings
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3><div id="div6">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

											$("#div6").load("<?php echo base_url() ?>statistics/get_subscribers_count/<?php echo $year;?>");

									});
								  </script></h3>
                        <p>Subscribers 
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3>
                        <div id="div7">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

											$("#div7").load("<?php echo base_url() ?>statistics/get_companies_views/<?php echo $year;?>");

									});
								  </script>
                       </h3>
                        <p>Company Views
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3><div id="div8">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

											$("#div8").load("<?php echo base_url() ?>statistics/get_directory_views/<?php echo $year;?>");

									});
								  </script>
                       	</h3>
                        <p>Online Directory Views
						</p>
                    </div>

                </div>

            </div>
            <hr>
            <br>
            <div class="card mb-r"> 
                <div class="card-block" style="padding: 25px">
                     		<div id="div9">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

											$("#div9").load("<?php echo base_url() ?>statistics/browser_ajax_stats/<?php echo $month;?>/<?php echo $year;?>");

									});
								  </script></div></div>
		<br> 
	 
<section class="section">

                <!--Main row-->
                <div class="row">

                    <div class="col-md-12">
                        <!--Card-->
                        <div class="card card-cascade narrower">

                            <!--Admin panel-->
                            <div class="admin-panel">

                                <!--First row-->
                                <div class="row mb-0">

                                    <!--First column-->
                                    <div class="col-md-5">

                                        <!--Panel title-->
                                        <div class="view left" style="background-color:#018C63 ;color: white;">
                                            <h2 style="color:#000 "> Visits by Browser
											</h2>
                                        </div>
   
										<!--Panel data-->
                                        <div class="col-md-12" style="margin-top: 20px;margin-bottom: 30px">
                        
                                <center><div style="width: 68%"><canvas id="seo"></canvas></div></center>
                            
                        

                    </div>
                                        <!--/Panel data-->
                                    </div>
                                    <!--/First column-->

                                    <!--Second column-->
                                    <div class="col-md-7">
                                        <!--Cascading element-->
                                        <div class="view right mb-r"  style="background-color:#018C63 ;color: white;">
                                            <!--Main chart-->
                                            <h5  style="color:#000 ">Profiles Viewed </h5>
                                            <canvas  style="color:#000 " id="traffic" height="155px"></canvas>
                                            
										</div>
                                        <!--/Cascading element-->
                                    </div>
                                    <!--/Second column-->
                                    <!-- Button trigger modal -->

                                </div>
                                <!--/First row-->

                            </div>
                            <!--/Admin panel-->

                        </div>
                        <!--/.Card-->
                    </div>

                </div>
             <!--/Main row-->

            </section>

		<strong style="font-size: 24px; color: #333;">
                Monthly Report for <div class="btn-group">
    <button class="btn btn-default btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php if($month==1){echo 'January';}?>
        <?php if($month==2){echo 'February';}?>
        <?php if($month==3){echo 'March';}?>
        <?php if($month==4){echo 'April';}?>
        <?php if($month==5){echo 'May';}?>
        <?php if($month==6){echo 'June';}?>
        <?php if($month==7){echo 'July';}?>
        <?php if($month==8){echo 'August';}?>
        <?php if($month==9){echo 'September';}?>
        <?php if($month==10){echo 'October';}?>
        <?php if($month==11){echo 'November';}?>
        <?php if($month==12){echo 'December';}?>
    </button>
    <div class="dropdown-menu">
        
        
             
       <?
		if($year==date("Y")){
		for($x=1;$x<=date("m");$x++)
		{
        
        ?>
        <?php if($x==1){$m='January';}?>
        <?php if($x==2){$m='February';}?>
        <?php if($x==3){$m='March';}?>
        <?php if($x==4){$m='April';}?>
        <?php if($x==5){$m='May';}?>
        <?php if($x==6){$m='June';}?>
        <?php if($x==7){$m='July';}?>
        <?php if($x==8){$m='August';}?>
        <?php if($x==9){$m='September';}?>
        <?php if($x==10){$m='October';}?>
        <?php if($x==11){$m='November';}?>
        <?php if($x==12){$m='December';}?>
        
        <form action="<?php echo base_url() ?>statistics/stats/<?php echo $x; ?>/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==$x){echo 'active';}?>" value="<?php echo $m; ?>">
        </form>
        
      <?php }} else { 
		
		for($x=1;$x<=12;$x++)
		{
		?>  
         <?php if($x==1){$m='January';}?>
        <?php if($x==2){$m='February';}?>
        <?php if($x==3){$m='March';}?>
        <?php if($x==4){$m='April';}?>
        <?php if($x==5){$m='May';}?>
        <?php if($x==6){$m='June';}?>
        <?php if($x==7){$m='July';}?>
        <?php if($x==8){$m='August';}?>
        <?php if($x==9){$m='September';}?>
        <?php if($x==10){$m='October';}?>
        <?php if($x==11){$m='November';}?>
        <?php if($x==12){$m='December';}?>
        <form action="<?php echo base_url() ?>statistics/stats/<?php echo $x; ?>/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==$x){echo 'active';}?>" value="<?php echo $m; ?>">
        </form>
        
        <?php } } ?>
        
        

        </div>
</div> <?php echo $year ;?></strong><br>
<hr><div class="row mb-1"> 
                
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3> 
                        <div id="div10">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

											$("#div10").load("<?php echo base_url() ?>statistics/get_advert_views_month/0/<?php echo $month;?>/<?php echo $year;?>");

									});
								  </script>
                       </h3>
                        <p>Adverts viewed
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3><div id="div11">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

											$("#div11").load("<?php echo base_url() ?>statistics/get_returned_visits/<?php echo $month;?>/<?php echo $year;?>");

									});
								  </script>
                       
                       </h3>
                        <p>Returned Visits
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3><div id="div12">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

											$("#div12").load("<?php echo base_url() ?>statistics/get_profile_views_month/<?php echo $month;?>/<?php echo $year;?>");

									});
								  </script></h3>
                        <p>Profile Views
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3><div id="div13">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

											$("#div13").load("<?php echo base_url() ?>statistics/get_people_reached_month/<?php echo $month;?>/<?php echo $year;?>");

									});
								  </script></h3>
                        <p>Devices Reached
						</p>
                    </div>

                </div>

            </div><hr><br>
            <!-- Section: data tables -->
            <br><br>
            
            <div id="div14">
			<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
			</div><script>
					$(document).ready(function(){ 

							$("#div14").load("<?php echo base_url() ?>statistics/country_ajax_stats/<?php echo $month;?>/<?php echo $year;?>");

					});
				  </script>
        </div>

    </main>
    
</div>
    
    <!-- SCRIPTS -->

    <!-- JQuery -->
    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap4/jquery-3.1.1.min.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap4/popper.min.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap4/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap4/mdb.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap4/customizer.min.js"></script>
   
    <script>
        $(function() {
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    fillColor: "black",
                    strokeColor: "rgba(50,50,50,1)",
                    pointColor: "rgba(50,50,50,1)",
                    pointStrokeColor: "#333",
                    pointHighlightFill: "#333",
                    pointHighlightStroke: "rgba(0,0,0,.15)",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: "#333",
                }, {
                    label: "My Second dataset",
                    fillColor: "rgba(50,50,50,1)",
                    strokeColor: "rgba(50,50,50,1)",
                    pointColor: "#333",
                    pointStrokeColor: "#333",
                    pointHighlightFill: "#333",
                    pointHighlightStroke: "rgba(0,0,0,.15)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }]
            };


            var dataPie = [{
                value: 300,
                color: "#4caf50",
                highlight: "#66bb6a",
                label: "Google Chrome"
            }, {
                value: 50,
                color: "#03a9f4",
                highlight: "#29b6f6",
                label: "Edge"
            }, {
                value: 100,
                color: "#d32f2f",
                highlight: "#e53935",
                label: "Firefox"
            }]

            var option = {
                responsive: true,
                // set font color
                scaleFontColor: "#333",
                // font family
                defaultFontFamily: "'Roboto', sans-serif",
                // background grid lines color
                scaleGridLineColor: "rgba(255,255,255,.1)",
                // hide vertical lines
                scaleShowVerticalLines: false,
            };

            // // Get the context of the canvas element we want to select
            // var ctx = document.getElementById("sales").getContext('2d');
            // var myLineChart = new Chart(ctx).Line(data, option); //'Line' defines type of the chart.

            // // Get the context of the canvas element we want to select
            // var ctx = document.getElementById("conversion").getContext('2d');
            // var myRadarChart = new Chart(ctx).Radar(data, option);

            // Get the context of the canvas element we want to select

            //bar
            var ctxB = document.getElementById("traffic").getContext('2d');
            var myBarChart = new Chart(ctxB, {
                type: 'bar',
                data: {
                    labels: [ 'Jan',  'Feb',   'Mar',   'Apr',   'May',   'Jun',   'Jul ',   'Aug',   'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: '# of Views',
                        data: [<?php
							
							    if($year==2010){echo "8813 , 13572 , 16501, 15844 ,14758, 17158 ,17998, 17299 , 16251 ,17320, 16514, 15897  ";}
							
							elseif($year==2011){echo "16156 , 14785 , 17515 ,18001, 17217 , 17998 ,16250, 18000 , 17698 ,15985, 17852 , 15301 ";}
							
							elseif($year==2012){echo "27056 , 23956 , 25989 ,27571, 26998 , 28005 ,27786, 25367 , 26741 ,27899, 26850 , 24587 ";}
							
							elseif($year==2013){echo "29465 , 24862 , 26254 ,26150, 27466 , 28000 ,27891, 24995 , 25841 ,27574, 26294 , 26357 ";}
							
							elseif($year==2014){echo "37863 , 34586 , 32548 ,33654, 33957 , 36458 ,37895, 35145 , 36545 ,32158, 35548 , 34897 ";}
							
							elseif($year==2015){echo "38012 , 36001 , 36512 ,36550, 37014 , 37569 ,37201, 34687 , 35998 ,35887, 37881 , 33954 ";}
							
							elseif($year==2016){echo "47021 , 45612 , 45989 ,45654, 46875 , 47125 ,45987, 40254 , 45896 ,46201, 47981 , 44250 ";}
											else { 
						 for ($x = 1; $x <= 12; $x++) {
							 
							 $this->stat->get_profile_views_month_of_year($x,$year);
							 
						 } 
							}?>],
                       backgroundColor: ["#333","#333","#333","#333","#333","#333","#333","#333","#333","#333","#333","#333"],
                        borderColor: [
                            
                        ],
                        borderWidth: 0
                    }]
                },
                options: { 
                    legend: {
                        labels: {
                            fontColor: "black"
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                fontColor: "black"
                            }
							
                        }],
                        xAxes: [{
                            ticks:  {
                                fontColor: "black"
                            }
                        }]
                    }
                }
            });
             
            //pie
            var ctxP = document.getElementById("seo").getContext('2d');
            var myPieChart = new Chart(ctxP, {
                type: 'pie',
                data: {
                    labels: ["Google Chrome", "Internet Explorer", "Safari", "Mozilla Firefox"],
                    datasets: [
                        { 
                            data: [
								<?php if($year==2010){echo "169116 , 84596 , 42288 ,126908";}
											elseif($year==2011){echo "256116 , 92296 , 68281 ,199418";}
											elseif($year==2012){echo "321557 , 102365 , 89561 ,251642";}
											elseif($year==2013){echo "465129 , 195123 , 995748 ,302167";}
											elseif($year==2014){echo "4988521 , 249857 , 104583 ,358963";}
											elseif($year==2015){echo "563147 , 289254 , 110256 ,401565";}
											elseif($year==2016){echo "584123 , 299956 , 124476 ,421032";}
											else {?>
								
								<?php echo $get_chrome_visits ;?>, <?php echo $get_ie_visits  ;?>, <?php echo $get_safari_visits  ;?>, <?php echo $get_mozilla_visits  ; 
								
												 }?>
							],
                            backgroundColor: ["#4caf50", "#FFCE44", "#03a9f4", "#d32f2f"],
                            hoverBackgroundColor: ["#4caf50", "#FFCE44", "#03a9f4", "#d32f2f"]
                        }
                    ]
                },
                options: {
                    responsive: true
                }    
            });
            

        });
    </script>

    <script>
        $(function() {
            $('.min-chart#chart-sales').easyPieChart({
                barColor: "#4caf50",
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
        });
    </script>

    <script>
        // Data Picker Initialization
        $('.datepicker').pickadate();


        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').material_select();
        });

        // Sidenav Initialization
        $(".button-collapse").sideNav();
        var el = document.querySelector('.custom-scrollbar');
        Ps.initialize(el);

        // Tooltips Initialization
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>

</body>

</html>