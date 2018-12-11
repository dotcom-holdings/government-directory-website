<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Government Directory South Africa</title>
   
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="https://mdbootstrap.com/live/_MDB/templates/Admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="https://mdbootstrap.com/live/_MDB/templates/Admin/css/mdb.min.css" rel="stylesheet">

    <!-- Customizer -->
    <link rel="stylesheet" href="https://mdbootstrap.com/live/_MDB/css/customizer.min.css">

    <!-- Your custom styles (optional) -->
    <link href="https://mdbootstrap.com/live/_MDB/templates/Admin/css/style.css" rel="stylesheet">
    
   
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> 
   <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-route.min.js"></script>  
   <script src="<?php echo HTTP_JS_PATH; ?>app1.js"></script>
   
   
</head> 
<style>

	
	</style>
<body class="fixed-sn black-skin"> <script>
        $(function() {
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(0,0,0,.15)",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: "#4CAF50",
                }, {
                    label: "My Second dataset",
                    fillColor: "rgba(255,255,255,.25)",
                    strokeColor: "rgba(255,255,255,.75)",
                    pointColor: "#fff",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
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
                scaleFontColor: "#fff",
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
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                        labels: {
                            fontColor: "white"
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                fontColor: "white"
                            }
                        }],
                        xAxes: [{
                            ticks:  {
                                fontColor: "white"
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
                    labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
                    datasets: [
                        {
                            data: [300, 50, 100, 40, 120],
                            backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                            hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
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
    </script><script type="text/javascript" src="https://mdbootstrap.com/live/_MDB/templates/Admin/js/jquery-3.1.1.min.js"></script>

    
  
	
    <!--Double navigation-->
    <header>
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
            <div class="sidenav-bg mask-strong" style="background-color:#028B6 ;color: #fff"></div>
        </ul>
        <!--/. Sidebar navigation -->
        
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav" style="background-color:#028B62;color: black">
           
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
                
            </div>
            
            <!-- Breadcrumb-->
            <ol class="breadcrumb hidden-lg-down">
                <li class="breadcrumb-item active" style="color: black">Analytics</li>
            </ol>
            
            <!--Navbar links-->
           <?php if ($loggedin) { ?> 
                 
			<ul class="nav navbar-nav nav-flex-icons ml-auto">
				
           <li class="nav-item dropdown" style="color:black;">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;">
                        <i class="fa fa-user" style="color:black;"></i> <span class="hidden-sm-down" style="color:black;">Profile</span>
                    </a>
                    <div class="dropdown-menu dropdown-ins dropdown-menu-right" aria-labelledby="userDropdown">
                        <a  class="dropdown-item" href="<?php echo HTTP_BASE_PATH; ?>home/logout">Logout</a>
                    </div>
                </li>
                
            </ul>
             <?php }?>
            <!--/Navbar links-->
            
        </nav>
        <!-- /.Navbar -->
        
    </header>
    <!--/.Double navigation-->

    <!--Main layout-->
        <main class="" ng-app="mainApp">

        <div class="container-fluid">

                
           
     
    
 <div ng-view></div>
                     
       <script type = "text/ng-template" id ="viewStudents.htm">
            <h2> View Students </h2>
            {{message}}
		
         </script>
          <script type = "text/ng-template" id ="About.htm">
            <h2>About </h2>
            {{message}}
         </script>
          
          <script type = "text/ng-template" id ="Home.htm">
     <!--     //  <h2>Home </h2>
            {{ads}}-->
			
			
     </script>                    
                      
               
            <!-- First row -->
            
            <!-- /.First row -->

            <!--Section: Main Chart--> 
            
            <!--/Section: Main chart-->
            <h3><br><img src="<?php echo $image;?>" width="100px" height="68px" style="border: solid; border-width: 1px; border-color: #333; margin-right: 6px;box-shadow: 7px 7px 2px #999;"> <?php echo $get_companyname_from_user;?></h3>
            <h5 style="color:#243D7B">Your Advert has been shown <span class="badge light-blue animated pulse infinite" ng-Controller="HomeController">
                     		

                     		<div id="div10">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div>
	<!--					    
						    <script>
									$(document).ready(function(){

											//$("#div10").load("<?php echo base_url() ?>home/get_ads_shown/<?php echo $get_companyid_from_user;?>");

									});  
					         </script> 
-->
           
           {{ads}}
           </span> times so far on this website.</h5> 
            
             <h2><span class="badge blue"><?php echo $this->session->flashdata('add_video');?></span></h2>
             <h2><span class="badge blue"><?php echo $this->session->flashdata('class_ad_upgrade');?></span></h2>
             <h2><span class="badge blue"><?php echo $this->session->flashdata('add_banner');?></span></h2>
       
       <br><br><h3>General Analytics <button  
             
              title="General Analytics"
               data-toggle="popover"
                data-placement="right"
                 data-content="This is the general statistics about this website and your advertisement.The information for each statistic is provided in each panel below for a better understanding."
                  style="background-color: transparent;border: none;">
				 	
<!--
          	 		<img 
          	 			src="http://www.pvhc.net/img132/tqifdlpvcrjdpszuvltp.png" 
           					 width="20px" 	
           					 	height="20px" 
           					 		style="float: right; margin-right: 10px; margin-top: 10px">
-->
           					 		
              </button></h3>       
      <hr>

<div class="row">
                    <!--First column-->
                    <div class="col-md-3 mb-1">
                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card">

                            <!--Card Data-->
                            <div class="admin-up">
                                <i class="fa  fa-television  blue darken-3"></i>
                                <div class="data">
                                    <p> PROFILE <strong>VIEW</strong>S</p>
                                    <h6 ng-Controller="HomeController">
<!--
                                    <div id="div1">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

										//	$("#div1").load("<?php echo base_url() ?>home/get_profile_views_company/<?php echo $get_companyid_from_user;?>");

									});
								  </script> 
-->
                               {{get_profile_views_company}}
                               </h6>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-block" style="padding: 25px">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text">The total amount of people viewed my profiles.</p>
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
                                <i class="fa fa-hand-pointer-o deep-purple darken-4"></i>
                                <div class="data">
                                    <p> ADVERT CLICKS</p>
                                    <h6 ng-Controller="HomeController">
                                    
<!--
                                    <div id="div2">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

										//	$("#div2").load("<?php echo base_url() ?>home/get_advert_views_company/<?php echo $get_companyid_from_user;?>");

									});
								  </script> 
-->
                               {{get_advert_views_company}}
                               </h6>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-block" style="padding: 25px">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text">The total amount of people viewed my advert.</p>
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
                                <i class="fa fa-desktop indigo"></i>
                                <div class="data">
                                    <p>DEVICES REACHED</p>
                                    <h6 ng-Controller="HomeController">
                                    
<!--
                                    <div id="div3"><img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
 </div><script>
$(document).ready(function(){
  
    //    $("#div3").load("<?php echo base_url() ?>home/get_pcs_reached/<?php echo $get_companyid_from_user;?>");
 
});
</script>
-->
                               {{get_pcs_reached}}
                               </h6>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-block" style="padding: 25px">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text">People that are reached by this website.</p>
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
                                <i class="fa fa-group blue darken-4"></i>
                                <div class="data">
                                    <p>NEW VISITORS</p>
                                    <h6 ng-Controller="HomeController">
                                    
<!--
                          <div id="div4"><img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
					 </div><script>
					$(document).ready(function(){

					//		$("#div4").load("<?php echo base_url() ?>home/get_new_visits");

					});
					</script>
-->
                              {{get_new_visits}}
                              </h6>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-block" style="padding: 25px">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text">The number of new visitors this month.</p>
                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->
                    </div>
                    <!--/Fourth column-->
					
                </div><br><br><strong style="font-size: 24px; color: #333;">
                Analytics for <div class="btn-group">
    <button class="btn btn-default btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php if($month==1){echo 'January';}?>
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
        
        
        <form action="<?php echo base_url() ?>home/viewstat/<?php echo $x; ?>/<?php echo $get_companyid_from_user;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==$x){echo 'active';}?>" value="<?php echo $m; ?>">
        </form>
        
      <?php } ?> 

        </div>
