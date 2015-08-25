<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'/>
  <title><?php echo $title ?></title>
  <meta name='description' content=''/>
  <meta name='viewport', content='width=device-width, initial-scale=1.0'/>
  <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'/> -->
  <!-- <link rel='stylesheet' href='./public/css/bootstrap-datetimepicker.min.css'/> -->
  <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css'/> -->
  <link rel='stylesheet' href='./public/css/bootstrap.min.css', media='screen'/>
  <link rel='stylesheet' href='./public/css/site.style.css'/>
</head>

<body>
<div id='container' class='col-xs-12 col-sm-12'>
  <div id='header' class='row'>
    <div class='col-xs-2 col-sm-2'>
      <h1><a href='/appstore?c=home&a=index'>AppStore</a></h1>
    </div>
    <div class='col-xs-6 col-sm-6'>
      <div id='searching' class='col-sm-12'>
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div><!-- /input-group -->
      </div>
      <ul id='navigation' class='nav nav-pills col-sm-12'>
        <li><a href='#'>Newest</a></li>
        <li><a href='#'>Downloadest</a></li>
        <li><a href='#'>Highlights</a></li>
        <li><a href='#'>Categories</a></li>
      </ul>
    </div>
    <div class='col-sm-4'>
      <ul id='navigation' class='nav nav-pills col-sm-12'>
        <li><a href='#'>Sign in</a></li>
        <li><a href='#'>Register</a></li>
      </ul>
      <ul id='navigation' class='nav nav-pills col-sm-12'>
        <li><a href='/appstore?c=home&a=upload'>Upload</a></li>
        <li><a href='#'>Download</a></li>
      </ul>
    </div>
  </div>