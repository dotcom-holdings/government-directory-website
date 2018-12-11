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
                      <?php  include("menu2.php"); ?>
                <div class="col-lg-8">
                     <div class="white2 col-lg-12" style="border: 1px solid #CCC; text-align:left;overflow-y: scroll;">
                        <div id="title" style="padding:15px; ">
                            <h3>Register a new user account</h3>
                        </div>		
<!--                    <div class="col-md-3"></div>-->
                    	<div class="col-md-9">
                            <?php
                             if($registered){
                            ?>
                            <form class="form-signin panel" method="post" id="logout2" action="<?php echo base_url(); ?>home/postad">
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-danger btn-block" type="submit" name="postad">Post a Free Ad</button>
                            </div>
                            </form>
                            <?php } else {?>
                            <form class="form-signin panel" method="post" id="login" action="<?php echo base_url(); ?>home/register">
                            <?php if($alert!='Registered successfully!'){?>
<!--                            <h4 class="form-signin-heading">Please fill in the details to register</h4>-->
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
                              <a href="<?php echo base_url(); ?>home/do_login">Please login here</a> 
                              </div>
                            <?php } else {?>
                            
                            <div class="form-group">
                                <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="<?php echo $alert==""?set_value('name'):'';?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="cell" id="cell" tabindex="1" class="form-control" placeholder="Cellphone" value="<?php echo $alert==""?set_value('cell'):'';?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="<?php echo $alert==""?set_value('username'):'';?>">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $alert==""?set_value('email'):'';?>">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" value="<?php echo $alert==""?set_value('password'):'';?>">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" value="<?php echo $alert==""?set_value('confirm-password'):'';?>">
                            </div>
                              <div class="form-group">
                                 <div class="g-recaptcha" data-sitekey="6LfL_ycTAAAAAJNwgyc6oFjTYglftK5SAtHVgcNa" style="margin-left:-6px;"></div> 
                              </div>
                              <div class="col-lg-12">
                                &nbsp;
                              </div>
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" value="1">Register</button>
                            </div>
                            <?php }?>
                          </form>
                          <?php }?>
                     </div>
                     <div class="col-md-3"></div>
                </div>                
              </div>

            <div id="right_sidebar" class="col-lg-3">
    <?php include 'right_sidebar.php'; ?>
  </div>

        </div>
        </div>
    </section>

   
<?php
$this->load->view('vwFooter');
?>