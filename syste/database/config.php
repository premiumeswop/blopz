<?php


class db_config{


  static function constant_variable(){

  $db = array(
	'dsn'	=> '',
	'hostname' => getenv("DB_HOST") ? getenv("DB_HOST") : 'localhost',
	'username' => getenv("DB_USER") ? getenv("DB_USER") : 'root',
	'password' => getenv("DB_PASS") ? getenv("DB_PASS") : '',
	'database' => getenv("DB_NAME") ? getenv("DB_NAME") : 'blopz',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
 );
 return $db;
  }
  

}






































?>
