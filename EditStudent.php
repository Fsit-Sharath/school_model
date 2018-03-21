<?php
	
	class EditStudent{

		public function getStudent(){
			$id= $_REQUEST['id'];
			require_once 'database.php';

			$db= new db();
			$conn=$db->connect();
        
            $sql="select * from student where id='$id'";
            
            $res=mysqli_query($conn,$sql); 
            $row=mysqli_fetch_object($res);
            $data=json_encode($row);

            echo $data;
            
		}
	}
	$obj= new EditStudent();
	$obj->getStudent();
?>