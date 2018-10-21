<?php

namespace LeaveFormManagement;


use LeaveFormManagement\Service\Container;
use LeaveFormManagement\AutoClassLoader;

require('./AutoClassLoader.php');


$loader = new AutoClassLoader();

$loader->register();

$container = new Container();

$router = $container->get()->get('Router');

$route = $router->isMatch();

$router->dispatch($route);
