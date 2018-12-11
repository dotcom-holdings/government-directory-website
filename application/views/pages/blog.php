<style>
	.tenders-table{
		width: 100% !important;
	}
	
</style>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<?php  include("menu2.php"); ?> 
<div class="container" >
<br/>
 
  <div id="sidebar-left" class="col-lg-3" style="padding-left:0px;">
    	<?php include 'left_sidebar.php'; ?>
    </div>
 
  <div class="col-md-8"><br/>
               <?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?><br><br>
            <h2 class="right-line no-margin-bottom"><strong>Blog</strong></h2>
      
<!--    <h6 style="color: #fff;">More Topics</h6>-->
    
<style>
.myauto
	{
		 
	}
	  
</style>

       <div class="col-md- myauto" style="height: 2830px;overflow-y:scroll;">
        <?php
    	$rss = new DOMDocument();
    	$rss->load('http://www.pa.org.za/blog/feed.rss');
    	$feed = array();
    	foreach ($rss->getElementsByTagName('item') as $node) {
    		$item = array ( 
    			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
    			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
    			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
    			);
    		array_push($feed, $item);
    	}
    	$limit = 9;
    	for($x=0;$x<$limit;$x++) {
    		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
    		$link = $feed[$x]['link'];
    		$description = $feed[$x]['desc'];
    		echo '<p><strong><h3><a href="'.$link.'" title="'.$title.'" target="_blank">'.$title.'</a></h3></strong>';
    		echo '<div style="height:350px;overflow-y: scroll;line-height:25px;">'.$description.'</div>';
			echo '<hr>';
    	}
    ?>
	  </div> </div>   </div>