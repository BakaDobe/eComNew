<?php
namespace app\controllers;

class Test extends \app\core\Controller{
	public function index(){
		$test = new \app\controllers\Test();
		$test->name = '';
	}
}



?>