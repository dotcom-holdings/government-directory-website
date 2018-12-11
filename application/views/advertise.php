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
                        <p>Advertise on Yellow<span style="color:#fff300"></span></p>
                    </div>
                    <div class="white2 col-lg-12" style="text-align:center;overflow-y: scroll;"">
                    
					<div class="aboutus">
                        <h1>Why Advertise</h1>
                        
                        <h5>How advertising can help?</h5>
                        
                        <p>
                            Yellow.co.za offers effective marketing solutions to help 
                            your business connect with more quality customers, no matter how they search. Our 
                            digital and print advertising products are great value for money, and our Advertising 
                            Value Packages can really help your business save. Yellow.co.za 
                            can help your business get noticed and drive more customers to your door. 
                        </p>
                        
                        <p>
                            Did you know that nearly 5 million people make over 20 million searches using our 
                            Search Network in an average week.
                        </p>
                        
                        <h5>Benefits of Online Advertising</h5>
                        
                        <p>
                            At Yellow.co.za we work hard to help you optimize your online 
                            advertising and give your business an edge over your competitors. Our extensive suite of 
                            digital products is designed to help your business be found by customers searching online, 
                            and stand out from in the increasingly crowded world of online advertising. 
                        </p>
                        
                        <p>
                            To find out more about how online advertising with Yellow.co.za can 
                            benefit your business, give us  a shout or send us and email – 
                            <a href="mailto:sales@adslive.com">Click here</a>
                        </p>
                        
                        <h5>Building effective online content</h5>
                        
                        <p>
                            At Yellow.co.za we can work with you to ensure that the content of 
                            your web advertising works hard for your business. We will make sure that your listing has 
                            the right content and keywords to help you stand out from the crowd.
                        </p>
                        
                        </div>

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