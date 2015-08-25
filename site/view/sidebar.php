<div id='sidebar' class='row col-sm-2'>
  <div id='section-navigation' class='row col-xs-12 col-sm-12 list-group'>
      <?php
        for($i = 0; $i < sizeof($categories); $i++) { 
          echo "<a href='?c=home&a=category&cat={$categories[$i]['cat_id']}' class='list-group-item' ";
          if($current_cat == $categories[$i]['cat_id']) 
          	echo 'selected=selected'; 
          echo ">{$categories[$i]['cat_name']}</a>";
        }
      ?>
  </div><!--end section-navigation-->
</div>