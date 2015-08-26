<div id='container-content' class='row col-xs-10 col-sm-10'>
	<div class='row'>
		<div id="slider">
			<ul class='slide col-xs-10 col-sm-10'>
			  <?php for($i = 0; $i < sizeof($topApps); $i++) { ?>
		    <li>
		    	<a href='?c=home&a=detail&app=<?php echo $topApps[$i]['app_id'] ?>'>
		      	<img class='col-xs-5 col-sm-5' src='<?php echo './upload/images/'. $topApps[$i]['main_image'] ?>' alt=''/>
		      </a>
          <h3><?php echo $apps[$i]['app_name'] ?></h3>
		    </li>
				<?php	} ?>
			</ul>
		</div>

		<div id='newest-content' class=''>
		<?php for($i = 0; $i < sizeof($apps); $i++) { ?>
			<ul class='thumbnails'>
			  <li class='span4 col-sm-2'>
			    <div class='thumbnail'>
			    	<a href='?c=home&a=detail&app=<?php echo $apps[$i]['app_id'] ?>'>
			      	<img src='<?php echo './upload/images/'. $apps[$i]['main_image'] ?>' alt=''/>
			      </a>
			      <h3><?php echo $apps[$i]['app_name'] ?></h3>
			      <p><?php echo $apps[$i]['description'] ?></p>
			      <p><a href='?c=home&a=download&app=<?php echo $apps[$i]['app_id'] ?>' class='btn btn-primary'>Download</a></p>
			    </div>
			  </li>
			</ul>
		<?php	} ?>
		</div>
	</div>
</div>