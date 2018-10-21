<?php

require_once "../DomainEntityModel/AbstractEntity.php"; 
class Hostel extends  AbstractEntity{

  protected $blockName = NULL;

  protected $regno = NULL;

  public function getBlockName(){
    return $this->blockName;
  }
}



?>
