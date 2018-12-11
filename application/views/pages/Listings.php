<style>
ol li:hover {background: #e1e1e1; }
</style>
   </style><div class="container"><br>
    <div class="bxslider-controls">
                    <span id="bx-prev5"></span>
                    <span id="bx-next5"></span>
                </div>
                <ul class="bxslider" id="bx6">
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
         <li>
                     <button class="btn btn-default btn-lg btn-ar thumbnail" data-toggle="modal" data-target="#<?php echo $image_left->id;?>">
                  <img class="img-responsive" alt="Image" src="<?php echo CDN_BASE_PATH.$image_left->url; ?>">
             </button>
                   
         <?php }?>
                  </li>
                 </ul>
         
        
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
<div class="modal fade" id="<?php echo $image_left->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<center>
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
                
			                
                                    <p><span></span><b>&nbsp;Address: &nbsp;</b><?php echo $company->address;?></p>
                                    <?php if(!empty($company->paddress)) {?>
                                    <p><span></span><b>&nbsp;Postal Address: &nbsp;</b><?php echo $company->paddress;?></p>
                                    <?php }?>
                                    <p><span></span><b>Telephone: &nbsp;</b><?php echo $company->telephone;?></p>
                                    <?php if($company->mobile) {?>

                                    <p><span></span><b>&nbsp;&nbsp;Cellular: &nbsp;</b><?php echo $company->mobile;?></p>
                                    <?php }?>
                                    <?php if($company->fax) {?>
                                    <p><span></span><b>&nbsp;Fax: &nbsp;</b><?php echo $company->fax;?></p>
                                    <?php }?>
                                    <?php if($company->email) {?>
                                    <p><span></span><b>&nbsp;Email: &nbsp;</b><a href="mailto:<?php echo $company->email;?>"><?php echo $company->email;?></a></p>
                                    <?php }?>
                                    <?php if($company->website) {
										$website = explode(",",$company->website);?>
                                    <p><span></span><b>&nbsp;Website: &nbsp;</b>
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
 
  <div class="col-md-13" style="margin-top: -50px">
	
   <form action="<?php echo base_url();?>pages/search" method="post">
                        <div class="col-md-6 pull-left">
                            <input type="text" name="what" placeholder="what ..." style="height: 55px; width: 100%; padding-left: 6px;">
                        </div>
                        <div class="col-md-6 pull-left" >
                            <input type="text" name="where" placeholder="where ..." style="height: 55px; width: 100%; padding-left: 6px;">
                        </div>
                        <button type="submit" name="search" value="1" class="btn btn-info  " style="height: 55px; width: 100%; margin-top: 20px">Search Directory</button>
                    </form>
   
   </div> </center>
	<br><br>
    <section class="margin-bottom">
      
       <div class="row" >
            <div class="col-md-8" >
                <h2 class="no-margin-top">Results For <?=@$category?> <?=@$city!=''?'in '.@$city:''?></h2>
                <ol class="service-list list-unstyled" >
                  
           
         <?php foreach ($featured_listings as $featured){ ?>
        
		<?php $company_data = $this->common->get_company($featured->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($featured->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($featured->id);
		$telephone = $featured->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$telephone = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3', $telephone). "\n";
			//check logo image file
			if(!$featured->logo) 
				$logo = CDN_BASE_PATH.'uploads/noimage.jpg';
			else 
				$logo = CDN_BASE_PATH.$featured->logo;
		
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
                
        <li class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;" >
      
           <div class="row">
            <div class="col-md-12">
             
             <button  data-toggle="modal" data-target="#<?php echo $featured->id;?>"><img width="70" src="<?php echo $logo;?>" alt="<?php echo $featured->name;?>"/>
             </button>
             
              <a class="listing_ad" href=""   data-toggle="modal" data-target="#<?php echo $featured->id;?>"><?php echo $featured->name;?></a>    
              <br>

                
                <?php echo $featured->address;?>
               <br>
                <?php echo $telephone?>    
			   </div>
       	 	</div>
       	 	<hr>
        	 </li>     
        	  <?php }?>       
       </ol>
       <?php foreach ($featured_listings as $featured){ ?>
        
		<?php $company_data = $this->common->get_company($featured->id);
		$data['company'] = $company_data[0];
		$viewpage_banner = $this->common->get_company_viewpage_banner($featured->id);
		$data['viewpage_banner'] = $viewpage_banner[0]->image;
		$profile = $this->common->get_company_profile($featured->id);
		$telephone = $featured->telephone;
			//$telephone = explode(',',$telephone);
			//$telephone = $telephone[0];
			//$telephone = preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1 $2 $3', $telephone). "\n";
			//check logo image file
			
		
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
			<div class="modal fade" id="<?php echo $featured->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
				<center>
			<div class="modal-dialog" style="width:70%">
			<div class="modal-content" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="float: left">
						<img class="img-responsive pull-left" id="company-logo" src="<?php echo CDN_BASE_PATH.$company->logo;?>" 
							 style="min-width: 110px !important; max-width: 150px !important; min-height: 110px !important; max-height: 150px !important;" alt="<?php echo $featured->name ; ?>">
					 </div>
					<div class="col-lg-10 col-md-11 col-sm-11 col-xs-11" style="float: left">

					<h3 class="text-left" id="myModalLabel" style=" color:#0091CF;padding-left: 6px"><strong><?php echo $featured->name; ?></strong></h3>
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


												<p><span></span><b>&nbsp;Address: &nbsp;</b><?php echo $company->address;?></p>
												<?php if(!empty($company->paddress)) {?>
												<p><span></span><b>&nbsp;Postal Address: &nbsp;</b><?php echo $company->paddress;?></p>
												<?php }?>
												<p><span></span><b>Telephone: &nbsp;</b><?php echo $company->telephone;?></p>
												<?php if($company->mobile) {?>
												<p><span></span><b>&nbsp;&nbsp;Cellular: &nbsp;</b><?php echo $company->mobile;?></p>
												<?php }?>
												<?php if($company->fax) {?>
												<p><span></span><b>&nbsp;Fax: &nbsp;</b><?php echo $company->fax;?></p>
												<?php }?>
												<?php if($company->email) {?>
												<p><span></span><b>&nbsp;Email: &nbsp;</b><a href="mailto:<?php echo $company->email;?>"><?php echo $company->email;?></a></p>
												<?php }?>
												<?php if($company->website) {
													$website = explode(",",$company->website);?>
												<p><span></span><b>&nbsp;Website: &nbsp;</b>
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
			<?php }?>  
 <!-- end Modal -->
   
        
              
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
            <!-- Modal -->
<div class="modal fade" id="<?php echo $image_left->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	<center>
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
                
			                
                                    <p><span></span><b>&nbsp;Address: &nbsp;</b><?php echo $company->address;?></p>
                                    <?php if(!empty($company->paddress)) {?>
                                    <p><span></span><b>&nbsp;Postal Address: &nbsp;</b><?php echo $company->paddress;?></p>
                                    <?php }?>
                                    <p><span></span><b>Telephone: &nbsp;</b><?php echo $company->telephone;?></p>
                                    <?php if($company->mobile) {?>
                                    <p><span></span><b>&nbsp;&nbsp;Cellular: &nbsp;</b><?php echo $company->mobile;?></p>
                                    <?php }?>
                                    <?php if($company->fax) {?>
                                    <p><span></span><b>&nbsp;Fax: &nbsp;</b><?php echo $company->fax;?></p>
                                    <?php }?>
                                    <?php if($company->email) {?>
                                    <p><span></span><b>&nbsp;Email: &nbsp;</b><a href="mailto:<?php echo $company->email;?>"><?php echo $company->email;?></a></p>
                                    <?php }?>
                                    <?php if($company->website) {
										$website = explode(",",$company->website);?>
                                    <p><span></span><b>&nbsp;Website: &nbsp;</b>
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
    
    		
</div> <!-- container -->
