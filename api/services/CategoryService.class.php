<?php

require_once dirname(__FILE__)."/../services/BaseService.class.php";
require_once dirname(__FILE__)."/../dao/CategoryDao.class.php";
require_once dirname(__FILE__)."/../dao/BaseDao.class.php";


class CategoryService extends BaseService{


    public function __construct(){
        $this->dao = new CategoryDao();
    }


    public function get_categories_by_id($search, $offset, $limit, $order){
        if($search){
            return $this->dao->get_categories_by_id($search, $offset, $limit, $order);
        }else{
        return $this->dao->get_all_categories($offset, $limit, $order);
        }
    }  

    public function get_category_by_name($search, $offset, $limit, $order){
        if($search){
            return $this->dao->get_category_by_title($search, $offset, $limit, $order);
        }else{
        return $this->dao->get_all_categories($offset, $limit, $order);
        }
    } 

    public function add_category($data) {
        return $this->dao->add_category($data);
    }

    
    public function update_category($id, $data) { //provjeriti parametre
       return $this->dao->update_category("categories", $id, $data);
    }
}