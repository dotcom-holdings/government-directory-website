<?php
$this->load->view('vwHeader');
?>
<!--
Home Page
Author : Leon van Rensburg

-->
<style>
	
.container-fluid
	{
		display:none;
	}
</style>	

<script type="text/javascript">
  $.ajax({
	  url: '<?php echo base_url() ?>home/update_stats',
	  data: {"ad_type" : "",
			 "company_ad_shown" : 0},
	  type: 'post',
	  complete: function(){
	  }
 });
</script>

	<div class="container">
					<div class="content slick-carousal1" id="main-content">
            <?php foreach ($classified_images_top as $image_top){
				$image_top_link = $image_top->name."<br><a href='http://".$image_top->website."' target='_blank'>Visit Website</a>"; ?>
				<div class="banner-widget">
				 <?php if($image_top->id){?>
					<a class="top_ad" href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>" rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
					<?php } else {?>
				<a class="top_ad" href="<?php echo CDN_BASE_PATH.$image_top->url; ?>" rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top->name; ?>"><img style="margin-bottom:20px;width:100%;" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
				<?php }?>
				<script type="text/javascript">
					$(document).ready(function(){
							  var href = "<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>";
							  var id = <?php echo $image_top->id; ?>;
							  //do your tracking
							  $.ajax({
								  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : href,
										 "ad_type" : "promotion_classified",
										 "company_ad_shown" : id},
								  type: 'post',
								  complete: function(){
									  //now do the redirect
								  }
						});
					});
					</script>
                <script type="text/javascript">
					$(document).ready(function(){
						$('.top_ad').click(function() {
							  var href = $(this).attr("href");
							  var id = href.substr(href.lastIndexOf('/') + 1);
							  //do your tracking
							  $.ajax({
								  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
								  data: {"link" : $(this).attr("href"),
										 "ad_type" : "promotion_classified",
										 "company_ad_visited" : id},
								  type: 'post',
								  complete: function(){
									  //now do the redirect
								  }
							 });
						});
					});
					</script>
                </div>
            <?php }?>
			</div>
<script type="text/javascript">
$(document).ready(function(){
	$('.top_ad').click(function() {
		  var href = $(this).attr("href");
		  var id = href.substr(href.lastIndexOf('/') + 1);
		  //do your tracking
		  $.ajax({
			  url: '<?php echo base_url() ?>home/update_stats',
			  data: {"link" : $(this).attr("href"),
					 "ad_type" : "promotion_classified",
					 "company_ad_visited" : id},
			  type: 'post',
			  complete: function(){
				  //now do the redirect
			  }
		 });
	});
});
</script>
<!-- /banner -->
<style>
.dropbtn {
    background-color:#009366;
    color: white;
    padding: 4px;
    font-size: 9px;
    border: none;
}

.dropdown {
    position: relative; padding: 4px;
    display: inline-block; font-size: 9px;
}
.dropdown button{
    position: relative; padding: 4px;color:white;min-width:120px;
     font-size: 9px;
	 background-color: #009366;border:none;
}

.dropdown button:hover{
		background-color: #3e8e41;
	}	
.dropdown a
	{
		color:white;
	}
