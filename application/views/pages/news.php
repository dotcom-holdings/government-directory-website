
<div class="container">
   <center><h3 class="animated fadeInDownBig animation-delay-13 " style="color: #333;text-shadow: 2px 2px 4px #999;padding-bottom: 12px">GREAT IN-DEPTH 
	BROADCASTING PLATFORM OF GOOD GOVERNMENT NEWS. <br></h3></center>
     <div class="row">
       <div class="col-md-12">

<div id="carousel-example-generic" class="carousel slide  pull-left" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
      <?php foreach ($classified_images_top_banner3 as $image_left){ ?>
        
		<?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
      
    <div class="item active">
      <button class="btn btn-default btn-lg btn-ar thumbnail pull-left" data-toggle="modal" data-target="#<?php echo $image_left->id;?>" >
         <img class="img-responsive " alt="Image" width="524" height="68" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>">
      </button>
    </div>
     <?php }?>
      
   
  
                 <?php foreach ($classified_images_top_banner2 as $image_left){ ?>
        
		<?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
      
    <div class="item">
      <button class="btn btn-default btn-lg btn-ar thumbnail pull-left" data-toggle="modal" data-target="#<?php echo $image_left->id;?>" >
                  <img class="img-responsive " alt="Image" width="524" height="68" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"  >
      </button>
    </div>
             
               
         <?php }?>
                 
    </div>
</div>      
  
  <div id="carousel-example-generic" class="carousel slide pull-left" data-ride="carousel">
  <!-- Indicators -->
 

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php foreach ($classified_images_top_banner4 as $image_left){ ?>
        
		<?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
      
    <div class="item active">
      <button class="btn btn-default btn-lg btn-ar thumbnail pull-left" data-toggle="modal" data-target="#<?php echo $image_left->id;?>" style="margin-left: 67px">
                  <img class="img-responsive " alt="Image" width="524" height="68" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>">
             </button>
     
   
             
               
         <?php }?>
      <div class="carousel-caption">
       
      </div>
    </div>
  
                 <?php foreach ($classified_images_top_banner as $image_left){ ?>
        
		<?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
      
    <div class="item">
      <button class="btn btn-default btn-lg btn-ar thumbnail pull-left" data-toggle="modal" data-target="#<?php echo $image_left->id;?>" style="margin-left: 67px">
                  <img class="img-responsive " alt="Image" width="524" height="68" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>">
             </button>
     
    </div>
             
               
         <?php }?>
                 
    </div>
