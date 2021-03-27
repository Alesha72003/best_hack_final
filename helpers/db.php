<?php

namespace db;


function getConnection()
{
	static $servername = "quedafoe.ru";
	static $username 	= "quedafoe";
	static $password 	= "uadminpass";
	static $database 	= "best";
	static $connection;

	if(!$connection){
		$connection	= mysqli_connect($servername,$username,$password,$database);
	}
	return $connection;
}


?>