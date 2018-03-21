<?php
 
  class UpdateTeacher{

  	public function update()
  	{
  		$id=$_POST['id'];
  		$name=$_POST['name'];
  		$class=$_POST['class'];
  		$gender=$_POST['gender'];
       $qualification=$_POST['qualification'];
       $data=array();
  		require_once 'database.php';
  		$db= new db();
  		$conn=$db->connect();

        $sql="select class from teachers where teacher_id=$id";
        $res=mysqli_query($conn,$sql);

        $row=mysqli_fetch_object($res);
        $BeforeValueOfClass=$row->class;

        $sql="select class from teachers where class in(select class from class) and status='0'";
        $res=mysqli_query($conn,$sql);
        
        while($row=mysqli_fetch_object($res))
        {
          $data[]=$row->class;
        }
        
    
               try{

                    if(in_array($class,$data) && ($class!==$BeforeValueOfClass))
                
                    {
                      throw new Exception("There is teacher to this class enter new class plz");
                  
                    }
                      $sql="update teachers set name='$name',class='$class',gender='$gender',qualification='$qualification' where 
                      teacher_id='$id'";
                      $res=mysqli_query($conn,$sql);
        
                      header("location:TeacherList.php");
               }    
                           
                catch(Exception $e){
                  echo "message".$e->getMessage();
                }                          
                                  
                      
   }                  
  }

  $obj= new UpdateTeacher();
  $obj->update();
?>