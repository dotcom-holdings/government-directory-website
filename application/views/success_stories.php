
<style>
	.tenders-table{
		width: 100% !important;
	}
	
</style>
<div class="container" >

	<div class="col-md-4">
		<ul class="list-group">
			<li class="list-group-item" >
				<h2 class="right-line no-margin-bottom">Success Stories</h2>
				<?php
				$rss = new DOMDocument();
				$rss->load('http://www.sanews.gov.za/features.xml');
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
					echo '<form action="'.base_url().'pages/success" method="post">
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