</div> <?php echo date("Y") ;?></strong> <button 
             
              title="Header"
               data-toggle="popover"
                data-placement="right"
                 data-content="Government Directory actively tracks all keep growing. "
                  style="background-color: transparent;border: none;">
				 	
<!--
          	 		<img 
          	 			src="http://www.pvhc.net/img132/tqifdlpvcrjdpszuvltp.png" 
           				width="20px" 	
           				height="20px" 
           				style="float: right; margin-right: 10px; margin-top: 10px">
-->
           					 		
              </button><br>
<hr>
               <div class="row mb-1" ng-Controller="HomeController"> 
                
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3>
<!--
                        <div id="div5"><img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
					 	</div>
					 	<script>
					$(document).ready(function(){

						//	$("#div5").load("<?php echo base_url() ?>home/get_advert_views_month/<?php echo $get_companyid_from_user;?>/<?php echo $month;?>");

					});
					</script>
-->
                      {{get_advert_views_month}}
                       </h3>
                        <p>Adverts viewed
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3>
                        
<!--
                        <div id="div6"><img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
					 	</div>
					 	<script>
					$(document).ready(function(){

//							$("#div6").load("<?php echo base_url() ?>home/get_returned_visits/<?php echo $month;?>");

					});
					</script>
-->
                      {{get_returned_visits}}
                       </h3>
                        <p>Returned Visits
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3>
                        
