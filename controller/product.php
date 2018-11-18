<?php

include_once($docroot.'/model/productmodel.php');

class Product extends ApplicationController{

	 public static function detail($arg1, $arg2, $arg3){
	 	$data = ProductModel::getdetail($arg1, $arg2, $arg3);
	 	$docroot = $_SERVER['DOCUMENT_ROOT'];

	 	include $docroot.'/view/detail.tpl.php';	 		 	
	  }

	  public static function editprod($table, $prodid, $uid,$title ){
	  	$docroot = $_SERVER['DOCUMENT_ROOT'];
	  	$data = ProductModel::getdetail($table, $prodid, $title);
	
	  	include $docroot.'/view/editprod.tpl.php';
	  }

	  public static function updateprod($post, $files, $data){
	  	  
	 	  $docroot = $_SERVER['DOCUMENT_ROOT'];	
	  	  $usrfolder = substr($data['imgpath'], 0, strrpos($data['imgpath'], '/')).'/';
	  	  $usrfolder = trim(str_replace('/home/tiguleni/tiguleni.com','', $usrfolder) );
	  	  
	  	  $images = self::prepimages($files);			  	  
	  	  $updates = self::prepupdate($post);

	  	  ProductModel::produpdate($data['category'],$images,$updates,$usrfolder,
	  	  							$data['prodId']);	  	  	  
	  }

	  public static function prepimages($files){
	  		$imgdata = array_shift($files);

		  	for ($i=0; $i < count($imgdata['name']); $i++) 
		  	{ 		  		
		  			foreach ($imgdata as $k => $v ) {
		  					$images[$i][$k] = $imgdata[$k][$i]; }
		  	}

		  	return $images;
	  }

	  public static function prepupdate($post){

	  		foreach ($post as $k => $v) {
	  			if (empty($v)) {
	  				unset($post[$k]); }
	  		}
	  		return $post;
	  }
 
}
