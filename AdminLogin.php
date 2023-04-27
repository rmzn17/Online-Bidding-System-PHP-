<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once("layout/head-content.php") ?>

<script type="text/javascript">
  
  function validadmin()
  {
    var name=AdminLogin.uName;
    var Password=AdminLogin.Pass;

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


<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $Server = "localhost";
  $username = "root";
  $psrd = "";
  $dbname = "Bidding";
  $connection = mysqli_connect($Server, $username, $psrd, $dbname);

  $aname = $_POST['uName'];
  $Pass = $_POST['Pass'];

  $query = "select * from Admin where AdminName='$aname' and AdminPassword='$Pass'";



  $Complete = mysqli_query($connection, $query) or die("unable to connect");


  $Rows = mysqli_fetch_array($Complete);

  if ($Rows['AdminName'] == $aname && $Rows['AdminPassword'] == $Pass) {
    session_start();
    $_SESSION['uName'] = $aname;
    $_SESSION['Pass'] = $Pass;
    header("Location:AdminMagane.php");
    exit();

  } else {

    echo "<script>alert('Wrong User Name Or Password Try Again');</script>";
  }

  mysqli_close($connection);
}




?>


<?php require_once("layout/nav.php") ?>


      
       
       
  <form class="flex flex-col gap-y-3 mt-10 max-w-[300px] mx-auto" role="form" action="#" method="POST" name="AdminLogin" onsubmit=" return validadmin();">
    <h2 class="text-2xl font-bold text-center">Sign in to continue to Admin dashboard</h2>
  
    <div class="avatar mx-auto">
      <div class="w-24 rounded-full">
      <img src="iMAGE/admin.png" alt="">
      </div>
    </div>
     
    <div >
    
      <input class="input input-bordered w-full" placeholder="Username" name="uName" type="text">
    </div>
    <div class="">
      <input class="input input-bordered w-full" placeholder="Password" name="Pass" type="password">
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
    </div>
  </form>
       
          
            
    


</body>
</html>

