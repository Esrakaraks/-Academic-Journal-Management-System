<?php
use Core\Router;
use Core\Annotation;

define('DS', DIRECTORY_SEPARATOR);
define('DIR_ROOT', dirname(__FILE__));
define('URL_ROOT', DS . basename(__DIR__));

require_once(DIR_ROOT . DS . 'Config' . DS . 'Config.php');
require_once(DIR_ROOT . DS . 'App' . DS . 'Lib' . DS . 'Helpers' . DS . 'Functions.php');


spl_autoload_register(function($className) {
    $file = str_replace('\\', DS, $className);
    $fileFullPath = DIR_ROOT . DS . $file . '.php';
    if(file_exists($fileFullPath)) {
        include_once $fileFullPath;
    }
});

session_start();

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : array();

Router::route($url);

?>