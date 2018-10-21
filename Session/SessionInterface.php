<?php

namespace LeaveFormManagement\Session;

interface SessionInterface extends \ArrayAccess,\Iterator{

  public function start();

  public function destroy();

  public function add($key,$data);

  public function get($key);

  public function remove($key);

  public function reset();

  public function isLoggedIn();

  public function getId();

  public function &getObjectBag();

}
