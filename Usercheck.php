<?php
      session_start();
   	//check form is submitted or not
	if(isset($_POST['submit']))
	{
		//checking ther fiels are not empty
	  if(!empty($_POST['email']) && !empty($_POST['pwd']))
	  {

		  $email=$_POST['email'];
		  $pwd=md5($_POST['pwd']);
	 
	  	//sanitize the email.
		  $email =filter_var($email, FILTER_SANITIZE_EMAIL);
      //validate the email.
      $email= filter_var($email, FILTER_VALIDATE_EMAIL);
	
      //get database connection
	   	require_once 'database.php';
 
	  	$db=new db();
	  	$conn=$db->connect();
      //check user is verified or not
      $sql="select email,password,verify from SignUP where email='$email' and password='$pwd'";
      
      $res=mysqli_query($conn,$sql);
     
      $count=mysqli_num_rows($res);
       //ckeck user is there with same email and password
      if($count=='1')
      {      $row=mysqli_fetch_array($res);
    
            if($row['verify']=='1')   //if user account is activated
        {
           
           $sql="select id,name,email,password from SignUP where email='$email' and password='$pwd' and verify='1'";
           $res=mysqli_query($conn,$sql);
           $row=mysqli_fetch_object($res);
           $_SESSION['username']=$row->name;
           $_SESSION['id']=$row->id;
           $_SESSION['loginid']="set";//set to confirm to enter dashbord
           header("location:classList.php");
          
        }
      
        else{

          //user account not activated give msg on login page
           $_SESSION['ActivationError']="please activate ur account";
           header("location:login.php");
         }

      }
      else{
           // if fields value is not correctly given send msg to ligin page
           $_SESSION['LoginErrorMsg']='please check your email password';
           header("location:login.php");
         }
  

      }

	}

?>
