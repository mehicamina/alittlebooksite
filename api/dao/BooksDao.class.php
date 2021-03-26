<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class BooksDao extends BaseDao
{

  protected function get_books_by_id($id)
  {
    return $this->get_by_id($id);
  }

  protected function get_book_by_title($title)
  {
    return $this->query_unique("SELECT * FROM books WHERE title = :title", ["title" => $title]);

  }
}

 ?>
