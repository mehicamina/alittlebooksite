<?php

require_once dirname(__FILE__)."/../services/BaseService.class.php";
require_once dirname(__FILE__)."/../dao/UserDao.class.php";
require_once dirname(__FILE__)."/../dao/BaseDao.class.php";


class BookService extends BaseService{


    public function __construct(){
        $this->dao = new BookDao();
    }


   public function get_book_by_id($search, $offset, $limit, $order){
        if($search){
            return $this->dao->get_book_by_id($search, $offset, $limit, $order);
        }else{
        return $this->dao->get_all_books($offset, $limit, $order);
        }
    }  

    public function get_book_by_title($search, $offset, $limit, $order){
        if($search){
            return $this->dao->get_book_by_title($search, $offset, $limit, $order);
        }else{
        return $this->dao->get_all_books($offset, $limit, $order);
        }
    } 

    public function add_book($book){
        //validation of book data
        if(!isset($book['title'])) throw new Exception("Book title is missing");

        return parent::add($book);
    }


    public function update_books($id, $data) { //provjeriti parametre
        return $this->dao->update_books("books", $id, $data);
     }
}


?>

