<?php
 
//normal development configuration
$mode = "development";
$base_url = "https://blopz.com/";
// $base_url = "https://blopz-env-1.eba-5mtjeibm.us-east-2.elasticbeanstalk.com";
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
