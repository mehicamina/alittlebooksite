<?php

require_once dirname(__FILE__)."/../services/BaseService.class.php";
require_once dirname(__FILE__)."/../dao/UserDao.class.php";
require_once dirname(__FILE__)."/../dao/BaseDao.class.php";


class UserService extends BaseService{


    public function __construct(){
        $this->dao = new UserDao();
    }
    
        
    
    public function get_users($search, $offset, $limit){
        if($search){
            return $this->dao->get_users($search, $offset, $limit);
        }else{
        return $this->dao->get_all($offset, $limit);
        }
    }    

    public function add($user){
        //validation of user data
        if(!isset($user['first_name'])) throw new Exception("blabla is missing");

        return parent::add($user);
    }

    public function register($user){
        if (!isset($user['first_name'])) throw new Exception("First name field is required");
    
        try {
          $user = $this->dao->add([
            "id" => $user['id'],
            "first_name" => $user['first_name'],
            "last_name" => $user['last_name'],
            "address" => $user['address'],
            "email" => $user['email'],
            "password" => md5($user['password']),
            "token" => md5(random_bytes(16))
          ]);
              print_r($user);
              
    } 
    catch (\Exception $e) {
      //users.PRIMARY
      if (str_contains($e->getMessage(), 'users.PRIMARY')) {
        throw new Exception("Account with same email exists in the database", 400, $e);
      }
      else{
        throw $e;
      }
    }

    return $user;
    
}
  public function confirm($token){
    $user = $this->dao->get_user_by_token($token);

    if (!isset($user['id'])) throw new Exception("Invalid token");

    $this->dao->update($user['id'], ["status" => "ACTIVE"]);
  }

}
 

?>