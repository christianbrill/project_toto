<?php

/*---------------------------------------------
		DATABASE FILE accessing the
		database
---------------------------------------------*/

$dsn = 'mysql:host='.$config['DB_host'].';dbname='.$config['DB_database'].';charset=utf8'; 

try{ 
	$pdo = new PDO($dsn, $config['DB_username'], $config['DB_password']);
} catch (Exception $e){ 
	echo "Connection failed <br>";
	echo $e->getMessage();
	exit;
}