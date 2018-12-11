
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

  <div class="col-md-12">
            <h2 class="right-line no-margin-bottom">Services</h2>
        </div>
    <h6 style="color: #fff;">More Topics</h6>
    
	<ul class="list-group" style="height: 600px;overflow: scroll">
<li class="list-group-item" >
		
	
    <?php
    	$rss = new DOMDocument();
    	$rss->load('http://www.gov.za/services-feeds');
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
    	$limit = 10;
    	for($x=0;$x<$limit;$x++) {
    		@$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
    		@$link = $feed[$x]['link'];
    		@$description = $feed[$x]['desc'];
    		@$date = date('l F d, Y', strtotime($feed[$x]['date']));
    		echo '<h3><strong><a href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</h3></strong><br />';
    		echo '<p>'.$description.'</p>';
			echo '<hr>';
    	}
    ?>
</li>

</ul>
        </div> 