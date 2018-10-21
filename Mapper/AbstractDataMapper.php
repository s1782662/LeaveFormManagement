<?php

namespace LeaveFormManagement\Mapper;

use LeaveFormManagement\Persistence\DatabaseAdapter;
use LeaveFormManagement\Mapper\DataMapperInterface;
use LeaveFormManagement\Exception\DataMapperException;
use LeaveFormManagement\Model\EntityInterface;
use LeaveFormManagement\Collection\EntityCollection;
use LeaveFormManagement\Collection\EntityMapCollection;

abstract class AbstractDataMapper implements DataMapperInterface{

  protected $db;
  protected $table;
  protected $collection;

  public function __construct(DatabaseAdapter $adapter ,EntityCollection $collection, EntityMapCollection $map){
    $this->db = $adapter;
    $this->collection = $collection;
    $this->map = $map;
  }

  public function getDatabaseAdapater(){
    return $this->db;
  }

  public function getCollection(){
    return $this->collection;
  }

  public function findById($id){

    $entity = $this->map->get("{$this->table}"."->"."{$id}");

    if($entity == false){

      $row = $this->db->select($this->table,"`id` = '$id'");

      if($row == 1){

        if($row = $this->db->fetchRow()){
            $entity = $this->createEntity($row);
         }
        $this->map->add(("{$this->table}"."->"."{$id}"),$entity);

        return $entity;
      }else{
        return 0;

        exit();
      }
    }

     return $entity;
  }

  public function fetchAllRows(){
 
    $entites = $this->map->getCollection("{$this->table}");

    $rows = [];

    if(false == $entites){

      $this->db->select($this->table);

      if(($rows = $this->db->fetch()) != null ){
          $entites = $this->createCollection($rows);
      }

      $this->map->addCollection("{$this->table}",$entites);

      return $entites;
    }

    return $entites;
  }

  public function search($criteria){

    $this->db->select($this->table,$criteria);

    $rows = [];
		
		$entites=null;
	
    if(($rows = $this->db->fetch()) != null){
        $entites = $this->createCollection($rows);
    }

    return $entites;
  }

  public function save(EntityInterface $entity){
    return $this->isIdExists($entity->id)?$this->update($entity):$this->insert($entity);
  }

  public function insert(EntityInterface $entity){
    
     return $this->db->insert($this->table,$entity->toArray());
  }

  public function update(EntityInterface $entity){

    $data = $entity->toArray();

    $id = $entity->id;

    $id = "'".$id."'";

    unset($data['id']);

    return $this->db->update($this->table,$data,"`id` = $id");
  }

  public function delete(EntityInterface $entity){
    $id = $entity->id;
    $entity = $this->map->get("{$this->table}"."->"."{$id}");
    if($entity == false){
       return $this->db->delete($this->table,"`id`='{$entity->id}'");
    }else{
      $this->map->remove("{$this->table}"."->"."{$id}");
      return $this->db->delete($this->table,"`id`='{$entity->id}'");
    }
  }


  protected function createCollection(array $rows){

    $this->collection->clear();

    foreach($rows as $row){
      $this->collection[] =  $this->createEntity($row);
    }

    return $this->collection;
  }

  public function isIdExists($id){
    $rows = $this->db->select($this->table,"`id` = '$id'");
    return ($rows == 1)?true:false;
  }

  public function getNoResultantRows($criteria){
    return $this->db->select($this->table,$criteria);
  }    

 protected abstract function createEntity(array $data); 

}
