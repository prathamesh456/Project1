<html>


<body> 
     
     <?php
              

              include('dbcon.php');
              $id = $_GET['id'];

              $query="SELECT * FROM Student2 WHERE id=".$id ;
              $run=mysqli_query($con,$query);

              $t=mysqli_fetch_assoc($run);



             
     ?>


	<form action="update.php" method="post" enctype="multipart/form-data">

          	<table align="center" border="1">
          		<tr>
          			 <td> RollNo : </td> <td> <input type="text" name="rno" value=<?php echo $t['rollno']?> /> </td>
          		</tr>
          		<tr>
          			 <td> Name : </td> <td> <input type="text" name="sname" value=<?php echo $t['name']?>/> </td>
          		</tr>
              <tr>
                 <td> Email : </td> <td> <input type="text" name="smail" value=<?php echo $t['email']?>/> </td>
              </tr>
              <tr>
                 <td> Date of Birth : </td> <td> <input type="text" name="sdob" value=<?php echo $t['dob']?>/> </td>
              </tr>
          		<tr>
          			 <td> Address : </td> <td> <input type="text" name="saddress" value=<?php echo $t['Address']?> /> </td>
          		</tr>
          		<tr>
          			 <td> Contact No : </td> <td> <input type="text" name="scontact" value=<?php echo $t['contact']?> />
          			 <input type="hidden" name="id" id="id" value="<?php echo $id ?>"> </td>
          		</tr>
          		<tr>
          			 <td> Standard : </td> <td> <input type="text" name="s_std" value=<?php echo $t['Standard']?> /> </td>
          		</tr>
          		<tr>
          		    <td colspan="2"> <center>	<input type="submit" name="update" value="submit" /> </center> </td>
          		</tr>
          	</table>
          </form>

 <?php
        if(isset($_POST['update']))
        {
        	
        	$rollno=$_POST['rno'];
        	$name=$_POST['sname'];
        	$address=$_POST['saddress'];
        	$contact=$_POST['scontact'];
        	$standard=$_POST['s_std'];
            $id=$_POST['id'];
            $email=$_POST['smail'];
            $dob=$_POST['sdob'];
            

        	$query = "UPDATE Student2 SET rollno='$rollno',name='$name',email='$email',dob='$dob',Address='$address',contact='$contact',Standard='$standard' WHERE id=".$id;
            $run=mysqli_query($con,$query);

            if($run)
            {
            	echo "data updated successfully !! ";


            }
            else
            {
            	echo "error !!";
            }

        }
 ?>

</body>

</html>