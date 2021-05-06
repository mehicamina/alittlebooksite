<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class BookDao extends BaseDao
{

  public function __construct()
    {
        parent::__construct("books");
    }

  public function add_book($book){
    return $this->insert("books", $book);
  }
 
  public function update_book($id, $book){
    $this->execute_update("books", $id, $book);
  }

  public function get_books_by_id($id)
  {
    return $this->query_unique("SELECT * FROM books WHERE id = :id", ["id" => $id]);
  }

  public function get_book_by_title($title)
  {
    return $this->query_unique("SELECT * FROM books WHERE title = :title", ["title" => $title]);

  }

  public function get_all_books(){
    return $this->query("SELECT * FROM books", []);
  }
}

 ?>
