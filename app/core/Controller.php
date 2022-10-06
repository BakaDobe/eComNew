<?php
namespace app\core;

class Controller{
//TODO: add data to display with the view
	protected function view($name, $data=[]){
		//call in a view to display
		include('app\\views\\' . $name . '.php');
	}

	protected function saveFile($file){
		$check = getimagesize($file['tmp_name']);
		$allowed_types = ['image/jpeg'=>'jpg', 'image/png'=>'png'];
		if(in_array($check['mime'], array_keys($allowed_types))){
			$ext = $allowed_types[$check['mime']];
			$filename = uniqid() . "." . $ext;
			move_uploaded_file($file['tmp_name'], 'image/' . $filename); 
		}
		return $filename;
	}

}