<?php

class Database{

	public $pdo;
	public $dbname;

	public function __construct($database){
		$this->dbname = $database;
		$this->pdo = $this->connect();
	}

	private function connect(){

	   try
       {
            $this->pdo = new PDO('mysql:dbname='.$this->dbname.';host=*******','*****','********');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            return $this->pdo;

           } catch(PDOException $e){
             
              return $e;
            }
	    }


      public function indexdata(){

        $stmt="(SELECT title,price,city,type,imgpath,description,category,prodId FROM vehicles ORDER BY prodId DESC Limit 5) UNION (SELECT title,price,city,type,imgpath,description,category,prodId FROM properties ORDER BY prodId DESC Limit 5) UNION (SELECT title,price,city,type,imgpath,description,category,prodId FROM electronics ORDER BY prodId DESC Limit 5)";

        $query=$this->pdo->query($stmt);
        $data=$query->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

      #select all data in category (table)
    	public function alldata($category){

          $q="Select * from ".$category;
          $query=$this->pdo->query($q);

          $data=$query->fetchAll(PDO::FETCH_ASSOC);
          
          return $data;
      }



      public function insert($table,$values,$rows=null)
    {         
          $ins='INSERT INTO '.$table;

          if ($rows != null) {

            $ins .= ' ('.implode(',', $rows).')';
          }

        
          for ($i=0; $i<count($values);$i++ )
          {
             $bindingVals[]=':val'.$i; 
          }

            $bindVals=implode(',', $bindingVals);
            $ins .=' VALUES ('.$bindVals.') ';
           
             $params=array_combine($bindingVals, $values);
             $insert=$this->pdo->prepare($ins);

 
            foreach ($params as $key => &$value) {
              $insert->bindParam($key, $value,PDO::PARAM_STR);
             }
            
              
             try {
               $insert->execute();
                return true; 
             } catch (Exception $e) {
               $error=$e->getMessage();
               //write errors to log file, issue warning to user
                return $error ;
             }
            
       }

     public function select($table,$rows='*', $where=null,$order=null,$limit=null)
     {

          if (  is_array($rows) && isset($rows) ) {
            $rows=implode(',', $rows);
          } else{
            $rows='*';
          }
           
           $stmt='SELECT '.$rows.' FROM '.$table;

          if ( !is_null($where) ) 
            $stmt .=' WHERE '.$where;
          
          if (! is_null($order) )  
            $stmt .=' ORDER BY '.$order; 
           
            $query=$this->pdo->query($stmt);
            
            try {
                    return $query->fetchAll(PDO::FETCH_ASSOC);

                  } catch (Exception $e) {
                     $e->getMessage();
                }      
       }

        public function update($table,$rows,$vals,$where=null)
        {
               $updatestring=" ";
               
               for ($i=0; $i < count($rows); $i++) { 
                 $updatestring .= $rows[$i].' = "'.$vals[$i].'", ';
               }

              $sql='UPDATE '.$table.' SET '.rtrim($updatestring,' , ');
              if ($where !== null) 
              {
                $sql.=' WHERE '.$where;   
              }

              $stmt=$this->pdo->prepare($sql);

              if ($stmt->execute()) {        
                return TRUE;
              }          
      }

}