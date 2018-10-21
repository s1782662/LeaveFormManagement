<?php

namespace LeaveFormManagement\Message;

use LeaveFormManagement\Message\MessageInterface;

class MessageManager implements MessageInterface{


    protected $mp;

    public function __construct(MessageMapper $mp){
        $this->mp = $mp;
    }

    public function sendMessage($from,$to,$content,$status){
        
        $message = $this->getContainer()->get()->get('message');

        $message->setFromUserId($from)
            ->setToUserId($to)
            ->setContent($content)
            ->setStatus('1');

        $this->mp->save($message);  

        echo "Message has been sent";         
    }


}
