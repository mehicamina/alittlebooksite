<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class RentalDao extends BaseDao
{
  protected function get_rental_by_id($rental)
  {
    return $this->get_by_id($rental);
  }
}




 ?>
