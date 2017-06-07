<html>


<body>
	     <h1> Welcome to Admin Login Page </h1>

	     <form action="login.php" method="post">
 			<table>
 				<tr>
 					<td> Admin_Name : </td>
 					<td> <input type="text" name="a_name" placeholder="Enter your name"> </td>
 				</tr>

 				<tr>
 					<td> Admin_Password : </td>
 					<td> <input type="password" name="a_passwd" placeholder="Enter your password"> </td>
 				</tr>

 				<tr>
 					<td colspan="2"> <input type="submit" name ="login" value="submit"> </td>
 				</tr>

 			</table>
	     </form>


</body>
</html>

<?php
	      include('dbcon.php');
	           if(isset($_POST['login']))
	           {
	           	$username = $_POST['a_name'];
	           	$password = $_POST['a_passwd'];

	           	$query="SELECT * FROM Admin where username='$username' AND password='$password' " ;
                

               $run=mysqli_query($con,$query);
               $rows=mysqli_num_rows($run);

              if($rows < 1)
              {

              	 echo "Mismatch !!";
              }
              else
              {
              	$data=mysqli_fetch_assoc($run);

              	$id= $data['id'];

              	//echo "id=".$id;

              	session_start();

              	$_SESSION['uid'] = $id ;
              	header('location:new_req.php');

              }
	           }

	           
	    ?>