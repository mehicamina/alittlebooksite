<?php

require_once dirname(__FILE__)."/../services/BaseService.class.php";
require_once dirname(__FILE__)."/../dao/RentalDao.class.php";
require_once dirname(__FILE__)."/../dao/BaseDao.class.php";


class RentalService extends BaseService{


    public function __construct(){
        $this->dao = new RentalDao();
    }
    
    public function get_rentals($user_id, $offset, $limit, $search, $order){
     return $this->dao->get_rentals($user_id, $offset, $limit, $search, $order); 
    }
    public function add($rental)
    {
      try {
        return parent::add($rental);
      } catch (\Exception $e) {
        if (str_contains($e->getMessage(), 'rental.uq_rental_date ')) {
          throw new Exception("Rental with same data alredy exist", 400, $e);
        }else{
          throw $e;
        }
      }
    }
}
 

?>