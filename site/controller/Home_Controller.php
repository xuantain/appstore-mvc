<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Home_Controller extends Base_Controller {

  public function indexAction() {
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
        $file_app_download = $version .'.apk';
        $this->library->download->download_file($uploadDir, $file_app_download);

        // $app->update_by_id(array('download' => $appResult['download'] + 1), $appId);
      }
    }
  }

  public function doUploadAction() {

    $this->model->load('App');
    $app = new App();
    
    $dataInsert = array(
      'cat_id'    => isset($_POST['category']) ? mysql_escape_string($_POST['category']) : '',
      'user_id'     => '1',
      'app_name'    => isset($_POST['app_name']) ? mysql_escape_string($_POST['app_name']) : '',
      'link'        => isset($_POST['link']) ? mysql_escape_string($_POST['link']) : '',
      'description' => isset($_POST['description']) ? mysql_escape_string($_POST['description']) : '',
      'price'       => isset($_POST['price']) ? mysql_escape_string($_POST['price']) : '',
      'watch'       => 0,
      'active'      => '0',
      'download'    => 0
    );

    $file = isset($_POST['file']) ? mysql_escape_string($_POST['file']) : '';
    $isFileExist = !empty($_FILES[$file]);

    $isInsertOK = $app->insert($dataInsert);

    if ($isInsertOk && $isFileExist) {

      // load Upload library
      $this->library->load('upload', './upload/apps');
      $this->library->upload->file($_FILES['test']);

      //set max file size (in MB)
      $upload->set_max_file_size(50);

      //set allowed mime types
      // $upload->set_allowed_mime_types(array('application/pdf'));

      $results = $upload->upload();

      var_dump($results);

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