<?php
namespace LeaveFormManagement;

use LeaveFormManagement\Model\Entity;
use LeaveFormManagement\AutoClassLoader;
use LeaveFormManagement\Mapper\EntityMapper;
use LeaveFormManagement\Collection\EntityMap;
use LeaveFormManagement\Collection\EntityCollection;
use LeaveFormManagement\Persistence\DatabaseAdapter;

include("./AutoClassLoader.php");


/*
spl_autoload_register('classLoader');
spl_autoload_register('libloader');
 */

$loader = new AutoClassLoader;
$loader->register();

$user = new Entity;

$collection= new EntityCollection;
$map = new EntityMap();

$connect = DatabaseAdapter::getInstance(array("localhost","root","<james><10mse1025>","LeaveTest"));
$mapper = new EntityMapper($connect,$collection,$map);

$user = $mapper->findById('10mse1077');
echo "The id is ".$user->id;


$entites = $mapper->fetchAllRows();

/*
foreach($entites as $user )
  echo $user->firstname;
 */

$entites = $mapper->search("`place` = 'kerala'");

foreach($entites as $user)
  echo $user->firstname;


?>
