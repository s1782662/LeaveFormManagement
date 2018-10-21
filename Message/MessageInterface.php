<?php


namespace LeaveFormManagement\Message;

use LeaveFormManagement\Model\EntityInterface;


interface MessageInterface extends EntityInterface{

    public function sendMessage($from,$to,$message,$status);

    public function flushMessages();

    public function viewMessages($userid);

    public function setStatusToMessage($status);

}
