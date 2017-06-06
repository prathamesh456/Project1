<?php
require_once("dbcon.php");
$email=$_POST['email'];
$select_query="select * from Student2 where email='".$email."'";
$select_query_execute=mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($select_query_execute);
if($row_count==1)
{
    
     $user="User Already Exists";
}
else
{
      $user="User Not Exists";
    
}

?>
<html>
<body>
<h4 id="email_response" name="email_response"> <?php echo $user ?> </h4>
</body>
</html>