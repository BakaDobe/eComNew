<?php
namespace app\controllers;

class Food{

	public function index(){
		//process the form data if it is submitted
		if(isset($_POST['action'])){
			//create a Food object
			$newFood = new \app\models\Food();
			//population the Food object
			$newFood->name = $_POST['new_food'];
			//call insert
			$newFood->insert();
		}
		//read the food.txt file into a variable
		$food = new \app\models\Food();
		$foods = $food->getAll();
		//pass the foods to the view for render and output
		$this->view('Food/index', $foods);
	}

	public function delete($food_id){//delete a food item here
		$food = new \app\models\Food();
		$food->deleteAt($food_id);
		//redirect to the list
		header('location:/Main/foods');
	}

	public function outputJSON(){
		$food = new \app\models\Food();
		$foods = $food->getAll();

		echo json_encode($foods);
	}

	public function display(){
		$this->view('Food/display');
	}
}