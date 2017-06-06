<?php
<><>
//including the database connection file
include("config.php");
//getting id of the data from url
$id = $_GET['id'];
//deleting the row from table
$result = mysqli_query($con, "DELETE FROM student1 WHERE id=$id");
//redirecting to the display page (index.php in our case)
header("Location:dashboard.php");
=======
require_once("conn.php");
session_start();
if(!array_key_exists('id', $_SESSION))
{
	header("Location: index.php?msg=Opps Sorry :(");
}
$id=$_GET['id'];
$query_delete="delete from students_details where id=".$id;
$query_delete_execute=mysqli_query($conn,$query_delete);
if($query_delete_execute)
{
header("Location: dashboard.php?msg=success");
}
else
{
header("Location: dashboard.php?msg=fail");	
}
>>>>>>> 3100ac9bac13c5927704980ffab0576f49902407
?>
