<?php
$this->load->view('vwHeader');
?>
<!--  
Home Page
Author : Leon van Rensburg 

-->
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
        <a class="top_ad" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>" rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
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
  <div class="row content">

    <!-- Left sidebar -->
    <div id="sidebar-left" class="col-lg-3">
      <?php include 'left_sidebar.php'; ?>
    </div>

    <div id="content" class="col-lg-6"> 
    <div class="banner">

    
<div id="details">

    
      <?php if ($webUrl) { ?>
        <a href="http://<?php echo $webUrl;?>" title="<?php echo $company->name;?>" class="left" target="_blank">
        <img width="150" height="100" src="<?php echo $image;?>" alt="<?php echo $company->name;?>" class="view-company-logo" style="width:150px; height:100px; border: solid 1px;" />
      </a>
      <?php } else {?>
        <a href="<?php echo $image;?>" title="<?php echo $company->name;?>" class="lightbox left">
          <img width="150" height="100" src="<?php echo $image;?>" alt="<?php echo $company->name;?>" class="view-company-logo" style="width:150px; height:100px; border: solid 1px;" />
        </a>
      <?php } ?>
    
    <h1 class="left"><?php echo $company->name;?></h1>

    <div class="clear"></div> <!-- clear -->

    <ul>
        <?php if($telephone) {?>
                <li><b><i class="fa fa-phone-square"></i>&nbsp;</b> <?php echo $telephone;?></li>
            <?php }?>
                <li>
                  <b>
                    <i class="fa fa-map-marker"></i>&nbsp;
                  </b>
                  <a href="http://maps.google.com/maps?q=<?=$address?>" target="_blank">
                    <?php echo $address;?>
                      
                  </a>
                  
                </li>
            
                <?php if($company->paddress) {?>
                <li>
                <b><i class="fa fa-envelope-o"></i>&nbsp;</b> 
                <?php echo $company->paddress;?>        </li>
                <?php }?>
            <?php if($company->mobile) {?>
                <li><b><i class="fa fa-mobile"></i>&nbsp;</b><?php echo $company->mobile;?></li>
                <?php }?>
            <?php if($company->fax) {?>
                <li><b><i class="fa fa-print"></i>&nbsp;</b><?php echo $company->fax;?></li>
                <?php }?>
            <?php if($company->email) {
              $email = explode(",",$company->email);?>
                <li>
                  <b><i class="fa fa-envelope"></i>&nbsp;</b>
                <?php for($x=0;$x<sizeof($email);$x++){?>
                    <a id="email" href="mailto:<?php echo str_replace(' ','',$email[$x]);?>"><?php echo $email[$x];?></a>&nbsp;&nbsp;
                <?php }?>
                </li>
            <?php }?>

                <?php if($company->website) {
                $website = explode(",",$company->website);?>
                <li><b><i class="fa fa-globe"></i>&nbsp;</b>
                <?php for($x=0;$x<sizeof($website);$x++){?>
                <a id="web" href="http://<?php echo str_replace(' ','',$website[$x]);?>" target="_blank"><?php echo $website[$x];?></a>&nbsp;&nbsp;
                <?php }?>
                </li>
                <?php }?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#web').click(function() {
                              var href = $(this).attr("href");
                              var id = <?php echo $company->id;?>;
                              //do your tracking 
                              $.ajax({
                                  url: '<?php echo base_url() ?>home/update_stats',
                                  data: {"link" : $(this).attr("href"),
                                         "ad_type" : "",
                                         "company_web_visited" : id},
                                  type: 'post',
                                  complete: function(){
                                      //now do the redirect
                                  } 
                             });
                        }); 
                    });
                    </script>

