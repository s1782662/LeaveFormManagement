<?php

namespace LeaveFormManagement\Exception;

interface IException{
  /* protected Methods inherited from Exception class */
  public function getMessage();
  public function getCode();
  public function getFile();
  public function getLine();
  public function getTrace();
  public function getTraceAsString();

  /* overrideable methods inherited from exceptions */
  public function __toString();
  public function __construct($message = null,$code = 0);
}
