<?php
require_once "bootstrap.php";
define("WEBROOT",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));
define("FULL_PATH",str_replace("index.php","",$_SERVER["SCRIPT_FILENAME"]));

//var_dump(str_replace('?v=','',preg_replace('/[0-9]/', '', "/css/error.css?v=1999527")));
//die;
// link to the assets directory inside the Views Folder
define("SRC_ASSETS",FULL_PATH);
define("SRC_CONTROLLERS",WEBROOT."app/Controllers/");

define("ROOT",str_replace("index.php","",$_SERVER['SCRIPT_FILENAME']));
define("SRC_VIEWS",ROOT."app/Views/");

use App\Config\App;
$app = new App();
$app->run();


