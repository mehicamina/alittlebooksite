<?php

require_once dirname(__FILE__)."/UserDao.class.php";

$user_dao = new UserDao();

$user = $user_dao->get_user_by_email("amina.mehic@gmail.com");

print_r($user);

$user1 = [
    "first_name" => "Emina",
    "last_name" => "Mehic",
    "email" => " emi@gmail.com",
    "password" => "1234",
    "id" => 1
];

$user = $user_dao->update_user(11, $user1);

print_r($user);
?>