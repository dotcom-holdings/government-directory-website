<META NAME="robots" CONTENT="noindex,nofollow"> 
<!--  
Lightbox
Author : Leon van Rensburg  

-->
<script type="text/javascript">
$(document).ready(function(){
	$('.alert').delay(5000).fadeOut();
});
</script>

                        <div id="inline" class="col-xs-12 col-md-12 lightbox-details" style="height:auto;padding-bottom:10px;">

                              
                              <div class="col-lg-12 row listing-co">

                                  <div class="col-lg-10 listing-description-co">
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
                                    <?php if($company->website) {?>
                                    <p><span class="fa fa-globe"></span><b>&nbsp;Website: &nbsp;</b><a href="http://<?php echo $company->website;?>" target="_blank"><?php echo $company->website;?></a></p>
                                    <?php }?>
                                    
                                  </div>
    
    
                                  <div class="col-xs-4 col-lg-2 listing-image-co">
                                  	<div class="col-lg-12">
                                    	<img class="listing-image-placeholder-co" id="company-logo" src="<?php echo $image;?>">
                                    </div>
                                    
                                    <?php if($company->advert){?>
                                    <div class="col-lg-12">&nbsp;</div>
                                    <div class="col-lg-12">
                                        <a href="<?php echo CDN_BASE_PATH.$company->advert;?>" data-toggle="lightbox" id="pop" data-title="<?php echo $company->name;?>"><i class="btn btn-info" style="margin-left:5px;">View Advert</i></a>
                                    </div>
                                    <?php }?>
                                    
                                    <?php if($company->profile){?>
                                    <div class="col-lg-12">&nbsp;</div>
                                    <div class="col-lg-12">
                                        <a href="<?php echo CDN_BASE_PATH.$company->profile;?>" data-toggle="lightbox" id="pop" data-title="<?php echo $company->name;?>"><i class="btn btn-info" style="margin-left:5px;">View Profile</i></a>
                                    </div>
                                    <?php }?>
                                    
                                  </div>
                              
                              </div>
								
                              <?php if($company->about_us) {?>
                              <div class="col-lg-12">
                                <h4>About Us:</h4> 
                                <p><?php echo $company->about_us;?></p>       
                              </div>
                              <?php }?>
                              
                              <?php if($viewpage_banner) {?>
                              <div class="col-lg-12">
                                <a href="http://<?php echo $company->website;?>" target="_blank"> 
                                <img style="width:100%;height:100%" src="<?php echo CDN_BASE_PATH; ?><?php echo $viewpage_banner;?>">
                                </a>      
                              </div>
                              <?php }?>
       
                        </div>
