<?php
ob_start();
session_start();

//połączenie bazy danych
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','blog');

$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//strefa czasowa
date_default_timezone_set('Europe/Warsaw');

//ładuj klasy jak potrzebne
function __autoload($class) {

   $class = strtolower($class);

	// automatyczne dodawanie sciezki
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}

   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}

   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
	}

}

$user = new User($db);
?>