</div>      
        <?php foreach ($classified_images_top_banner as $image_left){ ?>
        
		<?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
		
		
            <!-- Modal -->
             <center>
           
<div class="modal fade" 
 id="<?php echo $image_left->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	
<div class="modal-dialog" style="width:70%">
<div class="modal-content" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: left">
            <img class="img-responsive pull-left" id="company-logo" src="<?php echo CDN_BASE_PATH.$company->logo;?>" 
				 style="min-width: 110px !important; max-width: 150px !important; min-height: 110px !important; max-height: 150px !important;">
         </div>
		<div class="col-lg-10 col-md-11 col-sm-11 col-xs-11" style="float: left">
			
		<h3 class="text-left" id="myModalLabel" style=" color:#0091CF;padding-left: 6px"><strong><?php echo $image_left->name; ?></strong></h3>
		</div>
    </div>
    <div class="modal-body">
       
		<div class="panel-body" style="text-align: left">
		
		
		<center>
			<div id="<?php echo $company->name;?>" style="display: none">
				<button onclick="toggle_visibility('<?php echo $company->name;?>');" class="btn btn-primary btn-lg btn-ar btn-block" >Close Advert</button>
				<br>
					<?php if(!$company->advert) {}
				       else {
						$advert = CDN_BASE_PATH.$company->advert;?>
				<a class="ad" href="<?php echo $advert?>">
					<img class="img-responsive" alt="No Advert Listed Yet." src="<?php echo $advert;?>">
				</a>
					<?php }?>
					
					
			</div>
         </center>
		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8 listing-description-co">
                
			                
                                    <p><b><img src="<?php echo base_url()?>assets/images/home-circle_318-27961.jpg" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Address: &nbsp;</b><?php echo $company->address;?></p>
                                    <?php if(!empty($company->paddress)) {?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/pobox.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Postal Address: &nbsp;</b><?php echo $company->paddress;?></p>
                                    <?php }?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/telephone.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Telephone: &nbsp;</b><?php echo $company->telephone;?></p>
                                    <?php if($company->mobile) {?>

                                    <p><b><img src="<?php echo base_url()?>assets/images/mobile.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Cellular: &nbsp;</b><?php echo $company->mobile;?></p>
                                    <?php }?>
                                    <?php if($company->fax) {?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/fax.png" width="20" height="20"  alt="image"/>&nbsp;&nbsp;Fax: &nbsp;</b><?php echo $company->fax;?></p>
                                    <?php }?>
                                    <?php if($company->email) {?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/email.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Email: &nbsp;</b><a href="mailto:<?php echo $company->email;?>"><?php echo $company->email;?></a></p>
                                    <?php }?>
                                    <?php if($company->website) {
										$website = explode(",",$company->website);?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/web_design_icon.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Website: &nbsp;</b>
                                    <?php for($x=0;$x<sizeof($website);$x++){?>
                                    <a id="web" href="http://<?php echo $website[$x];?>" target="_blank"><?php echo $website[$x];?></a>&nbsp;&nbsp;
                                    <?php }?>
                                    </p>
                                    <?php }?>
                                    
                                    
            </div>
					<?php if($company->about_us) {?>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about_us_p">
                                <h4>About Us:</h4> 
                                <p><?php echo $company->about_us;?></p>       
                              </div>
					<?php }?>
                              
                              
		
</div>
		
		
    </div>


	
    <div class="modal-footer">
      <center>
				<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>	
		  <?php if(!$company->advert) {}
				       else { ?>
			<button onclick="toggle_visibility('<?php echo $company->name;?>');" class="btn btn-primary btn-lg btn-ar btn-block" >View Advert</button>
					<?php }?>
		  
				
	
	  </center>
	</div>
		</center>
</div>
 <!-- end Modal -->
 <?php }?>  
	</div>
	  </div> 
	    </center>
	      </div>
	        </div>
	          </div>
