<?php
include_once 'coremodel.php';

class UserModel extends CoreModel{

	public static function getdbinstance(){
			return parent::getInstance();
		}

}