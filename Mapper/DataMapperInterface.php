<?php

namespace LeaveFormManagement\Mapper;

use LeaveFormManagement\Model\EntityInterface;

interface DataMapperInterface{
  
  public function findbyid($id);

  public function fetchAllRows();

  public function search($criteria);

  public function insert(EntityInterface $entity);

  public function update(EntityInterface $entity);

  public function delete(EntityInterface $entity);

}

