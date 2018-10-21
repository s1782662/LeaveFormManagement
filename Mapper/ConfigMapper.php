<?php
namespace LeaveFormManagement\Mapper;

use LeaveFormManagement\Mapper\AbstractDataMapper;
use LeaveFormManagement\Model\Config;


class ConfigMapper extends AbstractDataMapper{

  protected $table = "config";

  protected function createEntity(array $data){
    return new Config([
      'id' => $data['id'], 
      'weekendleavetimefrom' => $data['weekendleavetimefrom'],
      'weekendleavetimeto' => $data['weekendleavetimeto'],
      'weekdayleavetimefrom' => $data['weekdayleavetimefrom'],
      'weekdayleavetimeto' => $data['weekdayleavetimeto'],
      'minimumleavetime' => $data['minimumleavetime']
    ]);
  }
}
