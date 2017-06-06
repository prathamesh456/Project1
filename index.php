<<<<<<< HEAD
<?php
session_start();
$username =  $_POST['username'];
$password =  $_POST['password'];

//$password =  md5($password);
$_SESSION['username'] = $username;

$con=mysqli_connect("localhost","root","root","db1");

if($con)
{
		mysqli_select_db($con,"db1");

		$query="SELECT * FROM login WHERE username ='$username' and password ='$password'";
		$result = mysqli_query($con,$query);

		

		$rows = mysqli_num_rows($result); 

		if ($rows == 1) {
			
			header('Location: dashboard.php');
		}

		else{
		 echo "In Valid!";

		}


	
}
else
echo "no";


?>


=======
<html>
<head>
<title>Login</title>
</head>
<body>
	<h3 align="center">Login</h3>
	<table align="center" cellspacing="5" cellpadding="5" border="0">
		<form action="login_check.php" method="post">
		<tr>
				<td>Username</td>
				<td>Password</td>	
				<td><input type="submit" id="login" name="login" value="Login"></td>
		</tr>
		<tr>
				<td><input type="text" name="username" id="username" placeholder="Please Enter Your Username" Required></td>
				<td><input type="password" name="password" id="password" placeholder="Please Enter Your Password" Required></td>	
				<td><input type="reset" id="Clear" name="Clear" value="Clear"></td>
		</tr>
	</table>
	<h3 align="center"><font color="red"><?php echo $_GET['msg'] ?></font></h3>
	</form>
</body>	
</html>
>>>>>>> 3100ac9bac13c5927704980ffab0576f49902407
