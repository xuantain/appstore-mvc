<div class='row col-xs-10 col-sm-10'>
	<div class='row'>
		<div id='carousel-generic' class='carousel slide' data-ride='carousel'>
		  <!-- Wrapper for slides -->
		  <?php for($i = 0; $i < sizeof($topApps); $i++) { ?>
		  <div class='carousel-inner'>
		    <div class='item disabled'>
		      <img class='col-xs-5 col-sm-5' src='<?php echo './upload/images/'. $topApps[$i]['main_image'] ?>' alt=''/>
		      <div class='carousel-caption'>
		          <h3><?php echo $apps[$i]['app_name'] ?></h3>
		      </div>
		    </div>
			<?php	} ?>
 		  <!-- Indicators -->
		  <ol class='carousel-indicators'>
		    <li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>
		    <li data-target='#carousel-example-generic' data-slide-to='1'></li>
		    <li data-target='#carousel-example-generic' data-slide-to='2'></li>
		  </ol>
		 
		  <!-- Controls -->
		  <a class='left carousel-control' href='#carousel-example-generic' role='button' data-slide='prev'>
		    <span class='glyphicon glyphicon-chevron-left'></span>
		  </a>
		  <a class='right carousel-control' href='#carousel-example-generic' role='button' data-slide='next'>
		    <span class='glyphicon glyphicon-chevron-right'></span>
		  </a>
		</div> <!-- Carousel -->

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