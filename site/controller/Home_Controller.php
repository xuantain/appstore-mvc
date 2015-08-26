<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Home_Controller extends Base_Controller {

  public function indexAction() {
    $this->model->load('Category');
    $category = new Category();

    $this->model->load('App');
    $app = new App();
    
    $data = array(
      'title'      => 'App store',
      'current_cat'=> '',
      'apps'       => $app->getAppList(),
      'topApps'    => $app->getAppsDownloadest(),
      'categories' => $category->getCatList()
    );
    $this->loadView('index', $data);
  }

  public function categoryAction() {

    // get category
    $catId = empty($_GET['cat']) ? '' : $_GET['cat'];

    $this->model->load('Category');
    $category = new Category();

    $this->model->load('App');
    $app = new App();
    
    $data = array(
      'title'      => 'Category',
      'current_cat'=> $catId,
      'apps'       => $app->getAppByCatId($catId),
      'topApps'    => $app->getAppsDownloadest(),
      'categories' => $category->getCatList()
    );
    $this->loadView('index', $data);
  }

  public function detailAction() {

    if(empty($_GET['app'])) {
      $this->indexAction();
    } else {
      $appId = $_GET['app'];

      $this->model->load('Category');
      $category = new Category();

      $this->model->load('App');
      $app = new App();

      $appResult = $app->getAppById($appId);
      
      $data = array(
        'title'      => 'Detail',
        'current_cat'=> $appResult['cat_id'],
        'app'        => $appResult,
        'topApps'    => $app->getAppsDownloadest(),
        'categories' => $category->getCatList()
      );
      $this->loadViewRightSidebar('detail', $data);
    }
  }

  public function downloadAction() {
    // load Download library
    $this->library->load('download');

    if(!empty($_GET['app'])) {
      $appId = $_GET['app'];

      $this->model->load('App');
      $app = new App();

      $appResult = $app->getAppById($appId);
      $version = $app->getNewestVersion($appId);

      if(!empty($appResult)) {
        $uploadDir = './upload/apps/'. $appResult['app_name'] .'/';
        $file_app_download = $version .'.apt';
        $this->library->download->download_file($uploadDir, $file_app_download);

        // $app->update_by_id(array('download' => $appResult['download'] + 1), $appId);
      }
    }
  }

  public function doUploadAction() {

    $this->model->load('App');
    $app = new App();
    
    $version = isset($_POST['version']) ? mysql_escape_string($_POST['version']) : '';
    
    $appInsert = array(
      'cat_id'      => isset($_POST['category']) ? mysql_escape_string($_POST['category']) : '',
      'user_id'     => '1',
      'app_name'    => isset($_POST['app_name']) ? mysql_escape_string($_POST['app_name']) : '',
      'main_image'  => 0,
      'type'        => 'Android',
      'link'        => isset($_POST['link']) ? mysql_escape_string($_POST['link']) : '',
      'description' => isset($_POST['description']) ? mysql_escape_string($_POST['description']) : '',
      'price'       => isset($_POST['price']) ? mysql_escape_string($_POST['price']) : '',
      'watch'       => 0,
      'active'      => '0',
      'download'    => 0
    );

    $isFileExist = !empty($_FILES['file']['name']);
    $isInsertOK = $app->insert($appInsert);

    if ($isInsertOK && $isFileExist) {

      $fileName = $_FILES['file']['name'];
      $extenion = end(explode(".", $fileName));

      // create folder upload
      $uploadPath = 'appstore/upload/apps/'. $appInsert['app_name'];
      
      // load Upload library
      $this->library->load('upload', $uploadPath);
      $this->library->upload->file($_FILES['file']);

      //set max file size (in MB)
      $this->library->upload->set_max_file_size(50);
      $this->library->upload->set_filename($version.'.'.$extenion);

      //set allowed mime types
      // $upload->set_allowed_mime_types(array('application/apt'));

      $results = $this->library->upload->upload();

      // adding history for new app
      $appInserted = $app->findAppByProperty($appInsert);
      $date = new DateTime();
      $date = $date->format('Y-m-d H:i:sP');

      $appHistory = array(
        'app_id'      => $appInserted['app_id'],
        'version'     => $version,
        'size'        => $_FILES['file']['size'],
        'new_features'=> isset($_POST['feature']) ? mysql_escape_string($_POST['feature']) : '',
        'compatible'  => isset($_POST['compatible']) ? mysql_escape_string($_POST['compatible']) : '',
        'update_date' => $date
      );
      $app->insertHistory($appHistory);

      // adding medias for new app
      $appMedia = array(
        'app_id'     => $appInserted['app_id'],
        'media_name' => $version.'.'.$extenion,
        'type'       => 'apt',
        'position'   => 0
      );
      $app->insertMedia($appMedia);

      // redirect to index
      $this->indexAction();

    } else {
      // redirect to view upload
      $this->uploadAction();
    }
  }

  public function uploadAction() {

    $this->model->load('Category');
    $category = new Category();

    $this->model->load('App');
    $app = new App();
     
    $data = array(
      'title'      => 'index',
      'current_cat'=> '',
      'apps'       => $app->getAppList(),
      'topApps'    => $app->getAppsDownloadest(),
      'categories' => $category->getCatList()
    );

    $this->loadView('upload', $data);
  }
}