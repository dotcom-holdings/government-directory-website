<META NAME="robots" CONTENT="noindex,nofollow"> 
<!--  
Show Company in Lightbox
Author : Leon van Rensburg  

-->
<script type="text/javascript">
$(document).ready(function(){
	$('.alert').delay(5000).fadeOut();
});
</script>

                        <div id="inline" class="col-xs-12 col-md-12 lightbox-details" style="height:auto;padding-bottom:10px;">

                              
                              <div class="col-lg-12 row listing-co">

                                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-8 listing-description-co">
                                    <h3><?php echo $company->name;?></h3>
                                    
                                    <p><span class="fa fa-map-marker"></span><b>&nbsp;Address: &nbsp;</b><?php echo $address;?></p>
                                    <?php if($company->paddress) {?>
                                    <p><span class="fa fa-map-pin"></span><b>&nbsp;Postal Address: &nbsp;</b><?php echo $company->paddress;?></p>
                                    <?php }?>
                                    <p><span class="fa fa-phone"></span><b>Telephone: &nbsp;</b><?php echo $telephone;?></p>
                                    <?php if($company->mobile) {?>
                                    <p><span class="fa fa-mobile"></span><b>&nbsp;&nbsp;Cellular: &nbsp;</b><?php echo $company->mobile;?></p>
                                    <?php }?>
                                    <?php if($company->fax) {?>
                                    <p><span class="fa fa-fax"></span><b>&nbsp;Fax: &nbsp;</b><?php echo $company->fax;?></p>
                                    <?php }?>
                                    <?php if($company->email) {?>
                                    <p><span class="fa fa-envelope"></span><b>&nbsp;Email: &nbsp;</b><a href="mailto:<?php echo $company->email;?>"><?php echo $company->email;?></a></p>
                                    <?php }?>
                                    <?php if($company->website) {
										$website = explode(",",$company->website);?>
                                    <p><span class="fa fa-globe"></span><b>&nbsp;Website: &nbsp;</b>
                                    <?php for($x=0;$x<sizeof($website);$x++){?>
                                    <a id="web" href="http://<?php echo $website[$x];?>" target="_blank"><?php echo $website[$x];?></a>&nbsp;&nbsp;
                                    <?php }?>
                                    </p>
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
                                    
                                  </div>
    
    							<?php if(!$company->video && !$company->advert){?>
                                  <div class="listing-image-co col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top:40px !important;">
                                  <?php } elseif(!$company->video && $company->advert){?>
                                  <div class="listing-image-co col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top:62px !important;">
                                  <?php } elseif($company->video && !$company->advert){?>
                                  <div class="listing-image-co col-lg-2 col-md-2 col-sm-4 col-xs-4" style="margin-top:92px !important;">
                                  <?php } else {?>
                                  <div class="listing-image-co col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                  <?php }?>
                                  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    	<img class="listing-image-placeholder-co" id="company-logo" src="<?php echo $image;?>">
                                    </div>
                                    
                                    <?php if($company->advert){?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-left:7px !important;">
                                            <a class="ad" href="<?php echo CDN_BASE_PATH.$company->advert;?>" data-toggle="lightbox" id="pop" data-title="<?php echo $company->name;?>"><i class="btn btn-info" style="margin-left:5px;">View Advert</i></a>
                                        </div>
                                    <?php }?>
                                    
                                    <script type="text/javascript">
									  $(document).ready(function(){
										$('.ad').click(function() {
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
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-left:7px !important;">
                                        <a href="<?php echo CDN_BASE_PATH.$company->profile;?>" data-toggle="lightbox" id="pop" data-title="<?php echo $company->name;?>"><i class="btn btn-info" style="margin-left:5px;">View Profile</i></a>
                                    </div>
                                    <?php }?>
                                    
                                    <?php if($company->video){?>
                                    <!--<div class="col-lg-12">&nbsp;</div>-->
                                    <div class="video_modal col-lg-12" style="margin-left:7px !important;">
                                        
                                            <a href="https://www.youtube.com/watch/v/<?php echo $company->video; ?>" rel="nofollow" data-toggle="lightbox" data-gallery="youtubevideos" data-title="<?php echo $video->name;?>">
                                                <img style="border-radius: 4px;" src="<?php echo 'http://img.youtube.com/vi/'.$company->video.'/hqdefault.jpg'; ?>" class="img-responsive"> <i class="fa fa-play"></i>
                                            </a>
                                        
                                    </div>
                                    <?php }?>
                                    
                                  </div>
                              
                              </div>
								
                              <?php if($company->about_us) {?>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about_us_p">
                                <h4>About Us:</h4> 
                                <p><?php echo $company->about_us;?></p>       
                              </div>
                              <?php }?>
                              
                              <?php if($viewpage_banner) {?>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                <img style="width:100%;height:100%" src="<?php echo CDN_BASE_PATH; ?><?php echo $viewpage_banner;?>">      
                              </div>
                              <?php }?>
       
                        </div>
