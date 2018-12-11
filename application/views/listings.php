<?php
$this->load->view('vwHeader');
?>
<!--
Home Page
Author : Leon van Rensburg

-->

<title><?=$category?> <?=$city!=''?'in '.$city:''?></title>

<style>
.container-fluid
	{
		display: none;
	}
</style>

<script type="text/javascript">
  $.ajax({
    url: '<?php echo base_url() ?>home/update_stats',
    data: {"ad_type" : "",
       "company_ad_shown" : 0},
    type: 'post',
    complete: function(){
    }
 });
</script>

  <div class="container">
    <div class="content slick-carousal1" id="main-content">
            <?php foreach ($classified_images_top as $image_top){
        $image_top_link = $image_top->name."<br><a href='http://".$image_top->website."' target='_blank'>Visit Website</a>"; ?>
        <div class="banner-widget">
         <?php if(!empty($image_top->promotions_ad_link)){?>
          <a class="top_ad" target="_blank" href="<?php echo $image_top->promotions_ad_link; ?>" rel="follow" id="pop"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
          <?php } else {?>
        <a class="top_ad" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>" rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top->name; ?>"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
        <?php }?>
        <script type="text/javascript">
          $(document).ready(function(){
                var href = "<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>";
                var id = <?php echo $image_top->id; ?>;
                //do your tracking
                $.ajax({
                  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
                  data: {"link" : href,
                     "ad_type" : "promotion_classified",
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
            $('.top_ad').click(function() {
                var href = $(this).attr("href");
                var id = href.substr(href.lastIndexOf('/') + 1);
                //do your tracking
                $.ajax({
                  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
                  data: {"link" : $(this).attr("href"),
                     "ad_type" : "promotion_classified",
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
<script type="text/javascript">
$(document).ready(function(){
  $('.top_ad').click(function() {
      var href = $(this).attr("href");
      var id = href.substr(href.lastIndexOf('/') + 1);
      //do your tracking
      $.ajax({
        url: '<?php echo base_url() ?>home/update_stats',
        data: {"link" : $(this).attr("href"),
           "ad_type" : "promotion_classified",
           "company_ad_visited" : id},
        type: 'post',
        complete: function(){
          //now do the redirect
        }
     });
  });
});
</script>
<!-- /banner -->
  </div>


<div class="container">
  <?php  include("menu2.php"); ?> 

  <div class="row content">

    <!-- Left sidebar -->
<!--
 <div id="sidebar-left" class="col-lg-3">
      <?php //include 'left_sidebar.php'; ?>
      
 </div>
-->
 <div id="sidebar-left" class="col-lg-3" style="padding:15px;">
    	<?php include 'left_sidebar.php'; ?>
    </div>
   

   

    
   <div id="content" class="col-lg-6">
    <div class="banner">


<h4>Results For: <b><?=$category?> <?=$city!=''?'in '.$city:''?></b></h4>
<?php if($listings_count>200 && $city==''){?>
<div> 
<form method="post" id="post_city" action="<?php echo base_url(); ?>home/by_cat/<?php echo $cat_id; ?>/by_city">
    <label>Showing 200 of <?=$listings_count?> listings. Choose a city to refine further</label>
    <?php echo form_dropdown('city_id', $city_dd_data, set_value('city_id'),"class='form-control' style='width:50%' onchange='if(this.value != 0) { this.form.submit(); }'"); ?>
</form>
</div>
<? }?>


<div id="yw0" class="list-view">
<div class="summary"></div>

<div class="items">

    <div class="table-responsive">

    <table class="display listing_table" cellspacing="0" width="100%">
      <thead><tr><th></th></tr></thead>
      <tbody>
    <?php foreach ($featured_listings as $featured){
      $telephone = $featured->telephone;
      $telephone = explode(',',$telephone);
      $telephone = $telephone[0];
      $telephone = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3', $telephone);
      //check logo image file
      if(!$featured->logo)
        $image = CDN_BASE_PATH.'uploads/noimage.jpg';
      else
        $image = CDN_BASE_PATH.$featured->logo;
        ?>
        <tr>

            <td>
            <div class="view">
            <a class="listing_ad" href="<?php echo HTTP_BASE_PATH.'home/company/'.$featured->id; ?>"  rel="follow">
            <img width="130" src="<?php echo $image;?>" alt="<?php echo $featured->name;?>"/>
            </a>

            <div class="info">
                <h4 class="short">
                    <a class="listing_ad" href="<?php echo HTTP_BASE_PATH.'home/company/'.$featured->id; ?>"  rel="follow"><?php echo $featured->name;?></a>
                </h4>

                <address class="short">
                <i class="fa fa-map-marker"></i>
                <?php echo $featured->address;?>
                </address>

                <div class="phone">
                <i class="fa fa-phone"></i>
                <?php echo $telephone?>
                </div>
             </div>

            </div>
          </td>
          </tr>
          <script type="text/javascript">
        $(document).ready(function(){
              var id = <?php echo $featured->id;?>;
              //do your tracking
              $.ajax({
                url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
                data: {"link" : "<?php echo HTTP_BASE_PATH; ?>home/company/<?php echo $featured->id;?>",
                   "ad_type" : "listing",
                   "company_listing_shown" : id},
                type: 'post',
                complete: function(){
                  //now do the redirect
                }
          });
        });
        </script>
        <?php }?>
        <script type="text/javascript">
        $(document).ready(function(){
          $('.listing_ad').click(function() {
              var href = $(this).attr("href");
              var id = <?php echo $featured->id;?>;
              //do your tracking
              $.ajax({
                url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
                data: {"link" : "<?php echo HTTP_BASE_PATH; ?>home/company/<?php echo $featured->id;?>",
                   "ad_type" : "listing",
                   "company_listing_visited" : id},
                type: 'post',
                complete: function(){
                  //now do the redirect
                }
             });
          });
        });
        </script>
        </tbody>
      </table>

    </div>
 </div>
</div>

  <div class="news-widget" style="">

    <h2 class="news-widget__h">Latest News</h2>

       <div >
        <?php for($x=0;$x<sizeof($news);$x++){ ?>
            <article>
                <h5 class="news-widget__title"><?=strlen($news[$x]['title']) > 50 ? substr($news[$x]['title'], 0, 50) . '...' : $news[$x]['title']?></h5>
                <div class="news-widget__content">
                <?=strlen($news[$x]['description']) > 450 ? substr($news[$x]['description'], 0, 750) . '...' : $news[$x]['description']?>
                </div>
                <a href="<?=$news[$x]['link']?>" class="news-widget__more" target="_blank">Read More</a>
            </article>
    <?php }?>
      </div>
  </div>
<!-- /#news -->
    </div>
</div>

    <!-- Right sidebar -->
    <div id="right_sidebar" class="col-lg-3">
        <?php include 'right_sidebar.php'; ?>
    </div>

  </div>
</div>

<?php $this->load->view('vwFooter'); ?>
