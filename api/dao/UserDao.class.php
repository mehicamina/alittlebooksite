<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class UserDao extends BaseDao()
{
  protected function get_user_by_id($user)
  {
    return $this->query_unique("SELECT * FROM users WHERE id = :id", ["id" => $id]);
  }

  public function get_user_by_email($email){
    return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
  }

  public function update_user_by_email($email, $user){
    $this->update("users", $email, $user, "email");
  }
}




 ?>
