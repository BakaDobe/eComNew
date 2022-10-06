<?php
namespace app\controllers;

class Vet extends \app\core\Controller{
	

	public function index(){
		//display a list of all the owners
		//instantiate an owner model object
		$owner = new \app\models\Owner();
		//call the ->getAll() method to get all owners from the DB
		$owners = $owner->getAll();
		//pass the collection of owners to the view
		$this->view('Vet/index',$owners);
	}

	public function add(){
		if(isset($_POST['action'])){//if the form is submitted
			//new object
			$newOwner = new \app\models\Owner();
			//populate the data from the input
			$newOwner->first_name = $_POST['first_name'];
			$newOwner->last_name = $_POST['last_name'];
			$newOwner->contact = $_POST['contact'];
			//call insert
			$newOwner->insert();
			header('location:/Vet');
		}else{
			$this->view('Vet/addOwner');
		}
	}

	public function edit($owner_id){
		$owner = new \app\models\Owner();
		$owner = $owner->get($owner_id);
		if(isset($_POST['action'])){
			$owner->first_name = $_POST['first_name'];
			$owner->last_name = $_POST['last_name'];
			$owner->contact = $_POST['contact'];

			$owner->update();
			header('location:/Vet/index');
		}else{
			$this->view('Vet/editOwner', $owner);
		}
	}

	public function delete($owner_id){
		$owner = new \app\models\Owner();
		$owner->owner_id = $owner_id;
		$owner->delete();
		header('location:/Vet/index');//redirect back to the list
	}

	public function details($owner_id){
		$owner = new \app\models\Owner();
		//$owner->
	}

}