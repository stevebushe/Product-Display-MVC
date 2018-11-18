<?php
$docroot = $_SERVER['DOCUMENT_ROOT'];
include_once 'coremodel.php';
include_once $docroot.'/controller/imagehandler.php'; 

class ProductModel extends CoreModel{
	
	public static function getdbinstance(){
			return parent::getInstance();
		}

	public static function getdetail($table,$id, $title){

		$db = self::getdbinstance()->datasource;
		$where  = "prodId = ".$id; 
		$data = $db->select($table,'*',$where);
		
		return array_shift($data);
	}

	public static function produpdate($table,$images, $updates,$usrfldr,$prodId){
		$db = self::getdbinstance()->datasource;
		
		$destination = ImageHandler::upload($images,$usrfldr);
		$updates['imgpath'] = array_shift($destination);
		$where = "prodId = ".$prodId;
		unset($updates['apply']);
		
		$rows = array_keys($updates);
		$vals = array_values($updates);
		
		$db->update($table,$rows,$vals,$where);
	}	
	
}