 <?php
require_once dirname(__FILE__)."/../config.php";

class BaseDao {
  protected $connection;

  protected $table; 

  public function __construct($table){
    $this->table = $table;
    try {
      $this->connection = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_SCHEME, Config::DB_USERNAME, Config::DB_PASSWORD);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$this->connection->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
      }
    catch(PDOException $e) {
    //  echo "Connection failed!";
      throw $e;
    }
  }
  protected function insert($table, $entity){
    $query = "INSERT INTO ${table} (";
    foreach ($entity as $column => $value) {
      $query .= $column.", ";
    }
    $query = substr($query, 0, -2);
    $query .= ") VALUES (";
    foreach ($entity as $column => $value) {
      $query .= ":".$column.", ";
    }
    $query = substr($query, 0, -2);
    $query .= ")";

    $stmt= $this->connection->prepare($query);
    $stmt->execute($entity);
    $entity['id'] = $this->connection->lastInsertId();
    return $entity;
  }
 
  public function query($query, $params){ //executing sql statements with any kind of parametars
    
    $stmt = $this->connection->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  }

  public function query_unique($query, $params){ //to get first element, not a whole array
    $results = $this->query($query, $params);
    return reset($results); //function that gives first element of array
  }

  public function get_by_id($id){
      return $this->query_unique("SELECT * FROM ".$this->table." WHERE id = :id", ["id" => $id]);
    }

    public function get_user_by_email($email){
      return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
    }

    public function execute_update($table, $id, $entity, $id_column = "id"){
      $query = "UPDATE ${table} SET ";
      foreach($entity as $name => $value){
        $query .= $name ."= :". $name. ", ";
      }
      $query = substr($query, 0, -2);
      $query .= " WHERE ${id_column} = :id";
  
      $stmt= $this->connection->prepare($query);
      $entity['id'] = $id;
      $stmt->execute($entity);
    }

    public function update($id, $entity){
      $this->execute_update($this->table, $id, $entity);
    }

    public function add($entity){
      return $this->insert($this->table, $entity);
    }

    public function beginTransaction(){
     // $this->connection->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
      $this->connection->beginTransaction();
    }

    public function commit(){
      $this->connection->commit();
     // $this->connection->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
    }

    public function rollBack(){
      $this->connection->rollBack();
     // $this->connection->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
    }



    public function parse_order($order){
      switch(substr($order, 0, 1)){
        case '-': $order_direction = "ASC"; break;
        case '+': $order_direction = "DESC"; break;
        default: throw new Exception("Invalid order format. First character should be either + or -"); break;
      };
      $order_column = trim($this->connection->quote(substr($order, 1)),"'");

      return [$order_column, $order_direction];
    }
  
    public function get_all($offset = 0, $limit = 25, $order="-id"){
      list($order_column, $order_direction) = self::parse_order($order);
  
      return $this->query(
      "SELECT * FROM ".$this->table."
       ORDER BY ${order_column} ${order_direction}
      LIMIT ${limit} OFFSET ${offset}", []);
    }


}
