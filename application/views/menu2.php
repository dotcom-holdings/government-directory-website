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



<nav id="mn">
   <center>
    <ul >
     
        <li class="power"><a href="#" style="height:30px;padding-top:7px;"><span class="glyphicon glyphicon-menu-down"></span>Categories</a>
            <ul>
  <a class="catg" title="Bodies and Structures" href="<?php echo base_url(); ?>home/by_cat/25" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-list-alt"></span>        Bodies and Structures                                    
				</a></li>
     
 <li></li><a class="catg" title="Charitable Services" href="<?php echo base_url(); ?>home/by_cat/22" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-heart"></span>          Charitable Services                                    
			</a></li>
          
 <li></li><a class="catg" title="Development Organisations" href="<?php echo base_url(); ?>home/by_cat/16" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
  <span class="glyphicon glyphicon-road"></span>                    Development Organisations                                    
		</a></li>
   
 <li></li><a class="catg" title="Educational Institutions" href="<?php echo base_url(); ?>home/by_cat/17" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-education"></span>                   Educational Institutions                                    
	</a></li>
      
 <li></li><a class="catg" title="Government and Law" href="<?php echo base_url(); ?>home/by_cat/19" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
  <span class="glyphicon glyphicon-folder-open"></span>                  Government and Law                                    
	</a></li>

 <li></li><a class="catg" title="Government Departments" href="<?php echo base_url(); ?>home/by_cat/12" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-book"></span>                 Government Departments                                    
</a></li>
      
 <li></li><a class="catg" title="Government Services" href="<?php echo base_url(); ?>home/by_cat/15" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-folder-close"></span>                   Government Services                                    
                    </a>
           
 <li></li><a class="catg" title="Immigration Services" href="<?php echo base_url(); ?>home/by_cat/21" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-sort"></span>                   Immigration Services                                    
</a></li>
        
 <li></li><a class="catg" title="Local Government" href="<?php echo base_url(); ?>home/by_cat/13" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
   <span class="glyphicon glyphicon-bed"></span>                 Local Government                                    
</a></li>

 <li></li><a class="catg" title="Municipalities" href="<?php echo base_url(); ?>home/by_cat/14" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
  <span class="glyphicon glyphicon-pawn"></span>                  Municipalities                                    
</a></li>
              
 <li></li><a class="catg" title="Rehabilitation" href="<?php echo base_url(); ?>home/by_cat/24" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-registration-mark"></span>                   Rehabilitation                                    
</a></li>
               
 <li></li><a class="catg" title="Retirement Homes" href="<?php echo base_url(); ?>home/by_cat/23" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-home"></span>                   Retirement Homes                                    
</a></li>
          
 <li></li><a class="catg" title="Social Services" href="<?php echo base_url(); ?>home/by_cat/18" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
 <span class="glyphicon glyphicon-phone-alt"></span>                   Social Services                                    
</a></li>
             
 <li></li><a class="catg" title="Ultimate Business in Africa" href="<?php echo base_url(); ?>home/by_cat/11" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
  <span class="glyphicon glyphicon-globe"></span>                  Ultimate Business in Africa                                    
</a></l9>
    
 <li></li><a class="catg" title="Youth and Community Groups" href="<?php echo base_url(); ?>home/by_cat/20" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left">
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

<li><a href="<?php echo base_url()?>home/view/etenders_docs" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-circle-arrow-down"></span>Tender Documents </a></li>
<li><a href="<?php echo base_url()?>home/view/etenders" class="mn1" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-paperclip"></span>Advertised Tenders</a></li>
        </ul>

        
        </li>
        <li><a href="#" style="height:30px;padding-top:7px; "><span class="glyphicon glyphicon-menu-down"></span>Gazettes</a>
         <ul>
<li><a href="<?php echo base_url(); ?>home/gazette/ZA-EC" style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Eastern Cape <br/><br/></a></li>
<li><a href="<?php echo base_url(); ?>home/gazette/ZA-FS"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Freestate</a></li>
<li><a href="<?php echo base_url(); ?>home/gazette/ZA-GT"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Gauteng</a></li>
<li><a href="<?php echo base_url(); ?>home/gazette/ZA-NL"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Kwazulu Natal</a></li>
<li><a href="<?php echo base_url(); ?>home/gazette/ZA-LP"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Limpopo</a></li>
<li><a href="<?php echo base_url(); ?>home/gazette/ZA-MP"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Mpumalanga</a></li>
<li><a href="<?php echo base_url(); ?>home/gazette/ZA-NC"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Northern Cape</a></li>
<li><a href="<?php echo base_url(); ?>home/gazette/ZA-NW"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>North West</a></li>
<li><a href="<?php echo base_url(); ?>home/gazette/ZA-WC"  style="width:210px;background-color:white;border:solid 1px silver;color:#333;height:25px;padding-left: 8px;padding-top:4px;padding-bottom: 4px;text-align: left"><span class="glyphicon glyphicon-globe"></span>Western Cape</a></li>
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
 	