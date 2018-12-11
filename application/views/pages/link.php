<?php
$this->load->view('vwHeader');
?>

<div class="container">
			<div class="content" id="main-content">
            <?php foreach ($classified_images_top as $image_top){ 
				$image_top_link = $image_top->name."<br><a href='http://".$image_top->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_top->id){?>
                 <div class="banner-widget">
					<a href="<?php echo HTTP_BASE_PATH.'../documents/home/lightbox_company'.$image_top->id; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_top->url; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top->name; ?>"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
				<?php }?>
                </div>
            <?php }?>
			</div> 


<div id="sidebar-left">

    <div id="categories">
        <h3>Categories</h3>
        	<ul>
				<?php for($x=0;$x<sizeof($gov_categories);$x++){ ?>
                <li>
                    <a title="<?=$gov_categories[$x]->name?>" href="<?php echo HTTP_BASE_PATH; ?>home/by_cat/<?php echo $gov_categories[$x]->id;?>">
                    <?=$gov_categories[$x]->name?>                                    
                    </a>
                </li>
                <?php }?>
	        </ul>   
    </div>

    
    <div class="banners">
    			<?php foreach ($classified_images_left as $image_left){ 
				$image_left_link = $image_left->name."<br><a href='http://".$image_left->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_left->id){?>
                 <div class="content">
					<a href="<?php echo HTTP_BASE_PATH.'../documents/home/lightbox_company'.$image_left->id; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_left->url; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_left->name; ?>"><img class="carousal" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"></a>
				<?php }?>
                </div>
            	<?php }?>
    </div>
    

</div>


                
    
    
<div class="banners">
			<?php foreach ($classified_images_top_banner as $image_top_banner){ 
				$image_top_banner_link = $image_top_banner->name."<br><a href='http://".$image_top_banner->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_top_banner->id){?>
                 <div class="banner-widget">
					<a href="<?php echo HTTP_BASE_PATH.'../documents/home/lightbox_company'.$image_top_banner->id; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img width="468" height="60" src="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top_banner->name; ?>"><img width="468" height="60" src="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>"></a>
				<?php }?>
                </div>
            <?php }?>
</div>

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
</div> 

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
<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow86.js"></script>
<noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>



<div id="yw0" class="list-view" style="height:120px !important; ">
<div class="summary"></div>

<div class="items" >

<?php 
if($type=="embassies")
{
	include($type.'.php');	
} else {
	include($type.'.html');	
}
?>
   

 </div>   
</div>





<div id="sidebar-right">

    <div class="banners">
    
    		<?php foreach ($classified_image_top_right as $image_right){ 
				$image_right_link = $image_right->name."<br><a href='http://".$image_right->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_right->id){?>
                 <div class="content">
					<a href="<?php echo HTTP_BASE_PATH.'../documents/home/lightbox_company'.$image_right->id; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_right->url; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_right->name; ?>"><img class="carousal" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
				<?php }?>
                </div>
            <?php }?>
              <?php foreach ($classified_images_right as $image_right){ 
				$image_right_link = $image_right->name."<br><a href='http://".$image_right->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_right->id){?>
                 <div class="content">
					<a href="<?php echo HTTP_BASE_PATH.'../documents/home/lightbox_company'.$image_right->id; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_right->url; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_right->name; ?>"><img class="carousal" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
				<?php }?>
                </div>
            <?php }?>
    </div>
    

    <div id="video-ad">
        <h2>Video Ads</h2>
			<?php foreach ($videos as $video){?>
            <figure>
                <a href="https://www.youtube.com/watch/v/<?php echo $video->url; ?>"  rel="nofollow" data-toggle="lightbox" data-gallery="youtubevideos" data-title="<?php echo $video->name;?>">
                    <img width="300" height="180" style="width:100%;max-width: 100%;margin: auto;overflow: auto;border-radius: 4px;" src="<?php echo 'http://img.youtube.com/vi/'.$video->url.'/hqdefault.jpg'; ?>" class="img-responsive"><i class="fa fa-play"></i>
                </a>
            </figure>
            <?php }?>   
     </div>
    <!-- /video-ad -->
    
    <div id="business-pages-book">
        <img src="<?php echo HTTP_IMG_PATH; ?>digital_copy.jpg" alt="" />        
        <h4>Government Directory eBook</h4>
        <a href="http://adsproof.com/govdirectory" target="_blank">View</a> 
    </div>
    <!-- /digital-copy -->

    <div id="twitter-updates">
        <h2>Twitter Updates</h2>
        <a class="twitter-timeline" href="https://twitter.com/myadslive" data-widget-id="359956644781768707">Tweets by @myadslive</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <!-- /twitter-timeline -->

</div>
<!-- /sidebar-right -->

</div><!-- /container -->
</div> 

    
<?php
$this->load->view('vwFooter');
?>