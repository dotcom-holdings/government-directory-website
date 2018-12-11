<!--
Right sidebar Page
Author : Leon van Rensburg


--> 
<div class="banners">

        <?php foreach ($classified_image_top_right as $image_right){
        $image_right_link = $image_right->name."<br><a href='http://".$image_right->website."' target='_blank'>Visit Website</a>"; ?>
         <?php if($image_right->id){?>
                 <div class="content" >
          <a class="image_right" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_right->id; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image img-responsive" style="border: solid 1px silver;border:solid black 1px;margin-bottom:10px;" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
          <?php } else {?>
        <a href="<?php echo CDN_BASE_PATH.$image_right->url; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_right->name; ?>"><img class="img-responsive" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>" style="border:solid black 1px;margin-bottom:10px;"></a>
        <?php }?>
        <script type="text/javascript">
          $(document).ready(function(){
                var href = "<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_right->id; ?>";
                var id = <?php echo $image_right->id; ?>;
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

     <div id="business-pages-book" style="border:solid 1px black;padding-top: 20px;padding:5px;border-radius:5px;margin-top:5px;margin-bottom:10px;">
        <img src="<?php echo HTTP_IMG_PATH; ?>digital_copy.jpg" alt="" />
        <h4>Government Directory eBook</h4>
        <a href="<?php echo HTTP_BASE_PATH ?>digitalcopy/index.html" target="_blank">View</a>
    </div>
    <!-- /digital-copy -->

    <!-- Mobile App Download Link -->
    <div class="appdownload" style="border: solid 1px black;border-radius:5px;margin-bottom:10px;padding-top:10px;">
      <center>
        <img class="img-responsive" src="<?php echo HTTP_IMG_PATH; ?>mobileapplogo.png">
      <h5>Download Our Mobile App</h5>
      <a href="https://play.google.com/store/apps/details?id=co.za.government.apps" target="_blank">
        <img class="img-responsive" src="<?php echo HTTP_IMG_PATH; ?>play_store.png">
      </a>
      <a href="https://itunes.apple.com/us/app/government-directory-app/id1169906935?ls=1&mt=8" target="_blank">
        <img class="img-responsive" src="<?php echo HTTP_IMG_PATH; ?>app_store.png">
      </a>
      <br>
      </center>
    </div>
    <!-- Mobile App Download Link -->

              <?php foreach ($classified_images_right as $image_right){
        $image_right_link = $image_right->name."<br><a href='http://".$image_right->website."' target='_blank'>Visit Website</a>"; ?>
         <?php if($image_right->id){?>
                 <div class="content">
          <a class="image_right" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_right->id; ?>"  rel="nofollow"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image img-responsive" style="border: solid 1px black;margin-bottom:10px;" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
          <?php } else {?>
        <a href="<?php echo CDN_BASE_PATH.$image_right->url; ?>" rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_right->name; ?>"><img class="img-responsive" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>" style="border:solid black 1px;margin-bottom:10px;"></a>
        <?php }?>
        <script type="text/javascript">
          $(document).ready(function(){
                var href = "<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_right->id; ?>";
                var id = <?php echo $image_right->id; ?>;
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


    <!-- /banners -->
<div id="video-ad" style="border:solid black 1px;margin-bottom:10px;border-radius:5px;">
  <h3 style="padding-left:40px;padding-top:5px;padding-bottom:5px; ">Video Ads</h3>
    <?php foreach ($videos as $video){?>
    <figure>
      <a href="https://www.youtube.com/watch/v/<?php echo $video->url; ?>" rel="nofollow" data-toggle="lightbox" data-gallery="youtubevideos" data-title="<?php echo $video->name;?>">
        <img width="300" height="180" style="width:100%;max-width: 100%;margin: auto;overflow: auto;border-radius: 4px;" src="<?php echo 'https://img.youtube.com/vi/'.$video->url.'/hqdefault.jpg'; ?>" class="img-responsive">
<!--        <i class="fa fa-play" style="position:relative;top:-100%;"></i>-->
      </a>
    </figure>
    <?php }?>
</div>
<!-- /video-ad -->


    <div id="twitter-updates" style="border: solid 1px black;border-radius:5px;padding:7px;padding-top:10px;padding-bottom:2px;height:420px;overflow-y: hidden;">
        <h3>Twitter Updates</h3>
        <a class="twitter-timeline" href="https://twitter.com/myadslive" data-widget-id="359956644781768707">Tweets by @myadslive</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <!-- /twitter-timeline -->
</div>
