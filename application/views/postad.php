<?php
$this->load->view('vwHeader'); 
?>
<!--  
Register Page
Author : Leon van Rensburg 

-->
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
                
                <div class="col-lg-8">
                     <div class="white2 col-lg-12" style="border: 1px solid #CCC; text-align:left;overflow-y: scroll;">
                        <div id="title" style="padding:10px;padding-left:70px;">
                            <h3>Post a Free Ad</h3>
                        </div>		
                    <div class="col-md-1"></div>
                    	<div class="col-md-10">
                        	<?php
                             if(!$loggedin){
                            ?>
                            <div class="col-lg-12 alert" style="background-color: #3F9">
                                You need to be logged in to post an ad!
                            </div>
                            <div class="col-lg-12">
                              <a href="<?php echo base_url(); ?>home/do_login">Please login here</a> 
                            </div>
                            <?php } elseif($posted){
                            ?>
                            <form method="post" id="postad" action="<?php echo base_url(); ?>home/postad">
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-danger btn-block" type="submit" name="postad">Post a Free Ad</button>
                            </div>
                            </form>
                            <?php } else {?>
                            <form method="post" id="login" action="<?php echo base_url(); ?>home/postad">
                            <?php if($alert!='Ad successfully posted!'){?>
                            <p>Please fill in the details of your business.<br />The content will be checked and verified before publishing.<p>
                            <p>Please note that a free listing will expire after one month.<br />Please contact us for other options.<p>
                            <?php }?>
                            <?php if(validation_errors()) { ?>
                              <div class="col-lg-12">
                              &nbsp;
                              </div>
                              <div class="col-lg-12" style="background-color:#FF0">
                              	<?php echo validation_errors(); ?>
                              </div>
                              <div class="col-lg-12">
                              &nbsp;
                              </div>
                              <?php }?>
                              <?php if($alert!="") { ?>
                              <div class="col-lg-12">
                              &nbsp;
                              </div>
                              <div class="col-lg-12 alert" style="background-color: #3F9">
                              	<?php echo $alert; ?>
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
                              	<label class="col-lg-4" style="text-align:left">Human check :-)</label>
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

              <div id="right_sidebar" class="col-lg-3">
              
				<?php
                include("right_sidebar.php");
                ?>
                                 
            </div>

        </div>
        </div>
    </section>

<?php
$this->load->view('vwFooter');
?>