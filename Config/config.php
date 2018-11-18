<?php
class Config{

	static $datasource = 'mysql';

	public static $Routes = ['category' => ['/','vehicles','properties','travel', 
	'education','events', 'electronics', 'services', 'register', 'advertise','other', 
     'jobs'], 'product'=>['detail', 'editprod'], 'user' => ['login', 'register', 'admin']  ];
}