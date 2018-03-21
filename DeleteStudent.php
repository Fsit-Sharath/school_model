<?php 
 

    class DeleteStudent{
 

    	public function Delete(){
    		$id= $_REQUEST['id'];
    		require_once 'database.php';
    		$db= new db();
    		$conn=$db->connect();

    		$sql="update student set status='1' where id='$id'";

    		$res=mysqli_query($conn,$sql);
             
            header("location:StudentList.php");
    	}
    }
	$obj= new DeleteStudent();
    $obj->Delete();
	
?>