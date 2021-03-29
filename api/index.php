<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/BaseDao.class.php";
require_once dirname(__FILE__)."/dao/UserDao.class.php";

$user_dao = new UserDao();

$user = $user_dao->get_user_by_id(1);

print_r($user);
$user1 = [
    "first_name" => "Emina",
    "last_name" => "Mehic",
    "email" => " emi@gmail.com",
    "password" => "1234",
    "id" => 2
];

$user = $user_dao->add_user($user1);

print_r($user1);


 ?>
