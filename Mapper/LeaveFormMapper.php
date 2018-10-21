<?php

namespace LeaveFormManagement\Mapper;

use LeaveFormManagement\Mapper\AbstractDataMapper;
use LeaveFormManagement\Model\LeaveForm;

class LeaveFormMapper extends AbstractDataMapper{

  protected $table = "LeaveForm";

  protected function createEntity(array $data){
    return new LeaveForm([
      'id' => $data['id'],
      'name' => $data['name'],
      'place'=> $data['place'],
      'exitOn'=> $data['exitOn'],
      'entryOn'=> $data['entryOn'],
      'approvedByWardenId' => $data['approvedByWardenId'],
      'approvedByProctorId' => $data['approvedByProctorId'],
      'leaveStatus' => $data['leaveStatus'],
      'wardenStatus'=> $data['wardenStatus'],
      'proctorStatus' => $data['proctorStatus'],
      'proctorPermission'=>$data['proctorPermission'],
      'wardenPermission'=>$data['wardenPermission'],
      'purpose' => $data['purpose'],
      'level'=>$data['level'],
      'wardenAppDispp' => $data['wardenAppDispp'],
      'proctorAppDispp'=>$data['proctorAppDispp']
  ]);
  
  }


}

