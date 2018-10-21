<?php 

namespace LeaveFormManagement\Model;

class Config extends AbstractEntity {

  protected $field = array();

  protected $allowedFields = array('id','weekendleavetimefrom','weekendleavetimeto','weekdayleavetimefrom','weekdayleavetimeto','minimumleavetime');

  public function setId($id){
      $this->field['id'] = $id;
    return $this;
  }

  public function getId(){
    return $this->field['id'];
  }

 

  public function setWeekendleavetimefrom($from){
    $this->field['weekendleavetimefrom'] = $from;
    return $this;
  }

  public function getWeekendleavetimefrom(){
    return $this->field['weekendleavetimefrom'];
  }

  public function setWeekendleavetimeto($to){
    $this->field['weekendleavetimeto'] = $to;
    return $this;
  }

  public function getWeekendleavetimeto(){
    return $this->field['weekendleavetimeto'];
  }

  public function setWeekdayleavetimefrom($from){
    $this->field['weekdayleavetimefrom'] = $from;
    return $this;
  }

  public function getWeekdayleavetimefrom(){
    return $this->field['weekdayleavetimefrom'];
  }

  public function setWeekdayleavetimeto($to){
    $this->field['weekdayleavetimeto'] =  $to;

    return $this;
  }

  public function getWeekdayleavetimeto(){
    return $this->field['weekdayleavetimeto'];
  }

  public function setMinimumleavetime($time){
    $this->field['minimumleavetime'] =  $time;
    return $this;
  }

  public function getMinimumleavetime(){
    return $this->field['minimumleavetime'];
  }

}
