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
				<a class="top_ad" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>" rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top->name; ?>"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
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
<!-- /banner -->>


<div class="container">    
  <div class="row content">

    <!-- Left sidebar -->
    <div id="sidebar-left" class="col-lg-3">
      <?php include 'left_sidebar.php'; ?>
    </div>


<div id="content" class="col-lg-6">    
    
<div class="banners">
	<?php foreach ($classified_images_top_banner as $image_top_banner){ 
		$image_top_banner_link = $image_top_banner->name."<br><a href='http://".$image_top_banner->website."' target='_blank'>Visit Website</a>"; ?>
		 <?php if($image_top_banner->id){?>
         <div class="banner-widget">
			<a href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top_banner->id; ?>" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="img-responsive" style="width:100%;" src="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>"></a>
			<?php } else {?>
		<a href="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top_banner->name; ?>"><img class="img-responsive" style="width:100%;" src="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>"></a>
		<?php }?>
        </div>
    <?php }?>
</div>
<!-- /banners -->

<div class="government-info" style="width:100%;">
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
    $(document).ready(function () {
		$("html, body").animate({scrollTop: $('.post').offset().top }, 700);
	}); 
});
</script>

<div id="yw0" class="list-view">
<div class="summary"></div>

<div class="items">

<?php 
if($type=="embassies")
{
	include('documents/'.$type.'.php');
} else {
	include('documents/'.$type.'.html');
}
?>
   

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

    
<?php
$this->load->view('vwFooter');
?>