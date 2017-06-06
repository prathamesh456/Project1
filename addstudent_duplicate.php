

<html>
 
   
    
  
 <head> 

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <?php

include('dbcon.php');
 

?>

<?php
// define variables and set to empty values



//$nameErr = $emailErr = $genderErr = $websiteErr = $rnoErr = $dobErr = $addressErr = $contactErr = $s_stdErr = "";
//$name = $email = $dob = $comment = $website = $rno = $address = $contact = $s_std = "";

if(isset($_POST['add']))
 {
   if (empty($_POST["rno"])) {
     $rnoErr = "<br> Roll no is required <br>";
    
  }
  else 
  {
     $rno = $_POST["rno"];
    if (!preg_match("/^[1-9][0-9]*$/",$rno)) {
       $rnoErr = "<br> Only numbers are allowed in Roll no field <br>";
    }

  }

   if (empty($_POST["sname"])) {
     $nameErr = "<br> Name is required <br>";
    
  }
   else
  {
     $name = $_POST["sname"];
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed in Name field <br> ";
    }
   } 
  
  

  if (empty($_POST["semail"])) {
     $emailErr = "<br> Email is required <br>";
    
  }
  else
  {
     $email = $_POST["semail"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format <br>";
     }
  }


  if (empty($_POST["saddress"])) {
     $addressErr = "<br> Address is required <br>";
    
  }
  else
  {
    $saddress=$_POST['saddress'];
  }

  if (empty($_POST["scontact"])) {
     $contactErr = "<br> Contact is required <br>";
    
  }
  else 
  {
     $contact = $_POST["scontact"];
    if (!preg_match("/^[1-9][0-9]*$/",$contact)) {
       $contactErr = "<br> Only numbers are allowed in contact field <br>";
    }

  }

  if (empty($_POST["sdob"])) {
     $dobErr = "<br> Date of birth is required <br>";
    
  }
  else
  {
    $sdob=$_POST['sdob'];
  }

  if (empty($_POST["s_std"])) {
     $s_stdErr = "<br> Standard is required <br>";
        
  }
  else 
  {
     $s_std = $_POST["s_std"];
    if (!preg_match("/^[1-9][0-9]*$/",$s_std)) {
       $s_stdErr = "<br> Only numbers are allowed in Standard field <br>";
    }

  }

  if (empty($_POST["saddress"])) {
      $addressErr = "<br> Address is required <br>";
        
  }


 } 

   if(isset($rnoErr) || isset($emailErr) || isset($nameErr) ||  isset($dobErr) || isset($contactErr) || isset($addressErr) ||
     isset($s_stdErr) )
  {
      // Rajesh ne rediredct kiya tha to some other page here :P

  }
 else
 {
      // insertion wala part below in this else part
             
          if(isset($_POST['add']))

         {
                   
                   $emailnew=$_POST['semail'];
                  $select_query="select * from Student2 where email='".$emailnew."'";

                  $select_query_execute=mysqli_query($con,$select_query);
                  $row_count2=mysqli_num_rows($select_query_execute);


                  if($row_count2==1)
                  {
                      
                       echo " Data can't be inserted as User Already Exists <br>";
                  }
                  else
                  {
                       
                     echo $query = " INSERT INTO Student2(rollno,name,email,dob, Address, contact, Standard) VALUES ('$rno','$name','$email','$sdob','$saddress','$contact','$s_std') ";

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

          }

    
     }    
           

  ?>


        <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' , maxDate: new Date() });
   
  } );
    
  </script>


   <script>
  $(document).ready(function(){
    $("#semail").blur(function(){
    var email=document.getElementById("semail").value;
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
          <form action="addstudent_duplicate.php" method="post" name="student_info" enctype="multipart/form-data">

          	 <table align="center" border="1">
              <tr>
                 <td> RollNo : </td> <td> <input type="text" name="rno" /> </td>
                 <td> <span> <?php echo $rnoErr; ?> </span> </td>
              </tr>
              <tr>
                 <td> Name : </td> <td> <input type="text" name="sname" /> </td>
                 <td> <span> <?php echo $nameErr; ?>  </span> </td>
              </tr>
               <tr>
                 <td> Email : </td> <td> <input type="text" name="semail" id="semail" /><span> <h4 id="email_response" name="email_response">  </h4></span> </td> 
                  <td> <span> <?php echo $emailErr; ?> </span> </td>
              </tr>
              <tr>
                <td> DOB </td> <td> <input type="text" id="datepicker" name="sdob" /> </td>
                 <td> <span> <?php echo $dobErr; ?> </span> </td>
              </tr>
              <tr>
                 <td> Address : </td> <td> <input type="text" name="saddress" /> </td>
                 <td> <span> <?php echo $addressErr; ?> </span> </td>
              </tr>
              <tr>
                 <td> Contact No : </td> <td> +91 - <input type="text" name="scontact" /> </td>
                 <td> <span> <?php echo $contactErr; ?> </span> </td>
              </tr>
              <tr>
                 <td> Standard : </td> <td> <input type="text" name="s_std" /> </td>
                  <td> <span> <?php echo $s_stdErr; ?> </span> </td>
              </tr>
              <tr>
                  <td colspan="2"> <center> <input type="submit" name="add" value="submit" /> </center> </td>
              </tr>
            </table>
          </form>

 </body> 
            
</html>



