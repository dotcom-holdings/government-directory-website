<?php
$this->load->view('vwHeader');
?> 
<!--  
Order Page
Author : Leon van Rensburg 

-->
<style>
.hover_img_one li { position:relative; }
.hover_img_one li span { position:absolute; display:none; z-index:99;top:-210px;left:-100px; }
.hover_img_one li:hover span { display:block; }

.hover_img_two li { position:relative; }
.hover_img_two li span { position:absolute; display:none; z-index:99;top:-210px;right:-100px; }
.hover_img_two li:hover span { display:block; }

.hover_img_three li { position:relative; }
.hover_img_three li span { position:absolute; display:none; z-index:99;top:-250px;right:-150px; }
.hover_img_three li:hover span { display:block; }

.hover_img_four li { position:relative; }
.hover_img_four li span { position:absolute; display:none; z-index:99;top:-250px;right:-150px; }
.hover_img_four li:hover span { display:block; }

.hover_img_five li { position:relative; }
.hover_img_five li span { position:absolute; display:none; z-index:99;top:-250px;right:-150px; }
.hover_img_five li:hover span { display:block; }

.hover_img_six li { position:relative; }
.hover_img_six li span { position:absolute; display:none; z-index:99;top:-250px;right:-150px; }
.hover_img_six li:hover span { display:block;}

.single-pricing-box h5 {
    background-color: #ddd;
    padding: 5px;
}

h4.pricing-count {
    margin-bottom: 0px;
}

.panel-heading h4 {
	margin-bottom: 0px !important;
}

@media (min-width: 320px) {
	.media-scr {
		margin-top: 22em !important;
	}
}

@media (min-width: 375px) {
	.media-scr {
		margin-top: 22em !important;
	}
}



@media (min-width: 425px) {
	.media-scr {
		margin-top: 0em !important;
	}
}

@media (min-width: 768px) {
	.media-scr {
		margin-top: 35em !important;
	}
}

@media (min-width: 1024px) {
	.media-scr {
		margin-top: 20em !important;
	}
}

@media (min-width: 1440px) {
	.media-scr {
		margin-top: 15em !important;
	}
}

</style>

<div class="container media-scr" style="margin-top:200px;margin-bottom:80px;">
  
		<div class="row" style="text-align:center;">

				<form role="form">

							<h2>Download Form</h2>
							<p>You may view/download your selected order form below:<br /><br />Please fill it in and return via fax or email:<br />Fax: 012 322 8078<br />Email: bookings@govdirectory.co.za</p>
					
                          <div class="col-md-4">&nbsp;
                           </div>
                         
                         <?php if($type==1){?>   
						 <div class="col-md-4 text-center">
							   <div class="panel panel-default">
						 		<div class="panel-heading"><h4>TOP LISTING PACKAGE</h4></div>
								  <div class="panel-body">
								    <div class="pricing-icon">
										 <!-----<i class="fa fa-bullhorn"></i>------>
								   </div>
									<div style="border: none;" class="pricing-list">
								   <ul>
								   <div class="hover_img_two">
									   	<li class="on">2 X Top Listings (2 different categories)
									   		<span>
									   			<img src="<?php echo HTTP_IMAGES_PATH; ?>top_listing.png" alt="" class="img-responsive" />
									   		</span>
									   	</li>
								   </div>
								   <li class="on">20 Keywords</li>
								   <li class="on">Map Listing</li>
								   <div class="hover_img_four">
								   		<li class="on">Full Page Online Advertisement
										   	<span>
										   		<img src="<?php echo HTTP_IMAGES_PATH; ?>full_page_advert.png" alt="" class="img-responsive" />
										   	</span>
										</li>
								   </div>
								   <div class="hover_img_five">
								   		<li class="on">Free Quarter Page Ad in print edition
								   			<span>
								   				<img src="<?php echo HTTP_IMAGES_PATH; ?>quarter_page_advert.png" alt="" class="img-responsive" />
								   			</span>
								   		</li>
								   </div>
							      </ul>
							     </div>
								   <p>&nbsp;</p>
								  </div>
								<div class="panel-footer">
									<h4 class="pricing-count">ZAR 995 P.M</h4>
								    <div>
									<a target="_blank" href="<?= HTTP_IMAGES_PATH; ?>2018_2019_Advertising_Options.pdf" data-toggle="tooltip" title="View Form"> >> <img style="height:35px;width:35px;" src="<?= HTTP_IMAGES_PATH?>pdf.ico"> << </a>
							   		</div>
								</div>
							</div>
						   </div>
                           
                           <?php } else {?>
									  
						   <div class="col-md-4">
						   	 <div class="panel panel-default">
						 		<div class="panel-heading"><h4>BANNER PACKAGE</h4></div>
								  <div class="panel-body">
								    <div class="pricing-icon">
									 <!-----<i class="fa fa-user-secret"></i>---->
							   </div>
							     <div class="pricing-list">
								   <ul>
								   <div class="hover_img_three">
									   	<li class="on">2 X Classified Banner Ads (2 different categories)
									   		<span>
									   			<img src="<?php echo HTTP_IMAGES_PATH; ?>classified_banner.png" alt="" class="img-responsive" />
									   		</span>
									   	</li>
								   </div>
								   <div class="hover_img_two">
									   	<li class="on">2 X Top Listings (2 different categories)
									   		<span>
									   			<img src="<?php echo HTTP_IMAGES_PATH; ?>top_listing.png" alt="" class="img-responsive" />
									   		</span>
									   	</li>
								   </div>
								   <li class="on">30 Keywords</li>
								   <li class="on">Map Listing</li>
								   <div class="hover_img_four">
								   		<li class="on">Full Page Online Advertisement
										   	<span>
										   		<img src="<?php echo HTTP_IMAGES_PATH; ?>full_page_advert.png" alt="" class="img-responsive" />
										   	</span>
										</li>
								   </div>
								   <div class="hover_img_five">
								   		<li class="on">Free Full Page Ad in print edition
								   			<span>
								   				<img src="<?php echo HTTP_IMAGES_PATH; ?>full_page_print.png" alt="" class="img-responsive" />
								   			</span>
								   		</li>
								   </div>
							      </ul>
							     </div>
								   
								  </div>
								<div class="panel-footer">
									<h4 class="pricing-count">ZAR 2495 P.M</h4>
								   <div>
										<a target="_blank" href="<?= HTTP_IMAGES_PATH; ?>2018_2019_Advertising_Options.pdf" data-toggle="tooltip" title="View Form"> >> <img style="height:35px;width:35px;" src="<?= HTTP_IMAGES_PATH?>pdf.ico"> << </a>
								   </div>
								</div>
							</div>
                           </div>
                           <?php }?>

						<div class="col-md-4">&nbsp;
                           </div>
		
					</form>
				</div>

</div> 
 
<?php
$this->load->view('vwFooter');
?>