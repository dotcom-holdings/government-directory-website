<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php  include("menu2.php"); ?> 
<div class="container" >
<br/>

 <div id="sidebar-left" class="col-lg-3" style="padding-left:0px;">
    	<?php include 'left_sidebar.php'; ?>
    </div>
	<div class="col-md-6">
             <?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?><br><br>
        </div>
	<h3 style="color: #333">
	<br>
<style>
.title
	{
		font-weight: bold;
	}
</style>	
	<?php
			
	$curl = curl_init($link);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

	$page = curl_exec($curl);

	if(curl_errno($curl)) // check for execution errors
	{
		echo 'Scraper error: ' . curl_error($curl);
		exit;
	}

	curl_close($curl);

	$regex = '/<h1 class="page-title title" id="page-title">(.*?)<\/h1>/s';
	if ( preg_match($regex, $page, $list) )
		echo '<strong>'. $list[0].'</strong>';
	else 
		print "404 : Site Maintenance";
?>
		
	</h3>
	
	
	<ul class="list-group" style="margin-left:0px;height: 910px;overflow: scroll;width:70%;">
<li class="list-group-item">
		<?php
			$year=@date('Y');
	$curl = curl_init($link);
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
		print "404 : Site Maintenance";
?>
       </li>

</ul>
        </div> <br>
<br>
