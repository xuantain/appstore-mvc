<div id='detail' class='row col-xs-7 col-sm-7'>
  <div id='' class='col-sm-12 page-header'>
    <img src='<?php echo './upload/images/'. $app['main_image'] ?>' alt='' class='col-sm-3'>
    <div class='col-sm-6'>
      <h1><?php echo $app['app_name'] ?></h1>
      <p><?php echo $app['author'] ?></p>
      <ul class='nav nav-pills col-sm-12'>
        <li><a class="btn btn-primary" href='?c=home&a=download&app=<?php echo $app['app_id'] ?>'>Download</a></li>
      </ul>
    </div>
    <div id='barcode' class='col-sm-3'>
      <img src='./upload/images/barcode.jpg' alt=''/>
    </div>
  </div>
  <div id='app-images' class='col-sm-12 page-header'>
  <?php for($i = 0; $i < sizeof($app['images']); $i++) { ?>
      <div class='thumbnails'>
        <img src='<?php echo './upload/images/'. $app['images'][$i]['media_name'] ?>' alt='' class='col-sm-3'/>
      </div>
  <?php } ?>
  </div>
  <div class='col-sm-12'>
    <h3>Desciption <?php echo $app['app_name'] ?></h3>
    <p><?php echo $app['description'] ?></p>
  </div>
  <div class='col-sm-12'>
    <h3>New features</h3>
    <p><?php echo $app['history']['new_features'] ?></p>
  </div>
  <div class='col-sm-12'>
    <div class="panel panel-default">
      <div class="panel-heading">Informations</div>
      <table class="table table-bordered table-striped menu-items">
        <thead>
          <tr>
            <th>Update</th>
            <th>version</th>
            <th>size</th>
            <th>download</th>
            <th>compatible</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $app['history']['update_date'] ?></td>
            <td><?php echo $app['history']['version'] ?></td>
            <td><?php echo $app['history']['size'] ?></td>
            <td><?php echo $app['download'] ?></td>
            <td><?php echo $app['history']['compatible'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>