<!--
                        <div id="div7"><img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
					 	</div>
					 	<script>
					$(document).ready(function(){ 

					//		$("#div7").load("<?php echo base_url() ?>home/get_profile_views_month/<?php echo $get_companyid_from_user;?>/<?php echo $month;?>");

					});
					</script> 
                       
-->						{{get_profile_views_month}}
                       </h3>
                        <p>Profile Views
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3>
<!--
                        <div id="div8"><img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
					 	</div>
					 	<script>
					$(document).ready(function(){

					//		$("#div8").load("<?php echo base_url() ?>home/get_people_reached_month/<?php echo $get_companyid_from_user;?>/<?php echo $month;?>");

					});
					</script> 
                       
-->						{{get_people_reached_month}}
                       </h3>
                        <p>AVERAGE DAILY CLICKS FOR THIS SITE
						</p>
                    </div>

                </div>

            </div><br>
            <!-- Section: data tables -->
             <h4>
        Visits By Country : 
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
        </h4>       
     	 <hr><br>
            <div id="div14">
			<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
			</div>
				<script>
					$(document).ready(function(){

							$("#div14").load("<?php echo base_url() ?>statistics/country_ajax_stats/<?php echo $month;?>/<?php echo $year;?>");

					});
				  </script>
           
           {{country_ajax_stats}}
            
  <h3>Visits By Browser 
    
    </h3>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
           
<hr>
  <section class="section">
 			<div class="row">
	   
 <div class="col-md-4">
                        
                        <div class="card mb-r">
                            <div class="card-block" >
                               <center><div style="width: 70%"><canvas id="seo"></canvas></div></center>
                                <h4 class="h4-responsive text-center mb-1">
                                    Total Visits by Browser
                                </h4>
                            </div>
                        </div>
                       

                    </div>
 
				
  <div class="col-md-8" style="max-height: 277px; overflow-y: scroll">
           
            <div class="card mb-r">
              
             <button 
             
              title="Header"
               data-toggle="popover"
                data-placement="top"
                 data-content="Government Directory actively tracks all keep growing. "
                  style="background-color: transparent;border: none;">
				 	
<!--
          	 		<img 
          	 			src="http://www.pvhc.net/img132/tqifdlpvcrjdpszuvltp.png" 
           					 width="20px" 	
           					 	height="20px" 
           					 		style="float: right; margin-right: 10px; margin-top: 10px">
-->
           					 		
              </button>
             
                            <div class="card-block" style="padding: 25px">
                                <div id="div9">
                      		<img src="<?php echo HTTP_IMAGES_PATH; ?>loading1.gif" alt=""   height="50" />
						    </div><script>
									$(document).ready(function(){

											$("#div9").load("<?php echo base_url() ?>statistics/browser_ajax_stats/<?php echo $month;?>/<?php echo $year;?>");

									});
								  </script>
                            </div>
                        </div>
                          </div>  
                          	</div>                    

            </section>
                          
                                <?php foreach ($classified_images_top as $image_top){ 
				$image_top_link = $image_top->name."<br><a href='http://".$image_top->website."' target='_blank'>Visit Website</a>"; ?>
				<div class="banner-widget">
				 <?php if($image_top->id){?>                 
				<center><a  href="<?php echo base_url();?>home/company/<?php echo $get_companyid_from_user?>" target="_blank">
					<img style="margin-bottom:20px;max-height: 300px;border: solid;color: #555;border-width: 1px;max-width:600px;"  src="<?php echo CDN_BASE_PATH.$image_top->image; ?>"></a></center>
					<?php } else {?>
				<center><a  href="<?php echo base_url();?>home/company/<?php echo $get_companyid_from_user?>" target="_blank"><img style="margin-bottom:20px;max-height: 300px;max-width:600px;"  src="<?php echo CDN_BASE_PATH.$image_top->image; ?>"></a></center>
				<?php }?>
				
				
              
               <center> <a  href="<?php echo base_url();?>home/company/<?php echo $get_companyid_from_user ?>" target="_blank">View</a></center>
            <?php }?>

                     

                        </div>       <br><br>   
