<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class CategoryDao extends BaseDao
{
  
  public function __construct()
    {
        parent::__construct("categories");
    }

    public function add_category($category){
      return $this->insert("categories", $category);
    }

    public function update_category($id, $category){
      $this->execute_update("categories", $id, $category);
    }

    public function get_categories_by_id($id)
  {
    return $this->query_unique("SELECT * FROM categories WHERE id = :id", ["id" => $id]);
  }

  public function get_category_by_name($name)
  {
    return $this->query_unique("SELECT * FROM categories WHERE name = :name", ["name" => $name]);

  }

  public function get_all_categories(){
    return $this->query("SELECT * FROM categories", []);
  }
}

 ?>
