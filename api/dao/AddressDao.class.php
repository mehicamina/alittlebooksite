<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class AddressDao extends BaseDao{

  public function __construct()
  {
      parent::__construct("addresses");
  }

public function add_address($address){
  return $this->insert("addresses", $address);
}

public function update_address($id, $address){
  $this->update("addresses", $id, $address);
}


public function get_addresses_by_id($id)
{
  return $this->query_unique("SELECT * FROM addresses WHERE id = :id", ["id" => $id]);
}


public function get_all_addresses(){
  return $this->query("SELECT * FROM addresses", []);
}

}

 ?>