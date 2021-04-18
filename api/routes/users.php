<?php
/**
 * @OA\Info(title="A little book site API", version="0.1")
 * @OA\OpenApi(
 *   @OA\Server(
 *       url="http://localhost/alittlebooksite/api/",
 *       description="Development Environment"
 *   )
 * )
 */




/**
 * @OA\Get(path="/users", tags={"users"},
 *     @OA\Parameter(type="integer", in="query", name="offset", default=0, description="Offset for pagination"),
 *     @OA\Parameter(type="integer", in="query", name="limit", default=10, description="Limit for pagination"),
 *     @OA\Parameter(type="string", in="query", name="search", description="Search string for users"),
 *     @OA\Parameter(type="string", in="query", name="order", default="-id", description="Sorting for return elements. -column_name ascending order by id or +column_name descending order by id"),
 *     @OA\Response(response="200", description="List users from database")
 * )
 */ 

Flight::route('GET /users', function(){ 
   $offset = Flight::query('offset', 0); 
   $limit = Flight::query('limit', 10);
   $search = FLight::query('search');
   $order = FLight::query('order', "-id");
    Flight::json(Flight::userService()->get_users($search, $offset, $limit, $order));
    
});


/**
 *     @OA\Get(path="/users/{id}", tags={"users"}, 
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="ID of account"),
 *     @OA\Response(response="200", description="Fetch individual user")
 * )
 */ 

Flight::route('GET /users/@id', function($id){
    Flight::json(Flight::userService()->get_by_id($id));
    });

/**
 *     @OA\Post(path="/users", tags={"users"}, 
 * @OA\RequestBody(description="Basic users info", required=true,
 *     @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="first_name", required="true", type="string", example="Amina", description="First name of the user"),
 *    				 @OA\Property(property="last_name", required="true", type="string", example="Mehic", description="Last name of the user"),
 *     				 @OA\Property(property="address", required="true", type="string", example="Address", description="Address of the user"),
 *    				 @OA\Property(property="email", type="string", example="youremail@gmail.com", description="Email of the user"),
 *    				 @OA\Property(property="password", type="string", example="123", description="Password of the user"),
 *          )
 *     )
 * ),
 *     @OA\Response(response="200", description="User that has been added into database with ID assigned.")
 * )
 */ 

Flight::route('POST /users', function(){
   $data = Flight::request()->data->getData();
   Flight::json(Flight::userService()->add($data));
    });

/**
 *     @OA\Put(path="/users/{id}", tags={"users"}, 
 *     @OA\Parameter(type="integer", in="path", name="id", default=1),
 * @OA\RequestBody(description="Basic user info that is going to be updated", required=true,
 *     @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="first_name", required="true", type="string", example="Amina", description="First name of the user"),
 *    				 @OA\Property(property="last_name", required="true", type="string", example="Mehic", description="Last name of the user"),
 *     				 @OA\Property(property="address", required="true", type="string", example="Address", description="Address of the user"),
 *    				 @OA\Property(property="email", type="string", example="youremail@gmail.com", description="Email of the user"),
 *    				 @OA\Property(property="password", type="string", example="123", description="Password of the user"),
 *          )
 *     )
 * ),
 *     @OA\Response(response="200", description="Update users by ID from database")
 * )
 */ 
Flight::route('PUT /users/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::userService()->update($id,$data));
});

Flight::route('POST /users/register', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::userService()->register($data));
     });

Flight::route('GET /users/confirm/@token', function($token){
    Flight::json(Flight::userService()->confirm($token));
    Flight::json(["message" => "Your account has been activated"]);
    });


?>


