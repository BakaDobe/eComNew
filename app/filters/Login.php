<?php
namespace app\filters;

#[\Attribute]
class Login extends \app\core\AccessFilter{
	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/User/index?=You must log in to use these features!');
			return true;
		}elseif($_SESSION['secret_key']!=null){
			header('location:/User/check2fa');
			return true;
		}
		return false;
	}
}


?>