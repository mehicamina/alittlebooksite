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
//$user_dao = new UserDao();

//$user = $user_dao->get_user_by_id(2);
//print_r($user);
/*print_r($user);
$user1 = [
    "first_name" => "Emina",
    "last_name" => "Mehic Sero",
    "email" => " emi@mehic.ba",
    "password" => "1234",
    "id" => 2
];

foreach($user as $name => $value){
    echo $name. "<br />";
    print $value. "<br />";

}


//$user = $user_dao->add_user($user1);
//$user = $user_dao->update(2,$user1);
//print_r($user);*/
$dao = new BookDao();
//$knjige = $dao->get_all_books();
//$books = $dao->get_books_by_id(1);
//print_r($books);

//test to insert acc
/*$new_insert=[
    "id"=>"11",
    "title"=>"The Monk Who Sold His Ferrari"
    
];
$imetabele="books";

$insert_book = $dao->add_book($new_insert); //IMAM ERROR!
print_r($dao);
*/
//$kategorija = new CategoryDao();    ERROR
 $adresa = new AddressDao();
 $new_address=[
    "id"=>"1",
    
];

$imetabeleadrese="addresses";

$insert_address = $adresa->add_address($new_address); 
print_r($adresa);
 ?>
