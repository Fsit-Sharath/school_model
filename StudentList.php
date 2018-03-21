<?php
        include("dashboard.php");

		require_once 'database.php';
?>
        <div class="container">
        	<div class="row">
        		<div class="col-sm-4"></div>
        		<div class="col-sm-4 ">
                 
                 <!--pop up to add new student-->
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Add</button>
                                    
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                    <!-- Modal content-->
                        <div class="modal-content">
                             <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add New Student</h4>
                             </div>
                            <div class="modal-body">
                                <form action="AddStudent.php" method="post">
                                    <div class="container-fluid">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="sname" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>DOB</label>
                                            <input type="date" name="dob" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Class</label>
                                            <select name="class" class="form-control">
                                                <!-- fetchin all class from class table-->
                                               <option>choose class</option>
                                                <?php 
                                                    $db= new db();
                                                    $conn=$db->connect();

                                                    $sql="CALL class_proc()";
                                                    $res=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_object($res)){
                                                        echo "<option value='".$row->class."'>".$row->class."</option>";
                                                    }
                                                ?>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <input type="radio" name="gender" value="male">male
                                            <input type="radio" name="gender" value="female">female 
                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" value="submit" class="btn btn-primary">submit</button>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        			
                    
        		</div><!--ends here-->
        		<div class="col-sm-4"></div>
        	</div>
        </div>
        <br>
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-sm-4"></div>

        		<div class="col-sm-4">
        			<?php
        		class select{
			 			public function fetch(){
    					$db= new db();
			            $conn=$db->connect();

			            $sql="CALL studentlist_proc()";
			   
                        $res=mysqli_query($conn,$sql);
                         echo "<table class='table table-bordered' cellpadding='20'>";
			             echo "<tr> <th>Name</th> <th>DOB</th> <th>CLASS</th> <th>Gender</th> <th>TEACHER NAME</th> <th>Action</th> </tr>"; 
			            while($row=mysqli_fetch_object($res))
			           {
                         echo "<tr> <td><a href='EditStudent.php?id=$row->id' style='color:black'>$row->name</a></td> 
                         <td> $row->dob</td> 
                         <td> $row->class</td> 
                         <td> $row->gender</td>
                         <td> $row->TeacherName</td>
                         <td> <a href='DeleteStudent.php?id=$row->id'><i class='fa fa-trash'></i></a> &nbsp &nbsp 
                              <a href='#' data-toggle='modal' data-target='#editmodal' onclick='myFunction($row->id)'><i class='fa fa-eye'></i></a></td> 
                         <tr>";
                         
			           }
			           echo "</table>";
			        }
		        }
                
                        

		         $obj = new select();
		         $obj->fetch();
		         ?>
                         <script>
                                 function myFunction(id){
                
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                             if (this.readyState == 4 && this.status == 200) {
                                var student= JSON.parse(this.responseText);
                                var name=student.name;
                                var dob=student.dob;
                                var cls= student.class;
                                var gender=student.gender;
                                var id=student.id;
                                document.getElementById("name").setAttribute("value", name);
                                document.getElementById("dob").setAttribute("value", dob);
                                 document.getElementById("class").setAttribute("value", cls);
                                document.getElementById("class").innerHTML=cls;
                                document.getElementById("id").setAttribute("value", id);

                                 if(gender=="male"){

                                    document.getElementById("mgender").checked=true;
                                 }

                                 else{
                                     document.getElementById("gender").checked=true;
                                    }

                              }     
                          };
                             xhttp.open("GET", "EditStudent.php?id="+id, true);
                             xhttp.send();
                         }        
                                        
                         </script>
                        <div id="editmodal" class="modal fade" role="dialog" tabindex="-1" >
                            <div class="modal-dialog">

                            <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                 <h4 class="modal-title">Edit Student</h4>
                                    </div>
                                     <div class="modal-body" id="modal-body">
                                        <form action="UpdateStudent.php" method="POST">
                                        <div class="row well">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" id="name"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>DOB</label>
                                                <input type="date" name="dob" id="dob"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>class</label>
                                                <select name="class" class="form-control">
                                                    <option value="" id="class"></option>
                                                    <?php 

                                                    $db=new db();
                                                    $conn=$db->connect();

                                                    $sql="CALL class_proc()";
                                                    $res=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($res)){

                                                        echo "<option value='" . $row['class'] ."'>" . $row['class']."</option>";
                                                    }
                                                ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <input type="radio" id="mgender" name="gender" value="male">male
                                                <input type="radio" id="gender" name="gender" value="female">female
                                            </div>
                                            <div class="form-group hidden">
                                                <input type="text" id="id" name="id" value="">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" name="submit" type="submit">submit</button>
                                            </div>
                                        </div>
                                        </form>
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>   
                                     </div>
                                 </div>

                            </div>
                        </div>
                        <!-- script for dynamically fetching data-->
                     
                </div>

        		<div class="col-sm-4"></div>
        	</div>	
        </div>
		
		
