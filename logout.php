<?php
<<<<<<< HEAD
	session_start();
	session_destroy();
	 
	header('Location: login.html'); 
?>			
=======
session_start();
if(!array_key_exists('id', $_SESSION))
{
	header("Location: index.php?msg=Opps Sorry :(");
}
else
{
	header("Location: index.php?msg=Log Out ");
		session_destroy();
}	
?>
>>>>>>> 3100ac9bac13c5927704980ffab0576f49902407
