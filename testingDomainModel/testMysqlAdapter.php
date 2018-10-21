<?php
include_once "../MapperLayer/DataMapperInterface.php";
include_once "../PersistenceLayer/DatabaseInterface.php";
include_once "../PersistenceLayer/DatabaseAdapter.php";
$check =  MySqlAdapter::getInstance(array("localhost","root","<james><10mse1025>","LeaveTest"));

echo $check->select("test");
//if($check->insert("test",array('id'=>'5','fname'=>'krishna')) == 1 )
  //   echo "Hello your tuple is inserted";

//
//echo $check->update("test",array('id'=>'4','fname'=>'dona george'),"id = 5") ;

//echo $check->delete("test","id=3");


?>
