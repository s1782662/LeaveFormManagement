<?php

namespace LeaveFormManagement\Model;

use LeaveFormManagement\Model\AbstractEntity;


class Hostellers extends AbstractEntity{

  protected $field = array();

  protected $allowedFields = array('id','wardenid','proctorid','room','typeOfRoom');

  public function setId($value){
    $this->field['id'] = $value;
    return $this;
  }

  public function getId(){
    return $this->field['id'];
  }

  public function setWardenid($value){
    $this->field['wardenid'] = $value;
    return $this;
  }

  public function getWardenid(){
    return $this->field['wardenid'];
  }

  public function setProctorid($value){
    $this->field['proctorid'] = $value;
    return $this;
  }

  public function getProctorid(){
    return $this->field['proctorid'];
  }

  public function setRoom($value){
    $this->field['room'] = $value;
    return $this;
  }

  public function getRoom(){
    return $this->field['room'];
  }

  public function setTypeOfRoom($value){
    $this->field['typeOfRoom'] = $value;
    return $this;
  }

  public function getTypeOfRoom(){
    return $this->field['typeOfRoom'];
  }
}
