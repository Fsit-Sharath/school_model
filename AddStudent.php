<?php
	
	class SaveStudent{

		public function CheckStudent(){
			$name= $_POST['sname'];
			$dob= $_POST['dob'];
			$class= $_POST['class'];
			$gender= $_POST['gender'];
            $array= array();

                    require_once 'database.php';
            		$db=new db();
					$conn=$db->connect();

					$sql="select class from teachers where status='0'";
					$res=mysqli_query($conn,$sql);

                    while($row=mysqli_fetch_object($res)){
                    	$array[]=$row->class;
                    }
                     
                    

                    try{
                    	if(in_array($class,$array)){
                    		$sql="insert into student(name,dob,class,gender) values('$name','$dob','$class','$gender')";

							$res=mysqli_query($conn,$sql);
							header("location:StudentList.php");
                    	  }
                    	 else{
                    	 	throw new Exception("There is no teacher assigned to this class plz choose another class where teacher is assigned");	
                    	 } 
						                      }
                     catch(Exception $e){
                 	 echo 'Message: ' .$e->getMessage();
                 }			
			
		}
	}
     $obj= new SaveStudent();
     $obj->CheckStudent();
?>