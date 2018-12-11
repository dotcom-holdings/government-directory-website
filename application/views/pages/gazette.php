<style>
.post-content{
	display: -webkit-flex;
	display: -moz-flex;
	display: -ms-flex;
	display: -o-flex;
	display: flex;
	-webkit-flex-direction: column-reverse;
	-moz-flex-direction: column-reverse;
	-ms-flex-direction: column-reverse;
	-o-flex-direction: column-reverse;
	flex-direction: column-reverse;
	color: cadetblue !important;
}
	
	h2 {
  color: #fff;
  font-size: 24px;
}
	ul {
  font-size: 14px;
		display: block;
}
	
</style>
<br/><br/><br/><br/><br/><br/><br/><br/><br/> 
<br/>
<br/>
<br/>

<div class="container margin-top">
   
    <div class="row">
           <div class="col-md-12"><br/><br/><br/><br/>
<!--
           <br><?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?>
            <h1 class="right-line no-margin-bottom">Gazettes</h1>
-->
        </div>
           <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 col-sm-4">
				<h4 style="color: #000"><strong>Provincial Gazettes</strong></h4>
<!--				<h4 style="color: #333"><hr class="dotted margin-small" style="padding-top: 9px;padding-bottom: 9px"></h4>-->
	<ul class="list-group" style="height:500px;overflow-y:scroll;">
<li class="list-group-item" >
		<div class="tab-pane" id="messages3">
                  <p class="small1"><strong>Provincial</strong> Gazettes <?php echo date('y');?></p>
                  
                  <hr class="dotted margin-small">
                  <p class="small1"><a href="<?php echo base_url()?>home/gazette/ZA-EC" class="animated fadeInDown">Eastern Cape</a></p>
                  
                  
                  <hr class="dotted margin-small">
                  <p class="small1"><a href="<?php echo base_url()?>home/gazette/ZA-FS" class="animated fadeInDown">Freestate</a></p>
                  
                  
                  <hr class="dotted margin-small">
                  <p class="small1"><a href="<?php echo base_url()?>home/gazette/ZA-GT" class="animated fadeInDown">Gauteng</a></p>
                  
                  
                  <hr class="dotted margin-small">
                  <p class="small1"><a href="<?php echo base_url()?>home/gazette/ZA-NL" class="animated fadeInDown">Kwazulu Natal</a></p>
                  
                  
                  <hr class="dotted margin-small">
                  <p class="small1"> <a href="<?php echo base_url()?>home/gazette/ZA-LP" class="animated fadeInDown">Limpopo</a></p>
                  
                  
                  <hr class="dotted margin-small">
                  <p class="small1"><a href="<?php echo base_url()?>home/gazette/ZA-MP" class="animated fadeInDown">Mpumalanga</a></p>
                  
                  
                  <hr class="dotted margin-small">
                  <p class="small1"><a href="<?php echo base_url()?>home/gazette/ZA-NC" class="animated fadeInDown">Northern Cape</a></p>
                  
                  
                  <hr class="dotted margin-small">
                  <p class="small1"><a href="<?php echo base_url()?>home/gazette/ZA-NW" class="animated fadeInDown">North West</a></p>
                  
                  
                  <hr class="dotted margin-small">
                  <p class="small1"><a href="<?php echo base_url()?>home/gazette/ZA-WC" class="animated fadeInDown">Western Cape</a></p>
                  
                  
              </div>
</li>

</ul>
                </div>
            </div>
        </div>
      
		
      <div class="col-md-6">
            <div class="row">
                <div class="col-md-12 col-sm-4">
				<h4 style="color: #000"><strong><?php echo $cat;?> Gazettes <?php echo @date('Y')?></strong></h4>
<!--	<h6 style="color: #333">The biggest freely available collection of gazettes in the country </h6>-->
	<ul class="list-group">
<li class="list-group-item" style="height: 500px;overflow-y: scroll">
		<div>
		<?php
			$year=@date('Y');
	$curl = curl_init('https://opengazettes.org.za/gazettes/ZA-NL/'.$year.'');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

	$page = curl_exec($curl);

	if(curl_errno($curl)) // check for execution errors
	{
		echo 'Scraper error: ' . curl_error($curl);
		exit;
	}

	curl_close($curl);

	$regex = '/<div class="post-content">(.*?)<\/div>/s';
	if ( preg_match($regex, $page, $list) )
		echo $list[0];
	else 
		print "Not found";
?></div>
</li>

</ul>
                </div>
            </div>
        </div>
       
        
        
    </div>
    
    <!--separator-->
    
     
    <!--latest news sector--></div> <!-- row -->
    
</div>
