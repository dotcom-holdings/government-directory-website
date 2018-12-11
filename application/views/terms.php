<?php
$this->load->view('vwHeader');
?>
<!--  
Home Page
Author : Leon van Rensburg 

-->
<div class="container">
	<div class="content slick-carousal1" style="margin-top:200px;">
        <?php foreach ($classified_images_top as $image_top){ 
			$image_top_link = $image_top->name."<br><a href='http://".$image_top->website."' target='_blank'>Visit Website</a>"; ?>
			 <?php if($image_top->id){?>
             <div class="banner-widget">
				<a href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
				<?php } else {?>
			<a href="<?php echo CDN_BASE_PATH.$image_top->url; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top->name; ?>"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
			<?php }?>
            </div>
        <?php }?>
	</div> 
<!-- /banner -->

<div id="sidebar-left">
	<?php include 'left_sidebar.php' ?>
</div>
<!-- /sidebar-left -->

<div id="content">  

                    <!-- /breadcrumbs -->
    
    
<div class="banners">
			<?php foreach ($classified_images_top_banner as $image_top_banner){ 
				$image_top_banner_link = $image_top_banner->name."<br><a href='http://".$image_top_banner->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_top_banner->id){?>
                 <div class="banner-widget">
					<a href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top_banner->id; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img width="468" height="60" src="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>" style="border:solid 1px black;"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top_banner->name; ?>"><img width="468" height="60" src="<?php echo CDN_BASE_PATH.$image_top_banner->url; ?>" style="border:solid 1px black;"></a>
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
<script type="text/javascript" src="http://arrow.scrolltotop.com/arrow86.js"></script>
<noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>

<div id="yw0" class="list-view">
<div class="summary"></div>

<div class="items">

<div id="content">  

            <div class="breadcrumbs">
<a href="<?php echo HTTP_BASE_PATH; ?>home">Home</a> &raquo; <span>Terms and Conditions</span></div>        <!-- /breadcrumbs -->
    
    <div id="aboutus" style="padding-right:35px";>
	<h1>Terms &amp; Conditions</h1>
	
	<ol>
		<li>All advertising amounts are excluding VAT</li>
		<li>The Publisher reserves the right to edit, revise or reject any advertising.</li>
		<li>The Publisher shall be under no liability whatsoever by reason of error, including any translation error, 
			for which it may be responsible in any advertisement beyond liability to give the advertiser or advertising 
			agency credit for as much of the space occupied by the advertisement as is materially affected by the error; 
			and its obligation to give such credit shall not apply to more than one incorrect insertion under any contract 
			or order unless it is notified of the inaccuracy prior to the deadline for repetition of the insertion.
		</li>
		<li>The Publisher does not guarantee any given level of circulation or readership for an advertisement.</li>
		<li>The advertiser and advertising agency assume liability for all content [including text representation and 
			illustrations] of advertisements published and also assume responsibility for any claims arising thereof 
			made against The Publisher, including costs associated with defending against such a claim.
		</li>
		<li>All positions are at the option of The Publisher. In no event will adjustments, reinstatements or refunds be 
			made because of the position and/or section in which an advertisement has been published. The Publisher will 
			seek to comply with position requests and other stipulations that appear on insertion orders, but cannot 
			guarantee that they will be followed. Payment of a premium position fee does not guarantee positioning. 
			In the event that The Publisher is unable to provide the requested positioning, the premium position fee 
			will be refunded. Customer service representatives and Account Managers are not authorized to modify this 
			provision or to guarantee positioning on behalf of The Publisher. Misclassification of classified ads is 
			not permitted.
		</li>
		<li>The Publisher shall be under no liability for its failure for any cause to insert an advertisement.</li>
		<li>The Publisher reserves the right to convert all advertisements published in print, digital and audio-text 
			formats, including the right to publish such advertisements electronically on the Internet and other 
			publications.
		</li>
		<li>The advertiser or advertising agency shall pay the cost of composition of advertisements set but not used.</li>
		<li>Advertiser (and agency) may not resell any advertising or advertising space.</li>
		<li>Charges for changes [not corrections] from original layout and copy will be based on current composition rates.</li>
		<li>The Publisher will not be responsible for errors appearing in advertisements that are placed too late for 
			proofs to be submitted or for errors due to delivery of printing materials past publishing deadlines from 
			the advertiser or advertising agency or from a third party designated by the advertiser or advertising agency 
			as a source for printing material.
		</li>
		<li>Advertisers are responsible for checking the accuracy of the proofs they request. The advertiser should carefully 
			check the entire ad proof, including areas in which changes or corrections were not requested.</li>
		<li>All orders are firm and are not subject to cancellation unless agreed upon by both parties. A 50% cancellation fee will apply.</li>
		<li>Cancellations or changes cannot be guaranteed in classified advertising between the time the ad is 
			ordered and the initial publication.
		</li>
		<li>Multi-insertion orders will be accepted only when in writing. Cancellation of multi-insertion orders must be confirmed in writing.
		</li>
		<li>The Publisher does not assume any liability for the return of printing material in connection with 
			advertising unless a specific written request is received to hold such material subject to order for 
			a period not exceeding 30 days.
		</li>
		<li>Claims for errors must be made within 30 days following publication date.</li>
		<li>On advertising where a debit order is allowed, monthly accounts are due and payable on or before the 
			fifteenth [15th] of the month following booking. When any part of an account for advertising becomes 
			delinquent, then the entire amount owed shall become due and payable and The Publisher may refuse to 
			publish further advertising. In this event, the advertiser or agency shall pay for advertising space 
			actually used according to the rate earned at the time of the delinquency.
		</li>
		<li>Extension of credit to advertising agencies is based on the agency’s acceptance of sole liability for 
			all advertising placed by it and billed to its account. No endorsement, statement or disclaimer on any 
			insertion order, check or letter shall act as an accord or satisfaction, or as a waiver of this condition 
			unless and until it is accepted by The Publisher by a separate written agreement signed by a duly authorized 
			representative of The Publisher. In the event of nonpayment of any agency account, prior to referring said 
			account for third party collections, The Publisher reserves the right to contact the agency’s client(s), 
			as disclosed principal(s), for payment. If the outstanding balance is still not satisfied, The Publisher 
			may proceed with collections against both the agency and its client(s). No such action on the part of The 
			Publisher shall relieve the agency of liability for the debt.
		</li>
		<li>Payment of all undisputed invoices must be made within The Publishers terms. All outstanding accounts 
			will attract an interest fee of not less than 1% per month and is usually calculated at the prime lending 
			rate plus 2% per annum
		</li>
		<li>There will be a ZAR500.00 charge for any check not honored by the bank. Returned checks must be replaced 
			with guarantees/cashier/ internet transfer funds within 48 hours of notification. The Publisher reserves 
			the right to withhold further advertising pending receipt of replacement funds.
		</li>
		<li>In the event an account is referred to a third party for collection, advertiser agrees to pay collection 
			and/or attorney fees, as well as court costs incurred to effect collection.
		</li>
		<li>Payment of account is not dependent upon receipt of invoices, either physical or electronic.</li>
		<li>Incorrect rates that do not correspond to the rate card will be regarded as clerical errors and the 
			advertisements will be published and charged at the applicable rates in effect at the time of publication.</li>
		<li>Preprint advertisers are billed based on average circulation within the purchased advertising zones, as 
			published in The Publisher’s period estimates, which may vary slightly from the number of inserts 
			distributed on a particular issue. The Publisher will not be responsible, nor provide billing or rate 
			adjustments, for shortages resulting from these variances, including variances due to errors in the 
			insertion or distribution process, shortages in the advertiser’s delivery of preprints, and inserts 
			that are not within The Post’s insert specifications.
		</li>
		<li>Insertion orders are accepted by The Publisher subject to the foregoing terms and conditions. Terms, 
			conditions, rates or agreements not set forth herein or in then-current rate schedules are not binding 
			on The Publisher. Customer service representatives and Account Managers are not authorized to modify 
			these terms and conditions.
		</li>
		<li>The signatory declares that he/she has the authorization to sign for and place advertisements on behalf 
			of the client and is aware of the costs for such advertisements.
		</li>
		<li>All Advertising Contracts are automatically renewed after every 12 months and must be cancelled in 
			writing before deadline submissions.
		</li>
	</ol>

	<p>The Government Directory of South Africa is proudly brought to you by: </p>

	<img src="<?php echo HTTP_IMG_PATH; ?>adslive.png" alt="Adslive" />	<br><br>
	<strong>African Directory Services (Pty) Ltd – The way to connect with Africa &reg;</strong>
	<address>
		Telephone: (+27) 11 3336803 / 0860 366387
	</address>
	<br>

	<a href="http://coporate.adslive.com" target="_blank">Visit Site</a> |
	<a href="http://corporate.adslive.com/?page_id=18" target="_blank">Message Us</a> |
	<a href="http://www.facebook.com/myadslive" target="_blank">Like Us</a> |
	<a href="http://www.youtube.com/myadslive" target="_blank">Watch Video</a> |
	<a href="#">Download App</a>

	<p>Get your free email account instantly. Lots of exciting email addresses to choose from – <a target="_blank" href="http://emailafrica.net/">click here</a></p>

</div>
</div>

 </div>   
</div>


<!-- /#news -->
</div>
<!-- /content -->


<div id="sidebar-right">
	<?php include 'right_sidebar.php'; ?>
</div>
<!-- /sidebar-right -->

</div><!-- /container -->

    
<?php
$this->load->view('vwFooter');
?>