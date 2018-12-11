
<style>
	.tenders-table{
		width: 100% !important;
	}
	
</style>
<div class="container" >

  <div class="col-md-12">
           <br><?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?>
            <h2 class="right-line no-margin-bottom">FAQs</h2>
        </div>
    <h6 style="color: #fff;">More Topics</h6>
     <h6><a href="<?php echo base_url()?>pages/view/faq_category" title="FAQ categories">FAQ categories</a></h6>
      <h4 style="color: #333;"><?php echo str_replace("-"," ",$cat);?> </h4>
	<ul class="list-group" style="height: 600px;overflow: scroll">
<li class="list-group-item" >
	
    <?php
		
    	$rss = new DOMDocument();
    	$rss->load('http://www.gov.za/taxonomy/term/'.$topic.'/all/feed');
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
    	$limit = 15;
    	for($x=0;$x<$limit;$x++) {
    		@$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
    		@$link = $feed[$x]['link'];
    		@$description = $feed[$x]['desc'];
    		@$date = date('l F d, Y', strtotime($feed[$x]['date']));
    		echo '<p><strong><a href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a></strong><br />';
    		echo '<p>'.$description.'</p>';
			echo '<hr>';
    	}
    ?>
</li>

</ul>
        </div> 