<?php
namespace LeaveFormManagement\Event;

use LeaveFormManagement\Model\EntityInterface;

interface EventInterface extends EntityInterface{

  public function setEventName($name);
  public function getEventName();

  public function setEventDescription($description);
  public function getEventDescription();

  public function setEventGender($gender);
  public function getEventGender();

  public function setEventStartTimestamp($startdatetime);
  public function getEventStartTimestamp();

  public function setEventEndTimestamp($enddatetime);
  public function getEventEndTimestamp();

  public function getEventStatus();
  public function setEventStatus($status);
}

