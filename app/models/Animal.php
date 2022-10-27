<?php
namespace app\models;

class Animal extends \app\core\Model{
	//needs to connect to the DB - through the Model base class

	public $animal_id;
	#[\app\validators\NonEmpty]
	#[\app\validators\Name]
	public $name;
	#[\app\validators\NonEmpty]
	#[\app\validators\AnimalBirthDate]
	public $dob;

	public function getAll($owner_id){
		$SQL = "SELECT * FROM animal WHERE owner_id =:owner_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['owner_id'=>$owner_id]);// pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Animal');
		return $STMT->fetchAll();
	}

	public function get($animal_id){
		$SQL = "SELECT * FROM animal WHERE animal_id=:animal_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['animal_id'=>$animal_id]);// pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Animal');
		return $STMT->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO animal(owner_id, name, dob, profile_pic) VALUES (:owner_id, :name, :dob, :profile_pic)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['owner_id'=>$this->owner_id, 
						'name'=>$this->name, 
						'dob'=>$this->dob,
						'profile_pic'=>$this->profile_pic]);// pass any data for the query
	}

	public function update(){
		$SQL = "UPDATE animal SET name=:name, dob=:dob WHERE animal_id=:animal_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['name'=>$this->name, 
						'dob'=>$this->dob,
						'profile_pic'=>$this->profile_pic,
						'animal_id'=>$this->animal_id]);// pass any data for the query
	}

	public function delete(){
		$SQL = "DELETE FROM animal WHERE animal_id=:animal_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['animal_id'=>$this->animal_id]);// pass any data for the query
	}

}