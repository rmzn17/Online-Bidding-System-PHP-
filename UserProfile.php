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

  <style>

 body {
font-family: Agency FB;
}




</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kinbo.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="UserProfile.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
  
      <li><a href="UserPost.php"><b>Post</b></a></li>
       <li><a href="MyPost.php"><b>MyPost</b></a></li>
       <li><a href="MyBid.php"><b>MyBid</b></a></li>
        <li><a href="UUpdate.php"><b>Update Profile</b></a></li>
         <li><a href="Bidding.php"><b>Bidding</b></a></li>
         <li><a href="UNotification.php"><b>Notification</b></a></li>
    </ul>

   <ul class="nav navbar-nav navbar-right">
      <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
     
    </ul>
  </div>
</nav>
  
<?php
    $DATABASE="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($DATABASE,$username,$psrd,$dbname);
    
    $uname= $_SESSION['uname'];
   
     $query="select * from User where UserName='$uname'";
      $Result=mysqli_query($connection,$query);
        
        $row = mysqli_fetch_array($Result);

        echo "<div align='center'>";
          echo "<img style='margin:2% auto auto 2%;float:center;border:3px solid black;border-radius:20px;width:250px;height:220px' src='".$row['Photo']."'>";
         echo "</div>";
              echo "<div align='center'>";
              echo "<h1 style'margin:2% auto auto 40%;float:right;' >";
              echo $row['Name'];
              echo "<br>";
              echo $row['Email'];
              echo "<br>";
              echo $row['Address'];
              echo "<br>";
              echo "</div>";
           
         echo"</div>";   

?>
</body>
</html>

