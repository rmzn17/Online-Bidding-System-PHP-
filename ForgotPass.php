<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="CSS/Forgot.css">

  <style>

 body {
font-family: Agency FB;
}



</style>

<script type="text/javascript">


function ValidateContactForm()
{

 
    var Email=ContactForm.email;
    var Pass=ContactForm.Password1;
    var conpass=ContactForm.Password2;


    if (Email.value=="") 
    {
      window.alert("Enter Your Email");
      Email.focus();
      return false;
    }

   if (!validateCaseSensitiveEmail(Email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
 if (Pass.value=="") 
    {
      window.alert("Enter Password");
      Pass.focus();
      return false;
    }

    if (conpass.value=="") 
    {
      window.alert("Confirm Password");
      conpass.focus();
      return false;
    }

    if(Pass.value!=conpass.value)
    {
       window.alert("Password Miss match");
      Pass.focus();
      return false;
    }
    return true;

}
function validateCaseSensitiveEmail(email) 
{ 
 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
 if (reg.test(email)){
 return true; 
}
 else{
 return false;
 } 
} 

</script>

</head>

<body>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST')
{
 
 $email=$_POST['email'];
 $Pass=$_POST['Password1'];

 $server="localhost";
 $username="root";
 $password="";
 $db="Bidding";


 $connection=mysqli_connect($server,$username,$password,$db);

 $search="select * from User where Email='$email'";

 $execute=mysqli_query($connection,$search);


 if (mysqli_num_rows($execute) > 0) {

  $query="update User set Password='$Pass' where Email='$email'";

  mysqli_query($connection,$query);
  echo "<script> alert('Update Successfully') </script>";
    header("Location:UserLogin.php");
  
 }
 else
 {
  
 echo "<script> alert('Email Does not Exist') </script>";
echo "<script> Pass.focus();</script>";

 }

}
?>

<div class="container">
    <div class="row">
        <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header"><a href="UserLogin.php"><img src="Image/Back.png" width="50px" height="50px"></a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbspChange Password</h2>

  <form class="login-container" method="POST" name="ContactForm" onsubmit=" return ValidateContactForm();">
    <p><input type="email" name="email" placeholder="Email"></p>
    <p><input type="password" name="Password1" placeholder="New Password"></p>
    <p><input type="password" name="Password2" placeholder="Confirm Password"></p>
   
    <p><input type="submit" value="Change"></p>
  </form>
</div>>
    </div>
</div>

</body>
</html>

