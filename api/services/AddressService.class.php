<?php

require_once dirname(__FILE__)."/../services/BaseService.class.php";
require_once dirname(__FILE__)."/../dao/AddressDao.class.php";
require_once dirname(__FILE__)."/../dao/BaseDao.class.php";


class AddressService extends BaseService{


    public function __construct(){
        $this->dao = new AddressDao();
    }


    public function get_addresses($search, $offset, $limit, $order){
        if($search){
            return $this->dao->get_all_addresses($search, $offset, $limit, $order);
        }else{
        return $this->dao->get_all($offset, $limit, $order);
        }
    }

    public function add_address($data) {
        return $this->dao->add_address($data);
    }

    
    public function update_address($id, $address) { 
       return $this->dao->update_address($id, $address);
    }

    public function get_address_by_id($id){
        return $this->dao->get_addresses_by_id($id);

    }
}
?>