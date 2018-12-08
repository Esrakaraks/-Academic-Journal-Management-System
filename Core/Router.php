<?php
namespace Core;
use ReflectionClass;
use Core\Annotation;

class Router {
    
    private $className;
    private $actionName;

    const REGEX_ANNOTATION = '/@(?P<name>\w+)\s+(?P<value>.+)/';
    public static function route($url) {

        $class = (isset($url[0]) && $url[0] != '') ? $url[0] : DEFAULT_CONTROLLER;
        $class = ucwords($class);
        $class = '\\App\\Controllers\\'.$class;
        
        array_shift($url);

        $action = (isset($url[0]) && $url[0] != '') ? $url[0] : DEFAULT_ACTION;
        array_shift($url);

        $parameters = $url;
        
        if(class_exists($class)){
            $dispatch = new $class($class, $action);
            if(method_exists($class, $action)) {
                call_user_func_array([$dispatch, $action], $parameters);
            } else {
                die("That method does not exists in the controller!");
            }
        }else{
            echo "That class does not exists in the controllers!";
        }
    }

    public function setClassName($className) {
        $this->className = $className;
    }
    
    public function setActionName($actionName) {
        $this->actionName = $actionName;
    }

    public function getClassName() {
        return $this->className;
    }
    
    public function getActionName() {
        return $this->actionName;
    }
}