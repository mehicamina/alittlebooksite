<?php

require_once dirname(_FILE_). "/dao/UserDao.class.php";

$user_dao = new UserDao();

$user = $user_dao->get_user_by_email("amina.mehic@gmail.com");

print_r($user);

?>