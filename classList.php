<?php
        include("dashboard.php");

		require_once 'database.php';
?>
        <div class="container">
        	<div class="row">
        		<div class="col-sm-4"></div>
        		<div class="col-sm-4 ">

                <!-- pop up to add new student-->
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Add</button>
                                    
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                    <!-- Modal content-->
                        <div class="modal-content">
                             <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add New Class</h4>
                             </div>
                            <div class="modal-body">
                                <form action="Addclass.php" method="POST">
                                    <label>class</label>
                                    <input type="text" name="class" class="form-control">
                                    </select>
                                    <br>
                                <button type="submit" name="submit" class="btn btn btn-primary">submit</button>
                                    
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
        <br>
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-sm-4"></div>

        		<div class="col-sm-4">
                
                <table class="table table-bordered">
                    <tr> <th>CLASS </th></tr>
        		      <!-- call to show the class list in table format in class page-->
                	<?php
        		     class select{
			 			public function fetch(){
    					$db= new db();
			            $conn=$db->connect();

			            $sql="CALL class_proc()";
			           
                        $res=mysqli_query($conn,$sql);
                        
			            while($row=mysqli_fetch_object($res))
			           {
                         echo "<tr><td> $row->class</td><tr>";
			           	 
			           }	           
			        }
		        }
		         $obj = new select();
		         $obj->fetch();
		         ?>
                </table>

                </div>

        		<div class="col-sm-4"></div>
        	</div>	
        </div>
		
		
