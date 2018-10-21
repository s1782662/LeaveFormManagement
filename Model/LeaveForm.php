<?php

namespace LeaveFormManagement\Model;

use LeaveFormManagement\Model\AbstractEntity;
use LeaveFormManagement\Model\EntityInterface;

class LeaveForm extends AbstractEntity {

  protected $allowedFields = array('id','name','place','exitOn','entryOn','approvedByWardenId','approvedByProctorId','leaveStatus','wardenStatus','proctorStatus','proctorPermission','wardenPermission','purpose','level','wardenAppDispp','proctorAppDispp');

  protected $fields = array();
  
  public function setName($name){
    $this->field['name'] = $name;
    return $this;
  }

  public function getName(){
    return $this->field['name'];
  }

  public function setId($id){
    $this->field['id'] = $id;
    return $this;
  }

  public function getId(){
    return $this->field['id'];
  }

  public function setPlace($place){
    $this->field['place']= $place;
    return $this;
  }
  public function getPlace(){
    return $this->field['place'];
  }

  public function setExitOn($from){
    $this->field['exitOn'] = $from;
    return $this;
  }

  public function getExitOn(){
    return $this->field['exitOn'];
  }

  public function setEntryOn($to){
    $this->field['entryOn'] = $to;
    return $this;
  }

  public function getEntryOn(){
    return $this->field['entryOn'];
  }
  
  public function setApprovedByWardenId($id){
    $this->field['approvedByWardenId'] = $id;
    return $this;
  }

  public function getApprovedByWardenId(){
    return $this->field['approvedByWardenId'];
  }

  public function setApprovedByProctorId($id){
    $this->field['approvedByProctorId'] = $id;
    return $this;
  }

  public function getApprovedByProctorId(){
    return $this->field['approvedByProctorId'];
  }
	
  public function setLeaveStatus($id){
    $this->field['leaveStatus'] = $id;
    return $this;
  }

  public function getLeaveStatus(){
    return $this->field['leaveStatus'];
  }

  public function toArray(){
    return $this->field;
  }

  public function setWardenStatus($status){
    $this->field['wardenStatus'] = $status;
    return $this;
  }

  public function getWardenStatus(){
    return $this->field['wardenStatus'];
  }

  public function setProctorStatus($status){
    $this->field['proctorStatus'] = $status;
    return $this;
  }
  
  public function setProctorPermission($status){
      $this->field['proctorPermission'] = $status;
      return $this;
  }

  public function getProctorPermission(){
    return $this->field['proctorPermission'];
  }

  public function setWardenPermission($status){
    $this->field['wardenPermission'] = $status;
    return $this;
  } 

  public function getWardenPermission(){
    return $this->field['wardenPermission'];
  }

  public function getProctorStatus(){
    return $this->field['proctorStatus'];
  }

  public function setPurpose($purpose){
    $this->field['purpose'] = $purpose;
    return $this;
  }

  public function getPurpose(){
    return $this->field['purpose'];
  }

  public function setLevel($level){
    $this->field['level'] = $level;
    return $this;
  }

  public function getLevel(){
    return $this->field['level'];
  }

  public function setWardenAppDispp($value){
    $this->field['wardenAppDispp'] = $value;
    return $this;
  }

  public function getWardenAppDispp(){
    return $this->field['wardenAppDispp'];
  }

  public function setProctorAppDispp($value){
    $this->field['proctorAppDispp'] = $value;
    return $this;
  }

  public function getProctorAppDispp(){
    return $this->field['proctorAppDispp'];
  }
}




