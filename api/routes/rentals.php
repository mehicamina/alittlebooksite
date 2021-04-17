<?php

Flight::route('GET /rentals', function(){
    $user_id = Flight::query('user_id');
    $offset = Flight::query('offset', 0); 
    $limit = Flight::query('limit', 10);
    $search = Flight::query('search', 10);
    $order = Flight::query('order', '-id');

   Flight::json(Flight::rentalService()->get_rentals($user_id, $offset, $limit, $search, $order));
    });

Flight::route('GET /rentals/@id', function($id){
    Flight::json(Flight::rentalService()->get_by_id($id));
    });

Flight::route('POST /rentals', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::rentalService()->add($data));
    });

Flight::route('PUT /rentals/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::rentals()->update($id,$data));
    });

?>


