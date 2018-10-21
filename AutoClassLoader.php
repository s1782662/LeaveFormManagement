<?php
namespace LeaveFormManagement;


class AutoClassLoader{

  private $fileExtension = '.php';

  private $namespace;

  private $namespaceSeparator = '\\';

  private $includepath = "/var/www/";
  /**
    * Constructor of this class
    *
    * @param = null 
    */


  public function __construct(){}

    /**
     * Loads the classes of particular namepsace 
     *
     * @param string $ns The namespace variable
     */
  public function setNameSpace($ns = null){
    $this->namespace = $ns;
  }

  /**
   * Returns the loaded Namespace
   *
   * @return string $namespace
   */
  public function getNameSpace(){
    return $this->namespace;
  }

  /**
   * Loads the class with specified extension
   *
   * @param  string $extension 
   */
  public function setFileExtension($extension){
    $this->fileExtension = $extension;
  }

  /**
   * Get the file extension
   *
   * @return string $extension
   */
  public function getFileExtension(){
    return $this->fileExtension;
  }
  /**
   * Install the class loader on the SPL autoload stack
   *
   */
  public function register(){
    spl_autoload_register(array($this,'loadClass'));
  }
  /**
   * UnInstall the class loader from SPL autoload stack
   *
   */
  public function unregister(){
    spl_autoload_unregister(array($this,'loadClass'));
  }
  /**
   * Loads either the class or interface
   *
   * @param string $class the name of the class to load 
   * @return void
   */
  public function loadClass($class){
    $filename = '';
    $namespace = '';
    if(($lastNameSpacePostion = strripos($class,$this->namespaceSeparator)) !== false){
      $namespace = substr($class,0,$lastNameSpacePostion);
      $class = substr($class,$lastNameSpacePostion + 1);
      $filename = str_replace($this->namespaceSeparator,DIRECTORY_SEPARATOR,$namespace).DIRECTORY_SEPARATOR;
    }
    $filename .= str_replace('_',DIRECTORY_SEPARATOR,$class).$this->fileExtension;
    require $this->includepath.$filename;
  }
}
