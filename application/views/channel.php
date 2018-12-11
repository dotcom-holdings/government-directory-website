<?php
$this->load->view('vwHeader');
?>
<!--  
Listings Page
Author : Leon van Rensburg 

-->  
<div id="content" class="container">

	<div class="main">
		<aside id="left-column">
			<div id="categories">
	<div id="title">
		<h3>Browse by Category</h3>
	</div>
	<div id="scrollpane">
			<ul>
            <?php for($x=0;$x<sizeof($categories);$x++){ ?>
				<li>
				<span class="color" style="background: #<?php echo substr(md5(rand()), 0, 6);?>"></span>
				<a title="<?=$categories[$x]->name?>" href="<?php echo HTTP_BASE_PATH; ?>home/by_cat/<?php echo $categories[$x]->id;?>"><?=$categories[$x]->name?></a>
				</li>
            <?php }?>
			</ul>
		</div>
</div>
<!-- /#categories -->
<div id="fb-root"></div>
			<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=434517066665734";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
                        <div style="margin-top: 13px;" class="fb-like-box" data-href="https://www.facebook.com/myadslive" data-width="238" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
                        			<div id="popular-articles">
				<h4>Most Popular Articles</h4>
				<ul>
					<li><span class="color green"></span><a href="#">Caring for Your Eyes</a></li>
					<li><span class="color maroon"></span><a href="#">Teeth Whitening</a></li>
					<li><span class="color yellow"></span><a href="#">Moms & Tots</a></li>
					<li><span class="color pink"></span><a href="#">Save A Life - Donate Blood</a></li>
					<li><span class="color orange"></span><a href="#">Healthy Lifestyle</a></li>
				</ul>
			</div>
			<!-- /popular-articles -->
		</aside>
		<!-- /left-column -->

	<div id="middle-column">
		
<div class="channel span-1">
	<h1>Video Channel</h1>
	<ul>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/miraclemed">
				<span></span>
				<img src="http://www.adsproof.com/videos/miraclemed/thumb.jpg" alt="" style="width:130px;"/>				<h5>Miracle Medical</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/dzingwa">
				<span></span>
				<img src="http://www.adsproof.com/videos/dzingwa/thumb.jpg" alt="" style="width:130px;"/>				<h5>Dzingwa Clinic Physio</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/jpswart">
				<span></span>
				<img src="http://www.adsproof.com/videos/jpswart/thumb.jpg" alt="" style="width:130px;"/>				<h5>J P Swart Orthotist and Prosthetist</h5>
			</a>
		</li>
			<li class="last">
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/carrier">
				<span></span>
				<img src="http://www.adsproof.com/videos/carrier/thumb.jpg" alt="" style="width:130px;"/>				<h5>Carrier Airconditioning (Pty) Ltd</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/labstix">
				<span></span>
				<img src="http://www.adsproof.com/videos/labstix/thumb.jpg" alt="" style="width:130px;"/>				<h5>Labstix Diagnostics Pty Ltd</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/cosan">
				<span></span>
				<img src="http://www.adsproof.com/videos/cosan/thumb.jpg" alt="" style="width:130px;"/>				<h5>Cosan Medical</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/sadcmedical">
				<span></span>
				<img src="http://www.adsproof.com/videos/sadcmedical/thumb.jpg" alt="" style="width:130px;"/>				<h5>Sadc Medical</h5>
			</a>
		</li>
			<li class="last">
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/muelmed">
				<span></span>
				<img src="http://www.adsproof.com/videos/muelmed/thumb.jpg" alt="" style="width:130px;"/>				<h5>Hospital Muelmed Mediclinic</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/drbsbngcobo">
				<span></span>
				<img src="http://www.adsproof.com/videos/drbsbngcobo/thumb.jpg" alt="" style="width:130px;"/>				<h5>Dr BSB Ngcobo</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/chart">
				<span></span>
				<img src="http://www.adsproof.com/videos/chart/thumb.jpg" alt="" style="width:130px;"/>				<h5>Dotcom Africa (Pty) Ltd</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/melion">
				<span></span>
				<img src="http://www.adsproof.com/videos/melion/thumb.jpg" alt="" style="width:130px;"/>				<h5>Melion (Pty) Ltd</h5>
			</a>
		</li>
			<li class="last">
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/chemspunge">
				<span></span>
				<img src="http://www.adsproof.com/videos/chemspunge/thumb.jpg" alt="" style="width:130px;"/>				<h5>Chemspunge Wound Dressing</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/horizon">
				<span></span>
				<img src="http://www.adsproof.com/videos/horizon/thumb.jpg" alt="" style="width:130px;"/>				<h5>Horizon Park Dental Centre</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/estcourt">
				<span></span>
				<img src="http://www.adsproof.com/videos/estcourt/thumb.jpg" alt="" style="width:130px;"/>				<h5>Estcourt Medical Centre</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/medinox">
				<span></span>
				<img src="http://www.adsproof.com/videos/medinox/thumb.jpg" alt="" style="width:130px;"/>				<h5>Medinox</h5>
			</a>
		</li>
			<li class="last">
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/selepe">
				<span></span>
				<img src="http://www.adsproof.com/videos/selepe/thumb.jpg" alt="" style="width:130px;"/>				<h5>Selepe Optometrist Surgery</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/mkhwanazi">
				<span></span>
				<img src="http://www.adsproof.com/videos/mkhwanazi/thumb.jpg" alt="" style="width:130px;"/>				<h5>Dr N P Mkhwanazi Medical Practice</h5>
			</a>
		</li>
			<li >
			<a class="video-lightbox fancybox.iframe" href="http://www.adsproof.com/videos/drpepper">
				<span></span>
				<img src="http://www.adsproof.com/videos/drpepper/thumb.jpg" alt="" style="width:130px;"/>				<h5>Dr W Pepper Surgery</h5>
			</a>
		</li>
		</ul>
</div>

	</div>


	<aside id="right-column">
    	<div class="banners">
			<?php foreach ($classified_images_right as $image_right){ 
				$image_right_link = $image_right->name."<br><a href='http://".$image_right->website."' target='_blank'>Visit Website</a>"; ?>
				 <?php if($image_right->id){?>
					<a href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_right->id; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
					<?php } else {?>
				<a href="<?php echo CDN_BASE_PATH.$image_right->url; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_right->name; ?>"><img class="carousal" src="<?php echo CDN_BASE_PATH.$image_right->url; ?>"></a>
				<?php }?>
            <?php }?>
        </div>

			<div class="banners">
				<?php foreach ($classified_images_top as $image_top){ 
					$image_top_link = $image_top->name."<br><a href='http://".$image_top->website."' target='_blank'>Visit Website</a>"; ?>
					 <?php if($image_top->id){?>
						<a href="<?php echo HTTP_BASE_PATH.'home/lightbox_company/'.$image_top->id; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="Company Details"><img class="rightad-image" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
						<?php } else {?>
					<a href="<?php echo CDN_BASE_PATH.$image_top->url; ?>"  rel="nofollow" data-toggle="lightbox" id="pop" data-title="<?php echo $image_top->name; ?>"><img class="carousal" src="<?php echo CDN_BASE_PATH.$image_top->url; ?>"></a>
					<?php }?> 
            	<?php }?>			
            </div>

		</aside>
	</div>
	<!-- /sub-footer -->

</div><!-- contents -->
    
<?php
$this->load->view('vwFooter');
?>