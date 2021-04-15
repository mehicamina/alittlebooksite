<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class RentalDao extends BaseDao
{
  
  public function __construct()
  {
      parent::__construct("categories");
  }

  public function add_rental($rental){
    return $this->insert("rentals", $rental);
  }

  public function update_rental($id, $rental){
    $this->update("rentals", $id, $rental);
  }

  public function get_rentals_by_id($id)
{
  return $this->query_unique("SELECT * FROM rentals WHERE id = :id", ["id" => $id]);
}


public function get_rental_by_user_id($user_id)
{
  return $this->query_unique("SELECT * FROM rentals WHERE user_id = :user_id", ["user_id" => $user_id]);

}

public function get_rental_by_book_id($book_id)
{
  return $this->query_unique("SELECT * FROM rentals WHERE book_id = :book_id", ["book_id" => $book_id]);

}

public function get_all_rentals(){
  return $this->query("SELECT * FROM rentals", []);
}

public function get_rentals($user_id, $offset, $limit, $search){
  $query = "SELECT *
            FROM rentals
            WHERE user_id = :user_id";
  if (isset($search)){
    $query .= "AND (name LIKE CONCAT ('%', :search, '%') OR subject LIKE CONCAT('%', :search, '%'))";
    $params['search'] = $search;
  }
                
  $query = "LIMIT ${limit} OFFSET {$offset}";

  return $this->query($query, $params);
                       
}

}

 ?>
