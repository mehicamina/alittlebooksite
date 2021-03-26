<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class AddressDao extends BaseDao{

  public function get_address_by_id($address)
  {
    return $this->get_by_id($address);
  }
}

 ?>