.dropdown-content,.dropdown-content1 ,.dropdown-content2  {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a, .dropdown-content1 a, .dropdown-content2 a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover,.dropdown-content1 a:hover,.dropdown-content2 a:hover {background-color: #009366;}
	
.dropbtn:hover .dropdown-content {display: block;}

/*.dropdown:hover .dropbtn {background-color: #3e8e41;}*/
</style>
	</div>

<script type="text/javascript">
$(document).ready(function(){
	$(".btn").hover(function(){
		$(".dropdown-content").show();
	});
	$(".dropdown-content").mouseleave(function(){
		$(".dropdown-content").fadeToggle();
	});	
	
	$(".btn1").hover(function(){
		$(".dropdown-content1").show();
	});
	$(".dropdown-content1").mouseleave(function(){
		$(".dropdown-content1").fadeToggle();
	});
	
	$(".btn2").hover(function(){
		$(".dropdown-content2").show();
	});
	$(".dropdown-content2").mouseleave(function(){
		$(".dropdown-content2").fadeToggle();
	});
});
		
</script>



<div class="container">
<!--
	
<div class="dropdown">
  <button class="dropbtn btn" id="">Categories</button>
  <div class="dropdown-content">
  <a class="catg" title="Bodies and Structures" href="http://test.adslive.com/government.co.za/home/by_cat/25">
                    Bodies and Structures                                    
                    </a>
     
 <a class="catg" title="Charitable Services" href="http://test.adslive.com/government.co.za/home/by_cat/22">
                    Charitable Services                                    
                    </a>
          
 <a class="catg" title="Development Organisations" href="http://test.adslive.com/government.co.za/home/by_cat/16">
                    Development Organisations                                    
                    </a>
   
 <a class="catg" title="Educational Institutions" href="http://test.adslive.com/government.co.za/home/by_cat/17">
                    Educational Institutions                                    
                    </a>
          
 <a class="catg" title="Government and Law" href="http://test.adslive.com/government.co.za/home/by_cat/19">
                    Government and Law                                    
                    </a>

 <a class="catg" title="Government Departments" href="http://test.adslive.com/government.co.za/home/by_cat/12">
                    Government Departments                                    
                    </a>
      
 <a class="catg" title="Government Services" href="http://test.adslive.com/government.co.za/home/by_cat/15">
                    Government Services                                    
                    </a>
           
 <a class="catg" title="Immigration Services" href="http://test.adslive.com/government.co.za/home/by_cat/21">
                    Immigration Services                                    
                    </a>
            
 <a class="catg" title="Local Government" href="http://test.adslive.com/government.co.za/home/by_cat/13">
                    Local Government                                    
                    </a>
   
 <a class="catg" title="Municipalities" href="http://test.adslive.com/government.co.za/home/by_cat/14">
                    Municipalities                                    
                    </a>
              
 <a class="catg" title="Rehabilitation" href="http://test.adslive.com/government.co.za/home/by_cat/24">
                    Rehabilitation                                    
                    </a>
               
 <a class="catg" title="Retirement Homes" href="http://test.adslive.com/government.co.za/home/by_cat/23">
                    Retirement Homes                                    
                    </a>
          
 <a class="catg" title="Social Services" href="http://test.adslive.com/government.co.za/home/by_cat/18">
                    Social Services                                    
                    </a>
             
 <a class="catg" title="Ultimate Business in Africa" href="http://test.adslive.com/government.co.za/home/by_cat/11">
                    Ultimate Business in Africa                                    
                    </a>
    
 <a class="catg" title="Youth and Community Groups" href="http://test.adslive.com/government.co.za/home/by_cat/20">
                    Youth and Community Groups                                    
                    </a>
  </div>
  

  <button class="btn1"> <a href="<?php echo base_url()?>home/view/tenders/tips"> Tendering </a> </button>
	<div class="dropdown-content1">
	<a href="<?php echo base_url()?>home/view/tenders/tips">Tips for Tendering </a>
	<a href="<?php echo base_url()?>home/view/etenders_category">Category Information</a>
	<a href="<?php echo base_url()?>home/view/financial">Financial Support</a>  
	<a href="<?php echo base_url()?>home/view/tender_info">General Information</a> 
	<a href="<?php echo base_url()?>home/view/how_to_tender">How to tender</a> 
	<a href="<?php echo base_url()?>home/view/etenders_docs">Tender Documents </a>
	<a href="<?php echo base_url()?>home/view/etenders">Advertised Tenders</a>
	
	</div>
	

	<button class="btn2"> <a href="<?php echo base_url()?>home/view/gazette/"> Gazettes </a> </button>
	 <div class="dropdown-content2">
	 <a href="http://test.adslive.com/government.co.za/home/gazette/ZA-EC" class="animated fadeInDown">Eastern Cape</a>
     <a href="http://test.adslive.com/government.co.za/home/gazette/ZA-FS" class="animated fadeInDown">Freestate</a>
     <a href="http://test.adslive.com/government.co.za/home/gazette/ZA-GT" class="animated fadeInDown">Gauteng</a>
     <a href="http://test.adslive.com/government.co.za/home/gazette/ZA-NL" class="animated fadeInDown">Kwazulu Natal</a>
     <a href="http://test.adslive.com/government.co.za/home/gazette/ZA-LP" class="animated fadeInDown">Limpopo</a>
     <a href="http://test.adslive.com/government.co.za/home/gazette/ZA-MP" class="animated fadeInDown">Mpumalanga</a>
     <a href="http://test.adslive.com/government.co.za/home/gazette/ZA-NC" class="animated fadeInDown">Northern Cape</a>
     <a href="http://test.adslive.com/government.co.za/home/gazette/ZA-NW" class="animated fadeInDown">North West</a>
     <a href="http://test.adslive.com/government.co.za/home/gazette/ZA-WC" class="animated fadeInDown">Western Cape</a>
	</div>
	
	<button> <a href="<?php echo base_url()?>home/view/press"> Press Releases </a> </button>
	<button>  <a href="<?php echo base_url()?>home/view/success_stories">Success Stories </a>  </button>
	<button> <a href="<?php echo base_url()?>home/view/blog"> Blog </a></button>
	<button> <a href="<?php echo base_url()?>home/view/govprograms">Government Programs </a></button>
	<button> <a href="<?php echo base_url()?>home/gallery">Gallery </a></button>
</div>	
 	
-->

 	
<style>
nav li {
    display: inline-block;
    list-style-type: none;
    position: relative;
}

.main
	{
		height:100px; text-align: center;
	}

nav li ul {
    display: none;
    position: absolute;
    width: 230px;
    left: 0;
    top: 100%;
    margin: 0;
    padding: 5px; 
	z-index: 999;
	background-color: #FFFFFF;
	color: #FFFFFF;
}

nav li:hover > ul {
    display: block;font-weight: normal;
}

#mn a {
    padding: 5px 10px;margin-top:3px;
    text-align: center;
    background: #009366;
    height: 20px;
    display: block;min-width: 100px; color: #fff;text-decoration: none; font-style: normal;
}

ul li a
	{
		text-align: left;
	}
.catg
	{
		color:white;text-align: left !important;
	}
.mn1
	{
		width:200px;
	}
#mn span
	{
		margin-right:5px;
	}
	.prov
	{
		width:150px !important;
		float: left;
	}
li ul a
	{
		background-color:white;
	}
	nav a:hover{
		font-weight: normal;
	}	
</style> 	
<!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
-->
 	
 	
<nav id="mn">
   <center>
    <ul >
     
        <li class="power"><a href="#" style="height:30px;padding-top:7px;"><span class="glyphicon glyphicon-menu-down"></span>Categories</a>
            <ul>
  <a class="catg" title="Bodies and Structures" href="http://test.adslive.com/government.co.za/home/by_cat/25" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-list-alt"></span>        Bodies and Structures                                    
				</a></li>
     
 <li></li><a class="catg" title="Charitable Services" href="http://test.adslive.com/government.co.za/home/by_cat/22" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-heart"></span>          Charitable Services                                    
			</a></li>
          
 <li></li><a class="catg" title="Development Organisations" href="http://test.adslive.com/government.co.za/home/by_cat/16" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
  <span class="glyphicon glyphicon-road"></span>                    Development Organisations                                    
		</a></li>
   
 <li></li><a class="catg" title="Educational Institutions" href="http://test.adslive.com/government.co.za/home/by_cat/17" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-education"></span>                   Educational Institutions                                    
	</a></li>
      
 <li></li><a class="catg" title="Government and Law" href="http://test.adslive.com/government.co.za/home/by_cat/19" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
  <span class="glyphicon glyphicon-folder-open"></span>                  Government and Law                                    
	</a></li>

 <li></li><a class="catg" title="Government Departments" href="http://test.adslive.com/government.co.za/home/by_cat/12" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-book"></span>                 Government Departments                                    
</a></li>
      
 <li></li><a class="catg" title="Government Services" href="http://test.adslive.com/government.co.za/home/by_cat/15" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-folder-close"></span>                   Government Services                                    
                    </a>
           
 <li></li><a class="catg" title="Immigration Services" href="http://test.adslive.com/government.co.za/home/by_cat/21" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-sort"></span>                   Immigration Services                                    
</a></li>
        
 <li></li><a class="catg" title="Local Government" href="http://test.adslive.com/government.co.za/home/by_cat/13" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-bed"></span>                 Local Government                                    
</a></li>

 <li></li><a class="catg" title="Municipalities" href="http://test.adslive.com/government.co.za/home/by_cat/14" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
  <span class="glyphicon glyphicon-pawn"></span>                  Municipalities                                    
</a></li>
              
 <li></li><a class="catg" title="Rehabilitation" href="http://test.adslive.com/government.co.za/home/by_cat/24" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-registration-mark"></span>                   Rehabilitation                                    
</a></li>
               
 <li></li><a class="catg" title="Retirement Homes" href="http://test.adslive.com/government.co.za/home/by_cat/23" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-home"></span>                   Retirement Homes                                    
</a></li>
          
 <li></li><a class="catg" title="Social Services" href="http://test.adslive.com/government.co.za/home/by_cat/18" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-phone-alt"></span>                   Social Services                                    
</a></li>
             
 <li></li><a class="catg" title="Ultimate Business in Africa" href="http://test.adslive.com/government.co.za/home/by_cat/11" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
  <span class="glyphicon glyphicon-globe"></span>                  Ultimate Business in Africa                                    
</a></l9>
    
 <li></li><a class="catg" title="Youth and Community Groups" href="http://test.adslive.com/government.co.za/home/by_cat/20" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-thumbs-up"></span>                 Youth and Community Groups                                    
</a></li>
            </ul>
        </li>
        <li><a href="#" style="height:30px;padding-top:7px;"><span class="glyphicon glyphicon-menu-down"></span>Tendering</a>
        <ul>
<li><a href="<?php echo base_url()?>home/view/tenders/tips" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-folder-open"></span>Tips for Tendering </a></li>
<li><a href="<?php echo base_url()?>home/view/etenders_category" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-folder-close"></span>Category Information</a></li>
<li><a href="<?php echo base_url()?>home/view/financial" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-usd"></span>Financial Support</a></li>  
<li><a href="<?php echo base_url()?>home/view/tender_info" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-dashboard"></span>General Information</a></li> 
<li><a href="<?php echo base_url()?>home/view/how_to_tender" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-folder-open"></span>How to tender</a></li> 
<!--
<li><a href="<?php echo base_url()?>home/view/etenders_docs" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-circle-arrow-down"></span>Tender Documents </a></li>
<li><a href="<?php echo base_url()?>home/view/etenders" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-paperclip"></span>Advertised Tenders</a></li>
     -->   </ul>

        
        </li>
        <li><a href="#" style="height:30px;padding-top:7px; "><span class="glyphicon glyphicon-menu-down"></span>Gazettes</a>
         <ul>
<li><a href="http://test.adslive.com/government.co.za/home/gazette/ZA-EC" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Eastern Cape <br/><br/></a></li>
<li><a href="http://test.adslive.com/government.co.za/home/gazette/ZA-FS"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Freestate</a></li>
<li><a href="http://test.adslive.com/government.co.za/home/gazette/ZA-GT"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Gauteng</a></li>
<li><a href="http://test.adslive.com/government.co.za/home/gazette/ZA-NL"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Kwazulu Natal</a></li>
<li><a href="http://test.adslive.com/government.co.za/home/gazette/ZA-LP"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Limpopo</a></li>
<li><a href="http://test.adslive.com/government.co.za/home/gazette/ZA-MP"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Mpumalanga</a></li>
<li><a href="http://test.adslive.com/government.co.za/home/gazette/ZA-NC"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Northern Cape</a></li>
<li><a href="http://test.adslive.com/government.co.za/home/gazette/ZA-NW"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>North West</a></li>
<li><a href="http://test.adslive.com/government.co.za/home/gazette/ZA-WC"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Western Cape</a></li>
         </ul>
        </li>
    <li><a href="<?php echo base_url()?>home/view/press" style="height:30px;padding-top:7px;"><span></span> Press Releases </a> </li>
	<li> <a href="<?php echo base_url()?>home/view/success_stories" style="height:30px;padding-top:7px;"><span></span> Success Stories </a>  </li>
	<li><a href="<?php echo base_url()?>home/view/blog" style="height:30px;padding-top:7px;"><span></span>  Blog </a></li>
	<li><a href="<?php echo base_url()?>home/view/govprograms" style="height:30px;padding-top:7px;"><span></span> Government Programs </a></li>
	<li><a href="<?php echo base_url()?>home/gallery" style="height:30px;padding-top:7px;"><span></span> Gallery </a></li>
    </ul>
    </center>
</nav>
 	
 	
	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	

 	
 
 	<br/>	
 	<br/>	
 	
  	<!-- Left sidebar -->
    <div id="sidebar-left" class="col-lg-3" style="padding-left:0px;">
    	<?php include 'left_sidebar.php'; ?>
    </div>

    <div id="content" class="col-lg-6">
    
    
    
    <div class="banner">
<div class="government-info" style="width:100%;">

<!--
   

<nav id="mn">
   <center>
    <ul >
     
   <li class="power"><a href="#" style="height:30px;padding-top:7px;"><span class="glyphicon glyphicon-menu-down"></span>Government &amp; Citizens</a>
            <ul>
  <a class="catg" title="Bodies and Structures" href="<?php echo HTTP_BASE_PATH; ?>home/links/rights-and-responsibilities" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-bell"></span>       Rights &amp; Responsibilities                                    
  </a> 
  
  <a class="catg" title="Bodies and Structures" href="<?php echo HTTP_BASE_PATH; ?>home/links/disputes" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-list-alt"></span>      Disputes                                   
  </a> 
  
  <a class="catg" title="Bodies and Structures" href="<?php echo HTTP_BASE_PATH; ?>home/links/trade-unions" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-user"></span>      Trade Unions                                   
  </a>
  
  <a class="catg" title="Bodies and Structures" href="<?php echo HTTP_BASE_PATH; ?>home/links/embassies" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-book"></span>      Foreign Embassies                                  
  </a>
				
		</li>
     

           
            </ul>
        </li>
        <li><a href="#" style="height:30px;padding-top:7px;"><span class="glyphicon glyphicon-menu-down"></span>Health &amp; Safety</a>
        <ul>
<li><a href="<?php echo HTTP_BASE_PATH; ?>home/links/bullying" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-folder-open"></span>Bullying </a></li>
<li><a href="<?php echo HTTP_BASE_PATH; ?>home/links/home-safety" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-folder-close"></span>Home Safety</a></li>
<li><a href="<?php echo base_url()?>home/view/financial" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-usd"></span>Road Safety</a></li>  
<li><a href="<?php echo HTTP_BASE_PATH; ?>home/links/having-a-baby" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-dashboard"></span>Having a Baby</a></li> 
<li><a href="<?php echo HTTP_BASE_PATH; ?>home/links/childcare" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-folder-open"></span>Childcare</a></li> 

<li><a href="<?php echo HTTP_BASE_PATH; ?>home/links/family-recreation" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-circle-arrow-down"></span>Family Recreation </a></li>
<li><a href="<?php echo HTTP_BASE_PATH; ?>home/links/adoption-and-fostering" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-paperclip"></span>Adoption &amp; Fostering</a></li>
        </ul>


       
        </li>
        <li><a href="#" style="height:30px;padding-top:7px; "><span class="glyphicon glyphicon-menu-down"></span>Education &amp; Training</a>
         <ul>
<li><a href="<?php echo HTTP_BASE_PATH; ?>home/links/adult-learning" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-book"></span>Adult Learning <br/><br/></a></li>
<li><a href="<?php echo HTTP_BASE_PATH; ?>home/links/higher-education"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-education"></span>Higher Education</a></li>
<li><a href="<?php echo HTTP_BASE_PATH; ?>home/links/secondary-education"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-folder-open"></span>Secondary Education</a></li>
<li><a href="<?php echo HTTP_BASE_PATH; ?>home/links/pre-school-education"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-lock"></span>Pre-school Education</a></li>

         </ul>
        </li>
    <li><a href="<?php echo base_url()?>home/view/press" style="height:30px;padding-top:7px;"><span></span> Press Releases </a> </li>
	<li> <a href="<?php echo base_url()?>home/view/success_stories" style="height:30px;padding-top:7px;"><span></span> Success Stories </a>  </li>
	<li><a href="<?php echo base_url()?>home/view/blog" style="height:30px;padding-top:7px;"><span></span>  Blog </a></li>
	<li><a href="<?php echo base_url()?>home/view/govprograms" style="height:30px;padding-top:7px;"><span></span> Government Programs </a></li>
	<li><a href="<?php echo base_url()?>home/gallery" style="height:30px;padding-top:7px;"><span></span> Gallery </a></li>
    </ul>
    </center>
</nav>



-->



	<h2>Government Information</h2>

		<div class="info-column">
		<dl>
			<dt>Government &amp; Citizens</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/rights-and-responsibilities">Rights &amp; Responsibilities</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/disputes">Disputes</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/trade-unions">Trade Unions</a></dd>
            <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/embassies">Foreign Embassies</a></dd>
		</dl>

		<dl>
			<dt>Parenting &amp; Child Care</dt>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/health-and-safety">Health &amp; Safety</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/bullying">Bullying</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/home-safety">Home Safety</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/road-safety">Road Safety</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/having-a-baby">Having a Baby</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/childcare">Childcare</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/family-recreation">Family Recreation</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/adoption-and-fostering">Adoption &amp; Fostering</a></dd>
		</dl>

		<dl>
			<dt>Education &amp; Training</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/adult-learning">Adult Learning</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/higher-education">Higher Education</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/secondary-education">Secondary Education</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/pre-school-education">Pre-school Education</a></dd>
		</dl>

		<dl>
			<dt>Employment</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/new-jobs">New Jobs</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/workplace-problems">Workplace Problems</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/jobseekers">Jobseekers</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/safe-jobseeking">Safe Jobseeking</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/self-employment">Self-Employment</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/career-help">Career Help</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/employment-terms">Employment Terms</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/health-and-safety">Health &amp; Safety</a></dd>
		</dl>
		</div>
		<!-- column 1 -->

		<div class="info-column">

		<dl>
			<dt>S.A Youth</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/work-and-careers">Work &amp; Careers</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/health-and-relationships">Health &amp; Relationships</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/healthy-eating"> Healthy Eating</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/divorce-and-separation"> Divorce &amp; Separation</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/sports-and-leisure">Sports &amp; Leisure</a></dd>

		</dl>

		<dl>
			<dt>Community &amp; Housing</dt>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/buying-your-home">Buying Your Home</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/mortages-and-repossession">Mortages &amp; Repossession</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/buying-your-home">Building Your Home</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/owning-property">Owning Property</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/selling">Selling</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/mobile-homes">Mobile Homes</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/renting">Renting</a></dd>
		</dl>

		<dl>
			<dt>Living with Disabilities</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/employment-support">Employment Support</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/education-and-learning">Education &amp; Learning</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/motoring"> Motoring</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/home-and-living">Home &amp; Living</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/everyday-life">Everyday Life</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/health-and-support">Health &amp; Support</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/assistance-dogs">Assistance Dogs</a></dd>
		</dl>

		<dl>
			<dt>Travel &amp; Transportation</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/rules-and-codes">Rules &amp; Codes</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/road-signals">Road Signals</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/requirements">Requirements</a></dd>
            <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/safety-and-advice">Safety &amp; Advice</a></dd>
		</dl>
		</div>
		<!-- column 1 -->

		<div class="info-column">
		<dl>
			<dt>Pensioners &amp; Retirement</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/financial-support"> Financial Support</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/retirement-planning">Retirement Planning</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/health-and-well-being">Health &amp; Well Being</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/medical-support">Medical Support</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/managing-debt">Managing Debt</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/debt-and-you">Debt &amp; You</a></dd>
		</dl>

		<dl>
			<dt>Crime &amp; Justice</dt>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/victims-and-witnesses"> Victims &amp; Witnesses</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/types-of-crime">Types of Crime</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/the-police">The Police</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/court">Court</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/crime-prevention">Crime Prevention</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/being-arrested">Being Arrested</a></dd>
		    <dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/sentencing">Sentencing</a></dd>
		</dl>

		<dl>
			<dt>Environmental Awareness</dt>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/recycling-and-waste-reduction">Recycling &amp; Waste Reduction</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/energy-saving">Energy Saving</a></dd>
		</dl>

		<dl>
			<dt>Motoring &amp; Vehicles</dt>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/driver-licensing">Driver Licensing</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/stolen-vehicle">Stolen Vehicle</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/owning-a-vehicle">Owning a Vehicle</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/learners-and-drivers">Learners &amp; Drivers</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/number-plates">Number Plates</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/driver-safety">Driver Safety</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/vehicle-advice">Vehicle Advice</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/buying-and-selling">Buying &amp; Selling</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/driving-career">Driving Career</a></dd>
			<dd><a href="<?php echo HTTP_BASE_PATH; ?>home/links/motor-insurance-explained">Motor Insurance Explained</a></dd>
		</dl>
	</div>
</div> <!-- /.goverment-info -->

<script type="text/javascript">
$(document).ready( function() {

   $('a[href^="#"]').click(function(e) {
//      $("html, body").delay(1000).animate({scrollTop: $('.post').offset().top }, 2000);
//       // e.preventDefault();
   });
 //    $(document).ready(function () {
	// 	$("html, body").animate({scrollTop: $('.post').offset().top }, 700);
	// });
});
</script>


<h2>Featured Listings</h2>
<div id="yw0" class="list-view">
<div class="summary"></div>

<div class="items">

    <div class="table-responsive">

    <table class="display listing_table" cellspacing="0" width="100%">
    	<thead><tr><th></th></tr></thead>
    	<tbody>
		<?php foreach ($featured_listings as $featured){
			$telephone = $featured->telephone;
			$telephone = explode(',',$telephone);
			$telephone = $telephone[0];
			$telephone = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3', $telephone);			
			//check logo image file
			if(!$featured->logo)
				$image = CDN_BASE_PATH.'uploads/noimage.jpg';
			else
				$image = CDN_BASE_PATH.$featured->logo;
        ?>
        <tr>

            <td>
            <div class="view">
            <a class="listing_ad" href="<?php echo HTTP_BASE_PATH.'home/company/'.$featured->id; ?>"  rel="follow">
            <img width="130" src="<?php echo $image;?>" alt="<?php echo $featured->name;?>"/>
            </a>

            <div class="info">
                <h4 class="short">
                    <a class="listing_ad" href="<?php echo HTTP_BASE_PATH.'home/company/'.$featured->id; ?>"  rel="follow"><?php echo $featured->name;?></a>
                </h4>

                <address class="short">
                <i class="fa fa-map-marker"></i>
                <?php echo $featured->address;?>
                </address>

                <div class="phone">
                <i class="fa fa-phone"></i>
                <?php echo $telephone?>
                </div>
             </div>

            </div>
        	</td>
          </tr>
          <script type="text/javascript">
				$(document).ready(function(){
						  var id = <?php echo $featured->id;?>;
						  //do your tracking
						  $.ajax({
							  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
							  data: {"link" : "<?php echo HTTP_BASE_PATH; ?>home/company/<?php echo $featured->id;?>",
									 "ad_type" : "listing",
									 "company_listing_shown" : id},
							  type: 'post',
							  complete: function(){
								  //now do the redirect
							  }
					});
				});
				</script>
        <?php }?>
        <script type="text/javascript">
				$(document).ready(function(){
					$('.listing_ad').click(function() {
						  var href = $(this).attr("href");
						  var id = <?php echo $featured->id;?>;
						  //do your tracking
						  $.ajax({
							  url: '<?php echo HTTP_BASE_PATH; ?>home/update_stats',
							  data: {"link" : "<?php echo HTTP_BASE_PATH; ?>home/company/<?php echo $featured->id;?>",
									 "ad_type" : "listing",
									 "company_listing_visited" : id},
							  type: 'post',
							  complete: function(){
								  //now do the redirect
							  }
						 });
					});
				});
				</script>
        </tbody>
      </table>

    </div>
 </div>
</div>

	<div class="news-widget" style="height:1514px;overflow-y:scroll;">

		<h2 class="news-widget__h">Latest News</h2>

        <?php for($x=0;$x<sizeof($news);$x++){ ?>
            <article>
                <h5 class="news-widget__title"><?=strlen($news[$x]['title']) > 50 ? substr($news[$x]['title'], 0, 50) . '...' : $news[$x]['title']?></h5>
                <div class="news-widget__content">
                <?=strlen($news[$x]['description']) > 450 ? substr($news[$x]['description'], 0, 750) . '...' : $news[$x]['description']?>
                </div>
                <a href="<?=$news[$x]['link']?>" class="news-widget__more" target="_blank">Read More</a>
            </article>
		<?php }?>
	</div>
<!-- /#news -->
    </div>
</div>

    <!-- Right sidebar -->
    <div id="right_sidebar" class="col-lg-3" style="padding-right:0px;">
      	<?php include 'right_sidebar.php'; ?>
    </div>

  </div>
</div>

<?php $this->load->view('vwFooter'); ?>
