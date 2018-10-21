<?php

namespace LeaveFormManagement\Router;

use LeaveFormManagement\Router\RouteRepository;
use LeaveFormManagement\Exception\InvalidRouterRouteException;


class Router {

  const DEFAULT_BASE_PATH = "LeaveFormManagement/";
  const DEFAULT_CONTROLLER = "LeaveFormManagement\\Controller\\IndexController";
  const DEFAULT_ACTION = "Index";

  protected $rp;
  protected $basepath = self::DEFAULT_BASE_PATH;


  public function __construct(RouteRepository $rp){
    $this->rp = $rp;
  }

  public function setBasePath($basepath){
    $this->basepath = $basepath;
  }

  public function trimBasepath(){

    $path = trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/');

    $path = preg_replace("/[^A-Za-z0-9]\//","",$path);

    if(strpos($path,$this->basepath) === 0){
      $path = substr($path,strlen($this->basepath));
    }

    return $path;

  }

  public function isMatch(){
    $path = $this->trimBasepath();

    $route = $this->rp->getMap()->match($path,$_SERVER);

    if(!$route){
      throw new InvalidRouterRouteException('There is no such route in route repository ');
     }

    return $route;
  }

  public function dispatch($route){

    $params = $route->values;

    if(isset($params['controller'])){
      $controller = "LeaveFormManagement\\Controller\\".$route->values['controller']."Controller";
      unset($params['controller']);
    }else{
      $controller = self::DEFAULT_CONTROLLER;
    }

    if(isset($params['action'])){
      $action = $route->values['action'];

      unset($params['action']);
    }else{
      $action = self::DEFAULT_ACTION;
    }

    if(isset($params['values'])){
      $values = $route->values['values'];

      unset($params['values']);
    }
        
    $method = new \ReflectionMethod($controller,$action);

    $method->invokeArgs(new $controller(),$params);
  }


}
