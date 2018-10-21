<?php
namespace LeaveFormManagement\Mapper;

use LeaveFormManagement\Mapper\AbstractDataMapper;
use LeaveFormManagement\Model\Event;


class EventMapper extends AbstractDataMapper{

  protected $table = "Event";

  protected function createEntity(array $data){
    return new Event([
      'id' => $data['id'],
      'eventName'=> $data['eventName'],
      'eventDescription'=> $data['eventDescription'],
      'eventStartTimeStamp'=> $data['eventStartTimeStamp'],
      'eventEndTimeStamp'=> $data['eventEndTimeStamp'],
      'eventGender'=> $data['eventGender'],
      'eventStatus'=> $data['eventStatus']
    ]);
 }
}

