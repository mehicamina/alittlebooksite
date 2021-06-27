<?php
//filter based middleware
/*Flight::before('start', function(&$params, &$output){
    if (Flight::request()->url == '/swagger') return TRUE;
    if (str_starts_with(Flight::request()->url , '/accounts/')) return TRUE;
    $headers = getallheaders();
    $token = @$headers['Authentication'];
    try {
      $decoded = (array)\Firebase\JWT\JWT::decode($token, "JWT SECRET", ["HS256"]);
      Flight::set('account', $decoded);
        return TRUE;
    }catch (\Exception $e) {
      Flight::json(["message" => $e->getMessage()], 401);
      die;
    }
});*/


/**route based middleware - bolji ovaj */
Flight::route('/user/*', function() {
    $headers = getallheaders();
    $token = @$headers['Authentication'];

    try {
      $user = (array)\Firebase\JWT\JWT::decode($token, "JWT SECRET", ["HS256"]);
      if (Flight::request()->method != "GET" && $user['role'] == "USER_READ_ONLY") {
        throw new Exception("Read only user can't change anything", 403);
    }
      Flight::set('user', $user);
        return TRUE;
    }catch (\Exception $e) {
      Flight::json(["message" => $e->getMessage()], 401);
      die;
    }
});


Flight::route('/admin/*', function() {
    $headers = getallheaders();
    $token = @$headers['Authentication'];
    try {
      $user = (array)\Firebase\JWT\JWT::decode($token, "JWT SECRET", ["HS256"]);
      if ($user['role'] != "ADMIN") {
          throw new Exception("Admin access required", 403);
      }
      Flight::set('user', $user);
        return TRUE;
    }catch (\Exception $e) {
      Flight::json(["message" => $e->getMessage()], 401);
      die;
    }
});

?>