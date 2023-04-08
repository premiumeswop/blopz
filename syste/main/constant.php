<?php
 
//normal development configuration
$mode = "development";

$base_url = "http://localhost/blopz/";
if (getenv('BLOPZ_APP_URL')) {
//   $base_url = getenv('BLOPZ_APP_URL');
   $host = $_SERVER['HTTP_HOST'];
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
  $base_url = $protocol . "://" . $host. "/";
}

$processor_url = "syste/main/system.php";

//define your default controller
$defaultcontroller = "main";

//define where asset folder will be held
$FOLDER_E= "externals";

//define the mode either development mode or production mode
define('ENVIRONMENT',$mode);
//email configuration
//system configurations please do not edit
 
define('EXTERNAL_FOLDER',$FOLDER_E);
define('BASE_URL',$base_url);
define('PROCESSOR',$processor_url);
define('D_CONTROLLER',$defaultcontroller);
define("VIEW_DIR","ceeinc/view"); 
define("APP_ROOT_DIRECTORY",$base_url);




?>