<?php if (!empty($company->facebook)) {?>
  <style type="text/css">
    i.fa.fa-facebook-official 
    {
      font-size: xx-large;
    }
    i.fa.fa-twitter-square
    {
      font-size: xx-large;
    }
    i.fa.fa-youtube-play
    {
      font-size: xx-large;
    }
  </style>
  <li style="width: 7%;float: left;display: inline-block;"> 
    <a href="https://www.facebook.com/<?= $company->facebook ?>" target="_blank">
      <i class="fa fa-facebook-official" aria-hidden="true"></i>
    </a>
  </li>
<?php }?>

<?php if (!empty($company->twitter)){ ?>
  <li style="width: 7%;float: left;display: inline-block;"> <a href="https://www.twitter.com/<?= $company->twitter ?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
<?php }?>

<?php if (!empty($company->youtube)){ ?>
  <li style="width: 7%;float: left;display: inline-block;"> <a href="https://www.youtube.com/watch?v=<?= $company->youtube ?>" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
<?php } ?>
        
        
    </ul>
    <br />
    <br />
    
    <?php if($company->about_us) { ?>
        <p><b><i class="fa fa-file-text"></i>&nbsp;About Us: </i></b>&nbsp;<?php echo $company->about_us;?></p>
        <?php } ?>

          <?php if (count($company_adverts) == 0){} else{?>
            <!-- Ekko lightbox modal -->             
            <h5>View Advert <span style="font-size: 13px">( click below to view )</span></h6>
            <?php foreach ($company_adverts as $adverts){ ?>
              <!-- if company has one or more adverts -->
             
               <a class="ad-btn-primary" href="<?php echo CDN_BASE_PATH.$adverts->url; ?>" data-toggle="lightbox" data-title="<?php echo $company->name;?>">
                <img style="border: solid 1px #ccc; height: 100px;width: 100;margin-bottom: 10px;margin-right: 10px" src="<?php echo CDN_BASE_PATH.$adverts->url; ?>">
              </a>
             
            <?php } ?>       

           <?php }?>

         
          <br />

        
        <script type="text/javascript">
            $(document).ready(function(){
                $('.btn-primary').click(function() {
                      var href = $(this).attr("href");
                      var id = <?php echo $company->id;?>;
                      //do your tracking 
                      $.ajax({
                          url: '<?php echo base_url() ?>home/update_stats',
                          data: {"link" : $(this).attr("href"),
                                 "ad_type" : "advert",
                                 "company_ad_visited" : id},
                          type: 'post',
                          complete: function(){
                              //now do the redirect
                          } 
                     });
                }); 
            });
            </script>
        
        <?php if($company->profile){?>
            <h5>Company Profile</h5>
            <p><a href="<?php echo CDN_BASE_PATH.$company->profile;?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $company->name;?>"><i class="btn btn-info" style="margin-left:5px;">View Profile</i></a></p>
        
        <?php }?>
        
        <?php if($viewpage_banner) {?>
          <p> 
            <img style="width:100%;height:100%;border:solid black 1px;" src="<?php echo CDN_BASE_PATH; ?><?php echo $viewpage_banner;?>">      
          </p>
        <?php } else{?>
          <p> 
            <img style="width:100%;height:100%;border:solid black 1px;" src="<?php echo HTTP_IMG_PATH; ?>vp_placeholder.jpg">      
          </p>
        <?php } ?>

          <?php if (empty($viewpage_banner)) { ?>
            <p> 
              <img style="display: none;border:solid black 1px;" src="<?php echo HTTP_IMG_PATH; ?>vp_placeholder.jpg">      
            </p>
          <?php } else{?>
            <p> 
              <img style="width:100%;height:100%;border:solid black 1px;" src="<?php echo HTTP_IMG_PATH; ?>vp_placeholder.jpg">      
            </p>
          <?php } ?>
        
        <?php if($company->video && $company->video!=''){?>
            <!--<div class="col-lg-12">&nbsp;</div>-->
            <p style="margin-top:-2%;"> 
                <iframe title="YouTube video player" class="youtube-player" type="text/html" 
 frameborder="0" style="overflow:hidden;height:38vh;width:100%" height="100%" width="100%" src="https://www.youtube.com/embed/<?php echo $company->video; ?>"
 frameborder="0" allowFullScreen></iframe> 
            </p>
            <?php }?>
        
