
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
	$curl = curl_init('http://www.sanews.gov.za/south-africa/'.$topic.'');
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
    <h6>
    <a href="<?php echo base_url(); ?>pages/view/Topics">More Topics </a> 
    </h6>
	<ul class="list-group" style="height: 600px;overflow: scroll">
<li class="list-group-item" >
		<h6 style="color: #333">
	<?php 
	$regex2  = '/<div class="l-region l-content" role="main">(.*?)<\/div>/s';
	if ( preg_match($regex2 , $page, $list2 ) )
		echo $list2[0];
	else 
		print "Not found";
	?>
	</h6>
		<?php
			
	$regex = '/<div class="views-field views-field-body">(.*?)<\/div>/s';
	if ( preg_match($regex, $page, $list) )
		echo $list[0];
	else 
		print "Not found";
	
	
?>
       </li>

</ul>
        </div> 