<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include 'appconfig.php';

class Something{
  
	private $datasource;

	public function __construct(){		
		$this->datasource = AppConfig::getInstance()->getdatasource();			
	}

	public function getdata(){

		$data = $this->datasource->alldata();
		echo "<pre>";
		print_r($data);
	}

}

$something = new Something();
echo 'FROM DATASOURCE : <br>';
$something->getdata();