<div class="container" style="margin-top: -20px">
   
    <div class="row">
      
       <div class="col-md-12">
            <h2 class="right-line no-margin-bottom">Latest News</h2><br>
        </div>
        <div class="col-md-9">
             <!-- carousel -->
          <?php if(!empty($news)){?>
                <div class="col-sm-6" style="margin-left: -11px">
                    
                    <h4 class="strong"><a href="<?php echo base_url()?>post/0"><?php 
						 print_r($news[0]['title']);
						?><br></a></h4>
                     <small><a href="#"><?php 
						 print_r($news[0]['author']);
						?></a> | <?php 
						 
				   		$originalDate = $news[0]['pubDate'];
				   		$newDate = date(" M d , Y ", strtotime($originalDate));
				   		echo $newDate
						?></small>
                    <p>
                    
                   	<?php		 
						$string = $news[0]['description'];
						$string =character_limiter($string,940);
						echo $string;
					?>
						<a href="<?php echo base_url()?>post/0">read more</a>
                    </p>
                </div>
                <div class="col-sm-6" style="margin-left: -5px">
                    <h4 class="strong"><a href="<?php echo base_url()?>post/1"><?php 
						 print_r($news[1]['title']);
						?><br></a></h4>
               <small><a href="#"><?php 
						 print_r($news[1]['author']);
						?></a> | <?php 
						 
				   		$originalDate = $news[1]['pubDate'];
				   		$newDate = date(" M d , Y ", strtotime($originalDate));
				   		echo $newDate
						?></small>
                <p>
                    
                   	<?php		 
						$string = $news[1]['description'];
						$string =character_limiter($string,940);
						echo $string;
					?>
                    <a href="<?php echo base_url()?>post/1">read more</a>	
                    </p>
                </div>
			<?php } else{ 
				echo("<meta http-equiv='refresh' content='1'>"); 
				}?>
        </div><br>
		<div class="col-md-3">
		
			<?php foreach ($classified_images_left2 as $image_left){ ?>
        
		<?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
		
		
           <center><a href="" data-toggle="modal" data-target="#<?php echo $image_left->id;?>"> <img class="thumbnail" alt="Image" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>" style="margin-top: 11px;margin-left:-45px;">
		   </a></center>
			
        
            <!-- Modal --><center>
<div class="modal fade" 
id="<?php echo $image_left->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	
<div class="modal-dialog" style="width:70%">
<div class="modal-content" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: left">
            <img class="img-responsive pull-left" id="company-logo" src="<?php echo CDN_BASE_PATH.$company->logo;?>" 
				 style="min-width: 110px !important; max-width: 150px !important; min-height: 110px !important; max-height: 150px !important;">
         </div>
		<div class="col-lg-10 col-md-11 col-sm-11 col-xs-11" style="float: left">
			
		<h3 class="text-left" id="myModalLabel" style=" color:#0091CF;padding-left: 6px"><strong><?php echo $image_left->name; ?></strong></h3>
		</div>
    </div>
    <div class="modal-body">
       
		<div class="panel-body" style="text-align: left">
		
		
		<center>
			<div id="<?php echo $company->name;?>" style="display: none">
				<button onclick="toggle_visibility('<?php echo $company->name;?>');" class="btn btn-primary btn-lg btn-ar btn-block" >Close Advert</button>
				<br>
					<?php if(!$company->advert) {}
				       else {
						$advert = CDN_BASE_PATH.$company->advert;?>
				<a class="ad" href="<?php echo $advert?>">
					<img class="img-responsive" alt="No Advert Listed Yet." src="<?php echo $advert;?>">
				</a>
					<?php }?>
					
					<br>
			</div>
         </center>
         
		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8 listing-description-co">
                
			                
                                    <p><b><img src="<?php echo base_url()?>assets/images/home-circle_318-27961.jpg" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Address: &nbsp;</b><?php echo $company->address;?></p>
                                    <?php if(!empty($company->paddress)) {?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/pobox.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Postal Address: &nbsp;</b><?php echo $company->paddress;?></p>
                                    <?php }?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/telephone.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Telephone: &nbsp;</b><?php echo $company->telephone;?></p>
                                    <?php if($company->mobile) {?>

                                    <p><b><img src="<?php echo base_url()?>assets/images/mobile.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Cellular: &nbsp;</b><?php echo $company->mobile;?></p>
                                    <?php }?>
                                    <?php if($company->fax) {?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/fax.png" width="20" height="20"  alt="image"/>&nbsp;&nbsp;Fax: &nbsp;</b><?php echo $company->fax;?></p>
                                    <?php }?>
                                    <?php if($company->email) {?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/email.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Email: &nbsp;</b><a href="mailto:<?php echo $company->email;?>"><?php echo $company->email;?></a></p>
                                    <?php }?>
                                    <?php if($company->website) {
										$website = explode(",",$company->website);?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/web_design_icon.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Website: &nbsp;</b>
                                    <?php for($x=0;$x<sizeof($website);$x++){?>
                                    <a id="web" href="http://<?php echo $website[$x];?>" target="_blank"><?php echo $website[$x];?></a>&nbsp;&nbsp;
                                    <?php }?>
                                    </p>
                                    <?php }?>
                                    
                                    
            </div>
					<?php if($company->about_us) {?>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about_us_p">
                                <h4>About Us:</h4> 
                                <p><?php echo $company->about_us;?></p>       
                              </div>
					<?php }?>
                              
                              
		
</div>
		
		
    </div>
	
    <div class="modal-footer">
      <center>
				<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>	
		  <?php if(!$company->advert) {}
				       else { ?>
			<button onclick="toggle_visibility('<?php echo $company->name;?>');" class="btn btn-primary btn-lg btn-ar btn-block" >View Advert</button>
					<?php }?>
		  
				
	
	  </center>
				</div>
			</div>
		</div>
	</div></center>
 <!-- end Modal -->
 <?php }?>  
		</div></div></center></div>
    <div class="container" >
    <div class="row" style="margin-top: -90">
        <div class="col-md-12">
            <h2 class="right-line no-margin-bottom">News by Province</h2>
        </div>
        <div class="col-md-4">
            <br>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/category/ecape-government">
                <img src="<?php echo base_url()?>assets/images/ec.png" alt="Eastern Cape" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/category/ecape-government">Eastern Cape</a></h4>
                <p><small>A region of great natural beauty, particularly the rugged cliffs, rough seas and dense green bush known as the Wild Coast.</small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/category/fs-government">
                <img src="<?php echo base_url()?>assets/images/FS.png" alt="Freestate" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/category/fs-government">Free State</a></h4>
                <p><small>Is in the centre of South Africa, it's a region of flat, rolling grassland and crop fields rising to sandstone mountains in the northeast.</small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/category/gau-government">
                <img src="<?php echo base_url()?>assets/images/GT.png" alt="Gauteng" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/category/gau-government">Gauteng</a></h4>
                <p><small>With only 1.4% of SA’s land area Gauteng province, contributes to around 34% of the national economy.</small></p>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <br>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/category/kzn-government">
                <img src="<?php echo base_url()?>assets/images/KZ.png" alt="KwaZulu-Natal" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/category/kzn-government">KwaZulu-Natal</a></h4>
                <p><small>South Africa’s garden province, a subtropical region of lush and well-watered valleys, washed by the warm Indian Ocean. </small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/category/lim-government">
                <img src="<?php echo base_url()?>assets/images/LP.png" alt="Limpopo" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/category/lim-government">Limpopo</a></h4>
                <p><small>Limpopo is South Africa’s northernmost province, the gateway to the rest of Africa, lying in the great curve of the Limpopo River.</small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/category/mpg-government">
                <img src="<?php echo base_url()?>assets/images/MP.png" alt="Mpumalanga" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/category/mpg-government">Mpumalanga </a></h4>
                <p><small>Mpumalanga – “the place where the sun rises” – is a province of spectacular scenic beauty and an abundance of wildlife.</small></p>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <br>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/category/ncape-government">
                <img src="<?php echo base_url()?>assets/images/NC.png" alt="Northern Cape" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/category/ncape-government">Northern Cape </a> </h4>
                <p><small>This is SA’s largest province – around the size of Germany – and takes up nearly a third of the country’s land area.</small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/category/nw-government">
                <img src="<?php echo base_url()?>assets/images/NW.png" alt="North West" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/category/nw-government">North West </a></h4>
                <p><small>North West is home to Sun City resort and the world’s richest platinum reserves, so tourism and mining dominate. </small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/category/wcape-government">
                <img src="<?php echo base_url()?>assets/images/WC.png" alt="Western Cape" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/category/wcape-government">Western Cape</a></h4>
                <p><small>This is the most beautiful provinces,it's a region of majestic mountains, colourful patchworks of farmland set in lovely valleys.</small></p>
              </div>
            </div>
        </div>
    </div> <!-- row -->
     
    <div class="row">
      <center>
        <div class="col-md-12">
		
		<hr>
        <div id="carousel-example-generic" class="carousel slide pull-left" data-ride="carousel">
          <!-- Indicators -->
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php foreach ($classified_images_left4 as $image_left){ ?>
            <?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
            <div class="item active">
              <button class="btn btn-default btn-lg btn-ar thumbnail pull-left" data-toggle="modal" data-target="#<?php echo $image_left->id;?>"> <img class="img-responsive " alt="Image" width="300" height="250" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"> </button>
              <?php }?>
              <div class="carousel-caption"></div>
            </div>
            <?php foreach ($classified_images_left3 as $image_left){ ?>
            <?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
            <div class="item">
              <button class="btn btn-default btn-lg btn-ar thumbnail pull-left" data-toggle="modal" data-target="#<?php echo $image_left->id;?>"> <img class="img-responsive " alt="Image" width="300" height="250" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"> </button>
            </div>
            <?php }?>
          </div>
        </div>
        <div id="carousel-example-generic" class="carousel slide pull-left" data-ride="carousel">
          <!-- Indicators -->
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php foreach ($classified_images_left6 as $image_left){ ?>
            <?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
            <div class="item active">
              <button class="btn btn-default btn-lg btn-ar thumbnail pull-left" data-toggle="modal" data-target="#<?php echo $image_left->id;?>" style="margin-left: 100px"> <img class="img-responsive " alt="Image" width="300" height="250" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"> </button>
              <?php }?>
              <div class="carousel-caption"></div>
            </div>

            <?php foreach ($classified_images_left7 as $image_left){ ?>
            <?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
            <div class="item">
              <button class="btn btn-default btn-lg btn-ar thumbnail pull-left" data-toggle="modal" data-target="#<?php echo $image_left->id;?>" style="margin-left: 100px"> <img class="img-responsive " alt="Image" width="300" height="250" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"> </button>
            </div>
            <?php }?>
          </div>
        </div>
        <div id="carousel-example-generic" class="carousel slide pull-left" data-ride="carousel">
          <!-- Indicators -->
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php foreach ($classified_images_left8 as $image_left){ ?>
            <?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
            <div class="item active">
              <button class="btn btn-default btn-lg btn-ar thumbnail pull-left" data-toggle="modal" data-target="#<?php echo $image_left->id;?>" style="margin-left: 100px"> <img class="img-responsive " alt="Image" width="300" height="250" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"> </button>
              <?php }?>
              <div class="carousel-caption"></div>
            </div>
            <?php foreach ($classified_images_left9 as $image_left){ ?>
            <?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
            <div class="item">
              <button class="btn btn-default btn-lg btn-ar thumbnail pull-left" data-toggle="modal" data-target="#<?php echo $image_left->id;?>" style="margin-left: 100px"> <img class="img-responsive " alt="Image" width="300" height="250" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>"> </button>
            </div>
            <?php }?>
          </div>
        </div>
        </div>
			
  		</center>
  		
   	</div>
    <div class="row">
       <hr>
        <div class="col-md-8">
            <h2 class="section-title">Provincial Gazettes</h2>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-caption-ar">
                        <img src="<?php echo base_url()?>assets/images/easterncape.fw.png" class="img-responsive" alt="Image">
                        <div class="caption-ar">
                            <div class="caption-content">
                                <a href="<?php echo base_url()?>pages/gazette/ZA-EC" class="animated fadeInDown">View Gazette</a>
                                <h4 class="caption-title">Eastern Cape</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-caption-ar">
                        <img src="<?php echo base_url()?>assets/images/freestate.fw.png" class="img-responsive" alt="Image">
                        <div class="caption-ar">
                            <div class="caption-content">
                                <a href="<?php echo base_url()?>pages/gazette/ZA-FS" class="animated fadeInDown">View Gazette</a>
                                <h4 class="caption-title">Freestate</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-caption-ar">
                        <img src="<?php echo base_url()?>assets/images/gauteng.fw.png" class="img-responsive" alt="Image">
                        <div class="caption-ar">
                            <div class="caption-content">
                               <a href="<?php echo base_url()?>pages/gazette/ZA-GT" class="animated fadeInDown">View Gazette</a>
                                <h4 class="caption-title">Gauteng</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-caption-ar">
                       <img src="<?php echo base_url()?>assets/images/kzn.fw.png" class="img-responsive" alt="Image">
                        <div class="caption-ar">
                            <div class="caption-content">
                                <a href="<?php echo base_url()?>pages/gazette/ZA-NL" class="animated fadeInDown">View Gazette</a>
                                <h4 class="caption-title">Kwazulu natal</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-caption-ar">
                       <img src="<?php echo base_url()?>assets/images/limpopo.fw.png" class="img-responsive" alt="Image">
                        <div class="caption-ar">
                            <div class="caption-content">
                               <a href="<?php echo base_url()?>pages/gazette/ZA-LP" class="animated fadeInDown">View Gazette</a>
                                <h4 class="caption-title">Limpopo</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-caption-ar">
                       <img src="<?php echo base_url()?>assets/images/mpumalanga.fw.png" class="img-responsive" alt="Image">
                        <div class="caption-ar">
                            <div class="caption-content">
                                <a href="<?php echo base_url()?>pages/gazette/ZA-MP" class="animated fadeInDown">View Gazette</a>
                                <h4 class="caption-title">Mpumalanga</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-caption-ar">
                       <img src="<?php echo base_url()?>assets/images/northwest.fw.png" class="img-responsive" alt="Image">
                        <div class="caption-ar">
                            <div class="caption-content">
                               <a href="<?php echo base_url()?>pages/gazette/ZA-NW" class="animated fadeInDown">View Gazette</a>
                                <h4 class="caption-title">North West</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-caption-ar">
                        <img src="<?php echo base_url()?>assets/images/notherncape.fw.png" class="img-responsive" alt="Image">
                        <div class="caption-ar">
                            <div class="caption-content">
                                <a href="<?php echo base_url()?>pages/gazette/ZA-NC" class="animated fadeInDown">View Gazette</a>
                                <h4 class="caption-title">Northen Cape</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="img-caption-ar">
                       <img src="<?php echo base_url()?>assets/images/westerncape.png" class="img-responsive" alt="Image">
                        <div class="caption-ar">
                            <div class="caption-content">
                                <a href="<?php echo base_url()?>pages/gazette/ZA-WC" class="animated fadeInDown">View Gazette</a>
                                <h4 class="caption-title">Western Cape</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="section-title">Publications</h2>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-ar">
              <li class="active"><a href="#home3" data-toggle="tab">Tenders</a></li>
              <li><a href="#profile3" data-toggle="tab">National Gazettes</a></li>
              <li><a href="#messages3" data-toggle="tab">Provincial</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
             
              <div class="tab-pane active" id="home3" >
               <h3 ><strong><b>Latest Tenders</b></strong></h3>
               <h6 style="color:#333">Download Latest Tender Bulletins</h6>
				<div style="height: 310px;overflow-y:scroll ;overflow-x: hidden; font-size: 13px;margin-left:-35px">
					<?php include("tenderbulletin.php"); ?>
				</div>
				

              </div>
              
              <div class="tab-pane" id="profile3">
                  <h3><strong><b>National Gazettes 2017</b></strong></h3>
	<div style="height: 345px;overflow-y:scroll ;overflow-x: font-size: 12px">
		<?php
			$year=@date('Y');
	$curl = curl_init('https://opengazettes.org.za/gazettes/ZA/2017');
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
?> </div></div>
              <div class="tab-pane" id="messages3">
                  <h3><strong><b>Provincial Gazettes</b></strong></h3>
                  <div style="height: 345px;overflow: scroll ; font-size: 14px">
                  <hr class="dotted margin-small">
                  <p class="small"><a href="<?php echo base_url()?>pages/gazette/ZA-EC" class="animated fadeInDown">Eastern Cape</a></p>
                  <hr class="dotted margin-small">
                  
                  <hr class="dotted margin-small">
                  <p class="small"><a href="<?php echo base_url()?>pages/gazette/ZA-FS" class="animated fadeInDown">Freestate</a></p>
                  <hr class="dotted margin-small">
                  
                  <hr class="dotted margin-small">
                  <p class="small"><a href="<?php echo base_url()?>pages/gazette/ZA-GT" class="animated fadeInDown">Gauteng</a></p>
                  <hr class="dotted margin-small">
                  
                  <hr class="dotted margin-small">
                  <p class="small"><a href="<?php echo base_url()?>pages/gazette/ZA-NL" class="animated fadeInDown">Kwazulu Natal</a></p>
                  <hr class="dotted margin-small">
                  
                  <hr class="dotted margin-small">
                  <p class="small"> <a href="<?php echo base_url()?>pages/gazette/ZA-LP" class="animated fadeInDown">Limpopo</a></p>
                  <hr class="dotted margin-small">
                  
                  <hr class="dotted margin-small">
                  <p class="small"><a href="<?php echo base_url()?>pages/gazette/ZA-MP" class="animated fadeInDown">Mpumalanga</a></p>
                  <hr class="dotted margin-small">
                  
                  <hr class="dotted margin-small">
                  <p class="small"><a href="<?php echo base_url()?>pages/gazette/ZA-NC" class="animated fadeInDown">Northern Cape</a></p>
                  <hr class="dotted margin-small">
                  
                  <hr class="dotted margin-small">
                  <p class="small"><a href="<?php echo base_url()?>pages/gazette/ZA-NW" class="animated fadeInDown">North West</a></p>
                  <hr class="dotted margin-small">
                  
                  <hr class="dotted margin-small">
                  <p class="small"><a href="<?php echo base_url()?>pages/gazette/ZA-WC" class="animated fadeInDown">Western Cape</a></p>
                  <hr class="dotted margin-small">
                  
            	  </div>
              </div>
            </div>
        </div>
    </div> <!-- row -->
    </div>

 <!-- container -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="right-line">Government Listings</h2>
        </div>
        <?php foreach ($classified_images_left as $image_left){ ?>
        
		<?php $company_data = $this->common->get_company($image_left->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($image_left->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($image_left->id);
		$data['profile'] = $profile[0]->image;
		
		foreach ($company_data as $company){ 
			$data['telephone'] = $company->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$data['telephone'] = preg_replace('~.*(\d{2})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '+27 $1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$company->logo) 
				$data['image'] = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$data['image'] = CDN_BASE_PATH.$company->logo;	
			$data['address'] = str_replace(PHP_EOL,",",$company->address);
		}?>
		
		<div class="col-lg-4 col-md-6 col-sm-6">
            <div class="img-caption-ar wow fadeInUp">
                
				<img class="img-responsive" alt="Image" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>">
                <div class="caption-ar">
                    <div class="caption-content">
						<h4 class="caption-title"><?php echo $image_left->name; ?></h4><br>
                        <button class="btn btn-default btn-lg btn-ar" data-toggle="modal" data-target="#<?php echo $image_left->id;?>">View Company</button>
						
                        
                    </div>
                </div>
            </div>
          </div>
            <!-- Modal --><center>
<div class="modal fade" id="<?php echo $image_left->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	
<div class="modal-dialog" style="width:70%">
<div class="modal-content" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: left">
            <img class="img-responsive pull-left" id="company-logo" src="<?php echo CDN_BASE_PATH.$company->logo;?>" 
				 style="min-width: 110px !important; max-width: 150px !important; min-height: 110px !important; max-height: 150px !important;">
         </div>
		<div class="col-lg-10 col-md-11 col-sm-11 col-xs-11" style="float: left">
			
		<h3 class="text-left" id="myModalLabel" style=" color:#0091CF;padding-left: 6px"><strong><?php echo $image_left->name; ?></strong></h3>
		</div>
    </div>
    <div class="modal-body">
       
		<div class="panel-body" style="text-align: left">
		
		
		<center>
			<div id="<?php echo $company->name;?>" style="display: none">
				<button onclick="toggle_visibility('<?php echo $company->name;?>');" class="btn btn-primary btn-lg btn-ar btn-block" >Close Advert</button>
				<br>
					<?php if(!$company->advert) {}
				       else {
						$advert = CDN_BASE_PATH.$company->advert;?>
				<a class="ad" href="<?php echo $advert?>">
					<img class="img-responsive" alt="No Advert Listed Yet." src="<?php echo $advert;?>">
				</a>
					<?php }?>
					
					<br>
			</div>
         </center>
		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-8 listing-description-co">
                
			                
                                    <p><b><img src="<?php echo base_url()?>assets/images/home-circle_318-27961.jpg" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Address: &nbsp;</b><?php echo $company->address;?></p>
                                    <?php if(!empty($company->paddress)) {?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/pobox.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Postal Address: &nbsp;</b><?php echo $company->paddress;?></p>
                                    <?php }?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/telephone.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Telephone: &nbsp;</b><?php echo $company->telephone;?></p>
                                    <?php if($company->mobile) {?>

                                    <p><b><img src="<?php echo base_url()?>assets/images/mobile.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Cellular: &nbsp;</b><?php echo $company->mobile;?></p>
                                    <?php }?>
                                    <?php if($company->fax) {?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/fax.png" width="20" height="20"  alt="image"/>&nbsp;&nbsp;Fax: &nbsp;</b><?php echo $company->fax;?></p>
                                    <?php }?>
                                    <?php if($company->email) {?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/email.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Email: &nbsp;</b><a href="mailto:<?php echo $company->email;?>"><?php echo $company->email;?></a></p>
                                    <?php }?>
                                    <?php if($company->website) {
										$website = explode(",",$company->website);?>
                                    <p><b><img src="<?php echo base_url()?>assets/images/web_design_icon.png" width="20" height="20"  alt="image" style="border-radius: 100%"/>&nbsp;&nbsp;Website: &nbsp;</b>
                                    <?php for($x=0;$x<sizeof($website);$x++){?>
                                    <a id="web" href="http://<?php echo $website[$x];?>" target="_blank"><?php echo $website[$x];?></a>&nbsp;&nbsp;
                                    <?php }?>
                                    </p>
                                    <?php }?>
                                    
                                    
              </div>
					<?php if($company->about_us) {?>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about_us_p">
                                <h4>About Us:</h4> 
                                <p><?php echo $company->about_us;?></p>       
                              </div>
					<?php }?>
                              
                              
		
</div>
		
		
    </div>
	
    <div class="modal-footer">
      <center>
				<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>	
		  <?php if(!$company->advert) {}
				       else { ?>
			<button onclick="toggle_visibility('<?php echo $company->name;?>');" class="btn btn-primary btn-lg btn-ar btn-block" >View Advert</button>
					<?php }?>
		  
				
	
	  </center>
	</div>
		</center>

 <!-- end Modal -->
 <?php }?>    
        
   
	</div>
</div>
</center>
	</div>
		</div>

<div class='container'><a href="<?php echo base_url()?>pages/postad" class="btn btn-success btn-lg btn-ar btn-block animated fadeInDown" >Advertise Here</a></div>