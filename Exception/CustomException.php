<?php

namespace LeaveFormManagement\Exception;

use LeaveFormManagement\Exception\IException;


abstract class CustomException extends \Exception implements IException
{
  protected $message = 'unknown execption';
  private $string;
  protected $code = 0;
  protected $file;
  protected $line;
  private $trace;

  public function __construct($message = null , $code = 0){
    if(!$message)
      throw new $this('Unknown'.get_class($this));

    parent::__construct($message,$code);
  }

  public function __toString() {
    return '<br />'.get_class($this)." '{$this->message}' in {$this->file} ({$this->line})\n".'<br />'."\n{$this->getTraceAsString()}";
  }

}
