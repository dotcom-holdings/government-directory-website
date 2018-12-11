<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<!-- META  -->
	<meta name="keywords" content="Search contact information, Ministries, Departments, Municipalities, Presidency, Diplomatic Missions, Premiers, MEC, Local Government, Provincial Government, National Government, Government Bodies, Government Structures, Tenders, Government Programs, Government Profiles, Heads of Department, Communications, Government and Community, Semi Private, State Information, South Africa, Eastern Cape, Free State, Gauteng, KwaZulu-Natal, KZN, Limpopo, Mpumalanga, Northern Cape, North West, Western Cape">
	<meta name="description" content="Get closer to local, provincial and national government through this amazing website. A great way to connect and communicate with your favorite civil servant and office">
	<meta name="author" content="Get closer to local, provincial and national government through this amazing website. A great way to connect and communicate with your favorite civil servant and office">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Government Directory of South Africa®</title>
	<!--Favicon-->
    <link rel="shortcut icon" href="<?php echo HTTP_IMG_PATH; ?>favicon.ico" type="image/x-icon" />
    <!-- Bootstrap core CSS -->
    <link href="<?php echo HTTP_CSS_PATH; ?>style.css" rel="stylesheet">
    <link href="<?php echo HTTP_CSS_PATH; ?>bootstrap.css" rel="stylesheet" type="text/css" media="all"> 
    <link rel="stylesheet" type="text/css" href="<?php echo HTTP_CSS_PATH; ?>stats.css">
    <link href="<?php echo HTTP_CSS_PATH; ?>site.css" rel="stylesheet">
    <link href="<?php echo HTTP_CSS_PATH; ?>slick.css" rel="stylesheet"/> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" />
    <link href="<?php echo HTTP_CSS_PATH; ?>dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo HTTP_CSS_PATH; ?>ekko-lightbox.css" rel="stylesheet" type="text/css" media="all"> 
    
    <!-- Javascripts --> 
    <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>slick.js"></script>
    <script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>slick.min.js"></script>
 	<script type="text/javascript" src="<?php echo HTTP_JS_PATH; ?>ekko-lightbox.js"></script>
    <script src="<?php echo HTTP_JS_PATH; ?>jquery.dataTables.js"></script>
    <script src="<?php echo HTTP_JS_PATH; ?>dataTables.bootstrap.js"></script>
    <script src="<?php echo HTTP_JS_PATH; ?>site.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <!-- disable right click -->
      <script language=JavaScript>
        var message="";
        function clickIE() {if (document.all) {(message);return false;}}
        function clickNS(e) {if 
        (document.layers||(document.getElementById&&!document.all)) {
        if (e.which==2||e.which==3) {(message);return false;}}}
        if (document.layers)
        {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
        else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
        document.oncontextmenu=new Function("return false")
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
			
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-66943262-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-66943262-1');
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
          <select id="reg" name="region" class="pull-right styled-select slate" style="width:142px;margin-left:10px;">
            <option selected="Change Location" value="">Change Location</option>
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
          <ul class="nav navbar-nav navbar-right" style="padding-right:14px;">
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home" id="about">Home</a></li>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home/about" id="about">About Us</a></li>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home/contact" id="contact">Contact Us</a></li>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home/register">Register</a></li>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>home/do_login">Login</a></li>
            <li><a href="<?php echo HTTP_BASE_PATH; ?>statistics/stats">Stats</a></li>
            <li><a id="business_add_btn" href="<?php echo HTTP_BASE_PATH; ?>home/postad" style="text-align:center;">Add your business</a></li>
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
