<?php
	class activation{
		public function VerifyUser(){

			//check email and password are set or not in Get function
			if( (isset($_GET['token']) )
			{
                //get token value
				$token=$_GET['token']
                
                //connect to database call database class
				require_once 'database.php';
				$db=new db()
				$conn=$db->connect();
 
                //check is their any user with token matches 
                $sql="select email,password from SignUP where token='$token'";

                //execute query
                $res=mysqli_query($conn,$sql);

                //check how many rows returned
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                	//if any user with same credencial activate account set verify field in database to 1
                	$sql="update SignUP set verify='1' where token='$token' and verify='0'";
                	//execute query
                	$res=mysqli_query($conn,$sql)
                    //redirect to login page
                   
                	header("location:login.php");
                }
                else{
                	session_start();
                	$_SESSION['ActivationErrorMsg']='please verify your account';//display msg on sign up page
                	header("location:index.php");
                }
			}
			else{
				echo "Invalid approach,This Process noticed Webmaster";
			}
		}
	}
     $obj=new activation();
     $obj->VerifyUser();
?>