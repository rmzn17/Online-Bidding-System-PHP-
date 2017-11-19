<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="CSS/AddAdmin.css">

  <style>

 body {
font-family: Agency FB;
}

</style>

<script type="text/javascript">


function validadmin()
{
 


var uname=AAdmin.username;

var password=AAdmin.password;
var email=AAdmin.email;


if(uname.value=="")
{
  window.alert("Need Valid Username for new admin");
  uname.focus();
  return false;

}

if(password.value=="")
{
  window.alert("Need password for new admin");
  password.focus();
  return false;
  
}

if(email.value=="")
{
  window.alert("Need Valid Email for new admin");
  email.focus();
  return false;
  
}
   if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
return true;

}
</script>
</head>
<body>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);

        
          $uname    =$_POST['username'];
          $Password =$_POST['password'];
          $email    =$_POST['email'];

          $query="insert into Admin(AdminName,AdminPassword,AdminEmail) values('$uname','$Password','$email')";
          mysqli_query($connection,$query);
      
          echo '<script language="javascript">';
          echo 'alert("Added successfully")';
          echo '</script>';     
}

?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kinbo.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="AdminMagane.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
  
      <li class="active"><a href="AddAdmin.php"><b>Add Admin</b></a></li>
      <li><a href="ADeleteUser.php"><b>Delete User</b></a></li>
      <li><a href="ADeletePost.php"><b>Delete Post</b></a></li>
      <li><a href="ANotification.php"><b>Notification</b></a></li>
    </ul>

   <ul class="nav navbar-nav navbar-right">
      <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
     
    </ul>
  </div>
</nav>
  
<div class="container-fluid">
   <form  class="register-form" method="POST" name="AAdmin"> 
      <div class="row">      
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="Username">ADMINNAME</label>
               <input type="text" name="username" class="form-control">    
           </div>            
      </div>

       <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="password">PASSWORD</label>
               <input type="password" name="password" class="form-control" >             
           </div>            
      </div>
      <div class="row">
           <div class="col-md-4 col-sm-4 col-lg-4">
              <label for="email">EMAIL</label>
               <input type="email" name="email" class="form-control">             
           </div>            
      </div>
     
      <hr>
      <div class="row">
        
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
              <input  type="submit" class="btn btn-default regbutton" onclick=" return validadmin();" >
            </div>   
      </div>    
    </form>
</div>
</body>
</html>

