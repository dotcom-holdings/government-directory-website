<br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/>

<div class="container margin-top">
   <div class="row">
       <div class="col-md-12">
          <?php if(!empty($news)){?>
           <br><?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?>
            <h2 class="right-line no-margin-bottom"><?php print_r($news[$post]['title']);?></h2>
            <!-- carousel -->
          
                     <small><a href="#"><?php print_r($news[$post]['author']);?></a> | 
                     <?php 				 
				   		$originalDate = $news[$post]['pubDate'];
				   		$newDate = date(" M d , Y ", strtotime($originalDate));
				   		echo $newDate
					 ?>
                     </small><br><br>
        </div>
        
        
        
        
        
        
        
        
        
        <div class="col-md-9" style="height: 600px; overflow-y: scroll">
             
                    <p>
                    
                   	<?php		 
						$string = $news[$post]['description'];
						
						echo $string;
					?>
						
                    </p>

	</div>
      <div class="col-md-3"><ul class="list-group">
<li class="list-group-item" style="max-height:600px;overflow-y:scroll;">
		<div class="tab-pane" id="messages3">
                 
                
                 
                 <?PHP  for($i=0;$i<sizeof($news);$i++) { ?>
                 
                 
                <a href="<?php echo $i;?>"><?php echo $news[$i]['title']; ?></a><br/><hr/>
                 
                 <?php } ?>
               
<!--
                  <p class="small"><strong>Categories</strong></p>
                  
                  <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/top-stories">Top Stories</a></p><hr class="dotted margin-small">
                       
                        <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/world">World</a></p><hr class="dotted margin-small">
                        
                        <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/africa">Africa</a></p><hr class="dotted margin-small">
                        
                        <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/south-africa">South Africa</a></p><hr class="dotted margin-small">
                        
                        <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/business">Business</a></p><hr class="dotted margin-small">
                        
                       <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/tourism">Tourism</a></p><hr class="dotted margin-small">
                                           
                        <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/health">Health</a></p><hr class="dotted margin-small">
                        
                        <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/attractions">Attractions</a></p><hr class="dotted margin-small">
                        
                        <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/technology">Technology</a></p><hr class="dotted margin-small">
                       
                        <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/motoring">Motoring</a></p><hr class="dotted margin-small">
                        
                        <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/activities">Activities</a></p><hr class="dotted margin-small">
                        
                        
                        
                        <hr class="dotted margin-small"><a href="<?php echo base_url()?>pages/category/safety-tips">Safety Tips</a></p>
                        
                  
                  
-->
                  
              </div>
</li>

</ul>
	</div>  <?php } else{ 
				echo("<meta http-equiv='refresh' content='1'>"); 
				}?>
    </div> <!-- row -->
    
   <!-- <div class="row">
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
    </div> --><!-- row -->
   <!-- <div class="row">
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
<!--
            <ul class="nav nav-tabs nav-tabs-ar">
              <li class="active"><a href="#home3" data-toggle="tab">Tenders</a></li>
              <li><a href="#profile3" data-toggle="tab">National Gazettes</a></li>
              <li><a href="#messages4" data-toggle="tab">Provincial</a></li>
            </ul>
-->

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="home3" style="height: 412px">
                  <style type="text/css">

#tender_container{
    width:325px;
    height:440px;
    border:0 solid;
    overflow:scroll;
    margin:auto;
}
#tender_container iframe {
    width:500px;
    height:1040px;
    margin-left:-235px;
    margin-top:-420px;   
    
 }
	h2 {
  color: #999;
  font-size: 24px;
}
-->
</style>

<!--
<div id="tender_container">
<iframe src="http://www.gpwonline.co.za/Gazettes/Pages/Published-Tender-Bulletin.aspx?p=1" scrolling="no"></iframe>
</div>
              </div>
              <div class="tab-pane" id="profile3" style="height: 412px;overflow: scroll ; font-size: 12px" >
                  <p><strong>National Gazettes 2017</strong></p>
-->
	
<!--
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
?>
              
              
-->
                  
                  
                  
                 
                  
                  
                  
                  

              </div>
              <!--
              <div class="tab-pane" id="messages4" style="height: 412px;overflow-y: scroll">
                  <p class="small"><strong>Provincial</strong> Gazettes</p>
                  
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
            -->
            </div>
        </div>
    </div> --> <!-- row -->
    
</div> 
    
</div> <!-- container -->




