<?php
$docroot = $_SERVER['DOCUMENT_ROOT'];
include_once $docroot.'/Config/config.php';
include $docroot.'/Config/jsonstore.php';
include $docroot.'/Config/database.php';

class CoreModel{

	#instantiate single db instance for all models
	private static $instance; 
	public  $datasource;
	
	public function __construct(){
		$this->init();
	}

	private function init(){

		switch (Config::$datasource){
			case 'mysql':
				$this->datasource = new Database('tiguleni');
				break;
			
			case 'json':
				$this->datasource = new JsonStore();
				break;
		}
	}

	public static function getInstance(){
		if (empty(self::$instance)) {
			self::$instance = new self();
		}
		return  self::$instance;
	 }

	 public static function getDataSource(){
		return $this->datasource;	 	
	 } 

}