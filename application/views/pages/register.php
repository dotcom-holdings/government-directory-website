
<div class="paper-back-full">
   
    <div class="login-form-full">
       <?php echo @$status;?>
        <div class="fix-box">
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
                              
            <div class="text-center title-logo animated fadeInDown animation-delay-5"><strong>GOVERNMENT</strong><span>NEWS</span></div>
            <div class="transparent-div no-padding animated fadeInUp animation-delay-8">
                <ul class="nav nav-tabs nav-tabs-transparent">
                  <li class="active"><a href="#profile" data-toggle="tab">Register</a></li>
					<li><a href="<?php echo base_url(); ?>pages/do_login">Login</a></li>
                  
                </ul>

                <!-- Tab panes -->
                 
                              
                <div class="tab-content">
                  <div class="tab-pane active" id="home">
                    <form class="form-signin panel" method="post" id="login" action="<?php echo base_url(); ?>pages/register">
                           
                            
                            
                          <div class="form-group">
                              <label for="InputUserName">Name<sup>*</sup></label>
                              <input type="text" class="form-control" name="name" id="name">
                          </div>
                          <div class="form-group">
                              <label for="InputFirstName">Cellphone</label>
                              <input type="text" class="form-control" name="cell"  id="InputFirstName">
                          </div>
                          <div class="form-group">
                              <label for="InputLastName">Username</label>
                              <input type="text" class="form-control" name="username" id="InputLastName">
                          </div>
                          <div class="form-group">
                              <label for="InputEmail">Email<sup>*</sup></label>
                              <input type="email" class="form-control" name="email" id="InputEmail">
                          </div>
                          
                          <div class="form-group">
                              <label for="InputPassword">Password<sup>*</sup></label>
                                      <input type="password" class="form-control" name="password" id="InputPassword">
                          </div>
                          
                          <div class="form-group">
                             <label for="InputConfirmPassword">Confirm Password<sup>*</sup></label>
                                      <input type="password" class="form-control" name="confirm-password" id="InputConfirmPassword">
                          </div>
                          
                          <div class="form-group">
                              <div class="g-recaptcha" data-sitekey="6LfL_ycTAAAAAJNwgyc6oFjTYglftK5SAtHVgcNa"></div>
                          </div>
                          
                          <div class="row">
                              
                              <div class="col-md-12">
                                  <button type="submit" value="1" class="btn btn-block btn-ar btn-primary" name="register">Register</button>
                              </div>
                          </div>
                      </form>
                  </div>
                 
                </div>
            </div>
        </div>
    </div>
</div>
