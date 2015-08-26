<div class='row col-xs-10 col-sm-10'>
  <div id='addApp' class='panel panel-default'>
    <form method='POST' action='?c=home&a=doUpload' enctype='multipart/form-data'>
      <div class='panel-heading'>Upload new app</div>
      <fieldset>
        <div class='col-xs-6 col-sm-6'>
          <select id='inputCategory' name='category' class='form-control'>
          <?php for($i = 0; $i < sizeof($categories); $i++) { 
            echo "<option value={$categories[$i]['cat_id']}>{$categories[$i]['cat_name']}</option>";
          } ?>
          </select>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputAppName' name='app_name' class='form-control' type='text' placeholder='App name' required/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputVersion' name='version' class='form-control' type='text' placeholder='Version' required/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputDescription' name='description' class='form-control' type='text' placeholder='Description' required/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputCompatible' name='compatible' class='form-control' type='text' placeholder='Compatible' required/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputFeature' name='feature' class='form-control' type='text' placeholder='Feature' required/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputPrice' name='price' class='form-control' type='text' placeholder='Price' required/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputLink' name='link' class='form-control' type='text' placeholder='http://link' required/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputFile' name='file' class='form-control' type='file' placeholder='File' required/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <button id='btnAddApp' class='col-xs-5 col-sm-5 btn btn-primary'>Add App</button>
          <div class='col-xs-2 col-sm-2'></div>
          <button id='btnCancel' class='col-xs-5 col-sm-5 btn btn-primary'>Cancel</button>
        </div>
      </fieldset>
    </form>
</div>
</div>