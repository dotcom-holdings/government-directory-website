
<div class="container margin-top">
   
    <div class="row">
      
       <div class="col-md-12">
            <h2 class="right-line no-margin-bottom" >Job Related</h2>
        </div>
        <div class="col-md-9">

	<h1>Salaries and benefits</h1>
	<ul class="list-group" style="height: 500px;overflow: scroll">
<li class="list-group-item">
		<?php
			$year=@date('Y');
	$curl = curl_init('https://www.westerncape.gov.za/jobs/Policies');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

	$page = curl_exec($curl);

	if(curl_errno($curl)) // check for execution errors
	{
		echo 'Scraper error: ' . curl_error($curl);
		exit;
	}

	curl_close($curl);
	
	
		$regex = '/<div class="field field-name-body field-type-text-with-summary field-label-hidden">(.*?)<\/div>/s';
	
	
		if ( preg_match($regex, $page, $list) )
		echo $list[0];
	else 
		print "Not found";
	
?>
      

       </li>

</ul>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12 col-sm-4">
				
<ul class="list-group" style="padding-top: 73px">
                   
                    <li class="list-group-item active">Jobs</li></ul>
                    <ul class="list-group" style="height: auto;">
<li class="list-group-item"><a href="csa">How to create a CV</a></li>
                </div>
            </div>
        </div></div>
        </div> 
