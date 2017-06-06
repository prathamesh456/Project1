<html>

<?php

session_start();

 if($_SESSION['uid'])
 {
 	echo "";

 }
 else
 {
 	header('location:login.php');
 }

?>

<body>

    <h3 align="right"> <a href="logout.php"> Logout  </a> </h3>
	<h1>  Welcome to Admin Dashboard </h1>

	<form action="admindash2.php" method="POST">
		<table>
                <tr>
                	<td> <a href="addstudent.php"> 1. Insert Student  </a> </td>
                </tr>
                <tr>
                	<td> <a href="deletestudent.php"> 2. Delete Student  </a> </td>
                </tr>
                <tr>
                	<td> <a href="updatestudent.php"> 3. Update Student  </a> </td>
                </tr>
		</table>

	</form>


</body>

</html>