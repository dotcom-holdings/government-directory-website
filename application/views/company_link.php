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
            <div id="view_company_stats_page" class="container">
                
                <div class="col-lg-8">
                     <div class="header1" id="scrollto">
                        <h3>Link your Company to your User Profile<span style="color:#fff300"></span></h3>
                    </div>
                    <div class="white2 col-lg-12" style="text-align:center;overflow-y: scroll;"">
                    		
                           <div class="col-md-1"></div>
                           <div class="col-md-10">
                              <?php if(validation_errors()) { ?>
                              <div class="col-lg-8">
                              &nbsp;
                              </div>
                              <div class="col-lg-8 col-lg-offset-2" style="background-color:#FF0">
                              	<?php echo validation_errors(); ?>
                              </div>
                              <?php }?>
                              <?php if($alert!="") { ?>
                              <div class="col-lg-8">
                              &nbsp;
                              </div>
                              <div class="col-lg-12 alert" style="background-color: #3F9">
                              	<?php echo $alert; ?>
                              </div>
                              <?php }?>
                              

                              <div class="col-lg-12">
                                <p>Please fill out the following form to link your company. This will be checked for validity and linked within 24 hours. Thank you.</p>       
                              </div>


                                   <form method="post" action="<?php echo base_url(); ?>home/company_link"> 
                                      <div id="padding" class="col-lg-12">
                                        <fieldset class="form-group">
                                          <label for="name">Name</label>
                                          <input type="text" class="form-control" name="name" placeholder="Your name" value="<?php echo $alert==""?set_value('name'):'';?>">
                                        </fieldset>
                                      </div>

                                      <div id="padding" class="col-lg-12">
                                        <fieldset class="form-group">
                                          <label for="email">Email address (your login email)</label>
                                          <input type="text" class="form-control" name="email" placeholder="Your eMail" value="<?php echo $alert==""?set_value('email'):'';?>">
                                        </fieldset>
                                      </div>


                                      <div id="padding" class="col-lg-12">
                                        <fieldset class="form-group">
                                          <label for="name">Name of Company to link</label>
                                          <input type="text" class="form-control" name="company" placeholder="Your name" value="<?php echo $alert==""?set_value('company'):'';?>">
                                        </fieldset>
                                      </div>
                                      
                                      <div id="padding" class="col-lg-12">
                                        <fieldset class="form-group">
                                          <label for="name">Viewpage Link of Company on the site (if you have it)</label>
                                          <input type="text" class="form-control" name="link" placeholder="Your name" value="<?php echo $alert==""?set_value('link'):'';?>">
                                        </fieldset>
                                      </div>
										
                                      <div class="col-lg-12">
                                      	&nbsp;
                                      </div>
                                      <div class="col-lg-12 col-lg-offset-2" style="width:99%">
                                         <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LfL_ycTAAAAAJNwgyc6oFjTYglftK5SAtHVgcNa"></div> 
                                      </div>
                                      <div class="col-lg-12">
                                      	&nbsp;
                                      </div>
									  <div class="col-lg-12">
                                      	<button type="submit" id="share" disabled name="submit" class="btn btn-primary" value="1">Submit</button>
                                      </div>
										<script type="text/javascript">
											function recaptchaCallback() {
												$('#share').removeAttr('disabled');
											};
                                        </script>

                                  </form>
                              
                              <div>&nbsp;</div>
                              <div>&nbsp;</div>
                               <div class="col-lg-12">
                                  <h3>Address:</h3>
                                  <address>
                                    <strong>African Directory Services (Pty) Ltd</strong><br>
                                    Corner Kerk &amp; Eloff Streets, <br>
                                    Johannesburg, Gauteng.<br>
                                    Private Bag X7775 Johannesburg 2000,<br>
                                    South Africa.<br>
                                
                                    <strong>Email: </strong> <a href="mailto:info@adslive.co.za?Subject=Site%20Enquiry" target="_top">Send Mail</a><br>
                                    <strong>Phone: </strong> +27 11 3336803 / 0860366387<br>
                                    <strong>Fax: </strong> +27 11 3336826 / 0860624587<br>
                                    <strong>Website: </strong> <a href="http://government.co.za" target="_blank">government.co.za</a><br>
                                  </address>
                                </div>
       						</div>
                            <div class="col-md-1"></div>

                	</div>                
              </div>

              <div class="col-lg-4">
              
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