<?php

class JsonStore{

	public function __construct(){
		$root = $_SERVER['SERVER_NAME'];
		$url  = $_SERVER['REQUEST_URI']; 

		return json_encode($root.'/'.$url);
	}
}