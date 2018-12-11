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
				<?php if(!empty($news)){?>
					<?php  for($x = 0; $x < count($news); ++$x) {?>
						<div class="blog-left-grid-left">
							 <h3><a href="<?php echo base_url()?>pages/post/<?php echo $x;?>">
								<?php print_r($news[$x]['title']); ?><br></a></h3>
								<!--<p>by <span>Charlie</span> | June 13,2017 | <span>Sint</span></p>-->
						</div>

						<div class="clearfix"> </div>	
						 <?php 
							$originalDate = $news[$x]['pubDate'];
							$newDate = date(" M d , Y ", strtotime($originalDate));
							echo $newDate
						?>
						<p class="para">                    
						<?php	 $this->load->helper('text');	 
							$string = $news[$x]['description'];
							$string =character_limiter($string,1000);
							echo $string;
						?></p>
						<div class="rd-mre">
							<a href="<?php echo base_url()?>pages/post/<?php echo $x;?>">Read More</a>
						</div>                    
					<?php }?>
					<?php } else 
        echo("<meta http-equiv='refresh' content='1'>"); 
        ?>
				</div>
			</div>
			
			<div class="blog-right">
				<div class="sap_tabs">	
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
		       
		    <div id="blog-ads">
				<a href="http://govnews.co.za/" target="_blank">
                        <img src="<?php echo HTTP_IMG_PATH; ?>govnews.jpg" alt="" class="img-responsive img-responsive-blogs" /></a>
			</div>
			       
			<div id="blog-ads">
				<?php include 'blog-ads.php'; ?>
			</div>
			<!-- /banners --> 
				<div class="clearfix"> </div>
			</div>					 
										 					 					 
			</div>
		</div>
			
			
		<!-- //blog -->
	
	<!-- //container -->
	</div>
</div>
<!-- //banner-body -->


<?php
$this->load->view('vwFooter');
?>