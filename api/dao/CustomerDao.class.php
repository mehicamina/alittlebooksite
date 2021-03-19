<?php

require_once dirname(__FILE__)."/BaseDao.class.php";

class CustomerDao extends BaseDao()
{
  protected function get_customer_by_id($customer)
  {
    return $this->get_by_id($customer);
  }
}

 ?>
