<?php
$docroot = $_SERVER['DOCUMENT_ROOT'];
include $docroot.'/controller/Exception/uploadexception.php';
include $docroot.'/controller/filehandler.php';

class ImageHandler extends FileHandler{

	private static $allowed = ['image/gif', 'image/jpg', 'image/jpeg', 'image/png'];

	public static function upload($images, $usrfldr){

		for ($i=0; $i < count($images); $i++) { 
				$image = $images[$i];
				$destination = $usrfldr.$image['name'];

				if (!in_array($image['type'], self::$allowed)) {
					exit("That file type is not allowed");
				} else{

					$dest[] = self::sendupload($image,$destination);
				}
			}

		return $dest; 
	 }

	 #move uploaded file, return destination path. 
	 public static function sendupload($image, $destination){
					$path = $_SERVER['DOCUMENT_ROOT'].$destination;
										
				try{ 
		                move_uploaded_file($image['tmp_name'], $path);
		                return $destination; 

		              } catch(Exception $e){

		                  print 'The Following error occured :'.$e->getMessage();
		             }		         	
	 }
	

}