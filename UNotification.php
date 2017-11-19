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


.msg
{
  font-size: 30px;

  padding: 10px;
  margin-left: 200px;

}
    table {
      margin: auto;
      font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
      font-size: 12px;
    }

    h1 {
      margin: 25px auto 0;
      text-align: center;
      text-transform: uppercase;
      font-size: 17px;
    }

    table td {
      transition: all .5s;
    }
    
    /* Table */
    .data-table {
      border-collapse: collapse;
      font-size: 14px;
      min-width: 537px;
    }

    .data-table th, 
    .data-table td {
      border: 1px solid #e1edff;
      padding: 7px 17px;
    }
    .data-table caption {
      margin: 7px;
    }

    /* Table Header */
    .data-table thead th {
      background-color: #2F4F4F;
      color: #FFFFFF;
      border-color:black !important;
      text-transform: uppercase;
    }

    /* Table Body */
    .data-table tbody td {
      color: #353535;
    }
    .data-table tbody td:first-child,
    .data-table tbody td:nth-child(4),
    .data-table tbody td:last-child {
      text-align: right;
    }

    .data-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .data-table tbody tr:hover td {
      background-color: #008080;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #2F4F4F;
      text-align: right;
    }
    .data-table tfoot th:first-child {
      text-align: left;
    }
    .data-table tbody td:empty
    {
      background-color: #ffcccc;
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
      <li><a href="UserProfile.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
  
      <li><a href="UserPost.php"><b>Post</b></a></li>
       <li><a href="MyPost.php"><b>MyPost</b></a></li>
       <li><a href="MyBid.php"><b>MyBid</b></a></li>
        <li><a href="UUpdate.php"><b>Update Profile</b></a></li>
         <li><a href="Bidding.php"><b>Bidding</b></a></li>
         <li  class="active"><a href="UNotification.php"><b>Notification</b></a></li>
    </ul>

   <ul class="nav navbar-nav navbar-right">
      <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
     
    </ul>
  </div>
</nav>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 


      $uname=$_SESSION['uname'];


      $query="delete from Notification where UserName='$uname'";

       mysqli_query($connection,$query);
 
}

?>

<?php

 
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 


      $uname=$_SESSION['uname'];

       $count=0;
       $query="select * from Notification where UserName='$uname' and Seen='No'";
       $Rows=mysqli_query($connection,$query);
       $count= mysqli_num_rows($Rows);



     

      if($count==0)
      {
        echo "<br><br>";
        echo "<h1 style='font-size:30px;color:green'>";
        echo "You Have Not Any New Notification Now";
        echo "</h1>";
      
      }

     if($count>0)
      {

       echo "<script> alert('You Have $count New Notification');</script>";
   
      echo "<form method='POST'>";
        echo'<table  style="width:200px;height:500px;border:2px solid black" class="data-table">
     <thead>
     <tr>
           
      
       
       <th>Message</th>   
      
      
    </tr>
  </thead>

<tbody>';

   while ($row=mysqli_fetch_array($Rows))
    {
          echo "<tr>";
          

          echo "<td>";
          echo $row['Message'];
          echo "</td>";

         /*  echo "<td>";
            $uname=$row[0];
         echo"<a href=javascript:del('$uname')> <img src='Image/Delete2.jpg'  width='50px' height='50px' alt='Bid'/> </a>";
          echo "</td>";*/

    
    }

echo"<p style=' margin: 1% 0% 0% 45%'>
<button type='submit' class='btn btn-primary' >Delete All Message</button>
</p>";

    echo "</form>";
    echo "</tbody>";
      }
     

 
?>

</body>
</html>

