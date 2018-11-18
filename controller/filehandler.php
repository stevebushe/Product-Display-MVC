<?php
#filehandler abstract class to be extended by image and text handlers. 
$docroot = $_SERVER['DOCUMENT_ROOT'];
include_once $docroot.'/model/coremodel.php';

abstract class FileHandler extends CoreModel{

	#get db instance
	function getdbinstance(){
		return CoreModel::getInstance()->datasource;
	}
	

	#upload file, return file path

	#rename file

	#resize file
	
}
