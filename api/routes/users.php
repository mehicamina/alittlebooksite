<?php

/*
Flight::route('GET /users', function(){ 
   $offset = Flight::query('offset', 0); //routes and business 03.01 5:20 nez dokle min video napraviti to u postmanu
    $limit = Flight::query('limit', 10);

    $search = FLight::query('search');

    if($search){
        Flight::json(Flight::userDao()->get_users($search, $offset, $limit));
    }else{
    Flight::json(Flight::userDao()->get_all($offset, $limit));
    }
    
});
*/
/*
Flight::route('GET /users/@id', function($id){
    Flight::json(Flight::userDao()->get_by_id($id));
    });
*/
/*
Flight::route('POST /users', function(){
   $request = Flight::request();
   Flight::json(Flight::userDao()->add($request -> data-> getData()));
    });
  */  
/*
Flight::route('PUT /users/@id', function($id){
    $request = Flight::request();
    $data = $request->data->getData();

    Flight::userDao()->update($id,$data);

    $user = Flight::userDao()->get_by_id($id);
    Flight::json($user);
})
*/
?>