</div>

<!-- /#details -->

<div class="footer">
    
             <div class="col-lg-12">
                                <h4>Contact Us:</h4> 
                                <p>If you have business enquiries or other questions, please fill out the following form to contact us. Thank you.</p>       
                              </div>


                              <div class="col-lg-12">
                                   <form method="post" action="<?php echo base_url(); ?>home/company/<?php echo $company->id; ?>/contact"> 
                                      <div id="padding" class="col-lg-12">
                                        <fieldset class="form-group">
                                          <label for="name">Name</label>
                                          <input type="text" class="form-control" name="name" placeholder="Your name" value="<?php echo $alert==""?set_value('name'):'';?>">
                                        </fieldset>
                                      </div>

                                      <div id="padding" class="col-lg-12">
                                        <fieldset class="form-group">
                                          <label for="email">Email address</label>
                                          <input type="text" class="form-control" name="email" placeholder="Your eMail" value="<?php echo $alert==""?set_value('email'):'';?>">
                                        </fieldset>
                                      </div>


                                      <div id="padding" class="col-lg-12">
                                        <fieldset class="form-group">
                                          <label for="exampleTextarea">Message</label>
                                          <textarea class="form-control" name="message" placeholder="Enter message here..." rows="3"><?php echo $alert==""?set_value('message'):'';?></textarea>
                                        </fieldset>
                                      </div>

                                      <div class="col-lg-12">
                                         <div class="g-recaptcha" data-sitekey="6LfL_ycTAAAAAJNwgyc6oFjTYglftK5SAtHVgcNa"></div> 
                                      </div>
                                      <div class="col-lg-12">
                                        &nbsp;
                                      </div>
                    <div class="col-lg-12">
                                        <button type="submit" name="submit" class="btn btn-primary" value="1">Submit</button>
                                      </div>

                                  </form>
                              </div>
                              <div id="showcompany-map">
                <?php $address = preg_replace("/[^A-Z a-z]/", "", $address );?>
                <img class="showcompany-map" src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $address;?>&amp;zoom=15&amp;size=520x250&amp;maptype=roadmap&amp;markers=color:yellow%7Clabel:B%7C|<?php echo $address;?>&amp;sensor=false&amp;key=AIzaSyAgd_OW7hB8diI-BpXBskhTs3GAW0gyarU" width="100%" height="250">
              </div>

    
</div>
<!-- /.footer -->

<script type="text/javascript">
$(document).ready( function() {
    
   $('a[href^="#"]').click(function(e) {
//      $("html, body").delay(1000).animate({scrollTop: $('.post').offset().top }, 2000);
//       // e.preventDefault();
   });  
 //    $(document).ready(function () {
  //  $("html, body").animate({scrollTop: $('.post').offset().top }, 700);
  // }); 
});
</script>
<h2>Featured Listings</h2>
<div id="yw0" class="list-view">
<div class="summary"></div>

<div class="items">

    <div class="table-responsive">
    
    <table class="display listing_table" cellspacing="0" width="100%">
      <thead><tr><th></th></tr></thead>
      <tbody>
    <?php foreach ($featured_listings as $featured){ 
      $telephone = $featured->telephone;
      // $telephone = explode(',',$telephone);
      // $telephone = $telephone[0];
      // $telephone = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3', $telephone). "\n";
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

  <div class="news-widget" style="height:340px;overflow-y:scroll;">
  
    <h2 class="news-widget__h">Latest News</h2>
  
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
<!-- /#news -->
    </div>
</div>

    <!-- Right sidebar- -->
    <div id="right_sidebar" class="col-lg-3">
        <?php include 'right_sidebar.php'; ?>
    </div>

  </div>
</div>
    
<?php
$this->load->view('vwFooter');
?>