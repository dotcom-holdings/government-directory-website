    <div id="categories" style="padding:0px;">
<a href="http://www.adslive.com/" target="_blank">
  <img src="<?php echo HTTP_IMG_PATH;?>final.gif" style="width:100%;height:550px;border:solid black 1px;"/> </a>
    </div>
    <script type="text/javascript">
		$(document).ready(function(){
			$('.catg').click(function() {
				  var href = $(this).attr("href");
				  var id = href.substr(href.lastIndexOf('/') + 1);
				  //do your tracking 
				  $.ajax({
					  url: '<?php echo base_url() ?>home/update_stats',
					  data: {"link" : $(this).attr("href"),
							 "ad_type" : "category_click",
							 "category_clicked" : id},
					  type: 'post',
					  complete: function(){
						  //now do the redirect
					  } 
				 });
			});	
		});
		</script>
    <!--categories--> 
    
    <div class="banners">
    	<!-- Company Classified Banner -->

        <!-- if classified has a banner promo link show it -->
        <?php if($classified_banner) {
	        $webUrl = explode(",",$webUrl);?>
	        	<!-- 
	        		classified banner promo link to company
					website
	        	-->
	        <?php if ($banner_promo_link){ ?>
	        		<a id="web" href="<?php echo $banner_promo_link;?>" target="_blank">
			        <img src="<?php echo CDN_BASE_PATH; ?><?php echo $classified_banner; ?>" style="border:solid black 1px;">	        	
			        </a>
	        	<?php } else { ?>
	        	<!-- 
	        		else just show normal classified banner 
					with company website or link to company
					listing
	        	 -->
	        		<?php for($x=0;$x<sizeof($webUrl);$x++){?>
	        			<a id="web" href="http://<?php echo str_replace(' ','',$webUrl[$x]);?>" target="_blank">
		        			<img src="<?php echo CDN_BASE_PATH; ?><?php echo $classified_banner; ?>" style="border:solid black 1px;">	        	
		        		</a>
	        		<?php }?>
	        	<?php }?>
        <?php } ?>


        <!-- Company Classified Banner ENDS -->


    			<?php foreach ($classified_images_left as $image_left){ 
				$image_left_link = $image_left->name."<br><a href='http://".$image_left->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_left->id){?>
                 <div class="content">
					<a class="image_left" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_left->id; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image" style="margin-bottom:30px;height:237px;border:solid black 1px;" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_left->url; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_left->name; ?>"><img class="carousal" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>" style="border:solid black 1px;"></a>
				<?php }?>
				<script type="text/javascript">
					$(document).ready(function(){
							  var href = "<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_left->id; ?>";
							  var id = <?php echo $image_left->id; ?>;
							  //do your tracking 
							  $.ajax({
								  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : href,
										 "ad_type" : "classified",
										 "company_ad_shown" : id},
								  type: 'post',
								  complete: function(){
									  //now do the redirect
								  } 
						});	
					});
					</script>
                <script type="text/javascript">
					$(document).ready(function(){
						$('.image_left').click(function() {
							  var href = $(this).attr("href");
							  var id = href.substr(href.lastIndexOf('/') + 1);
							  //do your tracking 
							  $.ajax({
								  url: '<?php HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : $(this).attr("href"),
										 "ad_type" : "classified",
										 "company_ad_visited" : id},
								  type: 'post',
								  complete: function(){
									  //now do the redirect
								  } 
							 });
						});	
					});
					</script>
                </div>
            	<?php }?>
            
            
    </div>
    <!-- banners -->