<!--
			<script>
			
				function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
} 
				
			</script>
-->
<!--
			
<button type="button" name="b_print" class="btn btn-slack btn-block"   onClick="printdiv('div_print');" style="background:#028B6;">
<strong style="color:black;"><i class="fa fa-print" style="color:black;"></i> Print Statistics</strong></button><br>
-->



         
			<strong style="font-size: 24px; color: #333;">
                Advertisement Information </strong><br>
<hr><br>
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
                                        <div class="view left" style="background:#028B62">
                                            <h2>Upgrades
											</h2>
                                        </div>
   
										<!--Panel data-->
                                        <div class="row card-block pt-3">

                                            <!--First column-->
                                            <div class="col-md-12" style="margin-left: 10px;margin-right: 10px">

                                                <br>
<button type="button" class="btn btn-elegant btn-block" data-toggle="modal" data-target="#upgrade_ad">
    <strong>Upgrade Classified Advertisement</strong>
</button><br>

<!-- Modal -->
<div class="modal fade" id="upgrade_ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            
            <!--Body-->
            <div class="modal-body">
              
               <!--Panel-->
<div class="card">
    <div class="card-header danger-color-dark white-text">
        <strong>Upgrade Classified Advertisement</strong> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
    </div>
    <div class="card-block" style="padding: 25px">
        <h4 class="card-title"><strong>Upgrade</strong> your <strong>Advertisement</strong> to a <strong>2017 Design</strong>.Keep up to date with the <strong>Latest</strong> design <strong>Trends</strong></h4>
        <div  style=" width: 100%">
        <img width="100%" src="<?php echo HTTP_IMG_PATH; ?>placeholder.fw.png" alt="" />
        </div>
        <p class="card-text"><strong><h5>Advantages :</h5></strong>
        <p class="btn btn-sm  btn-elegant "><strong>GET MORE VIEWS</strong></p>
        <p class="btn btn-sm  btn-elegant "><strong>MODERN DESIGN MAKES PEOPLE MORE CURIOUS</strong></p>
        <p class="btn btn-sm  btn-elegant "><strong>GROW YOUR REPUTATION </strong></p>
        <p class="btn btn-sm  btn-elegant "><strong>GET MORE ADVERT VIEWS</strong></p>
        <p class="btn btn-sm  btn-elegant "><strong>GET MORE ADVERT CLICKS</strong></p>
        <p class="btn btn-sm  btn-elegant"><strong>INCREASE YOUR PROFILE VIEWS</strong></p>
        <p class="btn btn-sm  btn-elegant"><strong>LET YOUR BRAND REACH OUT TO MORE PEOPLE</strong></p><br>
        
         <h6><strong><b>To upgrade your advert , Click on proceed and one of our agents will contact you to inform you about the the simple process to follow in order to upgrade your advertisment.</b></strong></h6>
         <a class="btn btn-elegant" data-dismiss="modal">Cancel</a>
         <a class="btn btn-danger" href="<?php echo base_url();?>home/upgrade_advert/<?php echo $get_companyid_from_user;?>"  onclick="return confirm('Do you want to continue ?')">Proceed</a>
    </div>
</div>
<!--/.Panel-->
            </div>
            <!--Footer-->
           
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal -->
                                                <div class="md-form d-inline-block">
                                                  
                                                </div>

                                                <br>
<button type="button" class="btn btn-elegant btn-block" data-toggle="modal" data-target="#add_banner">
    <strong>Add A Banner</strong>
</button><br>

