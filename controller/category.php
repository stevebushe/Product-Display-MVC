<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include 'applicationcontroller.php';
include $docroot.'/model/categorymodel.php';

class Category extends ApplicationController{
			
	  public static function index(){
	  		$docroot = $_SERVER['DOCUMENT_ROOT'];
	  		$data = CategoryModel::index();
	  		include $docroot.'/view/home.tpl.php';
		}

		#show all prods in category
		public static function catindex($category){
			$docroot = $_SERVER['DOCUMENT_ROOT'];
			$data = CategoryModel::getall($category);
			include $docroot.'/view/category.tpl.php';
		}

		#show single product.
		public function detail($segments){
			$docroot = $_SERVER['DOCUMENT_ROOT'];
			$data = CategoryModel::getdetail($segments);
			include $docroot.'/view/detail.tpl.php';
		}

		
}
