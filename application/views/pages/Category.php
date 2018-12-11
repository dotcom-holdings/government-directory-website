


<div class="container margin-top">
    <div class="row">
       <div class="col-md-12"><br><?php echo "<a href=\"javascript:history.go(-1)\"><< Back</a>";?>
            <h2 class="right-line no-margin-bottom" style="text-transform:capitalize"><?php  $title=str_replace("-"," ",$cat);
				if($title=="Ecape government"){$new_title="Eastern Cape Government";}
				elseif($title=="Fs government"){$new_title="Freestate Government";}
				elseif($title=="Gau government"){$new_title="Gauteng Government";}
				elseif($title=="Kzn government"){$new_title="Kwazulu-Natal Government";}
				elseif($title=="Lim government"){$new_title="Limpopo Government";}
				elseif($title=="Mpg government"){$new_title="Mpumalanga Government";}
				elseif($title=="Ncape government"){$new_title="Northern Cape Government";}
				elseif($title=="Nw government"){$new_title="North West Government";}
				elseif($title=="Wcape government"){$new_title="Western Cape Government";}
				else $new_title=$title;
				
				echo $new_title;
				?>
		   </h2>
        </div>
        <div class="col-md-12">
             <!-- carousel -->
          
               <?php 
			if(!empty($news)){
			
				for($x = 0; $x < count($news); ++$x) {?>
                   <div class="col-sm-12">
                    
                    <h4 class="strong"><a href="<?php echo base_url()?>by_category/<?php echo $cat;?>/<?php echo $x;?>">
                    <?php 
					 print_r($news[$x]['title']);
					?>
                    <br>
                    </a></h4>
                     <small><a href="#"><?php 
						 print_r($news[$x]['author']);
						?></a> | <?php 
						 
				   		$originalDate = $news[$x]['pubDate'];
				   		$newDate = date(" M d , Y ", strtotime($originalDate));
				   		echo $newDate
						?></small>
                    <p>
                    
                   	<?php		 
						$string = $news[$x]['description'];
						$string =character_limiter($string,800);
						echo $string;
					?>
						<a href="<?php echo base_url()?>by_category/<?php echo $cat;?>/<?php echo $x;?>">read more</a>
                    </p>
                </div>
                <hr class="color dashed">
                <?php }?>
               </div>
              
               <?php } else{ 
				echo("<meta http-equiv='refresh' content='1'>"); 
				}?>
        
    </div> <!-- row -->
    
     <!-- row -->
     <!-- row -->
    
</div> <!-- container -->







