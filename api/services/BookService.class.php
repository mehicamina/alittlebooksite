<?php

require_once dirname(__FILE__)."/../services/BaseService.class.php";
require_once dirname(__FILE__)."/../dao/BookDao.class.php";
require_once dirname(__FILE__)."/../dao/BaseDao.class.php";


class BookService extends BaseService{


    public function __construct(){
        $this->dao = new BookDao();
    }
    
        
    
    public function get_books($book){
        if($search){
            return $this->dao->get_books($search, $offset, $limit);
        }

    public function add($book){
        //validation of book data
        if(!isset($user['title'])) throw new Exception("blabla is missing");

        return parent::add($book);
    }


}



?>