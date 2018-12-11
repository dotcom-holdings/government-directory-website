
<style>
	.tenders-table{	width: 100% !important;	}
</style>
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
<br/><br/><br/><br/><br/><br/><br/><br/>
<br>
<br>
<br>
<div class="container" ><br/><br/><br/><br/>

  <?php  include("menu2.php"); ?> 
<div class="col-md-9"><br>

<br>

	<?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?>

	<h1 style="color: #333"><strong>Tender Support</strong></h1>

	<?php include 'links.php';?>
	
	<ul class="list-group" style="height: 600px;overflow: scroll">
<li class="list-group-item">
		<?php
			$year=@date('Y');
	   
	 
	   
	$curl = curl_init('https://www.westerncape.gov.za/tenders/support/tips');
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


<div class="col-md-3">
<!--<h3 style="color: #333">Latest Tenders</h3><br>--><br>
<br><br/><br/>


<div id="tender_container">
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<iframe src="http://www.gpwonline.co.za/Gazettes/Pages/Published-Tender-Bulletin.aspx?p=1" scrolling="no"></iframe>
</div>
</div>
        
  </div>
  
       
                