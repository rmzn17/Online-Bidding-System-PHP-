<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <style>

 body {
   background-image: url("Background/back.jpg");
    font-family: Agency FB;
}

.font{
    font-family: Agency FB;
    font-size:20px;
}

.modal-header
 {
     padding:9px 15px;
     border-bottom:1px solid #eee;
     background-color: #A9A9A9;
 }
.modal-footer
{
background-color: #A9A9A9;
}
.modal-body
{
 background-color: #324669;
 color: white;
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
   <li class="active"><a href="#myModal" data-toggle="modal" data-target="#myModal"><b>About site</b></a></li>
    <li><a href="Contact Us.php"><b>Contact Us</b></a></li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Login</b><span class="caret"></span></a>
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 style="text-align: center" class="modal-title"><b>Online Bidding System</b></h2>
        </div>
        <div class="modal-body">
          
          <h3><i class="glyphicon glyphicon-thumbs-up"></i> &nbsp The purpose of this project is to build an “Online Bidding System”, a place for buyers and sellers to come together and trade almost anything.<br><br><i class="glyphicon glyphicon-thumbs-up"></i> &nbsp Usercan see the feature of this site without registration but for Bidding and selling user must be registrated.<br><br>
   <i class="glyphicon glyphicon-thumbs-up"></i> &nbsp Auctions have a name, a description, possibly a photo (of the related item) uploaded by users and an end period: users cannot place bids when the auction interval (start - end period) ends, but, in case there were no offers for an item, there is the possibility to extend the interval.<br><br> <i class="glyphicon glyphicon-thumbs-up"></i> &nbspMoreover, administrators have the possibility to accept or refuse auctions proposed by users, to view information about users and items and to create, modify and delete the categories of auctions (auctions regarding cars,Mobile,Computer). </h3>
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

</body>
</html>

