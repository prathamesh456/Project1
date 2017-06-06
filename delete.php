<html>

		<?php
               include('dbcon.php');

               $id=$_GET['id'];

               $query="DELETE FROM Student2 WHERE id=".$id;
               $run=mysqli_query($con,$query);

               if($run)
               {
               	echo "Deletion success !!";
               }
               else
               {
               	echo "Error !!";
               }



		?>

</html>