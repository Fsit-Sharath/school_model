<?php
	class DeleteTeacher{

    	public function Delete(){
    		$id= $_REQUEST['id'];
    		require_once 'database.php';
    		$db= new db();
    		$conn=$db->connect();

    		$sql="update teachers set status='1' where teacher_id='$id'";
    		$res=mysqli_query($conn,$sql);
    	
            header("location:TeacherList.php");
    	}
    }
	$obj= new DeleteTeacher();
    $obj->Delete();
?>