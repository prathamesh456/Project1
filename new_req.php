<html>

      <body>    
             
             <h3 align="right"> <a href="logout.php"> Logout  </a> </h3>
            <div id="xyz" align="right"> 
            <form>
                  <a href="addstudent_duplicate.php">	<input type="button" value="create" /> </a> 
            </form>

                    </div>
      	     <form action="new_req.php" method="post">  
               <?php
                      include('dbcon.php');

                      $query="SELECT * FROM Student2";

                      $run=mysqli_query($con,$query);
                  ?>

                    <table border="1">

                    	<tr>
                        
                        <th> RollNo </th>
                        <th> Name </th>
                        <th> Address </th>
                        <th> Contact </th>
                        <th> Standard </th>

                      </tr>	

                      

                       
                       <?php
                       

                      while($data=mysqli_fetch_assoc($run))
                      {
                      
                      ?>	
                         
                        
                        <tr>
                        	<td> <?php echo $data['rollno'] ?> </td>
                        	<td> <?php echo $data['name']  ?> </td>
                        	<td> <?php echo $data['Address'] ?> </td>
                        	<td> <?php echo $data['contact'] ?> </td>
                        	<td> <?php echo $data['Standard'] ?> </td>
                        	<td> <a href="update.php?id=<?php echo $data['id'] ?>">  Edit  </a> </td>
                        	<td> <a href="delete.php?id=<?php echo $data['id'] ?>">  Delete  </a>  </td>
                        </tr> 

                       
                      	          

                      	
                   <?php   	

                      
                    } 
                       
               ?>
            </table>
          </form>
      </body>

</html>