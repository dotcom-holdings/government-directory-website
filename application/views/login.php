<?php
$this->load->view('vwHeader'); 
?>
<!--  
Home Page
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
            <div style="margin-top: 13%;" class="container" id="main-content">
              <?php  include("menu2.php"); ?>
                <div class="col-lg-8">
                     <div class="white2 col-lg-12" style="border: 1px solid #CCC; text-align:left;overflow-y: scroll;">
                        <div id="title" style="padding:10px;padding-left: 190px;">
                            <h3>Login</h3>
                        </div>		
                    <div class="col-md-3"></div>
                    	<div class="col-md-6">
                            <?php
                            if(isset($error) && $error !='')
                            {
                            ?>
                            <div class="col-lg-12">
                              &nbsp;
                            </div>
                            <div class="alert alert-danger">
                            <?php echo $error; ?>
                          </div>
                            <?php
                            } if($loggedin){
                            ?>
                            <form class="form-signin panel" method="post" id="logout2" action="<?php echo base_url(); ?>home/view_stats">
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-success btn-block" type="submit" name="view">Company Statistics</button>
                            </div>
                            </form>
                            <form class="form-signin panel" method="post" id="logout" action="<?php echo base_url(); ?>home/logout">
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-danger btn-block" type="submit" name="logout">Log out</button>
                            </div>
                            </form>
                            <?php } elseif($justloggedin){
                            ?>
                            <form class="form-signin panel" method="post" id="logout2" action="<?php echo base_url(); ?>home/view_stats">
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-success btn-block" type="submit" name="view">Company Statistics</button>
                            </div>
                            </form>
                            <form class="form-signin panel" method="post" id="logout2" action="<?php echo base_url(); ?>home/postad">
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-danger btn-block" type="submit" name="postad">Post a Free Ad</button>
                            </div>
                            </form>
                            <?php } else {?>
                            <form class="form-signin panel" method="post" id="login" action="<?php echo base_url(); ?>home/do_login">
                            <h2 class="form-signin-heading">Please sign in</h2>
                            <div class="form-group col-lg-12">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username" id="username" autofocus>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Password</label>
                                <input type="password" id="pass" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="checkbox">
                                <input type="checkbox" value="remember-me" id="remember_me">Remember me
                            	</label>
                            </div>
                            <div class="form-group col-lg-12">
                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Don't have a user account?<br />
                                <a href="<?php echo base_url(); ?>home/register">Register a new user account</a> 
                            	</label>
                            </div>
                          </form>
                          <?php }?>
                     </div>
<!--                     <div class="col-md-3"></div>-->
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