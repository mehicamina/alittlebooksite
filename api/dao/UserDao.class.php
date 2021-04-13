<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class UserDao extends BaseDao {

  public function __construct()
  {
    parent::__construct("users");
  }

  public function get_user_by_id($id)
  {
    return $this->query_unique("SELECT * FROM users WHERE id = :id", ["id" => $id]);
  }

  public function get_user_by_email($email){
    return $this->get_user_by_email($email);
  }

  public function update_users($id, $user) {
    $this->update("users", $id, $user);
}

 public function add_user($user){
    $insert = "";
    $sql ="INSERT INTO users (first_name, last_name, email, password, id) VALUES (:first_name, :last_name, :email, :password, :id)";
    $stmt = $this -> connection -> prepare($sql);
    $stmt -> execute($user);
    $user['id'] = $this->connection->lastInsertId();
    return $user;
  }

  public function get_users($search, $offset, $limit, $order = "-id"){

    list($order_column, $order_direction) = self::parse_order($order);

    return $this->query("SELECT * FROM users
                         WHERE LOWER(first_name) LIKE CONCAT('%', :first_name, '%')
                         ORDER BY ${order_column} ${order_direction}
                         LIMIT ${limit} OFFSET {$offset}", 
                         ["first_name" => strtolower($search)]);
  }
  /*public function update_user($id, $user){
    $insert = "";
    $sql ="UPDATE users SET first_name = :first_name, last_name = :last_name, email =:email, password = :password, id = :id) WHERE id = :id";
    $stmt = $this -> connection -> prepare($sql);
    $user['id'] = $id;
    $stmt -> execute($user);
  

}*/

public function get_user_by_token($token){
  return $this->query_unique("SELECT * FROM users WHERE token = :token", ["token" => $token]);
}

}


 ?>
