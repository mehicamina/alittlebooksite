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
require_once dirname(__FILE__)."/services/RentalService.class.php";
require_once dirname(__FILE__)."/services/AddressService.class.php";
require_once dirname(__FILE__)."/services/BookService.class.php";
require_once dirname(__FILE__)."/services/CategoryService.class.php";

/* include all routes */
require_once dirname(__FILE__)."/../vendor/autoload.php";
require_once dirname(__FILE__)."/../api/routes/users.php";

/* reading query params from url */
Flight::map('query', function($name, $default_value=NULL) {
    $request = Flight::request();
    $query_param = @$request->query->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value;
    return $query_param;
  });


  Flight::route('GET /swagger', function() {
    $openapi = @\OpenApi\scan(dirname(__FILE__)."/routes");
    header('Content-Type: application/json');
    echo $openapi->toJson();
  
  
  });

  //redirect from api to docs
Flight::route('GET /', function() {
  Flight::redirect('/docs');
});


/* register Services */
Flight::register('userService','UserService');
Flight::register('rentalService','RentalService');
Flight::register('addressService','AddressService');
Flight::register('bookService','BookService');
Flight::register('categoryService','CategoryService');

/* include all routes */
require_once dirname(__FILE__)."/routes/users.php";
require_once dirname(__FILE__)."/routes/rentals.php";
require_once dirname(__FILE__)."/routes/address.php";
require_once dirname(__FILE__)."/routes/books.php";
require_once dirname(__FILE__)."/routes/categories.php";


Flight::set('flight.log_errors', TRUE);

/* error handling for API */
 /*Flight::map('error', function(Exception $ex){
  Flight::json(["message" => $ex->getMessage()], $ex->getCode() ? $ex->getCode() : 500);
}); */

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
