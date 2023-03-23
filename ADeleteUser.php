<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "layout/head-content.php" ?>

<script type="text/javascript">

function delete(id)
{
  if(confirm('Are Your Sure Delete This User?'))
  {
    
    window.location='AUserDelete.php?delete='+id
  }
}

</script>
</head>
<body>
<?php require_once "layout/admin-nav.php" ?>


<form class="max-w-2xl mx-auto mt-10" action="" method="POST">
<table class="table">
 <thead>
     <tr>
       <th>Photo</th>      
       <th>Name</th>
       <th>Email</th>
       <th>Gender</th>
       <th>Address</th>
       <th>Delete</th>
    </tr>
  </thead>

<tbody>

<?php





$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);

$query = "select * from Users";
$Result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($Result)) { ?>
              <tr>
              <td>
              <img style='width:100px;height:100px' src='<?php echo $row['Photo'] ?>'>
              </td>
              <td><?php
              echo $row['Name']; ?>
              </td>
              <td>
              <?php echo $row['Email']; ?>
              </td>
              <td>
              <?php echo $row['Gender']; ?>
              </td>
              <td>
              <?php echo $row['Address']; ?>
              </td>
              <td>
              <?php $name = $row[1]; ?>

              <a href=javascript:delete('$name')> <img src='Image/Delete.jpg'  width='50px' height='50px' alt='Bid'/> </a>
              </td>
              </tr>
<?php } ?>
</tbody>
</table>
</form>

</body>
</html>

