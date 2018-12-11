
<style>
	.tenders-table{
		width: 100% !important;
	}
	
</style>
<div class="container" >
	<br><?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?>
	<h1 style="color: #333">Vacancies & Jobs</h1>
	<h6 style="color: #333">Central Government Administration</h6>
	<ul class="list-group" style="height: 600px;overflow: scroll">
<li class="list-group-item" >
		
		<?php
			$year=@date('Y');
	$curl = curl_init('https://nationalgovernment.co.za/vacancies/1/central-government-administration');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

	$page = curl_exec($curl);

	if(curl_errno($curl)) // check for execution errors
	{
		echo 'Scraper error: ' . curl_error($curl);
		exit;
	}

	curl_close($curl);

	$regex = '/<div class="provinces">(.*?)<\/div>/s';
	if ( preg_match($regex, $page, $list) )
		echo $list[0];
	else 
		print "Not found";
?>
       </li>

</ul>
        </div> 