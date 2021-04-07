<?php



Flight::route('POST /books', function(){
   $data = Flight::request()->data->getData();
   Flight::json(Flight::userService()->add($data));
    });


?>