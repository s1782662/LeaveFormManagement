<?php


session_start();

$bag=null;

$_SESSION['OBJECT'] = [];


$bag = &$_SESSION['OBJECT'];

$bag['user'] = james;

$bag['user1'] = johnson;

$_SESSION['user'] = "johnson111";

foreach($_SESSION['OBJECT'] as $k => $v)
{
  echo $k."->".$v;
}

