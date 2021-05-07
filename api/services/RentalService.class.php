<?php

require_once dirname(__FILE__)."/../services/BaseService.class.php";
require_once dirname(__FILE__)."/../dao/RentalDao.class.php";
require_once dirname(__FILE__)."/../dao/BaseDao.class.php";


class RentalService extends BaseService{


    public function __construct(){
        $this->dao = new RentalDao();
    }

    public function get_rentals_by_id($id){
      return $this->dao->get_rentals_by_id($id);

  } 

   public function get_rental_by_user_id($search, $offset, $limit, $order){
        if($search){
            return $this->dao->get_rental_by_user_id($search, $offset, $limit, $order);
        }else{
        return $this->dao->get_all_rentals($offset, $limit, $order);
        }
    } 

    public function get_rental_by_book_id($search, $offset, $limit, $order){
      if($search){
          return $this->dao->get_rental_by_book_id($search, $offset, $limit, $order);
      }else{
      return $this->dao->get_all_rentals($offset, $limit, $order);
      }
  } 

    public function get_rentals($search, $offset, $limit, $order){
      return $this->dao->get_all_rentals($search, $offset, $limit, $order);
  }

    public function add_rental($data) {
      return $this->dao->add_rental($data);
  }

  
  public function update_rental($id, $data) { 
    return $this->dao->update_rental($id, $data);
 }

}
 

?>