<?php

session_start();
if(!array_key_exists('username', $_SESSION))
{
	header('Location: login.html');
}
????


$con=mysqli_connect("localhost","root","root","db1");

				if($con)
				{
						mysqli_select_db($con,"db1");
				}

?>
<!DOCTYPE html>
<html>
<head>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){

			
			$(".student").click(function(){
				$(".student_div").show();
				$(".create_div").hide();
			});

			$(".create").click(function(){
				$(".create_div").show();
				$(".student_div").hide();
			});


		});

</script>

	
</head>
<body bgcolor="#dfe3ee">
	<div class="header" style="height:40px;width:1200px;background-color: #3b5998;">
	
		<div style="float:left;width:900px;height:20px;">
			<h3 style="padding-left:10px;">Dashboard</h3>
		</div>

		<div style="float:right;width:10%;height:20px;">
			<?php echo $_SESSION['username']; ?><br>
			<a href="logout.php">LOG OUT</a>
		</div>

	</div>                  
	<hr>

	<div style="float:left;width:200px;" name="section" id="section" >

		<input type="button" value="Student Detail"  class="student" >
	</div> 








	<div style="float:left;display:none" class="student_div" action="">
			Student detail<br>
			<a href="create.php">Create</a><br>
			<table style="border: 1px solid black; border-bottom: 1px solid black;"> 
			<tr>
				<td>name</td>
				<td>emailid</td>
				<td>mobile</td>
				<td>address</td>
				<td>dob</td>
				<td colspan="2">Action</td>

			</tr>

						<?php
				
						$query="SELECT * FROM student1";
						$result = mysqli_query($con,$query);

						while($row=mysqli_fetch_assoc($result))
						{
						?>

						
							<tr>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['emailid'] ?></td>
							<td><?php echo $row['mobile'] ?></td>
							<td><?php echo $row['address'] ?></td>
							<td><?php echo $row['dob'] ?></td>
							<td><a href="view.php?id=<?php echo $row['id']; ?>">View</a></td>
							<td><a href="update.php?id=<?php echo $row['id']; ?>">update</a></td>
							<td><a href="delete.php?id=<?php echo $row['id']; ?>">delete</a></td>
							</tr>
						
						
					
						<?php
						}
						?>

			</table>
	</div>


	<div class="create_div" style="display:none">
		<!-- <form  name="Student_form" method="post">


			<table cellpadding="2" width="20%" bgcolor="99FFFF" align="center"
			  cellspacing="2">
			<tr>
			  <td colspan=2>
			  <center><font size=4><b>Student Registration Form</b></font></center>
			  </td>
			  </tr>
			<tr>
			 <td>Name</td>
			  <td><input type=text name="name" id="name" size="30" required></td>
			  </tr>
			<tr>
			  <td>Personal Address</td>
			  <td><input type="text" name="address" id="address" size="30" required></td>
			  </tr>
			  <tr>
			  <td>EmailId</td>
			  <td><input type="text" name="emailid" id="emailid" size="30"></td>
			  </tr>
			<tr>
			  <td>DOB</td>
			  <td><input type="text" name="dob" id="dob" size="30"></td>
			  </tr>
			<tr>
			  <td>MobileNo</td>
			  <td><input type="text" name="mobile" id="mobile" size="30"></td>
			  </tr>
			  <tr>
			  <td><input type="reset"></td>
			  <td colspan="2"><input type="submit" value="Submit Form" class="submit_detail"></td>
			  </tr>
			  </table>
			  </form> -->

	</div>



	<div class="show" style="display:none">

	<table >
      <tr>
        <td colspan=2>
        <center><font size=4><b>Student Detail</b></font></center>
        </td>
        </tr>
      <tr>
       <td>Name</td>
        <td><input type=text name="name" id="name" value="data['name']"></td>
        </tr>
      <tr>
        <td>Personal Address</td>
        <td><input type="text" name="address" id="address" value="data['emailid']"></td>
        </tr>
        <tr>
        <td>EmailId</td>
        <td><input type="text" name="emailid" id="emailid" value="data['mobile']"></td>
        </tr>
      <tr>
        <td>DOB</td>
        <td><input type="text" name="dob" id="dob" value="data['address']"></td>
        </tr>
      <tr>
        <td>MobileNo</td>
        <td><input type="text" name="mobile" id="mobile" value="data['dob']"></td>
        </tr>
        <tr>
        <td><input type="reset"></td>
        <td colspan="2"><input type="submit" value="Submit Form" class="submit_detail"></td>
        </tr>
        </table>
	</div>





	
