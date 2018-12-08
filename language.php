<?php


require_once(DIR_ROOT . DS . 'Config' . DS . 'Config.php');
require_once(DIR_ROOT . DS . 'App' . DS . 'Lib' . DS . 'Helpers' . DS . 'Functions.php');

$language = DEFAULT_LANGUAGE;
if(isset($_GET['language'])) {
    $language = $_GET['language'];
}

echo $language;
