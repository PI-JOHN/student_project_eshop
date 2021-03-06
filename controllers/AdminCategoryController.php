<?php

class AdminCategoryController extends AdminBase
{
  /**
  * action for page 'Category Management'
  */
  public function actionIndex()
  {
    self::checkAdmin();

    $categoriesList = Category::getCategoriesListAdmin();

    require_once __DIR__.'/../views/admin-category/index.php';
    return true;
  }


/**
* action for page 'Create category'
*/
  public function actionCreate()
  {
    self::checkAdmin();

    if (isset($_POST['submit'])){
      $name = $_POST['name'];
      $sortOrder = $_POST['sort_order'];
      $status = $_POST['status'];

      $errors = false;

      if (!isset($name) || empty($name)){
        $errors[] = ' Заполните поля';
      }

      if ($errors == false){
        Category::createCategory($name, $sortOrder, $status);

        header('Location: /admin/category');
      }
    }
    require_once __DIR__.'/../views/admin-category/create.php';
    return true;
  }

/**
* action for page 'Update Category'
*/
  public function actionUpdate($id)
  {
    self::checkAdmin();

    $category = Category::getCategoryById($id);

    if (isset($_POST['submit'])){
      $name = $_POST['name'];
      $sortOrder = $_POST['sort_order'];
      $status = $_POST['status'];

      if(Category::updateCategoryById($id, $name, $sortOrder, $status)){
        header('Location: /admin/category');
      }
    }
    require_once __DIR__.'/../views/admin-category/update.php';
    return true;
  }


/**
* action for page 'Delete Category'
*/
  public function actionDelete($id)
  {
    self::checkAdmin();


    if(isset($_POST['submit'])){
      Category::deleteCategoryById($id);
      header('Location: /admin/category');
    }
    require_once __DIR__.'/../views/admin-category/delete.php';
    return true;
  }
}
 ?>
