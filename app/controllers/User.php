<?php
namespace app\controllers;

class User extends \app\core\Controller{
	//process of requesting the username and password wanted by user
	
    public function index(){
    	if(isset($_POST['action'])){
    		$user = new \app\models\User();
    		$user = $user->get($_POST['username']);
    		//verify password match
    		if(password_verify($_POST['username'], $user->password_hash)){
    			$_SESSION['username'] = $user->username;
    			$_SESSION['user_id'] = $user->user_id;
    			$_SESSION['role'] = $user->role;
    			header('location:/User/account');
    		}else{
    			header('location:/User/index?error=Incorect username/password combination!');
    		}
    	}else{
    		$this->view('User/index');
    	}
    }

    public function logout(){
    	session_destroy();
    	header('location:/User/index?success=You have been successfully logged out');
    }

    #[\app\filters\Login] //provide authentication service
    public function account(){
    	if(!isset($_SESSION['user_id'])){
    		header('location/:User/index?error="You are not allowed to access this application without logging in"');
    		return;
    	}
    	if(isset($_POST['action'])){
    		$user = new \app\models\User();
    		$user = $user->get($_SESSION['username']);
    		if(password_verify($_POST['old_password'],$user->password_hash)){
    			if($_POST['new_password'] == $_POST['new_password_confirmation']){
    				$user->password_hash = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    				$user->updatePassword();
    				header('location:/User/account?success=Password modified');
    			}else{
    				header('location:/User/account?error=New password does not match old one. Password unchanged.');
    			}
    		}else{
    			header('location/:User/account?error=Wrong Password provided');
    		}
    	}else{
    		$this->view('User/account');
    	}
    }

    public function logout(){
    	session_destroy();
    	header('location:/User/index?success=You have been successfully logged out.');
    }

	public function register(){
		if(isset($_POST['action'])){
			//verify that the password and password_confirmation match
			if($_POST['password'] == $_POST['password_confirmation']){
				//TODO: validation later
				$user = new \app\models\User();
				if($user->get($_POST['username'])){
					header('location:/User/register?error=This username "'.$_POST['username'].'" is already exists. Choose another.');
				}else{
					$user->username = $_POST['username'];
					$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$user->insert();

					header('location:/User/index');
				}
			}
		}else{
			$this->view('User/register');
		}
	}
}

?>