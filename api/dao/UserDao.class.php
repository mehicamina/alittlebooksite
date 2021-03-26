<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class UserDao extends BaseDao {

  protected function get_user_by_id($user)
  {
    return $this->query_unique("SELECT * FROM users WHERE id = :id", ["id" => $id]);
  }

  public function get_user_by_email($email){
    return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
  }

  public function update_user_by_id($id, $user){

  }

  public function update_user_by_email($email, $user){
    $this->update("users", $email, $user, "email");
  }

  public function add_user($user){
    $insert = "";
    $sql ="INSERT INTO users (first_name, last_name, email, password, id) VALUES (:first_name, :last_name, :email, :password, :id)";
    $stmt = $this -> connection -> prepare($sql);
    $stmt -> execute($user);
    $user['id'] = $this->connection->lastInsertId();
    return $user;
  }



}




 ?>