<!-- Modal -->
<div class="modal fade" id="add_banner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            
            <!--Body-->
            <div class="modal-body">
              
               <!--Panel-->
<div class="card">
    <div class="card-header danger-color-dark white-text">
        <strong>Add A Banner</strong> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
    </div>
    <div class="card-block" style="padding: 25px">
        <h4 class="card-title"><strong>Upgrade</strong> your <strong>Profile</strong> to the  <strong>Next Level</strong></h4>
        <h6>
		We have a variety of banner sizes that are displayed in different parts of our websites.To make your company profile viewable to more people, you should  add as many banner sizes that you can to your company profile. A brief description of our different banner types and sizes are provided below :
       </h6>
       
       <ul class="nav nav-tabs md-pills pills-red" role="tablist" style="background:#e5e5e5;color: #000;">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#panel31" role="tab">View Page </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel32" role="tab">Classified Banner</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#panel33" role="tab">Classified Large Banner</a>
    </li>
    <li class="nav-item">

        <a class="nav-link" data-toggle="tab" href="#panel34" role="tab">Promotional </a>
    </li>
</ul>
<!-- Tab panels -->
<div class="tab-content">
    <!--Panel 1-->
    <div class="tab-pane fade in show active" id="panel31" role="tabpanel">
        <br>
        <p>A view page banner is a 468 x 60 dimension advert.We usually put these ads in between our web content.Our view page ads has a large amount of clicks due to its ability to fit into spaces that grabs our users attention.</p>
        <img width="100%" src="<?php echo HTTP_IMG_PATH; ?>view_page.fw.png" alt="" />
    </div>
    <!--/.Panel 1-->
    <!--Panel 2-->
    <div class="tab-pane fade" id="panel32" role="tabpanel">
        <br>
        <p>A Classified banner is a 300 x 250 dimension advert.We usually put these ads around our web content.These adverts reach thousands of different people on a daily basis.</p>
        <img width="100%" src="<?php echo HTTP_IMG_PATH; ?>classified.fw.png" alt="" />
    </div>
    <!--/.Panel 2-->
    <!--Panel 3-->
    <div class="tab-pane fade" id="panel33" role="tabpanel">
        <br>
        <p>A Classified Large banner is a 300 x 600 dimension advert.We usually put these ads around our web content.This is an amazing technique to catch a users attention with your unique brand.</p>
        <img width="100%" src="<?php echo HTTP_IMG_PATH; ?>classified_large.fw.png" alt="" />
    </div>
    <!--/.Panel 3-->
    
    <!--Panel 3-->
    <div class="tab-pane fade" id="panel34" role="tabpanel">
        <br>
        <p>A Promotional banner is a 1125 x 345 dimension advert.This is a powerful way to advertise your business.With a promotional ad you are guaranteed profile views and advert clicks.</p>
        <img width="100%" src="<?php echo HTTP_IMG_PATH; ?>promotional.fw.png" alt="" />
    </div>
    <!--/.Panel 3-->
</div>
       <h6><strong><b>Select the type/s of banners that you would like to add and click on proceed and one of our agents will contact you to inform you about the the simple process to follow in order to add a new banner to your company profile.</b></strong></h6>
       
     <h5><strong>Banner Types</strong></h5>
     <form action="<?php echo base_url();?>home/add_banner/<?php echo $get_companyid_from_user;?>" method="post">
     <fieldset class="form-group">
    <input type="checkbox" id="vp" name="vp" value="2">
    <label for="vp">View page banner</label>
	 <i style="margin-left: 3px"></i>
   
    <input type="checkbox" id="cbanner" name="cbanner" value="2">
    <label for="cbanner">Classified banner</label>
    <i style="margin-left: 3px"></i>
    
    <input type="checkbox" id="clbanner" name="clbanner" value="2">
    <label for="clbanner">Classified large banner</label>
    <i style="margin-left: 3px"></i>
    
    <input type="checkbox" id="promo_banner" name="promo_banner" value="2">
    <label for="promo_banner">Promotional banner</label>
    
</fieldset>
         <a class="btn btn-elegant" data-dismiss="modal">Cancel</a><button type="submit" class="btn btn-danger" name="submit" onclick="return confirm('Do you want to continue ?')">Proceed</button>
         </form>
    </div>
