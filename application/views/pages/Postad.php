

<?php if(isset($focus)){?>
<script type="text/javascript">
$(document).ready(function(){
	$("html, body").animate({ scrollTop: $('#scrollto').offset().top }, 1);
});
</script>
<?php }?>

    <section>
        <div id="bg2">
            <div class="container" id="main-content">
                <br>
			<div class="col-md-12">
           <?php
                            if(isset($error) && $error !='')
                            {
                            ?>
                            <div class="col-lg-12">
                              &nbsp;
                            </div>
                            <div class="alert alert-info">
                            <?php echo $error; ?>
                          </div>
                            <?php
                            } ?>
                            
            <h2 class="right-line">Post a Free Ad</h2>
            
            <h6 style="color: #333">
            <?php if(validation_errors()) { ?>
                              <div class="col-lg-12">
                              &nbsp;
                              </div>
                              <div class="col-lg-12" style="color:red">
                              	<?php echo validation_errors(); ?>
                              </div>
                              <div class="col-lg-12">
                              &nbsp;
                              </div>
                              <?php }?>
				   <?php if(@$alert!='Ad successfully posted!'){?>
                            <p>Please fill in the details of your business.The content will be checked and verified before publishing.<br>
							Please note that a free listing will expire after one month.<br />Please contact us for other options.<p>
                            <?php }?>
            </h6>
            </div>
               
                <div class="col-lg-12">
                     <div class="panel panel-primary">
                    <div class="panel-heading"><br></div>
                    <div class="panel-body">
                    <div class="col-md-1"></div>
                    	<div class="col-md-10">
                        	<?php
                             if(!$loggedin){
                            ?>
                            <div class="alert alert-warning" style="padding: 20px">
                                You need to be logged in to post an ad!
                            </div>
                            <div class="col-lg-12">
                              <a href="<?php echo base_url(); ?>pages/do_login">Please login here</a> 
                            </div>
                            <?php } elseif(@$posted){
                            ?>
                            <form method="post" id="postad" action="<?php echo base_url(); ?>pages/postad">
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-danger btn-block" type="submit" name="postad">Post a Free Ad</button>
                            </div>
                            </form>
                            <?php } else {?>
                            
                            <form method="post" id="login" action="<?php echo base_url(); ?>pages/postad">
                            
                            
                              <?php if(@$alert!="") { ?>
                              <div class="col-lg-12">
                              &nbsp;
                              </div>
                              <div class="col-lg-12 alert" style="background-color: #3F9">
                              	<?php echo @$alert; ?>
                              </div>
                              <div class="col-lg-12">
                              <a href="<?php echo base_url(); ?>">Home</a> 
                              </div>
                            <?php } else {?>
                            
							<div class="col-lg-12">&nbsp;</div>
                            <div class="form-group col-lg-12">
                                <label class="col-lg-4" style="text-align:left">Name</label>
                                <div class="col-lg-8">
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo empty($company)?set_value('name'):$company->name; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                            
                            <div class="form-group col-lg-12"> 
                                <label class="col-lg-4" style="text-align:left">Physical Address</label>
                                <div class="col-lg-8">
                                <textarea rows="2" name="address" class="form-control" id="address"><?=empty($company)?set_value('address'):$company->address?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                            
                            <div class="form-group col-lg-12"> 
                                <label class="col-lg-4" style="text-align:left">Postal Address</label>
                                <div class="col-lg-8">
                                <textarea rows="2" name="paddress" class="form-control" id="paddress"><?=empty($company)?set_value('paddress'):$company->paddress?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                                            
                            <div class="form-group col-lg-12">
                                <label class="col-lg-4" style="text-align:left">Telephone</label>
                                <div class="col-lg-8">
                                <input type="text" name="telephone" class="form-control" id="telephone" value="<?php echo empty($company)?set_value('telephone'):$company->telephone; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                            
                            <div class="form-group col-lg-12">
                                <label class="col-lg-4" style="text-align:left">Mobile</label>
                                <div class="col-lg-8">
                                <input type="text" name="mobile" class="form-control" id="mobile" value="<?php echo empty($company)?set_value('mobile'):$company->mobile; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                            
                            <div class="form-group col-lg-12">
                                <label class="col-lg-4" style="text-align:left">Fax</label>
                                <div class="col-lg-8">
                                <input type="text" name="fax" class="form-control" id="fax" value="<?php echo empty($company)?set_value('fax'):$company->fax; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                            
                            <div class="form-group col-lg-12">
                                <label class="col-lg-4" style="text-align:left">Email Address</label>
                                <div class="col-lg-8">
                                <input type="text" name="email" class="form-control" id="email" value="<?php echo empty($company)?set_value('email'):$company->email; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                            
                            <div class="form-group col-lg-12">
                                <label class="col-lg-4" style="text-align:left">Company Website</label>
                                <div class="col-lg-8">
                                <input type="text" name="website" class="form-control" id="website" value="<?php echo empty($company)?set_value('website'):$company->website; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                            
                            <div class="form-group col-lg-12"> 
                                <label class="col-lg-4" style="text-align:left">About Us</label>
                                <div class="col-lg-8">
                                <textarea rows="2" name="about_us" class="form-control" id="about_us"><?=empty($company)?set_value('about_us'):$company->about_us?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                            
                            <div class="form-group col-lg-12"> 
                                <label class="col-lg-4" style="text-align:left">Category</label>
                                <div class="col-lg-8">
                                <?php echo form_dropdown('category_id', $category_dd_data, empty($company)?set_value('category_id'):$categories[0]->category_id,"class='form-control' style='width:100%' id='category_id'"); ?>
                                </div>
                            </div>
                            <div class="form-group col-lg-12"> 
                                <label class="col-lg-4" style="text-align:left">Province</label>
                                <div class="col-lg-8">
                                <?php echo form_dropdown('province_id', $province_dd_data, empty($company)?set_value('province_id'):$province[0]->province_id,"class='form-control' style='width:100%' id='province_id'"); ?>
                                </div>
                            </div>
                            <div class="col-lg-12"></div>
                            
                              <div class="form-group col-lg-12">
                              	<label class="col-lg-4" style="text-align:left">reCaptcha</label>
                                 <div class="col-lg-8 g-recaptcha" data-sitekey="6LfL_ycTAAAAAJNwgyc6oFjTYglftK5SAtHVgcNa"></div> 
                              </div>
                              <div class="col-lg-12"></div>
                              
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="postad" value="1">Post Ad</button>
                            </div>
                            <input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
                            <?php }?>
                          </form>
                          <?php }?>
                     </div>
                     <div class="col-md-1"></div>
                </div>                
              </div>

              <div class="col-lg-4">
              
	</div>
			</div>

        </div>
        </div>
    </section><div class='container'>
 <div class="col-md-12">
            <h2 class="right-line">Top Listings</h2>
        </div></div>
                <div class="bxslider-controls">
                    <span id="bx-prev5"></span>
                    <span id="bx-next5"></span>
                </div>
                <ul class="bxslider" id="bx5">
                 <?php foreach ($classified_images_left as $image_left){ ?>
        
		<?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
         <li>
                   <button class="btn btn-default btn-lg btn-ar thumbnail" data-toggle="modal" data-target="#<?php echo $image_left->id;?>"><img class="img-responsive" alt="Image" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"></button>
                   
         <?php }?>
                  </li>
                 </ul>
         
        
        <?php foreach ($classified_images_left as $image_left){ ?>
        
		<?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
		
		
            <!-- Modal -->
<div class="modal fade" id="<?php echo $image_left->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<center>
<div class="modal-dialog" style="width:70%">
<div class="modal-content" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: left">
            <img class="img-responsive pull-left" id="company-logo" src="<?php echo CDN_BASE_PATH.$company->logo;?>" 
				 style="min-width: 110px !important; max-width: 150px !important; min-height: 110px !important; max-height: 150px !important;">
         </div>
		<div class="col-lg-10 col-md-11 col-sm-11 col-xs-11" style="float: left">
			
		<h3 class="text-left" id="myModalLabel" style=" color:#0091CF;padding-left: 6px"><strong><?php echo $image_left->name; ?></strong></h3>
		</div>
    </div>
    <div class="modal-body">
       
		<div class="panel-body" style="text-align: left">
		
		
		<center>
			<div id="<?php echo $company->name;?>" style="display: none">
				<button onclick="toggle_visibility('<?php echo $company->name;?>');" class="btn btn-primary btn-lg btn-ar btn-block" >Close Advert</button>
				<br>
					<?php if(!$company->advert) {}
				       else {
						$advert = CDN_BASE_PATH.$company->advert;?>
				<a class="ad" href="<?php echo $advert?>">
					<img class="img-responsive" alt="No Advert Listed Yet." src="<?php echo $advert;?>">
				</a>
					<?php }?>
					
					<br>
			</div>
         </center>
		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8 listing-description-co">
                
			                
                                    <p><span></span><b><img src="<?php echo base_url()?>assets/images/home-circle_318-27961.jpg" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Address: &nbsp;</b><?php echo $company->address;?></p>
                                    <?php if(!empty($company->paddress)) {?>
                                    <p><span></span><b><img src="<?php echo base_url()?>assets/images/pobox.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Postal Address: &nbsp;</b><?php echo $company->paddress;?></p>
                                    <?php }?>
                                    <p><span></span><b><img src="<?php echo base_url()?>assets/images/telephone.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Telephone: &nbsp;</b><?php echo $company->telephone;?></p>
                                    <?php if($company->mobile) {?>

                                    <p><span></span><b><img src="<?php echo base_url()?>assets/images/mobile.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Cellular: &nbsp;</b><?php echo $company->mobile;?></p>
                                    <?php }?>
                                    <?php if($company->fax) {?>
                                    <p><span></span><b><img src="<?php echo base_url()?>assets/images/fax.png" width="20" height="20"  alt="image"/>&nbsp;&nbsp;Fax: &nbsp;</b><?php echo $company->fax;?></p>
                                    <?php }?>
                                    <?php if($company->email) {?>
                                    <p><span></span><b><img src="<?php echo base_url()?>assets/images/email.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Email: &nbsp;</b><a href="mailto:<?php echo $company->email;?>"><?php echo $company->email;?></a></p>
                                    <?php }?>
                                    <?php if($company->website) {
										$website = explode(",",$company->website);?>
                                    <p><span></span><b><img src="<?php echo base_url()?>assets/images/web_design_icon.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Website: &nbsp;</b>
                                    <?php for($x=0;$x<sizeof($website);$x++){?>
                                    <a id="web" href="http://<?php echo $website[$x];?>" target="_blank"><?php echo $website[$x];?></a>&nbsp;&nbsp;
                                    <?php }?>
                                    </p>
                                    <?php }?>
                                    
                                    
                                  </div>
					<?php if($company->about_us) {?>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about_us_p">
                                <h4>About Us:</h4> 
                                <p><?php echo $company->about_us;?></p>       
                              </div>
					<?php }?>
                              
                              
		
</div>
		
		
    </div>
	
    <div class="modal-footer">
      <center>
				<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>	
		  <?php if(!$company->advert) {}
				       else { ?>
			<button onclick="toggle_visibility('<?php echo $company->name;?>');" class="btn btn-primary btn-lg btn-ar btn-block" >View Advert</button>
					<?php }?>
		  
				
	
	  </center>
	</div>
		</center>
</div>
 <!-- end Modal -->
 <?php }?>    
        
   
				
	