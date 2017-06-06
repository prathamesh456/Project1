<?php
<<<<<<< HEAD
$id =  $_GET['id'];
console.log($id);

$name_error=$_GET['name_error'];
$dob_error=$_GET['dob_error'];
$mobile_error=$_GET['mobile_error'];
$address_error=$_GET['address_error'];

$con=mysqli_connect("localhost","root","root","db1");


if($con)
{
    mysqli_select_db($con,"db1");

    $query="SELECT * FROM student1 WHERE id ='$id'";
    
    $result = mysqli_query($con,$query);

    $row=mysqli_fetch_assoc($result);
     }

?>
	<html>   
	<head>
  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
   <!--    <script>

        $(function() {
         
          $("form[name='formname']").validate({
            
            rules: {
              
              name: {
                letteronly: true,
                number: false,
                required: true,
                maxlength: 30,
                minlength: 5
                
              },
            
              address: {
                required: true,
                maxlength: 255,
                minlength: 05
                
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
                number: "Please Enter Alphabet"
                  },
                  address: {
                   required: "Please provide Your Address",
                  maxlength: "Please Enter Less Then 255 Character",
                  minlength: "Please Enter More Then 10 Character",
                  number: "Please Enter Alphabet"
                  },
              date: "Pleae Select the DOB",
              
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
        </script> -->

	
	</head>
	<body>
	<form name="formname" action="updatedb.php" method="post" enctype="multipart/form-data">
      <table>
      <tr>
      	<td><input type="hidden" value=<?php  echo $row['id']; ?> name="id"></td>
      </tr>
      <tr>
        <td colspan=2>
        <center><font size=4><b>Student Detail</b></font></center>
        </td>
        </tr>
      <tr>
       <td>Name</td>
        <td><input type=text name="name" id="name" value=<?php  echo $row['name']; ?> ></td>
        </tr>
      <tr>
        <td>EmailId</td>
        <td><input type="text" name="emailid" id="emailid" value=<?php  echo $row['emailid']; ?> readonly></td>
        </tr>
        <tr>
        <td>Personal Address</td>
        <td><input type="text" name="address" id="address" value=<?php  echo $row['address']; ?> ></td>
        </tr>
      <tr>
        <td>DOB</td>
        <td><input type="text" name="dob" id="dob" value=<?php  echo $row['dob']; ?> ></td>
        </tr>
      <tr>
        <td>MobileNo</td>
        <td><input type="text" name="mobile" id="mobile" value=<?php  echo $row['mobile']; ?> ></td>
        </tr>
        <tr>
        <td><input type="submit" value="update" name="update"></td>
        </tr>
        
        </table>
        </form>
        </body>
        </html>


    
        



   
=======
require_once("conn.php");
session_start();
if(!array_key_exists('id', $_SESSION) )
{
	header("Location: index.php?msg=Opps Sorry :(");
}

$nameErr=$emailErr=$rollnoerr=$dateerr=$addresserr=$moberr=$doberr="";
$id=$_POST['id'];
if (empty($_POST["name"])) {
		$nameErr = "Name is required";
		} else {
				$name=$_POST['name'];
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "Only letters and white space allowed";
}
}
if (empty($_POST["roll_no"])) {
$rollnoerr = "Roll No is required";
} else {
$roll_no=$_POST['roll_no'];
if (!preg_match("/^[1-9][0-9]*$/",$roll_no)) {
$rollnoerr = "Invalid Roll No Number";
}
}

if (empty($_POST["mobile"])) {
$moberr = "Mobile Number is required";
} else {
$mobile=$_POST['mobile'];
if (!preg_match("/^\d{10}$/",$mobile)) {
$moberr = "Invalid mobile Number";
}
}

if (empty($_POST["address"])) {
		$addresserr = "Address is required";
		} else {
				$address=$_POST['address'];
				if (!preg_match("/^[a-z0-9!@#$%^&*()_-+|;:<>,.?]*$/",$address)) {
				$addresserr = "Invalid Address";
}
}

if (empty($_POST["date"])) {
		$doberr = "DOB is required";
		} else {
				$dob=$_POST['date'];
				if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
				$doberr = "Invalid DOB";
}
}

if(!empty($nameErr) || !empty($rollnoerr) || !empty($moberr) ||  !empty($addresserr) ||  !empty($doberr) )
{

header("Location: edit.php?"."id=".$id."&nameErr=".$nameErr."&rollnoerr=".$rollnoerr."&moberr=".$moberr."&addresserr=".$addresserr."&doberr=".$doberr);
}
else
{
	
	$query_update="update students_details set name='".$name."',roll_no='".$roll_no."',date='".$dob."',address='".$address."',mobile='".$mobile."' where id='".$id."' ";
	$query_execute=mysqli_query($conn,$query_update);

	if($query_execute)
	{
	header("Location: dashboard.php?msg=success");
	}
	else
	{
	header("Location: dashboard.php?msg=fail");	
	}
}
?>
>>>>>>> 3100ac9bac13c5927704980ffab0576f49902407
