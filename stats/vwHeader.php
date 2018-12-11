<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<!-- META  -->
	   <meta name="keywords" content="Search contact information, Ministries, Departments, Municipalities, Presidency, Diplomatic Missions, Premiers, MEC, Local Government, Provincial Government, National Government, Government Bodies, Government Structures, Tenders, Government Programs, Government Profiles, Heads of Department, Communications, Government and Community, Semi Private, State Information, South Africa">
	   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --> 
    <meta name="google-play-app" content="app-id=co.za.government.apps">
    <meta name="apple-itunes-app" content="app-id=1169906935">
    <?php meta_tags(); ?>
    <title>
    <?php 
      if (isset($name)) 
      {
        echo $name.'&nbsp;| Government Directory of South Africa';
      } else
      {
        echo 'The best business directory in South Africa | Government Directory of South Africa';
      }
    ?>
  </title>
	<!--Favicon-->
    <link rel="shortcut icon" href="<?php echo HTTP_IMG_PATH; ?>favicon.ico" type="image/x-icon" />
    <!-- Bootstrap core CSS -->
    <link href="<?php echo HTTP_CSS_PATH; ?>style.css" rel="stylesheet">
    <link href="<?php echo HTTP_CSS_PATH; ?>blog_style.css" rel="stylesheet">
    <link href="<?php echo HTTP_CSS_PATH; ?>bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="<?php echo HTTP_CSS_PATH; ?>slick.css" rel="stylesheet"/> 
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_CSS_PATH; ?>stats.css">
    <link href="<?php echo HTTP_CSS_PATH; ?>site.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" />
    <link href="<?php echo HTTP_CSS_PATH; ?>dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo HTTP_CSS_PATH; ?>ekko-lightbox.css" rel="stylesheet" type="text/css" media="all"> 
    
    <!-- Javascripts --> 
    <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>slick.min.js"></script>
 	<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ekko-lightbox.js"></script>
    <script src="<?php echo HTTP_JS_PATH; ?>jquery.dataTables.js"></script>
    <script src="<?php echo HTTP_JS_PATH; ?>dataTables.bootstrap.js"></script>
    <script src="<?php echo HTTP_JS_PATH; ?>site.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

     <script type='text/javascript'>
    //<![CDATA[-->
        $(function() {
           $(document).bind('contextmenu', function(e) {
                return false;
            });
        });
    //]]>
   </script>
    <script type="application/ld+json">
    {
      "@context" : "http://schema.org",
      "@type" : "LocalBusiness",
      "name" : "Government Directory",
      "image" : [ "http://government.co.za/assets/img/identity.png", "http://cdn.adslive.com/uploads/promotions/bmw_big_ad.png", "http://cdn.adslive.com//uploads/images/MMA_c1.png", "http://cdn.adslive.com//uploads/images/rsa/banners/times_cl(2).jpg", "http://cdn.adslive.com/uploads/classified_banners/coghsta_c1.jpg", "http://cdn.adslive.com/uploads/classified_banners/heaven-earth-c1.jpg", "http://cdn.adslive.com/uploads/classified_banners/Matatiele-c1.jpg", "http://cdn.adslive.com/uploads/classified_banners/Saohatse-Investments-c1.jpg", "http://cdn.adslive.com//uploads/images/continuity_c1(2).jpg", "http://cdn.adslive.com//uploads/images/sadcgov/cleanserv_c.jpg", "http://cdn.adslive.com/uploads/classified_banners/Reder-Construction-CC-c1.jpg", "http://cdn.adslive.com//uploads/images/sadcgov/2014/glen_c.jpg", "http://cdn.adslive.com/uploads/adverts/brother_1.jpg", "http://cdn.adslive.com/uploads/adverts/bicacon-dp.jpg", "http://cdn.adslive.com//uploads/images/rsa/adverts/Transman---Hp.jpg", "http://cdn.adslive.com/uploads/adverts/tranglbaldp25.jpg", "http://government.co.za/assets/img/digital_copy.jpg", "http://cdn.adslive.com//uploads/images/sadcgov/2014/lukhanji_c1.jpg", "http://cdn.adslive.com//uploads/images/sadcgov/2014/pen_ban(1).jpg", "http://cdn.adslive.com//uploads/images/caterquip_c1(1).jpg" ],
      "telephone" : [ "0860 366387", "+27 11 3336803" ]
      "email" : "info@adslive.com",
      "url" : "http://government.co.za/",
      "address" : {
        "@type" : "PostalAddress",
        "streetAddress" : "Corner Kerk & Eloff Streets",
        "addressLocality" : "Johannesburg",
        "addressRegion" : "Gauteng",
        "addressCountry" : "South Africa",
        "postalCode" : "2000"
      }
    }
    </script>

	<script type="text/javascript">
    //lightbox for images
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    }); 
    </script>

 	<!-- styles -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,700,500,400,900' rel='stylesheet' type='text/css'/>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80114437-36', 'auto');
  ga('send', 'pageview');

