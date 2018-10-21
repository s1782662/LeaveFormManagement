<?php

namespace LeaveFormManagement\Mapper;

use LeaveFormManagement\Model\Entity;
use LeaveFormManagement\Mapper\AbstractDataMapper;

class EntityMapper extends AbstractDataMapper{

  protected $table;

  public function setTableForEntityMapper($table){
    $this->table = $table;
    return $this;
  }

  protected function createEntity(array $data){
    return new Entity([
      'name' => $data['name'],
      'id'=>$data['id'],
      'password' => $data['password'],
      'mobile' => $data['mobile'],
      'email' => $data['email'],
      'address' => $data['address'],
      'birthday' => $data['birthday'],
      'area' => $data['area'],
      'city' => $data['city'],
      'pincode' =>$data['pincode'],
      'state' => $data['state'],
      'gender'=>$data['gender'],
      'country'=>$data['country']
    ]);
  }
}

