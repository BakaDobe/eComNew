<?php
namespace app\models;

class Country extends \app\core\Model{
	//needs to connect to the DB - through the Model base class
	public function getAll(){
		//get all records from the owner table
		$SQL = "SELECT * FROM country";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();// pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Country");
		return $STMT->fetchAll();
	}

}