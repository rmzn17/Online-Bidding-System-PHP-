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

 background-image: url("Background/back3.jpg");
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
      <li class="active"><a href="AdminMagane.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
  
      <li><a href="AddAdmin.php"><b>Add Admin</b></a></li>
      <li><a href="ADeleteUser.php"><b>Delete User</b></a></li>
      <li><a href="ADeletePost.php"><b>Delete Post</b></a></li>
      <li><a href="ANotification.php"><b>Notification</b></a></li>
    </ul>

   <ul class="nav navbar-nav navbar-right">
      <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
     
    </ul>
  </div>
</nav>
  

</body>
</html>

