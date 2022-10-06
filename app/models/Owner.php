<?php
namespace app\models;

class Owner extends \app\core\Model{
	//needs to connect to the DB - through the Model base class

	public function getAll(){
		//get all records from the owner table
		$SQL = "SELECT * FROM owner";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();// pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Owner");
		return $STMT->fetchAll();
	}

	public function get($owner_id){
		$SQL = "SELECT * FROM owner WHERE owner_id=:owner_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['owner_id'=>$owner_id]);// pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Owner");
		return $STMT->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO owner(first_name, last_name, contact) VALUES (:first_name, :last_name, :contact)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name, 
						'last_name'=>$this->last_name, 
						'contact'=>$this->contact]);// pass any data for the query
	}

	public function update(){
		$SQL = "UPDATE owner SET first_name=:first_name, last_name=:last_name, contact=:contact WHERE owner_id=:owner_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name,
						'last_name'=>$this->last_name, 
						'contact'=>$this->contact,
						'owner_id'=>$this->owner_id]);// pass any data for the query
	}

	public function delete(){
		$SQL = "DELETE FROM owner WHERE owner_id=:owner_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['owner_id'=>$this->owner_id]);// pass any data for the query
	}

}