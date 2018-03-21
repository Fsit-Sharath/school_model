<?php
  
   class db{
   		protected $db_host="localhost";
   		protected $db_user="root";
   		protected $db_pwd="root123";
   		protected $db_name="school";
   
    public function Connect(){
    	$conn=mysqli_connect($this->db_host,$this->db_user,$this->db_pwd,$this->db_name);

    	if( ! $conn){
    		die("could not connect".mysqli_error());
    	}
      return $conn;
    }

  }
?>