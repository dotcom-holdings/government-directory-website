
<div class="paper-back-full">
    <div class="login-form-full">
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
                 <?php
                            if(isset($error) && $error !='')
                            {
                            ?>
                            <div class="col-lg-12">
                              &nbsp;
                            </div>
                            <div class="alert alert-warning">
                            <?php echo $error; ?>
                          </div>
                            <?php
                            } ?>
           
                       <div class="text-center title-logo animated fadeInDown animation-delay-5"><strong>GOVERNMENT</strong><span>NEWS</span></div>
            <div class="transparent-div no-padding animated fadeInUp animation-delay-8">
                <ul class="nav nav-tabs nav-tabs-transparent">
                  <li class="active"><a href="#home" data-toggle="tab">Login</a></li>
                  <li><a href="<?php echo base_url(); ?>pages/register">Register</a></li>
                  
                </ul>
               

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="home">
                    
                       <form  method="post" id="login" action="<?php echo base_url(); ?>pages/do_login">
                        <div class="form-group">
                            <div class="input-group login-input">
                                <span class="input-group-addon"></span>
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <br>
                            <div class="input-group login-input">
                                <span class="input-group-addon"></span>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox_remember">
                                <label for="checkbox_remember">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-ar btn-primary btn-block" type="submit" name="login" value="login">Login</button>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                  </div>
                  
                 
                </div>
            </div>
        </div>
    </div>
</div>
