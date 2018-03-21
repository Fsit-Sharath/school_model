<?php

	class SaveTeacher{
		

		public function CheckTeacher(){
			$name=$_POST['tname'];
			$class=$_POST['class'];
			$gender=$_POST['gender'];
			$qualification=$_POST['qualification'];
			$data=array();
			require_once 'database.php';
			$db=new db();
			$conn=$db->connect();

			$sql="select class from teachers where status='0'";
			$res=mysqli_query($conn,$sql);
	
			 while($row=mysqli_fetch_object($res)){
			 	$data[]=$row->class;

			 }
            	if( in_array($class, $data))
			 {
			
			 	
			 	header("location:TeacherList.php");
			 }
			  else{
			 
			  	$sql="insert into teachers(name,class,gender,qualification) values('$name','$class','$gender','$qualification')";
			  	$res=mysqli_query($conn,$sql);
			  	header("location:TeacherList.php");
			  }

		}

	}

	$obj= new SaveTeacher();
	$obj->CheckTeacher();

?>