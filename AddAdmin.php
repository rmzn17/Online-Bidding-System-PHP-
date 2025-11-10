<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
 <?php require_once("layout/head-content.php") ?>

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Server = "localhost";
  $username = "root";
  $psrd = "";
  $dbname = "Bidding";
  $connection = mysqli_connect($Server, $username, $psrd, $dbname);


  $uname = $_POST['username'];
  $Password = $_POST['password'];
  $email = $_POST['email'];

  $query = "insert into Admin(AdminName,AdminPassword,AdminEmail) values('$uname','$Password','$email')";
  mysqli_query($connection, $query);

  echo '<script language="javascript">';
  echo 'alert("Added successfully")';
  echo '</script>';
}

?>
<?php require_once("layout/admin-nav.php") ?>
  

   <form  class="max-w-xl mx-auto mt-10" method="POST" name="AAdmin"> 
           
           <div class="flex flex-col">
              <label for="Username">ADMINNAME</label>
               <input type="text" name="username" class="input input-bordered">    
           </div>            
  

       
           <div class="flex flex-col">
              <label for="password">PASSWORD</label>
               <input type="password" name="password" class="input input-bordered" >             
           </div>            
      
  
           <div class="flex flex-col">
              <label for="email">EMAIL</label>
               <input type="email" name="email" class="input input-bordered">             
           </div>            

            <div class="mt-10">
              <input  type="submit" class="btn btn-primary" onclick=" return validadmin();" >
            </div>   
        
    </form>

</body>
</html>

