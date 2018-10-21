<?php

namespace LeaveFormManagement\Collection;

use LeaveFormManagement\Model\EntityInterface;
use LeaveFormManagement\Collection\EntityCollectionInterface;

Interface EntityMapCollection{

  public function add($key,EntityInterface $entity);

  public function addCollection($key,EntityCollectionInterface $entitycollection);

  public function replaceCollection($key,EntityCollectionInterface $entitycollection);

  public function replace($key,EntityInterface $entity);

  public function get($key);

  public function getCollection($key);

}

