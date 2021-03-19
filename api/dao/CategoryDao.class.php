<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class CategoryDao extends BaseDao{

  protected function get_category_by_id($category_id)
  {
    return $this->get_by_id($category_id);
  }
}

 ?>
