<?php
$this->load->view('vwHeader');
?>
<!--  
Load Page Specific CSS and JS here
Author : Leon van Rensburg 

-->

<!-- banner-body -->
<div class="banner-body">
	<div class="container">
	
		<!-- blog -->
		<div class="blog">
			<div class="blog-left">
				<div class="blog-left-grid">
					<?php  for($x = 0; $x < count($news); ++$x) {?>
						<div class="blog-left-grid-left">
							 <h3><a href="<?php echo base_url()?>post/<?php echo $x;?>">
								<?php print_r($news[$x]['title']); ?><br></a></h3>
								<!--<p>by <span>Charlie</span> | June 13,2017 | <span>Sint</span></p>-->
						</div>

						<div class="clearfix"> </div>	
						 <a href="#">
						 <?php print_r($news[$x]['author']); ?></a> | <?php 
							$originalDate = $news[$x]['pubDate'];
							$newDate = date(" M d , Y ", strtotime($originalDate));
							echo $newDate
						?>
						<p class="para">                    
						<?php		 
							$string = $news[$x]['description'];
							$string =character_limiter($string,1000);
							echo $string;
						?></p>
						<div class="rd-mre">
							<a href="<?php echo base_url()?>post/<?php echo $x;?>">Read More</a>
						</div>                    
					<?php }?>
				</div>
			</div>
			
			<div class="blog-right">
				<div class="sap_tabs">	
				<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				  <ul class="resp-tabs-list">
					  <li class="resp-tab-item grid1" aria-controls="tab_item-0" role="tab"><span>Events</span></li>
					  <li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span>Trending</span></li>
					  <li class="resp-tab-item grid3" aria-controls="tab_item-2" role="tab"><span>Related</span></li>
					  <div class="clear"></div>
				  </ul>				  	 
					<div class="resp-tabs-container">
					<!--Events Tabs-->
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">							
							<?php  for($x = 0; $x < 4; ++$x) {?>
							<div class="facts">
 								<div class="tab_list1">
								<a href="<?php echo base_url()?>post/<?php echo $x;?>">
									<?php print_r($events[$x]['title']); ?><br>
								<p><?php print_r($events[$x]['author']); ?></a> | <?php 
									$originalDate = $events[$x]['pubDate'];
									$newDate = date(" M d , Y ", strtotime($originalDate));
									echo $newDate
									?> 
								<span>
								<div class="rd-mre">
									<a href="<?php echo base_url()?>post/<?php echo $x;?>">Read More</a>
								</div>
								</span>
							 	</p>
							  </div>
							  <div class="clearfix"> </div>
							</div>
							<?php }?>
						</div>
					<!--//Events Tabs-->
					
					<!--Trending Tabs-->
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
							<?php  for($x = 0; $x < 4; ++$x) {?>
							<div class="facts">
 								<div class="tab_list1">
								<a href="<?php echo base_url()?>post/<?php echo $x;?>">
									<?php print_r($events[$x]['title']); ?><br>
								<p><?php print_r($events[$x]['author']); ?></a> | <?php 
									$originalDate = $events[$x]['pubDate'];
									$newDate = date(" M d , Y ", strtotime($originalDate));
									echo $newDate
									?> 
								<span>
								<div class="rd-mre">
									<a href="<?php echo base_url()?>post/<?php echo $x;?>">Read More</a>
								</div>
								</span>
							 	</p>
							  </div>
							  <div class="clearfix"> </div>
							</div>
							<?php }?>
						</div>
					<!--//Trending Tabs-->
					
					<!--Related Tabs-->
						<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
							<?php  for($x = 0; $x < 4; ++$x) {?>
							<div class="facts">
 								<div class="tab_list1">
								<a href="<?php echo base_url()?>post/<?php echo $x;?>">
									<?php print_r($events[$x]['title']); ?><br>
								<p><?php print_r($events[$x]['author']); ?></a> | <?php 
									$originalDate = $events[$x]['pubDate'];
									$newDate = date(" M d , Y ", strtotime($originalDate));
									echo $newDate
									?> 
								<span>
								<div class="rd-mre">
									<a href="<?php echo base_url()?>post/<?php echo $x;?>">Read More</a>
								</div>
								</span>
							 	</p>
							  </div>
							  <div class="clearfix"> </div>
							</div>
							<?php }?>
						</div>
					<!--//Related Tabs-->
					</div>						 
				</div>
			</div>
			
			<div class="newsletter">
				<h3>Subscribe To Our Newsletter</h3>
				<form>
					<input type="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" required="">
					<input type="submit" value="Send">
				</form>
			</div>
			       
			<div id="blog-ads">
				<?php include 'blog-ads.php'; ?>
			</div>
			<!-- /banners --> 
				<div class="clearfix"> </div>
			</div>
		<!-- //blog -->
	
	<!-- //container -->
	</div>
</div>
<!-- //banner-body -->


<?php
$this->load->view('vwFooter');
?>