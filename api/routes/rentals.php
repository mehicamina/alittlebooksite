<?php

/**
 * @OA\Get(path="/rentals", tags={"rental"},
 *     @OA\Parameter(type="integer", in="query", name="offset", default=0, description="Offset for pagination"),
 *     @OA\Parameter(type="integer", in="query", name="limit", default=10, description="Limit for pagination"),
 *     @OA\Parameter(type="string", in="query", name="search", description="Search string for rental"),
 *     @OA\Parameter(type="string", in="query", name="order", default="-id", description="Sorting for return elements. -column_name ascending order by id or +column_name descending order by id"),
 *     @OA\Response(response="200", description="List addresses from database")
 * )
 */ 

Flight::route('GET /rentals', function(){
    $user_id = Flight::query('user_id');
    $offset = Flight::query('offset', 0); 
    $limit = Flight::query('limit', 10);
    $search = Flight::query('search', 10);
    $order = Flight::query('order', '-id');

   Flight::json(Flight::rentalService()->get_rentals($offset, $limit, $search, $order));
    });

/**
 *     @OA\Get(path="/rentals/{id}", tags={"rental"}, 
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="ID of rental"),
 *     @OA\Response(response="200", description="Fetch individual rental")
 * )
 */ 

Flight::route('GET /rentals/@id', function($id){
    Flight::json(Flight::rentalService()->get_rentals_by_id($id));
    });

/**
 *     @OA\Post(path="/rentals", tags={"rental"}, 
 * @OA\RequestBody(description="Basic rental info", required=true,
 *     @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="book_id", required="true", type="integer", description="ID of the book"),
 *     				 @OA\Property(property="user_id", required="true", type="integer", description="ID of the user"),
 *     				 @OA\Property(property="rental_date", required="true", type="string", example="1310"),
 *    				 @OA\Property(property="return_date", type="string", example="1310"),
 *          )
 *     )
 * ),
 *     @OA\Response(response="200", description="Rental that has been added into database with ID assigned.")
 * )
 */ 


Flight::route('POST /rentals', function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::rentalService()->add_rental($data));
    });


/**
 *     @OA\Put(path="/rentals/{id}", tags={"rental"}, 
 *     @OA\Parameter(type="integer", in="path", name="id", default=1),
 * @OA\RequestBody(description="Basic rental info that is going to be updated", required=true,
 *     @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				@OA\Property(property="book_id", required="true", type="integer", description="ID of the book"),
 *     				 @OA\Property(property="user_id", required="true", type="integer", description="ID of the user"),
 *     				 @OA\Property(property="rental_date", required="true", type="string", example="13-10-21"),
 *    				 @OA\Property(property="return_date", type="integer", example="71000", description="13-11-21"),
 *          )
 *     )
 * ),
 *     @OA\Response(response="200", description="Update rental by user ID from database")
 * )
 */ 

Flight::route('PUT /rentals/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::rentalService()->update_rental($id,$data);
    Flight::json("apdejtovala si bravo");
    });

?>


