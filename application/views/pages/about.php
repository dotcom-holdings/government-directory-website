<style>
.post-content{
	display: -webkit-flex;
display: -moz-flex;
display: -ms-flex;
display: -o-flex;
display: flex;
-webkit-flex-direction: column-reverse;
-moz-flex-direction: column-reverse;
-ms-flex-direction: column-reverse;
-o-flex-direction: column-reverse;
flex-direction: column-reverse;
}
	
	h2 {
  font-weight: bold;
  color: #fff;
  font-size: 24px;
}
	
</style>
<div class="container">
	<h1>South Africa Gazettes 2017</h1>
	<ul class="list-group">
<li class="list-group-item">
		<?php
			$year=@date('Y');
	$curl = curl_init('https://opengazettes.org.za/gazettes/ZA-NL/'.$year.'');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

	$page = curl_exec($curl);

	if(curl_errno($curl)) // check for execution errors
	{
		echo 'Scraper error: ' . curl_error($curl);
		exit;
	}

	curl_close($curl);

	$regex = '/<div class="post-content">(.*?)<\/div>/s';
	if ( preg_match($regex, $page, $list) )
		echo $list[0];
	else 
		print "Not found";
?>
       ...</li>

</ul>
        </div> 