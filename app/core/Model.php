<?php
namespace app\core;

class Model{
	protected static $_connection;

	public function __construct(){
		//TODO: do better than that
		$username = 'root';
		$password = '';
		$server = 'localhost'; //or 127.0.0.1
		$dbname = 'vet_clinic';

		try{
			//create a new connection to the database
			self::$_connection = new \PDO("mysql:host=$server;dbname=$dbname",
				$username, $password);
			self::$_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		}catch(\Exception $e){
			exit(0);
		}
	}
}