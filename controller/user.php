<?php
$docroot = $_SERVER['DOCUMENT_ROOT'];
include_once ($docroot.'/model/usermodel.php');

class User extends ApplicationController{

	public function __construct(){
		echo 'check session data set static variables';
	}

	public static function edituser(){
		echo 'edit user profile name, email etc';
	}

	public static function updateavatar(){
		echo 'update user avatar image';		
	}

}
