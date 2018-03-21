<?php
	
	class SaveClass{

		public function CheckClass(){
			$class=$_POST['class'];
			require_once 'database.php';
            $data=array();
			$db=new db();
			$conn=$db->connect();

			$sql="CALL class_proc()";
			$res=mysqli_query($conn,$sql);
			 
			 while($row=mysqli_fetch_object($res)){
			 	$data[]=$row->class;
			 }
             // check for class is already there or not
                 try{
                 	if( in_array($class, $data))
					 {
					 	throw new Exception(" You cant add This class. its already there Plz add new class");
			 			
			 		 }

			  			$sql="CALL class_insert_proc($class)";
			  			$res=mysqli_query($conn,$sql);
			  			header("location:classList.php");
                     	
                 }
                   
                 catch(Exception $e){
                 	 echo 'Message: ' .$e->getMessage();
                 }

			 	
			 

		}
	}
	$obj= new SaveClass();
	$obj->CheckClass();
?>