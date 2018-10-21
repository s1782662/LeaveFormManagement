<?php

require("./Session.php");

require("./EncryptedSessionHandler.php");

echo session_save_path();

$handler = new EncryptedSessionHandler('282edfcf5073666f3a7ceaa5e748cf8128bd53359b6d8269ba2450404face0ac');

$session = new Session($handler,'files');

 $session->getObjectBag()->add('user','james');



echo "Hello".$session->isLoggedIn();

$session->destroy();

$session->getObjectBag()->clear();

echo "hello".$session->isLoggedIn();