</body>
=======
require_once("conn.php");
session_start();
if(!array_key_exists('id', $_SESSION))
{
	header("Location: index.php?msg=Opps Sorry :(");
}
$query="select * from students_details";
$query_execute=mysqli_query($conn,$query);
?> 
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
  	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  	 <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
    <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', maxDate: new Date() });
   
  } );

    
 </script>
 <script>
  $(document).ready(function(){
	$("#email").blur(function(){
	var email=document.getElementById("email").value;
	var email_key="email="+email;
	$.ajax({
	
		url:"email_validate.php",
		type:"POST",
		data:email_key,
		success:function(html){
			$("#email_response").html(html);
		},
		error:function(html){
			alert("error");
		}

	});

	});

});
</script>


<title>Dashboard</title>
</head>
<body>
	<h3 align="center">Admin Dashboard</h3>
	<table width="1200px" height="35px" cellpadding="5" cellspacing="5" border="0" align="center">
		<tr>
			<td width="300px" align="left">Welcome <?php echo ucwords($_SESSION['id'])?></td>
			<td width="300px"></td>
			<td width="300px" align="right"><a href="logout.php"> Logout </a></td>
		</tr>	
	</table>
	<br>
	 
<div id="tabs">
	  <ul>
	    <li><a href="#tabs-1">Insert</a></li>
	    <li><a href="#tabs-2">View</a></li>
	  </ul>
	  <div id="tabs-1">
	  	<form method="post" action="insert.php" name="insert">
	    <table width="1200px" height="35px" cellpadding="5" cellspacing="5" border="0" align="center">
		<tr>
			<td width="300px" align="right">Name</td>
			<td width="300px" align="center"><input type="text" name="name" id="name" ></td>
			<td>
			<font size="3" color="red">	
				<?php if (array_key_exists('nameErr', $_GET)) {
					echo $_GET['nameErr'];
				} ?>
			</td>
		</font>
		</tr>
		<tr>
			<td width="300px" align="right">Roll No</td>
			<td width="300px" align="center"><input type="text" name="roll_no" id="roll_no" ></td>
			<td>	<span>
				<font size="3" color="red">	
				<?php if (array_key_exists('rollnoerr', $_GET)) {
					echo $_GET['rollnoerr'];
				} ?>
			</font>
			</span></td>
		</tr>
		<tr>
			<td width="300px" align="right">DOB</td>
			<td width="300px" align="center"><input type="text" id="datepicker" name="date" ></td>
			<td>
				<font size="3" color="red">	
				<?php if (array_key_exists('doberr', $_GET)) {
					echo $_GET['doberr'];
				} ?>
			</font></td>
		</tr>

		<tr>
			<td width="300px" align="right">Address</td>
			<td width="300px" align="center"><textarea cols="20" rows="5" type="text" name="address" id="address" ></textarea></td>
			<td>
				<font size="3" color="red">	
				<?php if (array_key_exists('addresserr', $_GET)) {
					echo $_GET['addresserr'];
				} ?>
			</font></td>
		</tr>
		<tr>
			<td width="300px" align="right">Mobile</td>
			<td width="300px" align="center"><input type="text" name="mobile" id="mobile" placeholder="+91"></td>
			<td>
				<font size="3" color="red">	
				<?php if (array_key_exists('moberr', $_GET)) {
					echo $_GET['moberr'];
				} ?>
			</font></td>
		</tr>
		<tr>
			<td width="300px" align="right">Email</td>
			<td width="400px" align="center"><input type="email" name="email" id="email" ></td>
			<td><font size="3" color="red"><span><h4 id="email_response" name="email_response">	
				<?php if (array_key_exists('error', $_GET)) {
					echo $_GET['error'];
				} ?>
			</h4></span><span>
				<?php if (array_key_exists('emailErr', $_GET)) {
					echo $_GET['emailErr'];
				} ?>
			</span></td>
		</font>
			
		</tr>
		<tr>

		</tr>	
		<tr>
			<td width="300px" align="right"><input type="submit" id="login" name="login" value="Login"></td>
			<td width="300px" align="center"><input type="reset" id="clear" name="clear" value="clear"></td>
		</tr>
	</form>

	</table>
	  </div>
	  <div id="tabs-2">

	  	
	    <table width="900px" cellpadding="5" cellspacing="5" border="0" align="center" >
	    	<tr>
	    		<th>Name</th>
	    		<th>Roll No</th>
	    		<th>DOB</th>
	    		<th>Address</th>
	    		<th>Mobile</th>
	    		<th>Email</th>
	    		<th>Edit</th>
	    		<th>Delete</th>

	    	</tr>
	    	<?php while ($row=mysqli_fetch_assoc($query_execute))
	    	 {	    		 
	    	?>
	    	<tr>

	    		<td><?php echo $row['name']; ?></td>
	    		<td><?php echo $row['roll_no']; ?></td>
	    		<td><?php echo $row['date']; ?></td>
	    		<td><?php echo $row['address']; ?></td>
	    		<td><?php echo $row['mobile']; ?></td>
	    		<td><?php echo $row['email']; ?></td>
	    		<td><a href="edit.php?id=<?php echo $row['id'];  ?>" style="text-decoration:none" >Edit</a></td>
	    		<td><a href="delete.php?id=<?php echo $row['id']; ?>" style="text-decoration:none">Delete</a></td>	
	    	</tr>	
<?php
}
?>
	    </table>
	  </div>
 </div>	

