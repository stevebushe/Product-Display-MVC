<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$docroot = $_SERVER['DOCUMENT_ROOT'];

include_once  $docroot.'/Config/config.php';
include $docroot.'/controller/category.php';
include $docroot.'/controller/product.php';
include $docroot.'/controller/user.php';

class Router{

	public static $matches = array();
	private static $routes  = array();

		public static function match($ctrlr, $fn){
					if(in_array($fn, Config::$Routes[$ctrlr]) ){
						return [$ctrlr,$fn];
					} else{
						return false;
					}		
		} 

		public static function geturi(){
			return $_SERVER['REQUEST_URI'];
		}

		public static function init(){
			  $uri = self::geturi();
			  $uriarr = self::parse_uri($uri);

			  if (empty($uriarr)) {
			  		Category::index();
			  	} else{			  		
			  		  if (count($uriarr) == 1) {
			  		  		$method = $uriarr[0];
			  		  		Category::catindex($method);
			  		  } else{
			  		  	$ctrlr = array_shift($uriarr);
			  		  	self::method($ctrlr,$uriarr);
			  		  }
			  	}	 
		}

		public static function parse_uri($uri){
				$uriarr = explode('/',$uri);
			  	return  array_values(array_filter($uriarr));				
		 }

		public static function method($ctrlr,$uri){
			
				if (array_key_exists($ctrlr, Config::$Routes)) {
					$fn = $uri[0];
					$match = self::match($ctrlr, $fn);
					$args = array_slice($uri, array_search($match[1],$uri)+1 );
				}	

			    call_user_func_array($match, $args);			
		} 	

}