</script>			

<script type="text/javascript">
$(document).ready(function() {
    $(".search_category").click(function(){
        var cat = this.id;
		var what = $('#what').val();
		var where = $('#where').val();
		$('#create_input').append('<input type="hidden" name="cat" value="'+cat+'"><input type="hidden" name="what" value="'+what+'"><input type="hidden" name="where" value="'+where+'">');
		$("#google_search").submit();
    }); 
});
</script>
    <script type="text/javascript">
		$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();

	    if (scroll >= 1) {
	        $(".clearHeader").addClass("navbar-fixed-top");
	    } else {
	        $(".clearHeader").removeClass("navbar-fixed-top");

	    }
	});
	</script>
<script type="text/javascript">
$(document).ready(function() {
	 $('.listing_table').DataTable( {
        "bLengthChange": false,
		"bFilter": false,
		"ordering": false,
		"dom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
		"iDisplayLength": 5
    } );
});
</script>
<script type="text/javascript">
$(document).ready(function () {
	$('#site-navigation ul li a').click(function() {
		$(this).parent().addClass('active').siblings().removeClass('active');
	});
});
</script>
<script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//cdn.adslive.com/lhc/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true/(theme)/2?r='+referrer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
   
  </head>
  
<body class="column3 page">
	<div id="notify" style="display:none;"></div>
	<div class="top-bar fadeInDown animated navbar-fixed-top">
<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <div class="powered"> Powered by <a href="http://adslive.com" target="_blank">African Directory Services</a> : 0860 366387 / +27 11 3336803</div> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav">
          <select id="reg" name="region" class="pull-right styled-select slate">
            <option selected="Change Location" value="">Location</option>
            <option value="http://www.government.co.bw">Botswana</option>
            <option value="http://www.government.co.za">South Africa</option>
            <option value="http://www.government.com.na">Namibia</option>
            <option value="http://www.lesothogov.net">Lesotho</option>
            <option value="http://www.swazigov.com">Swaziland</option>  
            <option value="http://www.government.co.zm">Zambia</option>
            <option value="http://www.zimbabwegov.com">Zimbabwe</option>
         </select>			
        
            <script language="javascript">
            $(function() {
                $('#reg').change(function() {
                    window.location.replace($('#reg').val());
                });
            });
            </script>
           </ul>             
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home" id="about">Home</a></li>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home/about" id="about">About Us</a></li>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home/news" id="news">News</a></li>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home/contact" id="contact">Contact Us</a></li>
            <?php if ($loggedin) { ?>                
                <li><a href="<?php echo HTTP_BASE_PATH; ?>home/view_stats">Profile</a></li>
                <li><a href="<?php echo HTTP_BASE_PATH; ?>home/logout">Logout</a></li>
            <?php } else {?>
                <li><a href="<?php echo HTTP_BASE_PATH; ?>home/register">Register</a></li>
                <li><a href="<?php echo HTTP_BASE_PATH; ?>home/do_login">Login</a></li>
            <?php } ?>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home/stats">Stats</a></li>
            <li><a id="business_add_btn" href="<?php echo HTTP_BASE_PATH; ?>home/postad">Add your business</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>	
 <header id="site-header" style="background-color:#FFF;">
           
    
            <div class="container" style="background-color:#FFF;">
                
                <div id="logo">
                    <a href="<?php echo HTTP_BASE_PATH; ?>home">
                        <img src="<?php echo HTTP_IMG_PATH; ?>identity.png" alt="" class="img-responsive" /></a>
                </div>
    
            	<div id="search-box">
                    <form action="<?php echo HTTP_BASE_PATH; ?>home/search" method="post">
                        <div class="what">
                            <input type="text" name="what" placeholder="what ..."/>
                        </div>
                        <div class="where">
                            <input type="text" name="where" placeholder="where ..."/>
                        </div>
                        <button type="submit" name="search" value="1" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                
           </div>
    
        </header>

</div>
