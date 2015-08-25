<div class='row col-xs-10 col-sm-10'>
  <div id='addApp' class='panel panel-default'>
    <form method='POST' action='?c=home&a=doUpload'>
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
          <input id='inputAppName' name='app_name' class='form-control' type='text' placeholder='App name'/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputLink' name='link' class='form-control' type='text' placeholder='http://link'/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputDescription' name='description' class='form-control' type='text' placeholder='Description'/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputPrice' name='price' class='form-control' type='text' placeholder='Price'/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <input id='inputFile' name='file' class='form-control' type='file' placeholder='File'/>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <button id='btnAddApp' class='btn btn-primary'>Add App</button>
        </div>
        <div class='col-xs-6 col-sm-6'>
          <button id='btnCancel' class='btn btn-primary'>Cancel</button>
        </div>
      </fieldset>
    </form>
</div>
</div>