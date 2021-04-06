<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/BaseDao.class.php";
require_once dirname(__FILE__)."/dao/UserDao.class.php";
require_once dirname(__FILE__)."/dao/BookDao.class.php";
require_once dirname(__FILE__)."/dao/CategoryDao.class.php";
require_once dirname(__FILE__)."/dao/RentalDao.class.php";
require_once dirname(__FILE__)."/dao/AddressDao.class.php";
require_once dirname(__FILE__)."/services/UserService.class.php";
//require_once dirname(__FILE__)."/routes/users.php";


require_once dirname(__FILE__)."/../vendor/autoload.php";
require_once dirname(__FILE__)."/../api/routes/users.php";

Flight::map('query', function($name, $default_value=NULL) {
    $request = Flight::request();
    $query_param = @$request->query->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value;
    return $query_param;
  
  });


//register DAO Layer
Flight::register('userDao','UserDao');

//register Services
Flight::register('userService','UserService');

//include all routes
require_once dirname(__FILE__)."/routes/users.php";

//Flight::set('flight.log_errors', TRUE);

Flight::start();






















//$user_dao = new UserDao();

//$user = $user_dao->get_user_by_id(2);
//print_r($user);
//print_r($user);
/*$user22 = [
    "first_name" => "Emina",
    "last_name" => "Mehic Sero",
    "email" => " emi@mehic.ba",
    "password" => "567",
    "id" => 2
];

$user = $user_dao->update(2,$user22);
print_r($user);
*/
/*
foreach($user as $name => $value){
    echo $name. "<br />";
    print $value. "<br />";

}


//$user = $user_dao->add_user($user1);
//$user = $user_dao->update(2,$user1);
//print_r($user);*/
//$dao = new BookDao();
//$knjige = $dao->get_all_books();
//$books = $dao->get_books_by_id(1);
//print_r($books);

//test to insert acc
/*$new_insert=[
    "id"=>"11",
    "title"=>"The Monk Who Sold His Ferrari"
    
];
$imetabele="books";

$insert_book = $dao->add_book($new_insert);
print_r($dao);
*/
/*$kategorija = new CategoryDao(); 
$new_category = [
    "id" => "1",
    "name" => "Science Fiction",
    "book_id" => "2"
];*/

//$insert_category = $kategorija->add_category($new_category);
//print_r($kategorija);

//$update = $kategorija->update_category(1, $new_category); 
//$printkategorija = $kategorija->get_all_categories();
//print_r($printkategorija);

/*$printpoime = $kategorija->get_category_by_name("Science Fiction");
print_r($printpoid);*/

 //$adresa = new AddressDao();
 /*$new_address=[
    "id"=>"2",
    "user_id"=>"2"
    
];


$insert_address = $adresa->add_address($new_address); 
print_r($adresa);*/
/*
$printadresa = $adresa->get_all_addresses();
print_r($printadresa);*/



 ?>
