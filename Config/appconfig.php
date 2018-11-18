<?php
include 'config.php';
include 'jsonstore.php';
include 'database.php';

class AppConfig{

	/* Defines and returns single instance of DB Connection */
	
	private static $instance; 
	private $datasource;
	
	private function __construct(){
		$this->init();
	}

	private function init(){

		switch (Config::$datasource) {
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

	 public function getDataSource(){

		return $this->datasource;	 	
	 } 

}