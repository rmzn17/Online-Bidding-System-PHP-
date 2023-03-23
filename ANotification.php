<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "layout/head-content.php" ?>

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

<?php require_once "layout/admin-nav.php" ?>
  <form action="" method="POST">



<?php

$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);

$query = "select * from ANotification";
$Result = mysqli_query($connection, $query);
if (mysqli_num_rows($Result) > 0) {
  $not = mysqli_num_rows($Result); ?>
    <script> alert('Your Have $not New Notification'); </script>
         <table class="table">
     <thead>
         <tr>
           
           <th>Name</th>   
           <th>Email</th>
           <th>Message</th>
           <th>Reply</th>
           <th>Delete</th>
      
        </tr>
      </thead>

    <tbody>

      <?php while ($row = mysqli_fetch_array($Result)) { ?>
                <tr>
          
                  <td>
                  <?php echo $row['Name']; ?>
                  </td>
                  <td>
                  <?php echo $row['Email']; ?>
                  </td>
                  <td>
                  <?php echo $row['Message']; ?>
                  </td>
                    <td>
                   <?php $email = $row[1];
                   $name = $row[0]; ?>
                 <a href=javascript:reply('$name')> <img src='Image/reply.jpg'  width='50px' height='50px' alt='Bid'/> </a>
                  </td>

                  <td>
                    <?php $email = $row[1]; ?>
                 <a href=javascript:del('$email')> <img src='Image/Delete.jpg'  width='50px' height='50px' alt='Bid'/> </a>
                  </td>

    
      <?php }
} else {
  echo "<script> alert('Your Have Not Any Notification'); </script>";
}
?>

</tbody>
</table>
</form>

</body>
</html>

