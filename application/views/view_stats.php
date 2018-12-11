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
                
                <div class="col-lg-12">
                     <div class="header1" id="scrollto">
                        <h3>View Company Statistics<span style="color:#fff300"></span></h3>
                    </div>
<br>
<br>
<br>

                    <div class="white2 col-lg-12" style="text-align:center">
                    <div class="col-md-1 white3"></div>
                    	<div class="col-md-10 list-group">
                        	<?php
                             if(!$loggedin){
                            ?>
                            <div class="col-lg-12 alert" style="background-color: #3F9">
                                You need to be logged in to view your company statistics!
                            </div>
                            <div class="col-lg-12">
                              <a href="<?php echo base_url(); ?>home/do_login">Please login here</a> 
                            </div>
                            <?php } elseif($posted){
                            ?>
                            <form method="post" id="view_stats" action="<?php echo base_url(); ?>home/view_stats">
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-danger btn-block" type="submit" name="view_stats">View Stats</button>
                            </div>
                            </form>
                            <?php } else {?>
                            <form method="post" id="login" action="<?php echo base_url(); ?>home/view_stats">
                            <?php if($alert!='Ad successfully posted!'){?>
                            <h4 class="form-signin-heading">Please choose your company</h4>
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
                            <div id="prov_dropdown" class="form-group col-lg-12"> 
                            <label>Choose Company</label>
                                <?php echo form_dropdown('company_id', $company_dd_data, '',"class='form-control' style='width:100%'"); ?>
                            </div>
                            <div class="col-lg-12"></div>
                              
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="view_stats" value="1">View Stats</button>
                            </div>
                            <input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
                            <?php }?>
                          </form>
                          <?php }?>
                     </div>
                     <div class="col-md-1"></div>
                     <div class="col-md-12">Company not appearing above? <a style="color: #089447;" href="<?php echo base_url(); ?>home/company_link">Click here</a> to get it linked to your user profile.</div>
                </div>                
              </div>

              <div class="col-lg-4">
              
				
                                 
            </div>

        </div>
        </div><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
    </section>

<?php
$this->load->view('vwFooter');
?>