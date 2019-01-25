<?php
namespace Core;

class View {

    public function render($viewName, $yield = []) {
        $viewArray = explode("/", $viewName);
        $viewFile = array_pop($viewArray);
        $viewFolder = $viewArray;
        $viewFolder = implode(DS, $viewFolder);
        if(file_exists(DIR_ROOT . DS . "App" . DS . "Views" . DS . $viewFolder . DS . $viewFile . ".php")) {

            if(!empty($yield)) {
                extract($yield);
            }
             
            include(DIR_ROOT . DS . "App" . DS . "Views" . DS . $viewFolder . DS . $viewFile . '.php');
            
        }else{
            die("The View File \"" . $viewName . "\" is not found!"); 
        }
    }
}