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
      background-color: #508abb;
      color: #FFFFFF;
      border-color: #6ea1cc !important;
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
      background-color: green;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .data-table tfoot th {
      background-color: #e5f5ff;
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
      <li ><a href="UserProfile.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
  
      <li><a href="UserPost.php"><b>Post</b></a></li>
       <li><a href="MyPost.php"><b>MyPost</b></a></li>
       <li class="active"><a href="MyBid.php"><b>MyBid</b></a></li>
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

 
     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 


      $uname=$_SESSION['uname'];

       $query="select * from Product where Buyer='$uname' and ProductStatus='Yes'";
       $Rows=mysqli_query($connection,$query);

     if(mysqli_num_rows($Rows)>0){
      echo '<table class="data-table">';
       echo'<thead>';
       echo'<tr>';
        echo'<th>Product Name</th>';
       echo'<th>Catagory</th>';    
       echo'<th>SellerName</th>'; 
       echo '<th>Sold Price</th>';
      
      echo'</tr>';
      echo'</thead>';

      echo'<tbody>';

   while($row = mysqli_fetch_array($Rows))
      {
     
        echo '<tr>
           <td>'.$row['ProductName'].'</td>

            <td>'.$row['CatagoryName'].'</td>
             <td>'.$row['UserName'].'</td>
             <td>'.$row['Price'].'</td>
        </tr>';
      }
  }
  else
   {
    echo "<script> window.alert('You Are Not Participate Any Bid Yet');</script>";
   }
   
?>
</body>
</html>

