<?php
namespace LeaveFormManagement\Mapper;

use LeaveFormManagement\Mapper\AbstractDataMapper;
use LeaveFormManagement\Model\Hostellers;

class HostelMapper extends AbstractDataMapper{

  protected $table = "hostellers";

  protected function createEntity(array $data){

    return new Hostellers([
      'id' => $data['id'],
      'wardenid'  => $data['wardenid'],
      'proctorid' => $data['proctorid'],
      'room'      => $data['room'],
      'typeOfRoom'=> $data['typeOfRoom']
    ]);
  }
}
