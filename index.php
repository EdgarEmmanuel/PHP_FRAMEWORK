<?php
require_once "bootstrap.php";
define("WEBROOT",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));

// link to the assets directory inside the Views Folder
define("SRC_ASSETS",WEBROOT."/app/Views/assets");
define("SRC_CONTROLLERS",WEBROOT."app/Controllers/");

define("ROOT",str_replace("index.php","",$_SERVER['SCRIPT_FILENAME']));
define("SRC_VIEWS",ROOT."app/Views/");

use App\Config\App;
$app = new App();
$app->run();


