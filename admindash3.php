
<html>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
     <script src="https://code.jquery.com/jquery-1.12.4.js"> </script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"> </script>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 

       <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>

<div id="tabs">
      <ul>
        <li><a href="#tabs-1">Insert</a></li>
        <li><a href="#tabs-2">View</a></li>
      </ul>
      <div id="tabs-1">
        <p>    
               <form action="addstudent.php" method="post" enctype="multipart/form-data">

          	<table align="center" border="1">
          		<tr>
          			 <td> RollNo : </td> <td> <input type="text" name="rno" /> </td>
          		</tr>
          		<tr>
          			 <td> Name : </td> <td> <input type="text" name="sname" /> </td>
          		</tr>
          		<tr>
          			 <td> Address : </td> <td> <input type="text" name="saddress" /> </td>
          		</tr>
          		<tr>
          			 <td> Contact No : </td> <td> <input type="text" name="scontact" /> </td>
          		</tr>
          		<tr>
          			 <td> Standard : </td> <td> <input type="text" name="s_std" /> </td>
          		</tr>
          		<tr>
          		    <td colspan="2"> <center>	<input type="submit" name="add" value="submit" /> </center> </td>
          		</tr>
          	</table>
          </form>
        </p>
            <div id="tabs-2">
        <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
      </div>
 </div>

</html>