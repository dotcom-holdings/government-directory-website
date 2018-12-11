<div class="banners">                    
		
  <?php foreach ($classified_image_blog_right as $image_blog){ 
        $image_blog_link = $image_blog->name."<br><a href='http://".$image_blog->website."' target='_blank'>Visit Website</a>"; ?>
         <?php if($image_blog->id){?>
         	<div class="content">
				<a class="image_right" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_blog->id; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="img-responsive-blogs" src="<?php echo CDN_BASE_PATH.$image_blog->url; ?>"></a>

				<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_blog->url; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_blog->name; ?>"><img class="img-responsive-blogs" src="<?php echo CDN_BASE_PATH.$image_blog->url; ?>"></a>
				<?php }?>
        
        <script type="text/javascript">
          $(document).ready(function(){
                var href = "<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_blog->id; ?>";
                var id = <?php echo $image_blog->id; ?>;
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
            $('.image_right').click(function() {
                var href = $(this).attr("href");
                var id = href.substr(href.lastIndexOf('/') + 1);
                //do your tracking 
                $.ajax({
                  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
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