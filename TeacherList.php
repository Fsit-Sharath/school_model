<?php
        include("dashboard.php");

		require_once 'database.php';
?>
        <div class="container">
        	<div class="row">
        		<div class="col-sm-4"></div>
        		<div class="col-sm-4 ">
        			
                    <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Add</button>
                                    
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                    <!-- Modal content-->
                        <div class="modal-content">
                             <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add New Teacher</h4>
                             </div>
                            <div class="modal-body">
                                <form action="AddTeacher.php" method="POST">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="tname" class="form-control">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>Class</label>
                                            <select name="class" class="form-control">
                                            <option>choose class</option>
                                            <?php //for fetching classes from teacher table those ara available
                                                    $db= new db();
                                                    $conn=$db->connect();

                                                    $sql="select c.class from class c where c.class not in(select t.class from teachers t where t.status='0')";
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
                                            <label>Qualification</label>
                                            <input type="radio" name="qualification" value="postgraduate">PG
                                            <input type="radio" name="qualification" value="graduate">UG
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


        		</div><!-- ends here-->
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

			            $sql="select * from teachers where status='0'";
			   
                        $res=mysqli_query($conn,$sql);
                         echo "<table class='table table-bordered'>";
			             echo "<tr> <th>Name</th> <th>CLASS</th> <th>Gender</th> <th>QUALIFICATION</th> <th>Action</th> </tr>"; 
			            while($row=mysqli_fetch_object($res))
			           {
                         echo "<tr><td> $row->name</td> <td> $row->class</td> <td> $row->gender</td> <td> $row->qualification</td>
                            <td> <a href='DeleteTeacher.php?id=$row->teacher_id'><i class='fa fa-trash'></i> 
                            <a href='#'  data-toggle='modal' data-target='#editmodal' onclick='myFunction($row->teacher_id)'><i class='fa fa-eye'></i></a></td>
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
                                var teacher= JSON.parse(this.responseText);
                                var name=teacher.name;
                                var cls= teacher.class;
                                var gender=teacher.gender;
                                var degree=teacher.qualification;
                                var id=teacher.teacher_id;
                                document.getElementById("name").setAttribute("value", name);
                                 document.getElementById("class").setAttribute("value", cls);
                                document.getElementById("class").innerHTML=cls;
                                document.getElementById("id").setAttribute("value", id);

                                 if(gender=="male"){

                                    document.getElementById("mgender").checked=true;
                                 }

                                 else{
                                     document.getElementById("gender").checked=true;
                                    }
                                if(degree=="postgraduate")
                                {
                                     document.getElementById("pg").checked=true;
                                }
                                else{
                                     document.getElementById("grad").checked=true;
                                    }

                              }     
                          };
                             xhttp.open("GET", "EditTeacher.php?id="+id, true);
                             xhttp.send();
                         }

                            

                       </script>
                  <!--- modal for edit teacher -->
                         <div id="editmodal" class="modal fade" role="dialog" tabindex="-1" >
                            <div class="modal-dialog">

                            <!-- Modal content-->
                                 <div class="modal-content">
                                    <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                 <h4 class="modal-title">Edit Teacher</h4>
                                    </div>
                                     <div class="modal-body" id="modalbody">
                                        <form action='UpdateTeacher.php' method='POST'>
                                           <div class="row-well">
                                             <div class="form-group">
                                               <label>Name</label>
                                              <input type="text" name="name" class="form-control" value="" id="name">
                                             </div> 
                                             <div class="form-group">
                                             <label>Class</label>
                                             <select name="class"  class="form-control">
                                             <option id="class" value=""></option>
                                                <?php 

                                                    $db=new db();
                                                    $conn=$db->connect();

                                                    $sql="select class from class where class not in(select class from teachers where status='0')";
                                                    $res=mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($res)){

                                                        echo "<option value='" . $row['class'] ."'>" . $row['class']."</option>";
                                                    }
                                                ?>
                                             </select>
                                             </div> 
                                              <div class="form-group">
                                                 <label>Gender</label>
                                                 <input type="radio" name="gender" value="male" id="mgender">male
                                                 <input type="radio" name="gender" value="female" id="gender">female
                                             </div> 
                                             <div class="form-group">
                                                 <label>Qualification</label>
                                                 <input type="radio" name="qualification" value="postgraduates" id="pg">PG
                                                 <input type="radio" name="qualification" value="graduates" id="grad">UG
                                             </div> 
                                             <div class="form-group hidden">
                                                 <input type="text" id="id" name="id" value="">
                                             </div> 
                                              <div class="form-group">
                                                <button type='submit' value='submit' name='submit' class='btn btn-primary'>submit</button>
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

                </div>

        		<div class="col-sm-4"></div>
        	</div>	
        </div>
		
		
