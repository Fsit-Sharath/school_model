<?php
 
  class UpdateStudent{

  	public function update()
  	{
  		$id=$_POST['id'];
  		$name=$_POST['name'];
  		$dob=$_POST['dob'];
  		$class=$_POST['class'];
  		$gender=$_POST['gender'];
        
  		require_once 'database.php';
  		$db= new db();
  		$conn=$db->connect();
        
        $sql="update student set name='$name',dob='$dob',class='$class',gender='$gender' where id='$id'";

        $res=mysqli_query($conn,$sql);
        
        header("location:StudentList.php");
  	}
  }
  $obj= new UpdateStudent();
  $obj->update();
?>