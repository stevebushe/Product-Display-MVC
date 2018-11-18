<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

abstract class ApplicationController{
	

		public function root(){
			$site = $_SERVER['SERVER_NAME'];
			return $site;
		}
 
 }


?>