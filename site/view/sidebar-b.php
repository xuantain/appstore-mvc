<div id='sidebar-b' class='col-xs-3 col-sm-3'>
  <h1 class='col-xs-12 col-sm-12'>Top App</h1>
  <?php for($i = 0; $i < sizeof($topApps); $i++) { ?>
  <div class='col-xs-12 col-sm-12'>
    <img src='' alt='' class='col-sm-2'/>
    <div class='col-sm-7'>
      <h3><a href='?c=home&a=detail&app=<?php echo $topApps[$i]['app_id'] ?>'>
        <?php echo $topApps[$i]['app_name'] ?></a>
      </h3>
      <p><?php echo $topApps[$i]['author'] ?></p>
    </div>
    <a href='?c=home&a=detail&app=<?php echo $topApps[$i]['app_id'] ?>'>
      <img src='<?php echo './upload/images/'. $topApps[$i]['main_image'] ?>' alt='' class='col-sm-3'/>
    </a>
  </div>
  <?php } ?>
</div>