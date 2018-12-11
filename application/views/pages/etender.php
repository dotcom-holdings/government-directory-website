<?php
include_once("external.php");


$html = new simple_html_dom();
$html->load(@$input);

$html = new simple_html_dom();
$html->load_file($link);
$con_div = $html->find('div.view-content',0);


//get value plaintext each html

foreach($html->find('img') as $img){
$img->setAttribute('src',''.base_url().'assets/images/file.png');
	$img->setAttribute('width','20px');
}


?>


    

 <br>
<br>
<br>
<br>
<br>
<br>
<br>

<style>
.field-label-hidden,.file-icon,.file,.even
	{
		visibility: visible;
	}

</style>

	 <div class="container" >
<!--
	 <div class="col-md-12">
		 <br>
           <?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?>
            <h2 class="right-line">eTenders</h2>
            <h6 style="color: #333">
	<a href="<?php echo base_url()?>pages/tenders/tips">Tips for Tendering </a>|
	<a href="<?php echo base_url()?>pages/view/etenders_category">Category Information</a>|
	<a href="<?php echo base_url()?>pages/tenders/financial">Financial Support</a> | 
	<a href="<?php echo base_url()?>pages/tenders/non-financial">Non-financial Support</a>|
	<a href="<?php echo base_url()?>pages/view/tender_info">General Information</a>| 
	<a href="<?php echo base_url()?>pages/view/how_to_tender">How to tender</a>| 
	<a href="<?php echo base_url()?>pages/view/etenders_docs">Tender Documents </a>|
	<a href="<?php echo base_url()?>pages/view/etenders">Advertised Tenders</a>| 
	<a href="<?php echo base_url()?>pages/view/etenders_awarded">Awarded Tenders</a>| 
	<a href="<?php echo base_url()?>pages/view/etenders_closed">Closed Tenders</a>|
	<a href="<?php echo base_url()?>pages/view/etenders_cancelled">Cancelled Tenders</a>
</h6>
        </div>
-->
        
       
        
        
	<div class="col-md-12">
		  <?php include_once("links.php") ?>
		 <ul  >
			
			
			 <li class="list-group-item" style="margin-bottom:50px;padding-bottom:50px;">
		     
				 <?php echo $con_div;?>
				 
			
			 </li>
			 </ul>
		 </div>
		 </div> 

 