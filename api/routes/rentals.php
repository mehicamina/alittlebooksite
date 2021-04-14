<?php

Flight::route('POST /rentals', function(){
   $data = Flight::request()->data->getData();
  
    print_r($data);
   // Flight::json(Flight::userService()->add($data));
    });





?>


