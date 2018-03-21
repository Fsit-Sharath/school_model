<?php

  class SignUp{

     public function Register()

     {
     	session_start();
     	$_SESSION['login']='true';
     	if(isset($_POST['submit']) )
     	{
     		if(!empty($_POST['name']) && !empty($_POST['email']) && !empty('pwd')){
     		     			  	       				 
     					$name=$_POST['name'];
     					$email=$_POST['email'];
    				 	$pwd=md5($_POST['pwd']);
              $token=md5($email."+".$pwd);
  

  					   	//sanitize the email.
				 		    $email =filter_var($email, FILTER_SANITIZE_EMAIL);
				        //validate the email.
   					  	$email= filter_var($email, FILTER_VALIDATE_EMAIL);

   					    require_once 'database.php';
    
      					$db=new db();
     				    $conn=$db->connect();
                // check for duplicate email in database
                 $sql="select email from SignUP where email='$email'";
                 $res=mysqli_query($conn,$sql);
                 $count=mysqli_num_rows($res);
                 if($count == 0)
                 {
                  //inserting values  to signup table
                  $sql="insert into SignUP(name,email,password,token) values('$name','$email','$pwd','$token');";
                  //execute query
                  $res=mysqli_query($conn,$sql);
                 
                  $to=$email;
                  $subject=" Account verification";
                  $message="<html><head>
                                        <title>Email Verification</title>
                                        </head>
                                        <body>
                                          <h1>Hi ' ". $name ." '!</h1>
                                        <p><a href='http://localhost/assignment/activation.php?token=".$token."'>CLICK TO ACTIVATE YOUR ACCOUNT</a>
                                        </body>
                                        </html>";
                  $headers="Content-Type: text/html; charset=UTF-8\r\n";
                   //send a mail
                  mail($to,$subject,$message,$headers);

                  echo "Check your email for Further Steps";

                 }else{
                  $_SESSION['EmailExist']="Account already exists with this email plz sign up with new one";
                  header("location:index.php");
                  
                 }
     		       
     		      }
    		 	
              else{
       	         //sending back to index when no input is given
       	         $_SESSION['InavildInputMsg']="please fill details";
       	         header("location:index.php");
                 }
         }//if loop ends here
      }//function ends here
}//class ends here
    $obj= new SignUp();//create object to class
    $obj->Register();//call function
?>