
<style>
	.tenders-table{
		width: 100% !important;
	}
	
</style>
<br/><br/><br/><br/><br/><br/><br/><br/>
<br/>
<br/ >
<br/ >
<br/ >
<br/ >
<div class="container" >
<br/><br/>
	
<?php  include("menu2.php"); ?> 
  <div class="col-md-"> <br/>
           
    <div id="sidebar-left" class="col-lg-3" style="padding-left:0px;">
    	<?php include 'left_sidebar.php'; ?>
    </div>	
 
           
               
            <br><?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?>
            <h2 class="right-line no-margin-bottom"><strong>Latest Press Releases</strong></h2>
        </div>
<!--    <h6 style="color:black;">More Topics</h6>-->
   <style>
	#cont img
	   {
		   margin-bottom: 20px;
	   }
   </style> 
	
	<div class="col-md-8" style="height: 2850px;overflow: scroll;">
    <?php
    	$rss = new DOMDocument();
    	$rss->load('http://feeds.feedburner.com/Pressportal-PoliticsLawArtsSociety');
    	$feed = array();
    	foreach ($rss->getElementsByTagName('item') as $node) {
    		$item = array ( 
    			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
    			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
    			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
    			);
    		array_push($feed, $item);
    	}
    	$limit = 10;
    	for($x=0;$x<$limit;$x++) {
		
		echo "<div style='border:solid 1px silver;padding-left:30px;padding-right:10px;border-radius:10px;margin-bottom:5px;line-height:25px;margin-left:-15px;' id='cont'>";	
			
    		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
    		$link = $feed[$x]['link'];
    		$description = $feed[$x]['desc'];
    		echo '<p><strong><h5>'.$title.'</h5></strong><br/>';
    		echo '<p>'.$description.'</p>';
			echo '<form action="'.base_url().'home/press" method="post">
					<input type="hidden" value="'.$link.'" name="link">
					<button  name="submit" type="submit" class="btn btn-ar btn-primary" style="padding-left:5px;padding-right:5px;">Read More</button>
				</form><br />
			
			
			
			';
		echo '</div>';
    	}
    ?>
        </div> </div> 