
<style>
	.tenders-table{
		width: 100% !important;
	}
	
</style>


<br>
<br>
<br>
<br>
<br>
<br><br><br>
<br>
<br>
<br>
<br>
<br><br>

	
<?php  include("menu2.php"); ?> 

<div class="container" >
<br>

      
    <div id="sidebar-left" class="col-lg-3" style="padding-left:0px;">
    	<?php include 'left_sidebar.php'; ?>
    </div>
  <div class="col-md-8" >
            <br><?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?>
            <h2 class="right-line no-margin-bottom"><strong>Success Stories</strong></h2>
 
<!--    <h6 style="color: #fff;">More Topics</h6>-->
    
	<ul class="list-group" style="height: 2850px;overflow: scroll;">
    <li class="list-group-item" >
	
    <?php
    	$rss = new DOMDocument();
    	$rss->load('https://www.sanews.gov.za/south-africa-news-stories.xml');
    	$feed = array();
    	foreach ($rss->getElementsByTagName('item') as $node) {
    		$item = array ( 
    			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
    			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
    			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
    			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
    			);
    		array_push($feed, $item);
    	}
	
    	$limit = 7;
    	for($x=0;$x<$limit;$x++) {
    		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
    		$link = $feed[$x]['link'];
    		$description = $feed[$x]['desc'];
    		$date = date('l F d, Y', strtotime($feed[$x]['date']));
    		echo '<p><strong><h3><a href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a></h3></strong>';
    		echo '<small><em>Posted on '.$date.'</em></small></p>';
    		echo '<p>'.$description.'</p>';
			echo '<form action="'.base_url().'home/success" method="post">
					<input type="hidden" value="'.$link.'" name="link">
					<button  name="submit" type="submit" class="btn btn-ar btn-primary">Read More</button>
				</form><br />';
			echo '<hr>';
    	}
    ?>
</li>

</ul>
        </div> 
        
      </div>   
        
        
        
        <br><br>
