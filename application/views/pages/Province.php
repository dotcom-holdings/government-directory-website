

<div class="container margin-top">
    <div class="row">
       <div class="col-md-12">
            <h2 class="right-line no-margin-bottom"><?php echo $cat;?> News</h2>
        </div>
        <div class="col-md-12">
             <!-- carousel -->
          
                <div class="col-sm-6">
                    
                    <h4 class="strong"><a href="<?php echo base_url()?>by_province/<?php echo $prov;?>/0"><?php 
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
						$string =character_limiter($string,800);
						echo $string;
					?>
						<a href="<?php echo base_url()?>by_province/<?php echo $prov;?>/0">read more</a>
                    </p>
                </div>
                <div class="col-sm-6">
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
						$string =character_limiter($string,800);
						echo $string;
					?>
                    <a href="<?php echo base_url()?>by_province/<?php echo $prov;?>/1">read more</a>
                    </p>
                </div>

          
        </div>
        
    </div> <!-- row -->
    
     <!-- row -->
     <!-- row -->
    
</div> <!-- container -->

<div class="container margin-top">
    <div class="row">
       <div class="col-md-12">
            <h2 class="right-line no-margin-bottom">Related News</h2>
        </div>
        <div class="col-md-12">
             <!-- carousel -->
          <?php for($x = 0; $x < count($news); ++$x) {?>
                <div class="col-sm-12">
                    
                    <h4 class="strong"><a href="<?php echo base_url()?>by_province/<?php echo $prov;?>/<?php echo $x;?>"><?php 
						  print_r(@$news[$x]['title']);
						?></a></h4>
                </div>
                <?php }?>
             
        </div>
        
    </div> <!-- row -->
    
     <!-- row -->
    
	<div class="row">
        <div class="col-md-12">
            <h2 class="right-line no-margin-bottom">News by Province</h2>
        </div>
        <div class="col-md-4">
            <br>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/province/ecape-government">
                <img src="<?php echo base_url()?>assets/images/ec.png" alt="Eastern Cape" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/province/ecape-government">Eastern Cape</a></h4>
                <p><small>A region of great natural beauty, particularly the rugged cliffs, rough seas and dense green bush known as the Wild Coast.</small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/province/fs-government">
                <img src="<?php echo base_url()?>assets/images/FS.png" alt="Freestate" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/province/fs-government">Free State</a></h4>
                <p><small>Is in the centre of South Africa, it's a region of flat, rolling grassland and crop fields rising to sandstone mountains in the northeast.</small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/province/gau-government">
                <img src="<?php echo base_url()?>assets/images/GT.png" alt="Gauteng" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/province/gau-government">Gauteng</a></h4>
                <p><small>With only 1.4% of SA’s land area Gauteng province, contributes to around 34% of the national economy.</small></p>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <br>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/province/kzn-government">
                <img src="<?php echo base_url()?>assets/images/KZ.png" alt="KwaZulu-Natal" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/province/kzn-government">KwaZulu-Natal</a></h4>
                <p><small>South Africa’s garden province, a subtropical region of lush and well-watered valleys, washed by the warm Indian Ocean. </small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/province/lim-government">
                <img src="<?php echo base_url()?>assets/images/LP.png" alt="Limpopo" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/province/lim-government">Limpopo</a></h4>
                <p><small>Limpopo is South Africa’s northernmost province, the gateway to the rest of Africa, lying in the great curve of the Limpopo River.</small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/province/mpg-government">
                <img src="<?php echo base_url()?>assets/images/MP.png" alt="Mpumalanga" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/province/mpg-government">Mpumalanga </a></h4>
                <p><small>Mpumalanga – “the place where the sun rises” – is a province of spectacular scenic beauty and an abundance of wildlife.</small></p>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <br>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/province/ncape-government">
                <img src="<?php echo base_url()?>assets/images/NC.png" alt="Northern Cape" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/province/ncape-government">Northern Cape </a> </h4>
                <p><small>This is SA’s largest province – around the size of Germany – and takes up nearly a third of the country’s land area.</small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/province/nw-government">
                <img src="<?php echo base_url()?>assets/images/NW.png" alt="North West" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/province/nw-government">North West </a></h4>
                <p><small>North West is home to Sun City resort and the world’s richest platinum reserves, so tourism and mining dominate. </small></p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="<?php echo base_url()?>pages/province/wcape-government">
                <img src="<?php echo base_url()?>assets/images/WC.png" alt="Western Cape" />
              </a>
              <div class="media-body">
                <h4 class="media-heading"><a class="media-heading" href="<?php echo base_url()?>pages/province/wcape-government">Western Cape</a></h4>
                <p><small>This is the most beautiful provinces,it's a region of majestic mountains, colourful patchworks of farmland set in lovely valleys.</small></p>
              </div>
            </div>
        </div>
    </div>
    
	
</div>




