<?php
	
	class EditTeacher{

		public function getTeacher(){

			$id= $_REQUEST['id'];
			require_once 'database.php';
            
			$db= new db();
			$conn=$db->connect();
        
            $sql="select * from teachers where teacher_id='$id'";
            
            $res=mysqli_query($conn,$sql); 
            $row=mysqli_fetch_object($res);

            $data=json_encode($row);

            echo $data;
            
		}
	}
	$obj= new EditTeacher();
	$obj->getTeacher();
?>