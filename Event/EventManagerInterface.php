<?php
namespace LeaveFormManagement\Event;

use LeaveFormManagement\Event\EventInterface;

interface EventManagerInterface{

  public function addEvent(EventInterface $event);

  public function getEventById($id);

  public function getEvents();

  public function DisableEvent(EventInterface $event);
  public function UpdateEvent(EventInterface $event);
  public function DeleteEvent(EventInterface $event);
}
