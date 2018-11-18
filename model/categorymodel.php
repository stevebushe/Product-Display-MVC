<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
include_once 'coremodel.php';

class CategoryModel extends CoreModel{

		public static function getdbinstance(){
			return parent::getInstance();
		}

		public static function index(){
			$db = self::getdbinstance()->datasource;
			return $db->indexdata();
		}

		public static function getall($category){
			$db = self::getdbinstance()->datasource;
			return $db->alldata($category);
		}

		public static function getuser($uid){

			$db = self::getdbinstance()->datasource;
			$rows = ['email','username'];
			$where = "userId = ".$uid;
			$usrdata = $db->select('users',$rows, $where);
			return array_shift($usrdata);
		}

		 #divide and conquer algorithm with BST data structure || Abstracted to model
		public static function getdetail($args){
			$db = self::getdbinstance()->datasource;
			array_shift($args);
			$w_arg = str_replace('_',' ',urldecode($args[2]) );			
			$where = "title = '".$w_arg."' AND prodId = '".$args[1]."'";
			 
			$data = $db->select($args[0],'*',$where);
			$data = array_shift($data);
			$usrdata = self::getuser($data['usrId']);
			foreach ($usrdata as $k => $v ) { 
					$data[$k] = $v;
			}
			
			return $data;						
		}

}