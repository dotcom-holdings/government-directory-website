
<style>
	.tenders-table{
		width: 100% !important;
	}
	n
	}
</style>
<div class="container" >
<div class="col-md-9"><br>
	<?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?>
	<h1 style="color: #333">Tender Support</h1>
<h6 style="color: #333">
	<a href="<?php echo base_url()?>pages/tenders/tips">Tips for Tendering </a>|
	<a href="<?php echo base_url()?>pages/view/etenders_category">Category Information</a>|
	<a href="<?php echo base_url()?>pages/tenders/financial">Financial Support</a> | 
	<a href="<?php echo base_url()?>pages/tenders/non-financial">Non-financial Support</a>|
	<a href="<?php echo base_url()?>pages/view/tender_info">General Information</a>| 
	<a href="<?php echo base_url()?>pages/view/how_to_tender">How to tender</a>| 
	<a href="<?php echo base_url()?>pages/view/etenders_docs">Tender Documents </a>|
	<a href="<?php echo base_url()?>pages/view/etenders">Advertised Tenders</a>| 
	<a href="<?php echo base_url()?>pages/view/etenders_awarded">Awarded Tenders</a>| 
	<a href="<?php echo base_url()?>pages/view/etenders_closed">Closed Tenders</a>|
	<a href="<?php echo base_url()?>pages/view/etenders_cancelled">Cancelled Tenders</a>
</h6>
	
	<ul class="list-group" style="height: 600px;overflow: scroll">
<li class="list-group-item">
		<?php
			$year=@date('Y');
	$curl = curl_init('https://www.westerncape.gov.za/tenders/support/'.$type.'');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

	$page = curl_exec($curl);

	if(curl_errno($curl)) // check for execution errors
	{
		echo 'Scraper error: ' . curl_error($curl);
		exit;
	}

	curl_close($curl);

	$regex = '/<div class="field-item even">(.*?)<\/div>/s';
	if ( preg_match($regex, $page, $list) )
		echo $list[0];
	else 
		print "404 : Site Maintenance";
?>
       </li>

</ul>
        </div> 
         <style type="text/css">
<!--
#tender_container{
    width:325px;
    height:670gpx;
    border:0 solid;
    overflow:scroll;
    margin:auto;
}
#tender_container iframe {
    width:500px;
    height:1040px;
    margin-left:-235px;
    margin-top:-420px;   
    
 }
	h2 {
  color: #999;
  font-size: 24px;
}
-->
</style>
<div class="col-md-3">
<h1 style="color: #333">Latest Tenders</h1><br>
<div id="tender_container">
<iframe src="http://www.gpwonline.co.za/Gazettes/Pages/Published-Tender-Bulletin.aspx?p=1" scrolling="no"></iframe>
</div>
</div>
        
  </div>
  
       
                