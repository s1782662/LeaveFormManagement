<?php

namespace LeaveFormManagement\Mapper;

use LeaveFormManagement\Mapper\AbstractDataMapper;


class SecurityMapper extends AbstractDataMapper{
    
    protected $table;

    protected function createEntity(array $data){
        return new Security([
        
        
        ]);
    } 

}
