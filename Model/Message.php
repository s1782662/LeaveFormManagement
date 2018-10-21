<?php

namespace LeaveFormManagement\Model;

use LeaveFormManagement\Model\AbstractEntity;


class Message extends AbstractEntity {

    protected $allowedFields = array('id','fromUserId','toUserId','content','status');

    protected $field = array();

    public function setId($timestamp){
        $this->field['id'] = $timestamp;
        return $this;
    }

    public function getId(){
        return $this->field['id'];
    }

    public function setFromUserId($id){
        $this->field['fromUserId'] = $id;
        return $this;
    }

    public function getFromUserId(){
        return $this->field['fromUserId'];
    }

    public function setToUserId($id){
        $this->field['touserId'] = $id;
        return $this;
    }

    public function getToUserId(){
        return $this->field['touserId'];
    }

    public function setContent($content){
        $this->field['content'] = $content;
        return $this;
    }

    public function getContent(){
        return $this->field['content'];
    }

    public function setStatus($status){
        $this->field['status'] = $status;
        return $this;
    }

    public function getStatus(){
        return $this->field['status'];
    }


}
