
<?php 


 session_start();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="CSS/Bidding.css">
  <style>

 body {
   
font-family: Agency FB;
}




</style>

<script type="text/javascript">

function bid(id)
{
  if(confirm('Sure Participate ?'))
  {
    window.location='UserBid.php?bid='+id
  }
}
</script>


</head>
<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kinbo.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="UserProfile.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
  
      <li><a href="UserPost.php"><b>Post</b></a></li>
       <li><a href="MyPost.php"><b>MyPost</b></a></li>
       <li><a href="MyBid.php"><b>MyBid</b></a></li>
        <li><a href="UUpdate.php"><b>Update Profile</b></a></li>
         <li  class="active"><a href="Bidding.php"><b>Bidding</b></a></li>
         <li><a href="UNotification.php"><b>Notification</b></a></li>
    </ul>

   <ul class="nav navbar-nav navbar-right">
      <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
     
    </ul>
  </div>
</nav>

  
<div class="bodysection templete clear">

<div class="mainsection templete clear">


<table>


<?php
   $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 
$uname=$_SESSION['uname'];
  $query="select * from product where ProductStatus='No' and UserName!='$uname'";
    $Result=mysqli_query($connection,$query);
    $break=0;

    while ($row=mysqli_fetch_array($Result)) {

      if($break==2){

        echo "<tr>";
        
    
        $break=0;

      }
    $datenow = date("Y-m-d");
        
  $sdate = $row['StartDate'];
  if($sdate<=$datenow){
    echo'<td>';
     echo"<img src='".$row['Image']."' width='200px' height='220px'>";
    echo'</td>';
    echo'<td>';
    echo "<h1> Description</h1>";
    echo "<h3>";
    echo $row['ProductName'];
    echo "</h3>";

     echo $row['Description'];
     echo "<br>";
     echo "<b>";
      echo "Price: ";
    echo $row['Price'];
    echo "</b>";
     echo "<br><br>";
    ?>
    <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Image/bidnow.png"  width="50px" height="50px"  alt="Bid" /> <span style="color: green;font-size: 20px"><b>Running</b></span> </a>
<?php 
      $break++;
echo'</td>';
    }
  }
?>

  
</table>

</div>


 </div>
  


</body>
</html>

