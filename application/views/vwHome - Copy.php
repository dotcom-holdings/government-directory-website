<?php
$this->load->view('vwHeader');
?>

<!--  
Home Page
Author : Leon van Rensburg 

-->
<script type="text/javascript">
  $.ajax({
	  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
	  data: {"ad_type" : "",
			 "company_ad_shown" : 0},
	  type: 'post',
	  complete: function(){
	  } 
 });
</script>
<div class="container">
			<div class="content slick-carousal1 content" id="main-content">
            <?php foreach ($classified_images_top as $image_top){ 
				$image_top_link = $image_top->name."<br><a href='http://".$image_top->website."' target='_blank'>Visit Website</a>"; ?>
				<div class="banner-widget">
				 <?php if($image_top->id){?>                 
					<a class="top_ad" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>" rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
					<?php } else {?>
				<a class="top_ad" href="<?php echo CDN_BASE_PATH.$image_top->url; ?>" rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top->name; ?>"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
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

<div id="sidebar-left" class="col-lg-3">

    <div id="categories">
        <h3>Categories</h3>
        	<ul>
				<?php for($x=0;$x<sizeof($gov_categories);$x++){ ?>
                <li>
                    <a class="catg" title="<?=$gov_categories[$x]->name?>" href="<?php echo HTTP_BASE_PATH; ?>home/by_cat/<?php echo $gov_categories[$x]->id;?>">
                    <?=$gov_categories[$x]->name?>                                    
                    </a>
                </li>
                <?php }?>
	        </ul>
    </div>
    <script type="text/javascript">
		$(document).ready(function(){
			$('.catg').click(function() {
				  var href = $(this).attr("href");
				  var id = href.substr(href.lastIndexOf('/') + 1);
				  //do your tracking 
				  $.ajax({
					  url: '<?php echo base_url() ?>home/update_stats',
					  data: {"link" : $(this).attr("href"),
							 "ad_type" : "category_click",
							 "category_clicked" : id},
					  type: 'post',
					  complete: function(){
						  //now do the redirect
					  } 
				 });
			});	
		});
		</script>
    <!--categories--> 
    
    <div class="banners">
    			<?php foreach ($classified_images_left as $image_left){ 
				$image_left_link = $image_left->name."<br><a href='http://".$image_left->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_left->id){?>
                 <div class="content">
					<a class="image_left" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_left->id; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_left->url; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_left->name; ?>"><img class="carousal" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"></a>
				<?php }?>
				<script type="text/javascript">
					$(document).ready(function(){
							  var href = "<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_left->id; ?>";
							  var id = <?php echo $image_left->id; ?>;
							  //do your tracking 
							  $.ajax({
								  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : href,
										 "ad_type" : "classified",
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
						$('.image_left').click(function() {
							  var href = $(this).attr("href");
							  var id = href.substr(href.lastIndexOf('/') + 1);
							  //do your tracking 
							  $.ajax({
								  url: '<?php HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : $(this).attr("href"),
										 "ad_type" : "classified",
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
    <!-- banners -->

</div>
<!-- /sidebar-left -->

<div id="content" class="col-lg-6">  
 
<div class="banners">
	<div class="slick-carousal2">
		<?php foreach ($get_random_facebook_banners as $image_top_banner){ 
				$image_top_banner_link = $image_top_banner->name."<br><a href='http://".$image_top_banner->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_top_banner->id){?>
                 <div class="banner-widget">
					<a href="https://www.facebook.com/MyAdsLive/" target="_blank" >
						<img class="img-responsive" src="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>">
					</a>
					<?php } else {?>
					<a href="https://www.facebook.com/MyAdsLive/" target="_blank">
						<img class="img-responsive" src="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>">
					</a>
				<?php }?>
                </div>
            <?php }?>
	</div>
</div><!-- /banners -->

<div class="government-info">
	<h2>Government Information</h2>

		<div class="info-column">
		<dl>
			<dt>Government &amp; Citizens</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/rights-and-responsibilities">Rights &amp; Responsibilities</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/disputes">Disputes</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/trade-unions">Trade Unions</a></dd>
            <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/embassies">Foreign Embassies</a></dd>
		</dl>

		<dl>    
			<dt>Parenting &amp; Child Care</dt>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/health-and-safety">Health &amp; Safety</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/bullying">Bullying</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/home-safety">Home Safety</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/road-safety">Road Safety</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/having-a-baby">Having a Baby</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/childcare">Childcare</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/family-recreation">Family Recreation</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/adoption-and-fostering">Adoption &amp; Fostering</a></dd>
		</dl>

		<dl>
			<dt>Education &amp; Training</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/adult-learning">Adult Learning</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/higher-education">Higher Education</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/secondary-education">Secondary Education</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/pre-school-education">Pre-school Education</a></dd>
		</dl>

		<dl>
			<dt>Employment</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/new-jobs">New Jobs</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/workplace-problems">Workplace Problems</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/jobseekers">Jobseekers</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/safe-jobseeking">Safe Jobseeking</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/self-employment">Self-Employment</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/career-help">Career Help</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/employment-terms">Employment Terms</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/health-and-safety">Health &amp; Safety</a></dd>
		</dl>
		</div>
		<!-- column 1 -->

		<div class="info-column">

		<dl>
			<dt>S.A Youth</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/work-and-careers">Work &amp; Careers</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/health-and-relationships">Health &amp; Relationships</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/healthy-eating"> Healthy Eating</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/divorce-and-separation"> Divorce &amp; Separation</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/sports-and-leisure">Sports &amp; Leisure</a></dd>

		</dl>
		
		<dl>
			<dt>Community &amp; Housing</dt>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/buying-your-home">Buying Your Home</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/mortages-and-repossession">Mortages &amp; Repossession</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/buying-your-home">Building Your Home</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/owning-property">Owning Property</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/selling">Selling</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/mobile-homes">Mobile Homes</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/renting">Renting</a></dd>
		</dl>
	
		<dl>
			<dt>Living with Disabilities</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/employment-support">Employment Support</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/education-and-learning">Education &amp; Learning</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/motoring"> Motoring</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/home-and-living">Home &amp; Living</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/everyday-life">Everyday Life</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/health-and-support">Health &amp; Support</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/assistance-dogs">Assistance Dogs</a></dd>
		</dl>

		<dl>
			<dt>Travel &amp; Transportation</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/rules-and-codes">Rules &amp; Codes</a></dd> 
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/road-signals">Road Signals</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/requirements">Requirements</a></dd>	
            <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/safety-and-advice">Safety &amp; Advice</a></dd>
		</dl>
		</div>
		<!-- column 1 -->

		<div class="info-column">
		<dl>
			<dt>Pensioners &amp; Retirement</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/financial-support"> Financial Support</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/retirement-planning">Retirement Planning</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/health-and-well-being">Health &amp; Well Being</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/medical-support">Medical Support</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/managing-debt">Managing Debt</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/debt-and-you">Debt &amp; You</a></dd>
		</dl>

		<dl>
			<dt>Crime &amp; Justice</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/victims-and-witnesses"> Victims &amp; Witnesses</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/types-of-crime">Types of Crime</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/the-police">The Police</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/court">Court</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/crime-prevention">Crime Prevention</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/being-arrested">Being Arrested</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/sentencing">Sentencing</a></dd>
		</dl>

		<dl>
			<dt>Environmental Awareness</dt>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/recycling-and-waste-reduction">Recycling &amp; Waste Reduction</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/energy-saving">Energy Saving</a></dd>
		</dl>

		<dl>
			<dt>Motoring &amp; Vehicles</dt>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/driver-licensing">Driver Licensing</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/stolen-vehicle">Stolen Vehicle</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/owning-a-vehicle">Owning a Vehicle</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/learners-and-drivers">Learners &amp; Drivers</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/number-plates">Number Plates</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/driver-safety">Driver Safety</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/vehicle-advice">Vehicle Advice</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/buying-and-selling">Buying &amp; Selling</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/driving-career">Driving Career</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/motor-insurance-explained">Motor Insurance Explained</a></dd>            
		</dl>
	</div>
</div> <!-- /.goverment-info -->

<script type="text/javascript">
$(document).ready( function() {
    
   $('a[href^="#"]').click(function(e) {
//      $("html, body").delay(1000).animate({scrollTop: $('.post').offset().top }, 2000);
//       // e.preventDefault();
   });  
 //    $(document).ready(function () {
	// 	$("html, body").animate({scrollTop: $('.post').offset().top }, 700);
	// }); 
});
</script>
<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow86.js"></script>
<noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>
<h2>Featured Listings</h2>
<div id="yw0" class="list-view">
<div class="summary"></div>

<div class="items">

    <div class="table-responsive">
    
    <table class="display listing_table" cellspacing="0" width="100%">
    	<thead><tr><th></th></tr></thead>
    	<tbody>
		<?php foreach ($featured_listings as $featured){ 
			$telephone = $featured->telephone;
			// $telephone = explode(',',$telephone);
			// $telephone = $telephone[0];
			// $telephone = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$featured->logo) 
				$image = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$image = CDN_BASE_PATH.$featured->logo; 
        ?>
        <tr>
      
            <td>
            <div class="view"> 
            <a class="listing_ad" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$featured->id; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop">  
            <img width="130" src="<?php echo $image;?>" alt="<?php echo $featured->name;?>"/>
            </a> 
                    
            <div class="info">   
                <h4 class="short">
                    <a class="listing_ad" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$featured->id; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop"><?php echo $featured->name;?></a>    
                </h4>

                <address class="short">
                <i class="fa fa-map-marker"></i>
                <?php echo $featured->address;?>
                </address>
                
                <div class="phone"> 
                <i class="fa fa-phone"></i>
                <?php echo $telephone?>    
                </div>
             </div>
            
            </div>
        	</td>
          </tr>
          <script type="text/javascript">
				$(document).ready(function(){
						  var id = <?php echo $featured->id;?>;
						  //do your tracking 
						  $.ajax({
							  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
							  data: {"link" : "<?php echo HTTP_BASE_PATH; ?>home/company/<?php echo $featured->id;?>",
									 "ad_type" : "listing",
									 "company_listing_shown" : id},
							  type: 'post',
							  complete: function(){
								  //now do the redirect
							  } 
					});	
				});
				</script>           
        <?php }?>
        <script type="text/javascript">
				$(document).ready(function(){
					$('.listing_ad').click(function() {
						  var href = $(this).attr("href");
						  var id = <?php echo $featured->id;?>;
						  //do your tracking 
						  $.ajax({
							  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
							  data: {"link" : "<?php echo HTTP_BASE_PATH; ?>home/company/<?php echo $featured->id;?>",
									 "ad_type" : "listing",
									 "company_listing_visited" : id},
							  type: 'post',
							  complete: function(){
								  //now do the redirect
							  } 
						 });
					});	
				});
				</script>
        </tbody>
      </table>
         
    </div>
 </div>   
</div>

	<div class="news-widget">
	
		<h2 class="news-widget__h">Latest News</h2>
	
        <?php for($x=0;$x<sizeof($news);$x++){ ?>
            <article>
                <h5 class="news-widget__title"><?=strlen($news[$x]['title']) > 50 ? substr($news[$x]['title'], 0, 50) . '...' : $news[$x]['title']?></h5>
                <div class="news-widget__content">
                <?=strlen($news[$x]['description']) > 450 ? substr($news[$x]['description'], 0, 750) . '...' : $news[$x]['description']?>
                </div>
                <a href="<?=$news[$x]['link']?>" class="news-widget__more" target="_blank">Read More</a>
            </article>
		<?php }?>
	</div>
<!-- /#news -->
</div>

<div id="sidebar-right" class="col-lg-3">

    <div class="banners">
    
    		<?php foreach ($classified_image_top_right as $image_right){ 
				$image_right_link = $image_right->name."<br><a href='http://".$image_right->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_right->id){?>
                 <div class="content">
					<a class="image_right" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_right->id; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image img-responsive" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_right->url; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_right->name; ?>"><img class="img-responsive" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
				<?php }?>
				<script type="text/javascript">
					$(document).ready(function(){
							  var href = "<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_right->id; ?>";
							  var id = <?php echo $image_right->id; ?>;
							  //do your tracking 
							  $.ajax({
								  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : href,
										 "ad_type" : "classified",
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
						$('.image_right').click(function() {
							  var href = $(this).attr("href");
							  var id = href.substr(href.lastIndexOf('/') + 1);
							  //do your tracking 
							  $.ajax({
								  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : $(this).attr("href"),
										 "ad_type" : "classified",
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
            
     <div id="business-pages-book">
        <img src="<?php echo HTTP_IMG_PATH; ?>digital_copy.jpg" alt="" />        
        <h4>Government Directory eBook</h4>
        <a href="<?php echo HTTP_BASE_PATH ?>digitalcopy" target="_blank">View</a>
    </div>
    <!-- /digital-copy -->
            
              <?php foreach ($classified_images_right as $image_right){ 
				$image_right_link = $image_right->name."<br><a href='http://".$image_right->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_right->id){?>
                 <div class="content">
					<a class="image_right" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_right->id; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image img-responsive" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_right->url; ?>" rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_right->name; ?>"><img class="img-responsive" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
				<?php }?>
				<script type="text/javascript">
					$(document).ready(function(){
							  var href = "<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_right->id; ?>";
							  var id = <?php echo $image_right->id; ?>;
							  //do your tracking 
							  $.ajax({
								  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : href,
										 "ad_type" : "classified",
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
						$('.image_right').click(function() {
							  var href = $(this).attr("href");
							  var id = href.substr(href.lastIndexOf('/') + 1);
							  //do your tracking 
							  $.ajax({
								  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : $(this).attr("href"),
										 "ad_type" : "classified",
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
    <!-- /banners -->
                <div id="video-ad">
        <h2>Video Ads</h2>
			<?php foreach ($videos as $video){?>
            <figure>
                <a href="https://www.youtube.com/watch/v/<?php echo $video->url; ?>" rel="nofollow" data-toggle="lightbox" data-gallery="youtubevideos" data-title="<?php echo $video->name;?>">
                    <img width="300" height="180" style="width:100%;max-width: 100%;margin: auto;overflow: auto;border-radius: 4px;" src="<?php echo 'http://img.youtube.com/vi/'.$video->url.'/hqdefault.jpg'; ?>" class="img-responsive"><i class="fa fa-play"></i>
                </a>
            </figure>
            <?php }?>
     </div>
    <!-- /video-ad -->
   

    <div id="twitter-updates">
        <h2>Twitter Updates</h2>
        <a class="twitter-timeline" href="https://twitter.com/myadslive" data-widget-id="359956644781768707">Tweets by @myadslive</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <!-- /twitter-timeline -->


</div>
<!-- /sidebar-right -->





</div><!-- /container -->

    
<?php
$this->load->view('vwFooter');
?>