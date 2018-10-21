<?php

namespace LeaveFormManagement\Collection;

use LeaveFormManagement\Model\EntityInterface;

interface EntityCollectionInterface extends \Countable,\IteratorAggregate,\ArrayAccess{

  public function add($key,EntityInterface $user);
  
  public function remove(EntityInterface $user);

  public function get($key);

  public function exists($key);

  public function toArray();

  public function clear();

  public function getIterator();
}
