<?php
require_once dirname(__FILE__)."/../config.php";

class BaseDao {
  protected $connection;

  private $table;

  public function __construct(){
    try {
      $this->connection = new PDO("mysql:host=".Config::DB_HOST.";dbname=".Config::DB_SCHEME, Config::DB_USERNAME, Config::DB_PASSWORD);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "RADI ";
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

  protected function query($query, $params){
    $stmt = $this->connection->prepare($query);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  protected function query_unique($query, $params){
    $results = $this->query($query, $params);
    return reset($results);
  }

  public function get_by_id($id){
      return $this->query_unique("SELECT * FROM ".$this->table." WHERE id = :id", ["id" => $id]);
    }

}
