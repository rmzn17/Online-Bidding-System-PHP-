<!DOCTYPE html>

<html>
<head>
	<title>Bidding System</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="CSS/userlogin.css">

<style>

table 
{

    border-spacing: 20px;
   
    margin:4% auto auto 20%;
   
    border-radius:20px;
  
   
}


body 
{
	  background-color: lightgray;
	   
        font-family: Agency FB;
		
}


 .size 
	 {
		 width: 250px; 
		 height: 30px;
		 padding: 2px
	 }
	 
	 .Error 
	 {
		 color: red;
     }

div.temp
{
	  margin:4% auto auto 20%;
}
td
{
	 
   font-size:35px;
   border-width:10px;

  
}
input, select, textarea {
font-size: 75%;
font-family: Agency FB;
text-align:center;

}

</style>


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

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname);
     
     $uname=$_POST['uname'];
     $Pass=$_POST['Pass'];
    
       $query="select * from User where UserName='$uname' and Password='$Pass'";
    
    
     
      $Complete=mysqli_query($connection,$query) or die("unable to connect");
         
    
    $Rows=mysqli_fetch_array($Complete);
    
    if($Rows['UserName']==$uname &&$Rows['Password']==$Pass)
    {
        session_start();
        $_SESSION['uname'] = $uname;
        $_SESSION['Pass'] = $Pass;
        header("Location:UserProfile.php");
         exit();
     
    }
    else
    {
      
      echo "<script>window.alert('Wrong User Name Or Password Try Again');</script>";
    }
    
      mysqli_close($connection);                     
   }

	

?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kinbo.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Home.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>&nbsp&nbspProducts</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Car.php"><b>Car</b></a></li>
          <li><a href="Mobile.php"><b>Mobile</b></a></li>
          <li><a href="Computer.php"><b>Computer</b></a></li>
        </ul>
         
      </li>
      
      <form class="navbar-form navbar-left" action="Search.php" method="POST">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search" size="40">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </ul>
  
  
   <ul class="nav navbar-nav navbar-right">
   <li><a href="About Project.php"><b>About site</b></a></li>
      <li><a href="Contact Us.php"><b>Contact Us</b></a></li>
       <li class="active" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>User Login</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="UserLogin.php"><b>User Login</b></a></li>
          <li><a href="AdminLogin.php"><b>Admin Login</b></a></li>
        </ul>
      </li>
      <li><a href="Registration.php"><span class="glyphicon glyphicon-user"></span> <b>Sign Up</b></a></li>
     
    </ul>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><b>Sign in to continue</b></h1>
            <div class="account-wall">
                <img class="profile-img" src="Image/user.png " alt="">
                <form class="form-signin" action="" method="POST" name="UserLogin" onsubmit="return ValidUser();">
                <input type="text" class="form-control" name="uname" placeholder="Enter User Name">
                <input type="password" class="form-control" name="Pass" placeholder="Password">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
               <label class="checkbox pull-left"> &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
                    <input type="checkbox" value="remember-me">Remember me
                </label>
                <a href="ForgotPass.php" class="pull-right need-help">Forgot Password?</a><span class="clearfix"></span>
                </form>
            </div>
            
        </div>
    </div>
</div>

</div>




</body>
</html>
