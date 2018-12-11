<?php
$this->load->view('vwHeader'); 
?>
<!--  
Register Page
Author : Leon van Rensburg 

-->
<?php if(isset($focus)){?>
<script type="text/javascript">
$(document).ready(function(){
	$("html, body").animate({ scrollTop: $('#scrollto').offset().top }, 1);
});
</script>
<?php }?>

    <section>
        <div id="bg2" class="col-md-12 col-xs-12 mainbody">>
            <div class="container" id="main-content">
            
                    <div class="col-lg-8 mainbox">
                     <div class="header1" id="scrollto">
                        <p>Google Search Results<span style="color:#fff300"></span></p>
                    </div>
                    <div class="white2">
                        <div class="col-xs-6 col-md-4 white3">
                            <div id="TheList" class="list-group">
                            <a href="<?php echo HTTP_BASE_PATH; ?>" class="list-group-item" style="margin-left:-8px;"><img src="<?php echo HTTP_ICON_PATH; ?>cinema.png">All</a>
                            <?php foreach ($categories as $category){ ?>
                                <a href="<?php echo HTTP_BASE_PATH; ?>home/by_cat/<?php echo $category->id;?>" class="list-group-item" style="margin-left:-8px;"><img src="<?php echo HTTP_ICON_PATH; ?><?php echo $category->icon;?>"><?php echo $category->name;?></a>
                            <?php }?>
                            </div>
                        </div>
                        <div id="inline" col-xs-12 col-md-8 white4">
                        <div class="col-md-12" style="height:8px">
                        </div>
                        <form action="" name="focus_form">
                        <?php
						$cx = '018179036188811734933:zvwhjuuf0oe';
						$where = str_replace(' ','%20',$where);
                        $query = $cat.'%20'.$what.'%20'.$where;
                        $url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=".$query."&cx=".$cx."&rsz=large";
                        
						$ch = curl_init();
						curl_setopt ($ch, CURLOPT_URL, $url);
						curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
						curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($ch);
						curl_close($ch);
						$json = json_decode($response);
						
						foreach ($json->responseData->results as $featured){ 
							$image = CDN_BASE_PATH.'uploads/noimage.jpg';
						?>
                        <div class="col-md-12 row listing">
                              
                              <a href="<?php echo $featured->url;?>" target="_blank">
                              <div class="col-lg-12 listing-description">
                                <h4><?php echo $featured->title;?></h4>
                                <p><?php echo $featured->content;?></p>
                                <p><?php echo $featured->url;?></p>
                              </div>
                              </a>
                              
                          </div> 
                          <div class="col-md-12" style="height:8px">
                          </div>
                         <?php }?> 
                         </form>                                                                                                       

                    </div>                    
                </div>                
              </div>

              	<div class="col-lg-4">
              
				<?php
                include("right_sidebar.php");
                ?>
                 
            	</div>

        </div>
        </div>
    </section>

<section>
<?php
include("google_map.php");
?>
</section> 
   
<?php
$this->load->view('vwFooter');
?>