</body>	
 <script>

$(function() {
  
  $("form[name='insert']").validate({
    
    rules: {
      
      name: {
        required: true,
        lettersonly: true,
        maxlength: 30,
        minlength: 5
        
      },
      roll_no: {
        required: true,
        number: true,
        maxlength: 11,
        minlength: 3
        
      },
      address: {
        required: true,
        maxlength: 255,
        minlength: 10
        
      },
      date: {
        required: true,
        date: true
      },
      email: {
        required: true,
        email: true
      },
      mobile: {
        required: true,
        number: true,
        maxlength: 10,
        minlength: 10
        
      }
    },
   
     messages: {
      name: {
      	 required: "Please provide Your Name",
        maxlength: "Please Enter Less Then 30 Character",
        minlength: "Please Enter More Then 3 Character",
        lettersonly: "Please Enter Alphabet"
  		},
  		address: {
      	 required: "Please provide Your Address",
        maxlength: "Please Enter Less Then 255 Character",
        minlength: "Please Enter More Then 10 Character",
        number: "Please Enter Alphabet"
  		},
      date: "Pleae Select the DOB",
      roll_no: {
      	required: "Please provide Your Roll Number",
        maxlength: "Please Enter Less Then 11 Character",
        minlength: "Please Enter More Then 3 Character",
        number: "Please Enter Number"
  		},
      mobile: {
        required: "Please provide a mobile",
        maxlength: "Please Enter Your 10 Digit Mobile Number",
        minlength: "Please Enter Your 10 Digit Mobile Number",
        number: "Please Enter Number"
      },
      email: "Please enter a valid email address"
    },
    
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>

>>>>>>> 3100ac9bac13c5927704980ffab0576f49902407
</html>
