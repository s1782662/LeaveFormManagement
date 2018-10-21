<?php


namespace LeaveFormManagement\Persistence;

use LeaveFormManagement\Exception\MySqlAdapterException;
use LeaveFormManagement\Persistence\DatabaseInterface;


class DatabaseAdapter implements DatabaseInterface{

  private   $connect = NULL;
  private static $instance = NULL;
  protected $result;
  protected $config = array();

  /*
   *  Constructor
   */

  public function __construct(array $config = array()){
    
    $config = array('localhost','root','<james><10mse1025>','LeaveManagementSystem');
    if(count($config) !== 4 ){
      throw new MySqlAdapterException('Invalid Number Of Arguments');
    }

    $this->config = $config;
  }
  
  public static function getInstance(array $config = array()){
    $config = array('localhost','root','<james><10mse1025>','LeaveFormManagement');
    if(self::$instance  === NULL){
      self::$instance = new self($config);
    }
    return self::$instance;
  }
  
  public function __clone(){}

    /* 
     * Connection to Mysql Adapter
     *
     */ 

  public function connection(){
    //connect only once 

    if($this->connect !== NULL){
        return $this->connect;
    }

    list($host,$username,$password,$database) = $this->config;

    if(($this->connect = @mysqli_connect($host,$username,$password,$database))){
      unset($host,$username,$password,$database);
      return $this->connect;
    }
    throw new MySqlAdapterException('Please check you configuration !!!! Error Connecting to the server:'.mysqli_connect_error());
  }

  /*
   *Execute the specified query
   */

  public function query($query){

    if(!is_string($query) || empty($query))
      throw new MySqlAdapterException('The query passed to the function is not valid');

    $this->connection();

    if($this->result = mysqli_query($this->connect,$query)){
        return $this->result;
    }
    throw new MySqlAdapterException('Check your sql manual !!! Error executing the specified query'.mysqli_error($this->connect));
  }

  /*
   *Select Statement
   */
  public function select($table,$where="",$fields="*",$order="",$limit=null,$offest = null){

    $query = 'SELECT '.$fields.' FROM `'.$table.'`'.(($where)?' WHERE '.$where:"").(($limit)?'LIMIT'.$limit : "").(($order)?'ORDER BY'.$order:"");

    $this->query($query);


    return $this->countResultantRows();
  }

  public function countResultantRows(){
    return $this->result !== NULL ? mysqli_num_rows($this->result):0;
  }

  public function disconnect(){

    if($this->connect !== null){

       mysqli_close($this->_connection);

       $this->connection = null;

       return true;
    }

    return false;
  }

  public function insert($table,array $parameters){

     $fields = implode(",",array_keys($parameters));

     $values = implode(",",array_map(array($this,'filtervalue'),array_values($parameters)));

     $query = 'INSERT INTO '.$table.'('.$fields.')'.'VALUES'.'('.$values.')';

     $this->query($query);

     return $this->getAffectedRows();
  }

  public  function filtervalue($value){
    $this->connection();

    if($value === null){
      $value = 'NULL';
    }elseif(!is_numeric($value)){
      $value = "'".mysqli_real_escape_string($this->connect,$value)."'";
    }

    return $value;
  }
  
  public function fetch(){

    $rows = [];

    if($this->result != null){

      while(($row = mysqli_fetch_array($this->result,MYSQLI_ASSOC)) != false ){
          $rows[] =  $row;
      }

      return $rows;

      $this->clearResultantMemory();

      return false;
    }
    return null;
  }

  public function fetchRow(){

    $rows = [];

    if($this->result != null){

      if(($row = mysqli_fetch_array($this->result,MYSQLI_ASSOC)) != false ){
          return $row;
      }

      $this->clearResultantMemory();

      return false;
    }

      return null;
  }

  public function clearResultantMemory(){

    if($this->result !== null ){
      mysqli_free_result($this->result);
      return true;
    }

    return false;
  }

  public function update($table,array $data,$where=""){

    $set = array();

    foreach($data as $field => $value){
      $set[] = "`".$field."`"."=".$this->filtervalue($value);
    }

    $set = implode(",",$set);

    $query = 'UPDATE `'.$table.'` SET '.$set.(($where) ? ' WHERE '.$where : "");

    $this->query($query);

    return $this->getAffectedRows();
  }

  public function delete($table,$where=""){

    $query = 'DELETE FROM '.$table.(($where)?' WHERE '.$where :"");

    $this->query($query);

    return $this->getAffectedRows();
  }

  public function getAffectedRows(){
    return (($this->connect !== null) ? mysqli_affected_rows($this->connect) : 0 );
  }

}


