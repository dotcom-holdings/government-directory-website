<?php
$this->load->view('vwHeader');
?>


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
.hover_img_six li:hover span { display:block; }

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
		margin-top: 22em;
	}
}

@media (min-width: 375px) {
	.media-scr {
		margin-top: 22em;
	}
}

@media (min-width: 414px) {
	.media-scr {
		margin-top: 0em !important;
	}
}

@media (min-width: 425px) {
	.media-scr {
		margin-top: 0em;
	}
}

@media (min-width: 768px) {
	.media-scr-lg {
		margin-top: 35em !important;
	}
}

@media (min-width: 1024px) {
	.media-scr-lg {
		margin-top: 15em !important;
	}
}

@media (min-width: 1024px) {
	.media-scr-lg {
		margin-top: 20em !important;
	}
}

</style>


<!-- ========= The container below is hidden on large devices
============================================================================================================== -->

<div class="container media-scr visible-xs">
	<div class="row">
		<form method="post" action="<?php echo base_url(); ?>home/order">
			<div class="col-sm-12">
				<h2>Package Selection</h2>							
				<h5>Move your mouse over the package description to view a screen shot</h5>
				<p>Please Select The Package You Want To Purchase then press 'next'</p>
					
            </div>             
                            
						 <div class="col-sm-12 text-center">
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
								    <div class="btn" data-toggle="buttons">
									<label for="default" class="btn btn-default next-step">Order <input type="radio" name="type" value="1" class="badgebox"><span class="badge">&check;</span></label>
							   		</div>
								</div>
							</div>
						   </div>

						   <div class="col-sm-12">
						   	<button type="submit" class="btn btn-primary btn-lg btn-block" name="next" value="1">Next ></button>
						   </div>

                           
                           
                           <div class="col-sm-12">
                           	           <p>&nbsp;</p>		

								<div style="padding-left: 8%;" id="business-pages-book">
							        <h1 style="text-align: center;">
							        	<a title="Click To View" href="http://government.co.za/digitalcopy/index.html" target="_blank">
							        		<img class="img-responsive" src="<?php echo HTTP_IMG_PATH; ?>digital_copy.jpg" alt="Government Directory eBook" />
							        	</a>
							        </h1>
							        <p></p>
							        <h5>Government Directory eBook</h5>
							        <p>&nbsp;</p> 
							    </div>
                           		
                           </div>
									  
						   <div class="col-sm-12">
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
								   <div class="btn" data-toggle="buttons">
										<label for="default" class="btn btn-default next-step">Order 
											<input type="radio" name="type" value="2" class="badgebox">
											<span class="badge">&check;</span>
										</label>
								   </div>
								</div>
							</div>
								<div class="col-sm-12">
							   		<button type="submit" class="btn btn-primary btn-lg btn-block" name="next" value="2">Next >
							   			
							   		</button>
							   </div>
                           </div>
			
		</form>

		<form method="post" action="<?php echo base_url(); ?>home/order"></form>
	</div>
</div>


<!-- ========= The container below is hidden on small devices
============================================================================================================== -->


<div class="container media-scr-lg hidden-xs" style="margin-top:200px;margin-bottom:80px;">
  
		<div class="row" style="text-align:center;">

				<form method="post" action="<?php echo base_url(); ?>home/order"> 

							<h2>Package Selection</h2>							
							<h5>Move your mouse over the package description to view a screen shot</h5>
							<p>Please Select The Package You Want To Purchase then press 'next'</p>
					
                          <div class="col-md-1">&nbsp;
                           </div>
                            
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
								    <div class="btn" data-toggle="buttons">
									<label for="default" class="btn btn-default next-step">Order <input type="radio" name="type" value="1" class="badgebox"><span class="badge">&check;</span></label>
							   		</div>
								</div>
							</div>
						   </div>
                           
                           
                           <div class="col-md-2">            		
								<div style="padding-left: 4%;" id="business-pages-book">
							        <h1 style="text-align: center;">
							        	<a title="Click To View" href="http://government.co.za/digitalcopy/index.html" target="_blank">
							        		<img width="150" class="img-responsive" src="<?php echo HTTP_IMG_PATH; ?>digital_copy.jpg" alt="Government Directory eBook" />
							        	</a>
							        </h1>
							        <p></p>
							        <h5>Government Directory eBook</h5>
							        <p>&nbsp;</p> 
							        <p>&nbsp;</p> 
							        <button type="submit" class="btn btn-info" name="next" value="1">Next ></button>

							    </div>
                           		
                           </div>
									  
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
								   <div class="btn" data-toggle="buttons">
										<label for="default" class="btn btn-default next-step">Order 
											<input type="radio" name="type" value="2" class="badgebox">
											<span class="badge">&check;</span>
										</label>
								   </div>
								</div>
							</div>
                           </div>

						<div class="col-md-1">&nbsp;
                           </div>
		
					</form>
				</div>

</div>

<?php
$this->load->view('vwFooter');
?>