<?php
namespace Core;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;

/**
 * This class using for set and get php ini settings
 */
class Application {
    public function __construct($controller, $action) {
        $this->_setReporting();
        $this->_unregisterGlobals();
       
    }

    private function _setReporting() {
        if(DEBUG) {
            error_reporting(E_ALL);
            ini_set("display_errors", 1);
        }else{
            error_reporting(0);
            ini_set("display_errors", 0);
            ini_set("log_errors", 1);
            ini_set("error_log", DIR_ROOT . DS . 'tmp' . DS . 'logs' . DS . 'errors.log');
        }
    }

    private function _unregisterGlobals() {
        if(ini_get("register_globals")) {
            $globalsArray = ['_SESSION', '_COOKIE', '_POST', '_GET', '_REQUEST', '_SERVER', '_ENV', '_FILES'];
            foreach($globalsArray as $global) {
                foreach($GLOBALS[$global] as $key => $value) {
                    if($GLOBALS[$key] == $value) {
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }
    }
}