</div>
<!--/.Panel-->
            </div>
           
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal --> 
                                                <div class="md-form d-inline-block">
                                                  
                                                </div>
                                                <div class="md-form d-inline-block float-md-right">
                                                    
                                                
                                                </div>
                                                
                                                                                               
<button type="button" class="btn btn-elegant btn-block"  data-toggle="modal" data-target="#add_video">
  <strong> Add A Video Advert</strong>
</button><br>

<!-- Modal -->
<div class="modal fade" id="add_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
           <div class="modal-body">
              
               <!--Panel-->
<div class="card">
    <div class="card-header danger-color-dark white-text">
        <strong>Upgrade Classified Advertisement</strong> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
    </div>
    <div class="card-block" style="padding: 25px">
        <h4 class="card-title">Video Marketing</h4>
        <h6><strong>Some companies are caught in the conundrum of trying to decide whether to embark on a video advertising campaign – or wondering why they’re not already doing it. Put simply, if you’re not using video as part of your marketing strategy, you’ll be left behind.</strong></h6>
        
        <p class="card-text"><strong><h5>Advantages :</h5></strong>
        <p class="btn btn-sm  btn-elegant "><strong>Video tells your story better than other formats.</strong></p>
        <p class="btn btn-sm  btn-elegant "><strong>Video ads do well among mobile users. </strong></p>
        <p class="btn btn-sm  btn-elegant "><strong>People share videos.</strong></p>
        <p class="btn btn-sm  btn-elegant "><strong>Video ads convert sales.</strong></p>
        <p class="btn btn-sm  btn-elegant "><strong>Video lives forever, making it more cost-effective over time.</strong></p>
        <p class="btn btn-sm  btn-elegant "><strong>GROWS YOUR BRAND </strong></p>
        <br>
       <p class="card-text"> <strong><h5>Let Us Help You Create Your Video Like This :</h5></strong>
        <iframe width="100%" height="280" src="https://www.youtube.com/embed/QOmjk7mPOCI" frameborder="0" allowfullscreen></iframe>
         <h6><strong><b>To create a video advert , Click on proceed and one of our agents will contact you to inform you about the the simple process to follow in order to upgrade your advertisment.</b></strong></h6>
         <a class="btn btn-elegant" data-dismiss="modal">Cancel</a><a class="btn btn-danger" href="<?php echo base_url();?>home/add_video/<?php echo $get_companyid_from_user;?>" onclick="return confirm('Do you want to continue ?')">Proceed</a>
    </div>
</div>
<!--/.Panel-->
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal --> 
                                                <div class="md-form d-inline-block">
                                                </div>
                                                <div class="md-form d-inline-block float-md-right">
                                                    
                                                   
                                                </div>

                                            </div>
                                            <!--/First column-->

                                        </div>
                                        <!--/Panel data-->
                                    </div>
                                    <!--/First column-->

                                    <!--Second column-->
                                    <div class="col-md-7">
                                        <!--Cascading element-->
                                        <div class="view right mb-r" style="background:#028B62">
                                            <!--Main chart-->
                                            <h5>Profiles Viewed</h5>
                                            <canvas id="traffic" height="155px"></canvas>
                                           

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
		
        </div>

   
   
    </main>
    
</div>
    
    <!-- SCRIPTS -->

    <!-- JQuery -->
    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="https://mdbootstrap.com/live/_MDB/templates/Admin/js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap dropdown -->
    <script type="text/javascript" src="https://mdbootstrap.com/live/_MDB/templates/Admin/js/popper.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://mdbootstrap.com/live/_MDB/templates/Admin/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://mdbootstrap.com/live/_MDB/templates/Admin/js/mdb.min.js"></script>
    
    <!-- Customizer -->
    <script type="text/javascript" src="https://mdbootstrap.com/live/_MDB/js/customizer.min.js"></script>
   
   <span ng-Controller="HomeController">
   
    <script>
        $(function() {
            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    fillColor: "black",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(0,0,0,.15)",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: "#333",
                }, {
                    label: "My Second dataset",
                    fillColor: "rgba(255,255,255,.25)",
                    strokeColor: "rgba(255,255,255,.75)",
                    pointColor: "#fff",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
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
cou
            var option = {
                responsive: true,
                // set font color
                scaleFontColor: "#fff",
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
          
			//here
			
			
          
			//alert({{get_chrome_visits}});
            //pie
 
			//here
            

        });
    </script>
</span>
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