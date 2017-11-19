<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="CSS/Bidproduct.css">
</head>

<style type="text/css">
  

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

<body>



<?php
if(isset($_GET['bid']))
{
$id=$_GET['bid'];

?>

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
     $id=$_GET['bid'];
      $query="select * from User where UserName='$uname' and Password='$Pass'";
    
    
     
      $Complete=mysqli_query($connection,$query) or die("unable to connect");
         
    
    $Rows=mysqli_fetch_array($Complete);
    
    if($Rows['UserName']==$uname &&$Rows['Password']==$Pass)
    {
        session_start();
        $_SESSION['uname'] = $uname;
        $_SESSION['Pass'] = $Pass;
       
        header("Location:UserBidLogin.php?bid=$id");
         exit();
     
    }
    else
    {
      $loginmessage="Wrong User Name Or Password Try Again";
     
      header("Location: Home.php?message=" . urlencode($loginmessage));
    
         exit();
    }
    
      mysqli_close($connection);                     
   }

  

?>
<form method="POST">

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
           
             <a href="Home.php"> <img src="Image/back.jpg"  width="50px" height="50px"  alt="Bid" /> </a><span style="text-align: center;color: #286090;font-size: 25px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Enter Information</b></span><br><br><br>
          
            <input type="text" id="userName" name="uname" class="form-control input-sm chat-input" placeholder="Username" name="UserLogin" onsubmit="return ValidUser();" />
            </br>
            <input type="Password" name="Pass" id="userPassword" class="form-control input-sm chat-input" placeholder="Password" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
            <button type="submit" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>

            </span>
            </div>
            </div>
        
        </div>
    </div>
</div>
</form>

<?php
}


?>

</body>
</html>