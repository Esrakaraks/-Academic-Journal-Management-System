<?php

/* Debug congifureation */
define('DEBUG', true);
define('DEBUG_DATABASE', false);

/* Database congifureation */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "e");
define("DB_NAME", "dergiyonetim");

/* Default congifureation */
define('DEFAULT_CONTROLLER', "Home");
define('DEFAULT_ACTION', "index");
define('DEFAULT_TEMPLATE', "default");
define('SITE_TITLE', "MVC Framework Title");

/* DIR congifureation */
define("DIR_CONTROLLERS", DIR_ROOT . DS . "App" . DS . "Controllers");

/* URL congifureation */
define("URL_ASSETS", URL_ROOT . DS . "Assets");
define("URL_VENDOR", URL_ASSETS . DS . "vendor");
define("URL_CSS", URL_ASSETS . DS . "css");
define("URL_JS", URL_ASSETS . DS . "js");
define("URL_IMG", URL_ASSETS . DS . "images");

define("URL_UPLOADS", URL_ROOT . DS . "uploads");
define("DIR_UPLOADS", DIR_ROOT . DS . "uploads");

define("URL_CSS_BOOTSTRAP", URL_ASSETS . DS . "vendor" . DS . "bootstrap" . DS . "css" . DS . "bootstrap.min.css");

/* LOCAL configuration */
define("DEFAULT_LANGUAGE", "tr");
