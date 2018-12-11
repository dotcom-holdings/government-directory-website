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
                     <div class="header1" id="scrollto">
                        <p>Mobile Application<span style="color:#fff300"></span></p>
                    </div>
                    <div class="white2 col-lg-12" style="text-align:center;overflow-y: scroll;"">
                    
                    	<div id="page-about">
                    
                        <h5>Find businesses on the go with Yellow</h5>
                        
                        <p>
                        Looking for a business when you are out and about? Yellow mobile can connect you with over 2 million businesses from over 15 
                        countries in Southern Africa. 
                        </p>
                        
                        <p>
                            Our Yellow mobile site and free mobile apps have all the contact details, maps &amp; directions you need when you’re on the go. 
                            And a range of special features like Click-to-Call and Send-to-Mobile let you quickly connect with businesses and share their 
                            information with friends.
                        </p>
                        
                        <h5>Mobile Site - Connect with businesses quickly via mobile web</h5>
                        <ul class="list-unstyled">
                            <li class="infopages">Get all the business contact details instantly from yellow.co.za</li>
                            <li class="infopages">Get directions to businesses</li>
                            <li class="infopages">Save or share business details via SMS</li>
                        </ul>
                        
                        <h5>iPhone App - Take mobile searching to the next level</h5>
                        <ul class="list-unstyled">
                            <li class="infopages">Save business details to your favorites for easy access</li>
                            <li class="infopages">Get businesses near you using your iPhone's mobile GPS</li>
                            <li class="infopages">Interactive maps with touch pan &amp; zoom</li>
                        </ul>
                        
                        <h5>iPad App - Choose how you want to search &amp; view businesses on your iPad</h5>
                        <ul class="list-unstyled">
                            <li class="infopages">Get businesses near you using your iPad's mobile GPS</li>
                            <li class="infopages">Compare business information</li>
                            <li class="infopages">View search results on an interactive map or full page colour ads</li>
                        </ul>
                        
                        <h5>Android App - Find what you are looking for faster</h5>
                        <ul class="list-unstyled">
                            <li class="infopages">Save business details to your favorites for easy access</li>
                            <li class="infopages">Get businesses near you using your device's mobile GPS</li>
                            <li class="infopages">Auto suggest categories to make searching easier</li>
                        </ul>
                        <p>&nbsp;</p>
                        <span>
                            <img src="<?php echo HTTP_IMG_PATH; ?>app_store.png">
                            <img src="<?php echo HTTP_IMG_PATH; ?>play_store.png">
                        </span>
                        
                        </div>
                        
                        <!-- /#page-about -->

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