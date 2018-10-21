<?php
namespace LeaveFormManagement\Mapper;

use LeaveFormManagement\Model\Message;
use LeaveFormManagement\Mapper\AbstractDataMapper;

class MessageMapper extends AbstarctDataMapper{

    protected $table = "Message";

    public function createEntity(array $data){
        return new Entity([
            'id'=>$data['id'],
            'fromUserId'=> $data['fromUserId'],
            'toUserId'=>$data['toUserId'],
            'content'=>$data['content'],
            'status'=>$data['status']
        ]);

    }

}
