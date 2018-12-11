
<style>
	.tenders-table{
		width: 100% !important;
	}
	td{
		width: auto !important;
		padding: 6px !important;
		font-size: 13px !important;
	}
</style>
<div class="container" >
<?php
	$year=@date('Y');
	$curl = curl_init('http://www.sanews.gov.za/special-features/opinions');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

	$page = curl_exec($curl);

	if(curl_errno($curl)) // check for execution errors
	{
		echo 'Scraper error: ' . curl_error($curl);
		exit;
	}

	curl_close($curl);
 ?>	
  <div class="col-md-12">
            <h2 class="right-line no-margin-bottom">Government Chat</h2>
        </div>
    <h6 style="color: #fff;">More Topics</h6>
    
	<ul class="list-group" style="height: 600px;overflow: scroll">
<li class="list-group-item" >
		<h5 style="color: #333">
			Topics 
	</h5>
<li class="list-group-item list-group-item-1 list-group-item-odd list-group-item-first">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/africans-doing-it-themselves">Africans doing it for themselves</a></span>  </div></li>
  <li class="list-group-item list-group-item-2 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/greater-innovation-will-contribute-industrialisation">Greater innovation will contribute to industrialisation</a></span>  </div></li>
  <li class="list-group-item list-group-item-3 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/zumas-visit-changes-lives-better">'Zuma's visit changes lives for the better'</a></span>  </div></li>
  <li class="list-group-item list-group-item-4 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/time-advance-beyond-political-freedom">Time to advance beyond political freedom</a></span>  </div></li>
  <li class="list-group-item list-group-item-5 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/new-wage-set-break-back-inequality">New wage set to break the back of inequality </a></span>  </div></li>
  <li class="list-group-item list-group-item-6 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/call-citizens-ensure-legacy-tambo-lives">Call for citizens to ensure the legacy of Tambo lives on</a></span>  </div></li>
  <li class="list-group-item list-group-item-7 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/tackling-youth-joblessness-head">Tackling youth joblessness head on</a></span>  </div></li>
  <li class="list-group-item list-group-item-8 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/nyda-works-raf-order-curb-road-fatalities">NYDA works with RAF in order to curb road fatalities</a></span>  </div></li>
  <li class="list-group-item list-group-item-9 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/team-south-africa-stands-ready-fly-flag">Team South Africa stands ready to fly flag</a></span>  </div></li>
  <li class="list-group-item list-group-item-10 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/integrity-sa-government-has-been-restored-once-again">The integrity of the SA Government has been restored once again </a></span>  </div></li>
  <li class="list-group-item list-group-item-11 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/sa-lead-front-cites-cop17">SA to lead from the front at CITES CoP17</a></span>  </div></li>
  <li class="list-group-item list-group-item-12 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/finding-our-way-again-south-africas-aids-journey">Finding our way again: South Africa's AIDS journey</a></span>  </div></li>
  <li class="list-group-item list-group-item-13 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/government-programmes-have-made-strides-aids-fight">Government programmes have made strides in AIDS fight</a></span>  </div></li>
  <li class="list-group-item list-group-item-14 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/opening-door-blacks-economy">Opening door for blacks into economy</a></span>  </div></li>
  <li class="list-group-item list-group-item-15 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/sa-economy-will-weather-storm">SA economy will weather the storm</a></span>  </div></li>
  <li class="list-group-item list-group-item-16 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/between-hope-and-despair-africa-i-want-see%E2%80%A6">Between hope and despair: the Africa I want to see…</a></span>  </div></li>
  <li class="list-group-item list-group-item-17 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/kids-rights-need-be-protected">Kids' rights need to be protected</a></span>  </div></li>
  <li class="list-group-item list-group-item-18 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/automotive-sector-investments-show-sa-still-has-appeal">Automotive sector investments show SA still has appeal</a></span>  </div></li>
  <li class="list-group-item list-group-item-19 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/sa-still-investors-dream">SA is still an investor's dream</a></span>  </div></li>
  <li class="list-group-item list-group-item-20 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/taking-stock-au-achievements">Taking stock of AU achievements</a></span>  </div></li>
  <li class="list-group-item list-group-item-21 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/sabcs-90-rule-will-fix-our-dismal-attitude-our-music">SABC's 90% rule will fix our dismal attitude to our music</a></span>  </div></li>
  <li class="list-group-item list-group-item-23 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/support-vital-spur-growth-township-entrepreneurs">Support vital to spur growth of township entrepreneurs</a></span>  </div></li>
  <li class="list-group-item list-group-item-24 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/national-awards-those-who-brought-honour-sa">National Awards to those who brought honour to SA</a></span>  </div></li>
  <li class="list-group-item list-group-item-25 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/passion-heroic-sacrifice">The passion of heroic sacrifice</a></span>  </div></li>
  <li class="list-group-item list-group-item-26 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/artistic-freedom-we-celebrate-freedom-month">Artistic freedom as we celebrate Freedom Month</a></span>  </div></li>
  <li class="list-group-item list-group-item-27 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/track-realising-south-african-dream">On track to realising the South African dream</a></span>  </div></li>
  <li class="list-group-item list-group-item-28 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/sa-among-leading-countries-respect-women-incarceration">SA among the leading countries in respect of women incarceration</a></span>  </div></li>
  <li class="list-group-item list-group-item-29 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/placing-education-under-spotlight">Placing education under the spotlight</a></span>  </div></li>
  <li class="list-group-item list-group-item-30 list-group-item-even list-group-item-last">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/students-changed-course-education">Students changed course of education</a></span>  </div></li>

       </li>
  <li class="list-group-item list-group-item-1 list-group-item-odd list-group-item-first">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/driving-transport-future">Driving transport into the future</a></span>  </div></li>
  <li class="list-group-item list-group-item-2 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/manufacturing-sector-can-drive-south-africa%E2%80%99s-global-competitiveness">Manufacturing sector can drive South Africa’s global competitiveness</a></span>  </div></li>
  <li class="list-group-item list-group-item-3 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/africa-rising-competitive-continent">Africa rising as a competitive continent</a></span>  </div></li>
  <li class="list-group-item list-group-item-4 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="/business<?php echo base_url()?>topic-increasingly-globally-competitive-destination">South Africa, an increasingly globally competitive destination</a></span>  </div></li>
  <li class="list-group-item list-group-item-5 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/clocks-still-ticking%E2%80%A6-time-act-now">Clock's still ticking… but time to act is now</a></span>  </div></li>
  <li class="list-group-item list-group-item-6 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/lets-all-join-uplift-economy">Let's all join in to uplift the economy</a></span>  </div></li>
  <li class="list-group-item list-group-item-7 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/make-big-difference-just-67-minutes">Make a big difference in just 67 minutes</a></span>  </div></li>
  <li class="list-group-item list-group-item-8 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/water-our-life-and-future">Water is our life and future</a></span>  </div></li>
  <li class="list-group-item list-group-item-9 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/women-get-leg-education-investment">Women get leg-up education investment</a></span>  </div></li>
  <li class="list-group-item list-group-item-10 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/let-madiba-ideals-spur-us-take-sa-forward">Let Madiba ideals spur us to take SA forward</a></span>  </div></li>
  <li class="list-group-item list-group-item-11 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/zumas-visit-raised-students-hopes">Zuma's visit raised students' hopes</a></span>  </div></li>
  <li class="list-group-item list-group-item-12 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/education-key-progress">Education: Key to progress</a></span>  </div></li>
  <li class="list-group-item list-group-item-13 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/transport-key-changing-lives">Transport is key to changing lives</a></span>  </div></li>
  <li class="list-group-item list-group-item-14 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/winter-76-led-momentous-change">The winter of '76 led to momentous change</a></span>  </div></li>
  <li class="list-group-item list-group-item-15 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/future-our-hands">The future is in our hands</a></span>  </div></li>
  <li class="list-group-item list-group-item-16 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/operation-fiela-will-intensify">Operation Fiela will intensify</a></span>  </div></li>
  <li class="list-group-item list-group-item-17 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/revitalising-road-networks">Revitalising road networks</a></span>  </div></li>
  <li class="list-group-item list-group-item-18 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/sa-open-business-smart-investment">SA is open for business as a smart investment</a></span>  </div></li>
  <li class="list-group-item list-group-item-19 list-group-item-odd">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/put-childrens-needs-first">Put children's needs first</a></span>  </div></li>
  <li class="list-group-item list-group-item-20 list-group-item-even">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/we-owe-it-mama-ruth-build-sacrifices-she-made">We owe it to Mama Ruth to build on the sacrifices she made</a></span>  </div></li>
  <li class="list-group-item list-group-item-21 list-group-item-odd list-group-item-last">  
  <div class="views-field views-field-title">        <span class="field-content"><a href="<?php echo base_url()?>pages/topic/looking-after-lifeblood-economy">Looking after lifeblood of economy</a></span>  </div></li>

</ul>
        </div> 