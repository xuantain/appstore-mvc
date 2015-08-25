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

      if(!empty($app_name)) {
        $uploadDir = './upload/apps/'. $appResult['app_name'] .'/';
        $file_app_download = $version .'.apk';
        $this->library->download->download_file($uploadDir, $file_app_download);

        // $app->update_by_id(array('download' => $appResult['download'] + 1), $appId);
      }
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