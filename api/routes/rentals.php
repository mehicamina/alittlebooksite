<?php

Flight::route('GET /rentals', function(){
    $user_id = Flight::query('user_id');
   Flight::json(Flight::rentalService()->get_rentals($user_id));
    });

Flight::route('POST /rentals', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::rentalService()->add($data));
    });



?>


