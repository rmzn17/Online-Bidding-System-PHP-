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

<script type="text/javascript">

function reply(name)
{
  if(confirm('Sure To Reply?'))
  {
  

    window.location='ANotificationReply.php?reply='+name
  }
}

function del(email)
{
  if(confirm('Sure Delete?'))
  {
    

    window.location='ANotificationDelete.php?del='+email
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
      <li><a href="AdminMagane.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li> 
      <li><a href="AddAdmin.php"><b>Add Admin</b></a></li>

      <li><a href="ADeleteUser.php"><b>Delete User</b></a></li>
      <li><a href="ADeletePost.php"><b>Delete Post</b></a></li>
      <li class="active"><a href="ANotification.php"><b>Notification</b></a></li>
    </ul>

   <ul class="nav navbar-nav navbar-right">
      <li><a href="ULogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
     
    </ul>
  </div>
</nav>
  <form action="" method="POST">



<?php





    $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 

    $query="select * from ANotification";
    $Result=mysqli_query($connection,$query);
    if(mysqli_num_rows($Result)>0){
   $not=mysqli_num_rows($Result);
echo "<script> alert('Your Have $not New Notification'); </script>";
     echo'<table class="data-table">
 <thead>
     <tr>
           
       <th>Name</th>   
       <th>Email</th>
       <th>Message</th>
       <th>Reply</th>
       <th>Delete</th>
      
    </tr>
  </thead>

<tbody>';

   while ($row=mysqli_fetch_array($Result))
    {
          echo "<tr>";
          
          echo "<td>";
          echo $row['Name'];
          echo "</td>";
          echo "<td>";
          echo $row['Email'];
          echo "</td>";
          echo "<td>";
          echo $row['Message'];
          echo "</td>";
            echo "<td>";
            $email=$row[1];
            $name=$row[0];
         echo"<a href=javascript:reply('$name')> <img src='Image/reply.jpg'  width='50px' height='50px' alt='Bid'/> </a>";
          echo "</td>";

           echo "<td>";
            $email=$row[1];
         echo"<a href=javascript:del('$email')> <img src='Image/Delete.jpg'  width='50px' height='50px' alt='Bid'/> </a>";
          echo "</td>";

    
    }
  }
  else
  {
    echo "<script> alert('Your Have Not Any Notification'); </script>";
  }
?>

</tbody>
</table>
</form>

</body>
</html>

