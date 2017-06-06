

<html>
 
   
    
  
 <head> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' , maxDate: new Date() });
   
  } );
    
  </script>


   
     
 


 </head>
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
          <form action="addstudent_duplicate5.php" method="post" name="student_info" enctype="multipart/form-data">

          	 <table align="center" border="1">
              <tr>
                 <td> RollNo : </td> <td> <input type="text" name="rno" /> </td>
              </tr>
              <tr>
                 <td> Name : </td> <td> <input type="text" name="sname" /> </td>
              </tr>
               <tr>
                 <td> Email : </td> <td> <input type="text" id="semail" /> </td>
              </tr>
              <tr>
                <td> DOB </td> <td> <input type="text" id="datepicker" name="sdob" /> </td>
              </tr>
              <tr>
                 <td> Address : </td> <td> <input type="text" name="saddress" /> </td>
              </tr>
              <tr>
                 <td> Contact No : </td> <td> +91 - <input type="text" name="scontact" /> </td>
              </tr>
              <tr>
                 <td> Standard : </td> <td> <input type="text" name="s_std" /> </td>
              </tr>
              <tr>
                  <td colspan="2"> <center> <input type="submit" name="add" value="submit" /> </center> </td>
              </tr>
            </table>
          </form>

 </body> 
            <script>
$(function() {
 
  $("form[name='student_info']").validate({
    
    rules: {
      
      rno: {
        required:true,
        number:true
       },

      sname: 
      {
        
        minlength:3,
        required:true
      },
      dob:
      { 
        required:true,
        date:true
     },
      saddress: "required",
      scontact: {
        required:true,
        number:true,
        maxlength:10,
        minlength:10
      },
      s_std:
      {
        required:true,
        number:true
     },
      /* email: {
        required: true,
        email: true
      }, */
      /* mobile: {
        required: true,
        minlength: 10
      } */
    },
   
     messages: {
      rno: 
      {
        required:"Please enter the rollno",
        number:"Please enter a valid number"
      },

      sname: 
      {

       required:"Please enter the student name",
       minlength:"Minlength of name should be 3"
      },

      dob:
      {
         required:"Please enter your Date of birth",
         date:"Please dont edit the date format !!"
      },
      saddress:"Please enter the student address",
      scontact:
      {
        required:"Please enter a contact number",
        number:"Please enter a valid number",
        maxlength:"Maxlength is 10",
        minlength:"Minlength is 10"
     },
      s_std:
      {
       required:"Please enter the standard",
       number:"Please enter a valid number"
      },
      email: "Please enter a valid email address",
    },
    
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>

</html>

<?php
        include('dbcon.php');

        if(isset($_POST['add']))
        {
        	

          $rollno=$_POST['rno'];
          $name=$_POST['sname'];
          $dob=$_POST['sdob'];
          $address=$_POST['saddress'];
          $contact=$_POST['scontact'];
          $standard=$_POST['s_std'];
          $email=$_POST['semail'];

        echo $query = " INSERT INTO Student2(rollno,name,email,dob, Address, contact, Standard) VALUES ('$rollno','$name','$email','$dob','$address','$contact','$standard') ";

            $run=mysqli_query($con,$query);

            if($run)
            {
            	echo "data inserted successfully !! ";


            }
            else
            {
            	echo "error !!";
            }

        }
?>
