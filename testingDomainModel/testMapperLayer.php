<?php
require_once "../PersistenceLayer/DatabaseAdapter.php";
require_once "../PersistenceLayer/DatabaseInterface.php";
require_once "../MapperLayer/EntityMapper.php";
require_once "../DomainEntityModel/Entity.php";


$check =  MySqlAdapter::getInstance(array("localhost","root","<james><10mse1025>","LeaveTest"));

$entity =  new EntityMapper($check);
$entity->setEntityTable("test");
$entity->setEntityClass("Entity");;

$entit1 =   new Entity(array('id'=>'6','fname'=>'Mad'));
echo $entity->save($entit1);
 
/*
$object =  $entity->findById(1);

if($object instanceof Entity)
  echo "Yes it is instance";
else
  echo "No it is not Instance";

echo $object->getName();

//echo 'Your id is '.$entity->findById(1)->getName();

echo "Successful";


 */



?>
