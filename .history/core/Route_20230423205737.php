<?php

namespace Core;

class Route
{
  public static $routes = [];
  public static function get($path, $callback)
  {
    self::$routes['get'][$path] = $callback;
  }
  public static function post($path, $callback)
  {
    self::$routes['post'][$path] = $callback;
  }
  public function execute(){
    $path = $this->getPath();//Lay duoc path hien tai
    $method = $this->getMethod();//Lay duoc method hien tai
    // echo '<pre>';
    // print_r(self::$routes[$method][$path]);
    // echo '</pre>';
    if(!empty(self::$routes[$method][$path])){
      $callback = self::$routes[$method][$path];
      if(is_array($callback)){
        $controllerName = $callback[0];
        $controllerAction = $callback[1];
        $cotroller = new $controllerName();
        echo call_user_func_array([$cotroller, $controllerAction],[]);
      }
      else{
        echo call_user_func_array($callback,[]);
      }
    }
    else{
      require_once '../core/errors/404.php';
    }
    // echo $path;
    // echo $method;
  }
  public function getPath()
  {
    $requestUri = parse_url($_SERVER['REQUEST_URI']);
    $requestUri = $requestUri['path'];
    $dirNamePublic = dirname($_SERVER['SCRIPT_NAME']); //in ra /public
    $pathArr = explode($dirNamePublic, $requestUri); //in ra url dang sau public
    $path = end($pathArr);
    return $path;
  }
  public function getMethod(){
    $method = strtolower($_SERVER['REQUEST_METHOD']);
    return $method;
  }

}
