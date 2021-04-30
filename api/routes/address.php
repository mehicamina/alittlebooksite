<?php

/**
 * @OA\Get(path="/users", tags={"address"},
 *     @OA\Parameter(type="integer", in="query", name="offset", default=0, description="Offset for pagination"),
 *     @OA\Parameter(type="integer", in="query", name="limit", default=10, description="Limit for pagination"),
 *     @OA\Parameter(type="string", in="query", name="search", description="Search string for address"),
 *     @OA\Parameter(type="string", in="query", name="order", default="-id", description="Sorting for return elements. -column_name ascending order by id or +column_name descending order by id"),
 *     @OA\Response(response="200", description="List addresses from database")
 * )
 */ 

Flight::route('GET /address', function(){ 
   $offset = Flight::query('offset', 0); 
   $limit = Flight::query('limit', 10);
   $search = FLight::query('search');
   $order = FLight::query('order', "-id");
    Flight::json(Flight::addressService()->get_addresses($search, $offset, $limit, $order));
    
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
 *     @OA\Post(path="/addresses", tags={"addresses"}, 
 * @OA\RequestBody(description="Basic address info", required=true,
 *     @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="user_id", required="true", type="integer", description="ID of the user"),
 *    				 @OA\Property(property="country", required="true", type="string", example="Bosnia and Herzegovina", description="Country of the user"),
 *     				 @OA\Property(property="city", required="true", type="string", example="Sarajevo", description="City of the user"),
 *    				 @OA\Property(property="postal_code", type="integer", example="71000", description="Postal code of the city"),
 *          )
 *     )
 * ),
 *     @OA\Response(response="200", description="Address that has been added into database with ID assigned.")
 * )
 */ 

Flight::route('POST /address', function(){
   $data = Flight::request()->data->getData();
   Flight::json(Flight::addressService()->add_address($data));
    });

/**
 *     @OA\Put(path="/addresses/{id}", tags={"addresses"}, 
 *     @OA\Parameter(type="integer", in="path", name="id", default=1),
 * @OA\RequestBody(description="Basic address info that is going to be updated", required=true,
 *     @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="user_id", required="true", type="integer", description="ID of the user"),
 *    				 @OA\Property(property="country", required="true", type="string", example="Bosnia and Herzegovina", description="Country of the user"),
 *     				 @OA\Property(property="city", required="true", type="string", example="Sarajevo", description="City of the user"),
 *    				 @OA\Property(property="postal_code", type="integer", example="71000", description="Postal code of the city"),
 *          )
 *     )
 * ),
 *     @OA\Response(response="200", description="Update addresses by user ID from database")
 * )
 */ 
Flight::route('PUT /users/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::userService()->update($id,$data));
});

?>