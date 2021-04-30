<?php

/**
 * @OA\Get(path="/categories", tags={"category"},
 *     @OA\Parameter(type="integer", in="query", name="offset", default=0, description="Offset for pagination"),
 *     @OA\Parameter(type="integer", in="query", name="limit", default=10, description="Limit for pagination"),
 *     @OA\Parameter(type="string", in="query", name="search", description="Search string for category"),
 *     @OA\Parameter(type="string", in="query", name="order", default="-id", description="Sorting for return elements. -column_name ascending order by id or +column_name descending order by id"),
 *     @OA\Response(response="200", description="List addresses from database")
 * )
 */ 

Flight::route('GET /category', function(){ 
   $offset = Flight::query('offset', 0); 
   $limit = Flight::query('limit', 10);
   $search = FLight::query('search');
   $order = FLight::query('order', "-id");
    Flight::json(Flight::categoryService()->get_categories($search, $offset, $limit, $order));
    
});


/**
 *     @OA\Get(path="/category/{id}", tags={"categories"}, 
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="ID of category"),
 *     @OA\Response(response="200", description="Fetch individual category")
 * )
 */ 

Flight::route('GET /categories/@id', function($id){
    Flight::json(Flight::categoryService()->get_by_id($id));
    });

/**
 *     @OA\Post(path="/categories", tags={"categories"}, 
 * @OA\RequestBody(description="Basic category info", required=true,
 *     @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *                   @OA\Property(property="name", required="true", type="string", example="Novel", description="Category of the book"),
 *    				 @OA\Property(property="book_id", required="true", type="integer", description="ID of the book"),
 *          )
 *     )
 * ),
 *     @OA\Response(response="200", description="Address that has been added into database with ID assigned.")
 * )
 */ 

Flight::route('POST /category', function(){
   $data = Flight::request()->data->getData();
   Flight::json(Flight::categoryService()->add_category($data));
    });

/**
 *     @OA\Put(path="/categories/{id}", tags={"categories"}, 
 *     @OA\Parameter(type="integer", in="path", name="id", default=1),
 * @OA\RequestBody(description="Basic category info that is going to be updated", required=true,
 *     @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    			 @OA\Property(property="name", required="true", type="string", example="Novel", description="Category of the book"),
 *    				 @OA\Property(property="book_id", required="true", type="integer", description="ID of the book"),
 *          )
 *     )
 * ),
 *     @OA\Response(response="200", description="Update category by ID from database")
 * )
 */ 
Flight::route('PUT /categories/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::categoryService()->update($id,$data));
});

?>