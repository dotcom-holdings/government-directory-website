<!--  
Category Page
Author : Leon van Rensburg 

-->
    <div id="categories"> 
        <h3>Categories</h3>
        	<ul>
				<?php for($x=0;$x<sizeof($gov_categories);$x++){ ?>
                <li>
                    <a class="cat" title="<?=$gov_categories[$x]->name?>" href="<?php echo HTTP_BASE_PATH; ?>home/by_cat/<?php echo $gov_categories[$x]->id;?>">
                    <?=$gov_categories[$x]->name?>                                    
                    </a>
                </li>
                <?php }?>
                <?php for($x=0;$x<sizeof($main_gov_categories);$x++){ ?>
                <li>
                    <a class="cat" title="<?=$main_gov_categories[$x]->name?>" href="<?php echo HTTP_BASE_PATH; ?>home/by_cat/<?php echo $main_gov_categories[$x]->id;?>">
                    <?=$main_gov_categories[$x]->name?>                                    
                    </a>
                </li>
                <?php }?>
                <?php for($x=0;$x<sizeof($categories);$x++){ ?>
                <li>
                    <a class="catg" title="<?=$categories[$x]->name?>" href="<?php echo HTTP_BASE_PATH; ?>home/by_cat/<?php echo $categories[$x]->id;?>                                    
                    </a>
                </li>
                <?php }?>
	        </ul> 
    </div>
    <!--categories--> 
<script type="text/javascript">
$(document).ready(function(){
    $('.catg').click(function() {
          var href = $(this).attr("href");
          var id = href.substr(href.lastIndexOf('/') + 1);
          //do your tracking 
          $.ajax({
              url: '<?php echo base_url() ?>home/update_stats',
              data: {"link" : $(this).attr("href"),
                     "ad_type" : "category_click",
                     "category_clicked" : id},
              type: 'post',
              complete: function(){
                  //now do the redirect
              } 
         });
    }); 
});
</script>