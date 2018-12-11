<?php
$this->load->view('vwHeader');
?>
<!--  
Home Page
Author : Leon van Rensburg 

-->
	<div class="container">
					<div class="content slick-carousal1" id="main-content">
            <?php foreach ($classified_images_top as $image_top){ 
				$image_top_link = $image_top->name."<br><a href='http://".$image_top->website."' target='_blank'>Visit Website</a>"; ?>
				<div class="banner-widget">
				 <?php if(!empty($image_top->promotions_ad_link)){?>
					<a class="top_ad" target="_blank" href="<?php echo $image_top->promotions_ad_link; ?>" rel="follow" id="pop"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
					<?php } else {?>
				<a class="top_ad" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>" rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
				<?php }?>
				<script type="text/javascript">
					$(document).ready(function(){
							  var href = "<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>";
							  var id = <?php echo $image_top->id; ?>;
							  //do your tracking 
							  $.ajax({
								  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : href,
										 "ad_type" : "promotion_classified",
										 "company_ad_shown" : id},
								  type: 'post',
								  complete: function(){
									  //now do the redirect
								  } 
						});	
					});
					</script>
                <script type="text/javascript">
					$(document).ready(function(){
						$('.top_ad').click(function() {
							  var href = $(this).attr("href");
							  var id = href.substr(href.lastIndexOf('/') + 1);
							  //do your tracking 
							  $.ajax({
								  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : $(this).attr("href"),
										 "ad_type" : "promotion_classified",
										 "company_ad_visited" : id},
								  type: 'post',
								  complete: function(){
									  //now do the redirect
								  } 
							 });
						});	
					});
					</script>
                </div>
            <?php }?>
			</div> 
			
			
			
<script type="text/javascript">
$(document).ready(function(){
	$('.top_ad').click(function() {
		  var href = $(this).attr("href");
		  var id = href.substr(href.lastIndexOf('/') + 1);
		  //do your tracking 
		  $.ajax({
			  url: '<?php echo base_url() ?>home/update_stats',
			  data: {"link" : $(this).attr("href"),
					 "ad_type" : "promotion_classified",
					 "company_ad_visited" : id},
			  type: 'post',
			  complete: function(){
				  //now do the redirect
			  } 
		 });
	});	
});
</script>
<!-- /banner -->

	
<?php  include("menu2.php"); ?> 

<div class="container">    
  <div class="row content">

    <!-- Left sidebar -->
    <div id="sidebar-left" class="col-lg-3" >
      <?php include 'left_sidebar.php'; ?>
    </div>


<div id="content" class="col-lg-6">    
    
<div class="banners">
	<?php foreach ($classified_images_top_banner as $image_top_banner){ 
		$image_top_banner_link = $image_top_banner->name."<br><a href='http://".$image_top_banner->website."' target='_blank'>Visit Website</a>"; ?>
		 <?php if($image_top_banner->id){?>
         <div class="banner-widget">
			<a href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top_banner->id; ?>" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="img-responsive" style="width:100%;border:solid 1px black;" src="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>"></a>
			<?php } else {?>
		<a href="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top_banner->name; ?>"><img class="img-responsive" style="width:100%;border:solid 1px black;" src="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>"></a>
		<?php }?>
        </div>
    <?php }?>
</div>
<!-- /banners -->


<script type="text/javascript">
$(document).ready( function() {
    
   $('a[href^="#"]').click(function(e) {
//      $("html, body").delay(1000).animate({scrollTop: $('.post').offset().top }, 2000);
//       // e.preventDefault();
   });  
    $(document).ready(function () {
		$("html, body").animate({scrollTop: $('.post').offset().top }, 700);
	}); 
});
</script>

<div id="yw0" class="list-view">
<div class="summary"></div>

<div class="items">

<div id="content">  

            <div class="breadcrumbs">
<a href="<?php echo HTTP_BASE_PATH; ?>home">Home</a> &raquo; <span>About Us</span></div>        <!-- /breadcrumbs -->
    
    <div id="aboutus">
	<h1>About Us</h1>

	<h5>Welcome to the Government Directory of <?php echo COUNTRY_NAME; ?></h5>

	<p>
		The Government Directory is officially powered by African Directory Services (Pty) Ltd – We are Africa’s largest and most
		reputable publisher of business and government institutions since the year 2000.
	</p>

	<h5>NEW: Visit our e-book online – <a href="<?php echo HTTP_BASE_PATH ?>digitalcopy/index.html" target="_blank">click here</a></h5>

	<p>
		Since its inception in 2008, the Government Directory has been providing leaders and officials with a great insight to
		government and a platform for networking opportunities in <?php echo COUNTRY_NAME; ?> and beyond.
	</p>

	<p>
		Inside you will find government institutions listed from A to Z by location and sector e.g. National Government
		(Ministries and Departments), National Institutions and Bodies, Municipalities, Provincial Government and Diplomatic
		Missions etc. Each profile consists of the organization’s name, a brief overview, vision and mission, contact persons,
		extension lists, email and website addresses, and photographs etc.
	</p>

	<p>
		The aim of the Government Directory is to enhance local and international integration and to allow for better
		intra and inter governments’ communication, for example when hosting special events, summits, conferences, and indabas.
	</p>

	<p>
		The Government Directory has been awarded gold status by the SADC and NEPAD as it now contains a segment on
		government contacts from 14 Southern African countries including Zambia, Swaziland, Lesotho, South Africa, Zimbabwe, Namibia and Mozambique.
	</p>

	<p>
		Yes we are expanding because of the high quality products and services we offer. For more new exciting products,
		please visit www.adslive.com today!
	</p>

	<p>The Government Directory of <?php echo COUNTRY_NAME; ?> is proudly brought to you by: </p>

	<img src="<?php echo HTTP_IMG_PATH; ?>adslive.png" alt="Adslive" />	<br><br>
	<strong>African Directory Services (Pty) Ltd – The way to connect with Africa &reg;</strong>
	<address>
		Telephone: (+27) 11 3336803 / 0860 366387
	</address>
	<br>

	<a href="http://coporate.adslive.com" target="_blank">Visit Site</a> |
	<a href="http://corporate.adslive.com/?page_id=18" target="_blank">Message Us</a> |
	<a href="http://www.facebook.com/myadslive" target="_blank">Like Us</a> |
	<a href="http://www.youtube.com/myadslive" target="_blank">Watch Video</a> <!--|
	<a href="#">Download App</a>-->

	<p>Get your free email account instantly. Lots of exciting email addresses to choose from – <a target="_blank" href="http://emailafrica.net/">click here</a></p>

</div>
</div>

 </div>   
</div>


<!-- /#news -->
</div>
<!-- /content -->

 <div id="right_sidebar" class="col-lg-3">
    <?php include 'right_sidebar.php'; ?>
  </div>

<!-- /sidebar-right -->

</div>
</div>
</div>

    
<?php
$this->load->view('vwFooter');
?>