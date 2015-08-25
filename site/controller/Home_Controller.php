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
      'current_cat'=> '',
      'apps'       => $app->getAppByCatId($catId),
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
      
      $data = array(
        'title'      => 'Detail',
        'current_cat'=> '',
        'app'       => $app->getAppById($appId),
        'categories' => $category->getCatList()
      );
      $this->loadView('detail', $data);
    }
  }

  public function libraryAction() {
    // load Upload library
    $this->library->load('upload');
    $this->library->upload->upload();
  }

}