<?php
namespace app\models;

class User extends \app\core\Model{
	//needs to connect to the DB - through the Model base class

	public function get($username){
		$SQL = "SELECT * FROM user WHERE username=:username";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);// pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\models\User");
		return $STMT->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username, 
						'password_hash'=>$this->password_hash]);// pass any data for the query
	}

	public function update2fa(){
		$SQL = "UPDATE user SET secret_key=:secret_key WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id, 
						'password_hash'=>$this->password_hash]);
	}

	// public function update(){
	// 	$SQL = "UPDATE owner SET first_name=:first_name, last_name=:last_name, contact=:contact WHERE owner_id=:owner_id";
	// 	$STMT = self::$_connection->prepare($SQL);
	// 	$STMT->execute(['first_name'=>$this->first_name,
	// 					'last_name'=>$this->last_name, 
	// 					'contact'=>$this->contact,
	// 					'owner_id'=>$this->owner_id]);// pass any data for the query
	// }

	// public function delete(){
	// 	$SQL = "DELETE FROM owner WHERE owner_id=:owner_id";
	// 	$STMT = self::$_connection->prepare($SQL);
	// 	$STMT->execute(['owner_id'=>$this->owner_id]);// pass any data for the query
	// }

	// public function deleteAnimals(){
	// 	$SQL = "DELETE FROM animalin WHERE owner_id=:owner_id";
	// 	$STMT = self::$_connection->prepare($SQL);
	// 	$STMT->execute(['owner_id'=>$this->owner_id]);// pass any data for the query
	// }

	public function updatePassword(){
    	$SQL = "UPDATE user SET password_hash=:password_hash WHERE user_id=:user_id";
	 	$STMT = self::$_connection->prepare($SQL);
	 	$STMT->execute(['user_id'=>$this->user_id,
	 					'password_hash'=>$this->password_hash]);
    }

}