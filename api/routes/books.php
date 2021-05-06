<?php

/**
 * @OA\Get(path="/books", tags={"books"},
 *     @OA\Parameter(type="integer", in="query", name="offset", default=0, description="Offset for pagination"),
 *     @OA\Parameter(type="integer", in="query", name="limit", default=10, description="Limit for pagination"),
 *     @OA\Parameter(type="string", in="query", name="search", description="Search string for book"),
 *     @OA\Parameter(type="string", in="query", name="order", default="-id", description="Sorting for return elements. -column_name ascending order by id or +column_name descending order by id"),
 *     @OA\Response(response="200", description="List addresses from database")
 * )
 */ 

Flight::route('GET /books', function(){ 
   $offset = Flight::query('offset', 0); 
   $limit = Flight::query('limit', 10);
   $search = FLight::query('search');
   $order = FLight::query('order', "-id");
    Flight::json(Flight::bookService()->get_books($search, $offset, $limit, $order));
    
});


/**
 *     @OA\Get(path="/books/{id}", tags={"books"}, 
 *     @OA\Parameter(type="integer", in="path", name="id", default=1, description="ID of book"),
 *     @OA\Response(response="200", description="Fetch individual user")
 * )
 */ 

Flight::route('GET /books/@id', function($id){
    Flight::json(Flight::bookService()->get_by_id($id));
    });

/**
 *     @OA\Post(path="/books", tags={"books"}, 
 * @OA\RequestBody(description="Basic book info", required=true,
 *     @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="title", required="true", type="string", example="Bijeli Ocnjak", description="Title of the book"),
 *    				 @OA\Property(property="author", required="true", type="string", example="Paulo Coelho", description="Author of the book"),
 *     				 @OA\Property(property="description", required="true", type="string", example="Novel", description="Description of the book"),
 *    				 @OA\Property(property="realise_year", type="integer", example="2011", description="Realise year of the book"),
 *                   @OA\Property(property="status", type="string", example="AVAILABLE", description="Status of the book"),
 * 
 *          )
 *     )
 * ),
 *     @OA\Response(response="200", description="Books that has been added into database with ID assigned.")
 * )
 */ 

Flight::route('POST /books', function(){
   $data = Flight::request()->data->getData();
   Flight::json(Flight::bookService()->add_book($data));
    });

/**
 *     @OA\Put(path="/book/{id}", tags={"books"}, 
 *     @OA\Parameter(type="integer", in="path", name="id", default=1),
 * @OA\RequestBody(description="Basic book info that is going to be updated", required=true,
 *     @OA\MediaType(mediaType="application/json",
 *    			@OA\Schema(
 *    				 @OA\Property(property="title", required="true", type="string", description="Title of the book"),
 *    				 @OA\Property(property="author", required="true", type="string", example="Paulo Coelho", description="Author of the book"),
 *     				 @OA\Property(property="description", required="true", type="string", example="Novel", description="Description of the book"),
 *    				 @OA\Property(property="realise_year", type="integer", example="2011", description="Realise year of the book"),
 *                   @OA\Property(property="status", type="string", example="ACTIVE", description="Status of the book"),
 * 
 *          )
 *     )
 * ),
 *     @OA\Response(response="200", description="Update books by ID from database")
 * )
 */ 
Flight::route('PUT /book/@id', function($id){
    $data = Flight::request()->data->getData();
    Flight::bookService()->update_books($id,$data);
    Flight::json("The book has been updated.");
});

?>