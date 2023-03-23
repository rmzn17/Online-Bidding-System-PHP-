<!DOCTYPE html>

<html>
<head>
 <?php require_once "layout/head-content.php" ?>


<script type="text/javascript">
  
  function ValidUser()
  {
    var name=UserLogin.uname;
    var Password=UserLogin.Pass;

    if(name.value=="")
    {
      window.alert("Name Field Can Not Be Empty");
      name.focus();
      return false;
    }
    if(Password.value=="")
    {
      window.alert("Password Field Can Not Be Empty");
      Password.focus();
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

  $uname = $_POST['uname'];
  $Pass = $_POST['Pass'];

  $query = "select * from Users where UserName='$uname' and Password='$Pass'";



  $Complete = mysqli_query($connection, $query) or die("unable to connect");


  $Rows = mysqli_fetch_array($Complete);

  if ($Rows['UserName'] == $uname && $Rows['Password'] == $Pass) {
    session_start();
    $_SESSION['uname'] = $uname;
    $_SESSION['Pass'] = $Pass;
    header("Location:UserProfile.php");
    exit();

  } else {

    echo "<script>window.alert('Wrong User Name Or Password Try Again');</script>";
  }

  mysqli_close($connection);
}



?>

<?php require_once "layout/nav.php" ?>

<div class="max-w-[300px] mx-auto my-10">
  <h1 class="text-center text-2xl"><b>Sign in to continue</b></h1>
  
  <div className="avatar mx-auto">
    <div className="w-24 rounded-full">
      <img class="w-24 block mx-auto mb-5" src="Image/user.png" alt="" />
    </div>
  </div>
      
  <form class="space-y-3" action="" method="POST" name="UserLogin" onsubmit="return ValidUser();">
    <input type="text" class="input input-bordered block w-full" name="uname" placeholder="Enter User Name">
    <input type="password" class="input input-bordered block w-full" name="Pass" placeholder="Password....">
    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
    <div class="form-control">
      <label class="label cursor-pointer">
        <span class="label-text">Remember me</span> 
        <input type="checkbox" class="checkbox checkbox-primary" value="remember-me" />
      </label>
    </div>
            
  <a href="ForgotPass.php" class="link">Forgot Password?</a><span class="clearfix"></span>
</form>
          
            
      
    
</div>




</body>
</html>
