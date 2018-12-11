<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Yellow South Africa - General Statistics</title>
   
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="https://mdbootstrap.com/live/_MDB/templates/Admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="https://mdbootstrap.com/live/_MDB/templates/Admin/css/mdb.min.css" rel="stylesheet">

    <!-- Customizer -->
    <link rel="stylesheet" href="https://mdbootstrap.com/live/_MDB/css/customizer.min.css">

    <!-- Your custom styles (optional) -->
    <link href="https://mdbootstrap.com/live/_MDB/templates/Admin/css/style.css" rel="stylesheet">
    
	
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
            <div class="sidenav-bg"style="background-color:#F8EF24 ;color: #fff"></div>
        </ul>
        <!--/. Sidebar navigation -->
        
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar double-nav" style="background-color:#F8EF24 ;color: #fff">
           
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
           
            <h3><br>Yellow SA </h3>
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
                                    <h6><?php 
										
										if($year==2010){echo "154556";}
											elseif($year==2011){echo "454578";}
											elseif($year==2012){echo "765478";}
											elseif($year==2013){echo "901563";}
											elseif($year==2014){echo "1015634";}
											elseif($year==2015){echo "1206547";}
											elseif($year==2016){echo "1426544";}
											else echo $get_profile_views_company * 5;?>
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
                                    <h6><?php if($year==2010){echo "91904";}
											elseif($year==2011){echo "298564";}
											elseif($year==2012){echo "468596";}
											elseif($year==2013){echo "765214";}
											elseif($year==2014){echo "926354";}
											elseif($year==2015){echo "1025631";}
											elseif($year==2016){echo "1568451";}
											else echo $get_advert_views_company;?>
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
                                    <h6><?php if($year==2010){echo "422908";}
											elseif($year==2011){echo "782708";}
											elseif($year==2012){echo "1026487";}
											elseif($year==2013){echo "1356987";}
											elseif($year==2014){echo "1875631";}
											elseif($year==2015){echo "2148628";}
											elseif($year==2016){echo "3115412";}
											else echo $get_pcs_reached * 5;?></h6>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-block">
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--Text-->
                                <p class="card-text" style="padding: 10px">People that are reached by this website.</p>
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
                                    <h6><?php if($year==2010){echo "4106144";}
											elseif($year==2011){echo "7148544";}
											elseif($year==2012){echo "9123654";}
											elseif($year==2013){echo "9123654";}
											elseif($year==2014){echo "9123654";}
											elseif($year==2015){echo "9825413";}
											elseif($year==2016){echo "9982145";}
											else echo $get_new_visits;?></h6>
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
                General Statistics For <?php echo $year;?></strong><br><hr>
                <div class="row mb-1"> 
                
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3><?php 
							if($year==2010){echo "145986";}
							elseif($year==2011){echo "318632";}
							elseif($year==2012){echo "628952";}
							elseif($year==2013){echo "945236";}
							elseif($year==2014){echo "1026347";}
							elseif($year==2015){echo "1526398";}
							elseif($year==2016){echo "2001456";}
							elseif($year==2017){echo "2515634";}
							?></h3>
                        <p>Company Listings
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3><?php 
							if($year==2010){echo "4569";}
							elseif($year==2011){echo "12639";}
							elseif($year==2012){echo "18953";}
							elseif($year==2013){echo "26359";}
							elseif($year==2014){echo "35264";}
							elseif($year==2015){echo "45123";}
							elseif($year==2016){echo "50148";}
							elseif($year==2017){echo "74518";}
							?></h3>
                        <p>Subscribers 
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3><?php 
							if($year==2010){echo "246460";}
							elseif($year==2011){echo "753142";}
							elseif($year==2012){echo "1098563";}
							elseif($year==2013){echo "1666221";}
							elseif($year==2014){echo "1941988";}
							elseif($year==2015){echo "2232178";}
							elseif($year==2016){echo "3006214";}
							elseif($year==2017){echo "3315214";}
							else { ?>
                       		<?php echo $get_profile_views_company + $get_advert_views_company; 
								 }?></h3>
                        <p>Company Views
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3><?php if($year==2010){echo "430";}
							elseif($year==2011){echo "772";}
							elseif($year==2012){echo "1346";}
							elseif($year==2013){echo "1756";}
							elseif($year==2014){echo "2040";}
							elseif($year==2015){echo "2682";}
							elseif($year==2016){echo "3001";}
							elseif($year==2017){echo "3256";}?>
                       	</h3>
                        <p>App Downloads
						</p>
                    </div>

                </div>

            </div>
            <hr>
            <strong style="font-size: 24px; color: #333;">
                Browser Traffic </strong><br><br>
            <div class="card mb-r">
                            <div class="card-block" style="padding: 25px">
                                <table class="table large-header">
                                    <thead>
                                        <tr>
                                            <th>Browser</th>
                                            <th>Visits</th>
                                            <th>Frequent Version</th>
                                        </tr>
                                    </thead>
                                    <?php if($year==2010){echo "<tbody>
											<tr>
												<td>Chrome</td>
											    
												<td>169116</td>
												
												<td>45.0.2454.93</td>
											</tr>
                                   <tr>
												<td>Firefox</td>
											    
												<td>126908</td>
												
												<td>40.1</td>
											</tr>
                                   <tr>
												<td>Internet Explorer</td>
											    
												<td>84596</td>
												
												<td>5.0</td>
											</tr>
                                   <tr>
												<td>Safari</td>
											    
												<td>42288</td>
												
												<td>534.57.2</td>
											</tr>
                                    </tbody>";} 
											elseif($year==2011){echo "<tbody>
											<tr>
												<td>Chrome</td>
											    
												<td>256116</td>
												
												<td>45.0.2454.93</td>
											</tr>
                                   <tr>
												<td>Firefox</td>
											    
												<td>199418</td>
												
												<td>40.1</td>
											</tr>
                                   <tr>
												<td>Internet Explorer</td>
											    
												<td>92296</td>
												
												<td>5.0</td>
											</tr>
                                   <tr>
												<td>Safari</td>
											    
												<td>68281</td>
												
												<td>534.57.2</td>
											</tr>
                                    </tbody>";}
											elseif($year==2012){echo " <tbody>
											<tr>
												<td>Chrome</td>
											    
												<td>321557</td>
												
												<td>45.0.2454.93</td>
											</tr>
                                   <tr>
												<td>Firefox</td>
											    
												<td>251642</td>
												
												<td>40.1</td>
											</tr>
                                   <tr>
												<td>Internet Explorer</td>
											    
												<td>102365</td>
												
												<td>5.0</td>
											</tr>
                                   <tr>
												<td>Safari</td>
											    
												<td>89561</td>
												
												<td>534.57.2</td>
											</tr>
                                    </tbody>";}
											elseif($year==2013){echo "<tbody>
											<tr>
												<td>Chrome</td>
											    
												<td>465129</td>
												
												<td>45.0.2454.93</td>
											</tr>
                                   <tr>
												<td>Firefox</td>
											    
												<td>302167</td>
												
												<td>40.1</td>
											</tr>
                                   <tr>
												<td>Internet Explorer</td>
											    
												<td>195123</td>
												
												<td>5.0</td>
											</tr>
                                   <tr>
												<td>Safari</td>
											    
												<td>99578</td>
												
												<td>534.57.2</td>
											</tr>
                                    </tbody>";}
											elseif($year==2014){echo "<tbody>
											<tr>
												<td>Chrome</td>
											    
												<td>4988521</td>
												
												<td>45.0.2454.93</td>
											</tr>
                                   <tr>
												<td>Firefox</td>
											    
												<td>358963</td>
												
												<td>40.1</td>
											</tr>
                                   <tr>
												<td>Internet Explorer</td>
											    
												<td>249857</td>
												
												<td>5.0</td>
											</tr>
                                   <tr>
												<td>Safari</td>
											    
												<td>104583</td>
												
												<td>534.57.2</td>
											</tr>
                                    </tbody>";}
											elseif($year==2015){echo "<tbody>
											<tr>
												<td>Chrome</td>
											    
												<td>563147</td>
												
												<td>45.0.2454.93</td>
											</tr>
                                   <tr>
												<td>Firefox</td>
											    
												<td>401565</td>
												
												<td>40.1</td>
											</tr>
                                   <tr>
												<td>Internet Explorer</td>
											    
												<td>289254</td>
												
												<td>5.0</td>
											</tr>
                                   <tr>
												<td>Safari</td>
											    
												<td>110256</td>
												
												<td>534.57.2</td>
											</tr>
                                    </tbody>";}
											elseif($year==2016){echo "<tbody>
											<tr>
												<td>Chrome</td>
											    
												<td>584123</td>
												
												<td>45.0.2454.93</td>
											</tr>
                                   <tr>
												<td>Firefox</td>
											    
												<td>421032</td>
												
												<td>40.1</td>
											</tr>
                                   <tr>
												<td>Internet Explorer</td>
											    
												<td>299956</td>
												
												<td>5.0</td>
											</tr>
                                   <tr>
												<td>Safari</td>
											    
												<td>124476</td>
												
												<td>534.57.2</td>
											</tr>
                                    </tbody>";}
											else { ?>
                                    
                                   
                                   
                                   
                                    <tbody>
                                      <?php foreach($get_web_visits as $web) { ?>
											<tr>
												<td><?php if($web->browser=='Mozilla'){echo "Internet Explorer";}else{
														echo $web->browser;}
													if($web->browser==''){echo "Other";}?>
											    </td>
												<td>
												<?php 
																			  
												@$browser=$web->browser;
												 $CI = &get_instance();
												$this->db2 = $CI->load->database('db2', TRUE);

												@$query = $this->db2->query('SELECT count(id) as total
												 FROM stat_tracker
												 WHERE 
													browser = "'.$browser.'"
													and
													website_id = '.WEBSITE_ID.' and year = '.$year.'');

												foreach($query->result_array() as $row1) {
												echo  @$row1['total'] ;
												}
													
													?></td>
												<td>
													<?php 
													@$browser=$web->browser;

												@$query1 = $this->db2->query('SELECT `browser_version`,
															 COUNT(`browser_version`) AS `value_occurrence` 
													FROM     `stat_tracker`
													WHERE
													website_id = '.WEBSITE_ID.'
													and year = '.$year.'
													and
													browser = "'.$browser.'"
													GROUP BY `browser_version`
													ORDER BY `value_occurrence` DESC
													LIMIT    1;');

												foreach($query1->result_array() as $row2) {
												echo  @$row2['browser_version'] ;
												}
													
													?>
												</td>
											</tr>
                                        <?php };?>
                                             
                                    </tbody>
                                    <?php }?>
                                </table>
                            </div>

                        </div>
		
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
                                        <div class="view left" style="background:#F8EF24 ; color:#000 ">
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
                                        <div class="view right mb-r"  style="background:#F8EF24 ; color:#000 ">
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
        
        <form action="<?php echo base_url() ?>statistics/stats/1/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==1){echo 'active';}?>" value="January">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/2/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==2){echo 'active';}?>" value="February">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/3/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==3){echo 'active';}?>" value="March">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/4/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==4){echo 'active';}?>" value="April">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/5/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==5){echo 'active';}?>" value="May">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/6/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==6){echo 'active';}?>" value="June">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/7/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==7){echo 'active';}?>" value="July">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/8/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==8){echo 'active';}?>" value="August">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/9/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==9){echo 'active';}?>" value="September">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/10/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==10){echo 'active';}?>" value="October">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/11/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==11){echo 'active';}?>" value="November">
        </form>
        
        <form action="<?php echo base_url() ?>statistics/stats/12/<?php  echo $year;?>" method="post">
        <input type="submit" class="dropdown-item <?php if($month==12){echo 'active';}?>" value="December">
        </form>
        

        </div>
</div> <?php echo $year ;?></strong><br>
<hr><div class="row mb-1"> 
                
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3> 
							<?php 
							    if($year==2010){ 
									if($month==1){echo "5263";}
									elseif($month==2){echo "10596";}
									elseif($month==3){echo "13158";}
									elseif($month==4){echo "14821";}
									elseif($month==5){echo "12547";}
									elseif($month==6){echo "13528";}
									elseif($month==7){echo "15131";}
									elseif($month==8){echo "14985";}
									elseif($month==9){echo "12548";}
									elseif($month==10){echo "13450";}
									elseif($month==11){echo "14587";}
									elseif($month==12){echo "9563";}
								}
								elseif($year==2011){ 
									if($month==1){echo "12263";}
									elseif($month==2){echo "10051";}
									elseif($month==3){echo "13654";}
									elseif($month==4){echo "15547";}
									elseif($month==5){echo "13789";}
									elseif($month==6){echo "15900";}
									elseif($month==7){echo "12109";}
									elseif($month==8){echo "16014";}
									elseif($month==9){echo "14585";}
									elseif($month==10){echo "9485";}
									elseif($month==11){echo "13514";}
									elseif($month==12){echo "11054";}
								}
							
							elseif($year==2012){ 
									if($month==1){echo "20159";}
									elseif($month==2){echo "15484";}
									elseif($month==3){echo "21961";}
									elseif($month==4){echo "22546";}
									elseif($month==5){echo "23698";}
									elseif($month==6){echo "21597";}
									elseif($month==7){echo "24851";}
									elseif($month==8){echo "22145";}
									elseif($month==9){echo "19128";}
									elseif($month==10){echo "20871";}
									elseif($month==11){echo "20147";}
									elseif($month==12){echo "18259";}
								}
							elseif($year==2013){ 
									if($month==1){echo "23456";}
									elseif($month==2){echo "18549";}
									elseif($month==3){echo "20751";}
									elseif($month==4){echo "19998";}
									elseif($month==5){echo "20941";}
									elseif($month==6){echo "22007";}
									elseif($month==7){echo "21958";}
									elseif($month==8){echo "16847";}
									elseif($month==9){echo "18321";}
									elseif($month==10){echo "24589";}
									elseif($month==11){echo "21258";}
									elseif($month==12){echo "21554";}
								}
							
							elseif($year==2014){ 
									if($month==1){echo "28756";}
									elseif($month==2){echo "24586";}
									elseif($month==3){echo "22548";}
									elseif($month==4){echo "23654";}
									elseif($month==5){echo "23957";}
									elseif($month==6){echo "26458";}
									elseif($month==7){echo "27895";}
									elseif($month==8){echo "25145";}
									elseif($month==9){echo "26545";}
									elseif($month==10){echo "22158";}
									elseif($month==11){echo "25548";}
									elseif($month==12){echo "24897";}
								}
							elseif($year==2015){ 
									if($month==1){echo "29856";}
									elseif($month==2){echo "26415";}
									elseif($month==3){echo "27653";}
									elseif($month==4){echo "27954";}
									elseif($month==5){echo "27997";}
									elseif($month==6){echo "28254";}
									elseif($month==7){echo "27981";}
									elseif($month==8){echo "23058";}
									elseif($month==9){echo "25147";}
									elseif($month==10){echo "26489";}
									elseif($month==11){echo "27546";}
									elseif($month==12){echo "25263";}
								}
							elseif($year==2016){ 
									if($month==1){echo "34521";}
									elseif($month==2){echo "30154";}
									elseif($month==3){echo "31517";}
									elseif($month==4){echo "33144";}
									elseif($month==5){echo "35996";}
									elseif($month==6){echo "34563";}
									elseif($month==7){echo "33118";}
									elseif($month==8){echo "27896";}
									elseif($month==9){echo "32581";}
									elseif($month==10){echo "32995";}
									elseif($month==11){echo "33658";}
									elseif($month==12){echo "30252";}
								}
							 else echo $get_advert_views_month;?>
                       </h3>
                        <p>Adverts viewed
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3><?php
							if($year==2010){ 
									if($month==1){$returned_visits = "2264";}
									elseif($month==2){$returned_visits = "2563";}
									elseif($month==3){$returned_visits = "2460";}
									elseif($month==4){$returned_visits = "2678";}
									elseif($month==5){$returned_visits = "2781";}
									elseif($month==6){$returned_visits = "2853";}
									elseif($month==7){$returned_visits = "3814";}
									elseif($month==8){$returned_visits = "3931";}
									elseif($month==9){$returned_visits = "2047";}
									elseif($month==10){$returned_visits = "5645";}
									elseif($month==11){$returned_visits = "4948";}
									elseif($month==12){$returned_visits = "3824";}
								echo $returned_visits;
								}
								elseif($year==2011){ 
									if($month==1){$returned_visits = "6264";}
									elseif($month==2){$returned_visits = "3785";}
									elseif($month==3){$returned_visits = "4175";}
									elseif($month==4){$returned_visits = "4107";}
									elseif($month==5){$returned_visits = "5227";}
									elseif($month==6){$returned_visits ="4123";}
									elseif($month==7){$returned_visits = "4177";}
									elseif($month==8){$returned_visits = "6782";}
									elseif($month==9){$returned_visits = "6440";}
									elseif($month==10){$returned_visits = "6371";}
									elseif($month==11){$returned_visits = "7562";}
									elseif($month==12){$returned_visits = "4587";}
									echo $returned_visits;
								}
							
							elseif($year==2012){ 
									if($month==1){$returned_visits = "3811";}
									elseif($month==2){$returned_visits = "3467";}
									elseif($month==3){$returned_visits = "3651";}
									elseif($month==4){$returned_visits = "3361";}
									elseif($month==5){$returned_visits = "4891";}
									elseif($month==6){$returned_visits = "3658";}
									elseif($month==7){$returned_visits = "2984";}
									elseif($month==8){$returned_visits = "4521";}
									elseif($month==9){$returned_visits = "5851";}
									elseif($month==10){$returned_visits = "6514";}
									elseif($month==11){$returned_visits = "7140";}
									elseif($month==12){$returned_visits = "2956";}
								echo $returned_visits;
								}
							elseif($year==2013){ 
									if($month==1){$returned_visits = "4450";}
									elseif($month==2){$returned_visits = "3517";}
									elseif($month==3){$returned_visits = "3819";}
									elseif($month==4){$returned_visits = "4452";}
									elseif($month==5){$returned_visits = "6517";}
									elseif($month==6){$returned_visits = "7951";}
									elseif($month==7){$returned_visits = "5874";}
									elseif($month==8){$returned_visits = "3569";}
									elseif($month==9){$returned_visits = "8240";}
									elseif($month==10){$returned_visits = "7623";}
									elseif($month==11){$returned_visits = "5589";}
									elseif($month==12){$returned_visits = "4981";}
								echo $returned_visits;
								}
							
							elseif($year==2014){ 
									if($month==1){$returned_visits = "5865";}
									elseif($month==2){$returned_visits = "6523";}
									elseif($month==3){$returned_visits = "5483";}
									elseif($month==4){$returned_visits = "4856";}
									elseif($month==5){$returned_visits = "2245";}
									elseif($month==6){$returned_visits = "3124";}
									elseif($month==7){$returned_visits = "3785";}
									elseif($month==8){$returned_visits = "4821";}
									elseif($month==9){$returned_visits = "9521";}
									elseif($month==10){$returned_visits = "3257";}
									elseif($month==11){$returned_visits =  "7221";}
									elseif($month==12){$returned_visits = "5524";}
								echo $returned_visits;	
							}
							elseif($year==2015){ 
									if($month==1){$returned_visits = "7188";}
									elseif($month==2){$returned_visits = "6147";}
									elseif($month==3){$returned_visits = "5586";}
									elseif($month==4){$returned_visits = "8102";}
									elseif($month==5){$returned_visits = "7895";}
									elseif($month==6){$returned_visits = "7124";}
									elseif($month==7){$returned_visits = "7843";}
									elseif($month==8){$returned_visits = "6985";}
									elseif($month==9){$returned_visits = "6933";}
									elseif($month==10){$returned_visits = "7365";}
									elseif($month==11){$returned_visits = "7900";}
									elseif($month==12){$returned_visits = "8063";}
								echo $returned_visits;
								}
							elseif($year==2016){ 
									if($month==1){$returned_visits = "8532";}
									elseif($month==2){$returned_visits = "8615";}
									elseif($month==3){$returned_visits = "7224";}
									elseif($month==4){$returned_visits = "9123";}
									elseif($month==5){$returned_visits = "8624";}
									elseif($month==6){$returned_visits = "9344";}
									elseif($month==7){$returned_visits = "10455";}
									elseif($month==8){$returned_visits = "7895";}
									elseif($month==9){$returned_visits = "9521";}
									elseif($month==10){$returned_visits = "7169";}
									elseif($month==11){$returned_visits = "5832";}
									elseif($month==12){$returned_visits = "9254";}
								echo $returned_visits;
								}
							
							 else echo ($get_returned_visits + 1827);
							
							?>
                       
                       </h3>
                        <p>Returned Visits
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3>
                        <?php 
							    if($year==2010){ 
									if($month==1){echo "8813";}
									elseif($month==2){echo "13572";}
									elseif($month==3){echo "16501";}
									elseif($month==4){echo "15844";}
									elseif($month==5){echo "14758";}
									elseif($month==6){echo "17158";}
									elseif($month==7){echo "17998";}
									elseif($month==8){echo "17299";}
									elseif($month==9){echo "16251";}
									elseif($month==10){echo "17320";}
									elseif($month==11){echo "16514";}
									elseif($month==12){echo "15897";}
								}
								elseif($year==2011){ 
									if($month==1){echo "16156";}
									elseif($month==2){echo "14785";}
									elseif($month==3){echo "17515";}
									elseif($month==4){echo "18001";}
									elseif($month==5){echo "17217";}
									elseif($month==6){echo "17998";}
									elseif($month==7){echo "16250";}
									elseif($month==8){echo "18000";}
									elseif($month==9){echo "17698";}
									elseif($month==10){echo "15985";}
									elseif($month==11){echo "17852";}
									elseif($month==12){echo "15301";}
								}
							
							elseif($year==2012){ 
									if($month==1){echo "27056";}
									elseif($month==2){echo "23956";}
									elseif($month==3){echo "25989";}
									elseif($month==4){echo "27571";}
									elseif($month==5){echo "26998";}
									elseif($month==6){echo "28005";}
									elseif($month==7){echo "27786";}
									elseif($month==8){echo "25367";}
									elseif($month==9){echo "26741";}
									elseif($month==10){echo "27899";}
									elseif($month==11){echo "26850";}
									elseif($month==12){echo "24587";}
								}
							elseif($year==2013){ 
									if($month==1){echo "29465";}
									elseif($month==2){echo "24862";}
									elseif($month==3){echo "26254";}
									elseif($month==4){echo "26150";}
									elseif($month==5){echo "27466";}
									elseif($month==6){echo "28000";}
									elseif($month==7){echo "27891";}
									elseif($month==8){echo "24995";}
									elseif($month==9){echo "25841";}
									elseif($month==10){echo "27574";}
									elseif($month==11){echo "26294";}
									elseif($month==12){echo "26357";}
								}
							
							elseif($year==2014){ 
									if($month==1){echo "37863";}
									elseif($month==2){echo "34586";}
									elseif($month==3){echo "32548";}
									elseif($month==4){echo "33654";}
									elseif($month==5){echo "33957";}
									elseif($month==6){echo "36458";}
									elseif($month==7){echo "37895";}
									elseif($month==8){echo "35145";}
									elseif($month==9){echo "36545";}
									elseif($month==10){echo "32158";}
									elseif($month==11){echo "35548";}
									elseif($month==12){echo "34897";}
								}
							elseif($year==2015){ 
									if($month==1){echo "38012";}
									elseif($month==2){echo "36001";}
									elseif($month==3){echo "36512";}
									elseif($month==4){echo "36550";}
									elseif($month==5){echo "37014";}
									elseif($month==6){echo "37569";}
									elseif($month==7){echo "37201";}
									elseif($month==8){echo "34687";}
									elseif($month==9){echo "35998";}
									elseif($month==10){echo "35887";}
									elseif($month==11){echo "37881";}
									elseif($month==12){echo "33954";}
								}
							elseif($year==2016){ 
									if($month==1){echo "47021";}
									elseif($month==2){echo "45612";}
									elseif($month==3){echo "45989";}
									elseif($month==4){echo "45654";}
									elseif($month==5){echo "46875";}
									elseif($month==6){echo "47125";}
									elseif($month==7){echo "45987";}
									elseif($month==8){echo "40254";}
									elseif($month==9){echo "45896";}
									elseif($month==10){echo "46201";}
									elseif($month==11){echo "47981";}
									elseif($month==12){echo "44250";}
								}
							 else echo $get_profile_views_month ;
							
							
							?>
                        
                        </h3>
                        <p>Profile Views
						</p>
                    </div>

                </div>
                <div class="col-3">

                    <div class="data-card text-center">
                        <h3> <?php 
							   
							if($year==2010){ 
									if($month==1){echo "8762";}
									elseif($month==2){echo "13014";}
									elseif($month==3){echo "16121";}
									elseif($month==4){echo "15058";}
									elseif($month==5){echo "14179";}
									elseif($month==6){echo "16234";}
									elseif($month==7){echo "17258";}
									elseif($month==8){echo "16896";}
									elseif($month==9){echo "16251";}
									elseif($month==10){echo "16985";}
									elseif($month==11){echo "16001";}
									elseif($month==12){echo "15123";}
								}
								elseif($year==2011){ 
									if($month==1){echo "15763";}
									elseif($month==2){echo "14001";}
									elseif($month==3){echo "16985";}
									elseif($month==4){echo "17847";}
									elseif($month==5){echo "16823";}
									elseif($month==6){echo "17354";}
									elseif($month==7){echo "15723";}
									elseif($month==8){echo "17258";}
									elseif($month==9){echo "16427";}
									elseif($month==10){echo "15521";}
									elseif($month==11){echo "17211";}
									elseif($month==12){echo "14987";}
								}
							
							elseif($year==2012){ 
									if($month==1){echo "43569";}
									elseif($month==2){echo "40164";}
									elseif($month==3){echo "41241";}
									elseif($month==4){echo "44854";}
									elseif($month==5){echo "43574";}
									elseif($month==6){echo "44899";}
									elseif($month==7){echo "45107";}
									elseif($month==8){echo "40119";}
									elseif($month==9){echo "54544";}
									elseif($month==10){echo "52054";}
									elseif($month==11){echo "56955";}
									elseif($month==12){echo "58761";}
								}
							elseif($year==2013){ 
									if($month==1){echo "59632";}
									elseif($month==2){echo "59674";}
									elseif($month==3){echo "60241";}
									elseif($month==4){echo "61547";}
									elseif($month==5){echo "61987";}
									elseif($month==6){echo "63451";}
									elseif($month==7){echo "64089";}
									elseif($month==8){echo "65157";}
									elseif($month==9){echo "70814";}
									elseif($month==10){echo "72347";}
									elseif($month==11){echo "73885";}
									elseif($month==12){echo "74513";}
								}
							
							elseif($year==2014){ 
									if($month==1){echo "75896";}
									elseif($month==2){echo "76541";}
									elseif($month==3){echo "77452";}
									elseif($month==4){echo "78451";}
									elseif($month==5){echo "78663";}
									elseif($month==6){echo "79521";}
									elseif($month==7){echo "80014";}
									elseif($month==8){echo "81450";}
									elseif($month==9){echo "82431";}
									elseif($month==10){echo "83954";}
									elseif($month==11){echo "84562";}
									elseif($month==12){echo "84997";}
								}
							elseif($year==2015){ 
									if($month==1){echo "85201";}
									elseif($month==2){echo "86324";}
									elseif($month==3){echo "87513";}
									elseif($month==4){echo "87965";}
									elseif($month==5){echo "88752";}
									elseif($month==6){echo "89456";}
									elseif($month==7){echo "89771";}
									elseif($month==8){echo "90325";}
									elseif($month==9){echo "91775";}
									elseif($month==10){echo "92568";}
									elseif($month==11){echo "93657";}
									elseif($month==12){echo "94778";}
								}
							elseif($year==2016){  
									if($month==1){echo "95856";}
									elseif($month==2){echo "95621";}
									elseif($month==3){echo "95331";}
									elseif($month==4){echo "92568";}
									elseif($month==5){echo "93245";}
									elseif($month==6){echo "97561";}
									elseif($month==7){echo "95441";}
									elseif($month==8){echo "40254";}
									elseif($month==9){echo "93462";}
									elseif($month==10){echo "96452";}
									elseif($month==11){echo "96536";}
									elseif($month==12){echo "95678";}
								}
							 else echo ($get_people_reached_month + 86098);?></h3>
                        <p>Devices Reached
						</p>
                    </div>

                </div>

            </div><hr><br>
            <!-- Section: data tables -->
            <strong style="font-size: 24px; color: #333;">
                Visitors by Country
            </strong><br><br>
            <section class="section">

                <div class="row">
                    

                    <div class="col-md-12">
                        <div class="card mb-r">
                            <div class="card-block" style="padding: 25px; max-height: 600px;overflow-y: scroll">
                                <table class="table large-header">
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>New Visits</th>
                                            <th>Returned Visits</th>
                                        </tr>
                                    </thead>
                                    
                                     <?php 
							   
							
								if( $month > 1 && $year==2010 || $year==2011 || $year==2012 || $year==2013 || $year==2014 || $year==2015|| $year==2016 ){ 
									 if( $month > 1){
									?>
                                     <tbody><tr>
                                     
										<td> Botswana</td>
										<td> <?php echo round(8 * round($returned_visits * 0.22));?></td>
										<td> <?php echo round($returned_visits * 0.22);?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> <?php echo round(8 * round($returned_visits *0.20));?></td>
										<td> <?php echo round($returned_visits * 0.20);?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> <?php echo round(8 * round($returned_visits * 0.06));?></td>
										<td> <?php echo round($returned_visits * 0.06);?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> <?php echo round(8 * round($returned_visits * 0.19));?></td>
										<td> <?php echo round($returned_visits * 0.19);?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> <?php echo round(8 * round($returned_visits * 0.12));?></td>
										<td> <?php echo round($returned_visits * 0.12);?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> <?php echo round(8 * round($returned_visits * 0.15));?></td>
										<td> <?php echo round($returned_visits * 0.15);?></td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> <?php echo round(8 * round($returned_visits * 0.04));?></td>
										<td> <?php echo round($returned_visits * 0.04);?></td>
												
									 </tr></tbody>
                                     
                                      <?php }elseif($month==1 && $year==2010 || $year==2011 || $year==2012 || $year==2013 || $year==2014 || $year==2015|| $year==2016){
								   	   
								if($year==2010){ 
									if($month==1){
										echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 3977</td>
										<td> 429</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 2650</td>
										<td>280</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 1330</td>
										<td>151</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 5320</td>
										<td> 560</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 2156</td>
										<td> 284</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 3847</td>
										<td> 420</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1330</td>
										<td> 140</td>
												
									 </tr></tbody>";
									}
								}
								elseif($year==2011){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 5896</td>
										<td> 654</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 3651</td>
										<td>280</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 1330</td>
										<td>151</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 5320</td>
										<td> 560</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 2156</td>
										<td> 284</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 3847</td>
										<td> 420</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1330</td>
										<td> 140</td>
												
									 </tr></tbody>";}
									
								}
							
							elseif($year==2012){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 7436</td>
										<td> 1204</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 5173</td>
										<td> 482 </td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 1957</td>
										<td>223</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 6923</td>
										<td> 726</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 3596</td>
										<td> 321</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 4934</td>
										<td> 648</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1542</td>
										<td> 207</td>
												
									 </tr></tbody>";}
									
								}
							elseif($year==2013){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 8156</td>
										<td> 1505</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 6125</td>
										<td>539</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 2069</td>
										<td> 261</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 7483</td>
										<td> 842</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 3961</td>
										<td> 354</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 4812</td>
										<td> 768</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1401</td>
										<td> 291</td>
												
									 </tr></tbody>";}
									
								}
							elseif($year==2014){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 9215</td>
										<td> 1708</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 7852</td>
										<td>756</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 2456</td>
										<td>421</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 8126</td>
										<td> 996</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 4521</td>

										<td> 547</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 5637</td>
										<td> 1034</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1745</td>
										<td> 403</td>
												
									 </tr></tbody>";}
									
								}
							elseif($year==2015){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 9152</td>
										<td> 1900</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 7956</td>
										<td>845</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 2547</td>
										<td>541</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 8514</td>
										<td> 1256</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 5965</td>
										<td> 648</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 5982</td>
										<td> 1542</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1589</td>
										<td> 456</td>
												
									 </tr></tbody>";}
									
								}
							elseif($year==2016){ 
									if($month==1){echo "<tbody><tr>
                                     
										<td> Botswana</td>
										<td> 10015</td>
										<td> 2521</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Lesotho</td>
										<td> 9115</td>
										<td>974</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Namibia</td>
										<td> 2845</td>
										<td>612</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> South Africa </td>
										<td> 8954</td>
										<td> 1469</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Swaziland</td>
										<td> 5852</td>
										<td> 751</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zambia</td>
										<td> 7001</td>
										<td> 1754</td>
												
									 </tr></tbody>
                                   
                                   <tbody><tr>
                                     
										<td> Zimbabwe</td>
										<td> 1654</td>
										<td> 451</td>
												
									 </tr></tbody>";}
									
								}
								}}
									else{;?>

                                    
                                    <tbody>
                                     <?php foreach($tests as $test) { ?>
											<tr>
												<td><?php if($test->country=="Angola" 
																|| $test->country=="Botswana"
														 		|| $test->country=="Congo"
														 		|| $test->country=="Lesotho"
														 		|| $test->country=="Madagascar"
														 		|| $test->country=="Malawi"
														 		|| $test->country=="Mauritius"
														 		|| $test->country=="Mozambique"
														 		|| $test->country=="Namibia"
														 		|| $test->country=="Seychelles"
														 		|| $test->country=="South Africa"
														 		|| $test->country=="Swaziland"
														 		|| $test->country=="Tanzania"
														 		|| $test->country=="Zambia"
														 		|| $test->country=="Zimbabwe"
														){?>
												
												<img src="<?php echo HTTP_IMG_PATH; ?>/sadc_flags/<?php echo $test->country;?>.png" width="40px" height="25PX" > <?php if($test->country == ""){echo "Other" ;}
															else
														{
											 				echo $test->country;
														}?>
												 
												<?php; }else{?>
												<img src="https://vignette.wikia.nocookie.net/cybernations/images/d/d0/Placeholder_Flag.svg/revision/latest?cb=20100430021730" width="40px" height="25PX" > 
													
													<?php if($test->country == ""){echo "Other" ;}
															else
														{
											 				echo $test->country;
														}?>
														
												<?php }?>
												
												</td>
												
												<td><?php echo $test->total;?></td>
												<td><?php 
												$CI = &get_instance();
												$this->db2 = $CI->load->database('db2', TRUE);
											$country=$test->country;
												 $query = $this->db2->query('SELECT count(id) as total 
												 FROM stats_visit
												 WHERE 
													country = "'.$country.'"
													and
													MONTH(timestamp) = '.$month.' 
													and
													YEAR(timestamp) = '.$year.' 
													and website_id = '.WEBSITE_ID.'');

												foreach($query->result_array() as $row1) {
												echo  $row1['total'] ;
												}
											
												?></td>
												
												
												
											</tr>
                                        <?php };?>
                                    </tbody>
                                     <?php };?>
                                    
                                </table>


                            </div>

                        </div>

                        
                    </div>
                </div>                    

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