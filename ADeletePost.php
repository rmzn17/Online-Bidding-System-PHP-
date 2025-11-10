<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "layout/head-content.php" ?>

<script type="text/javascript">

function bid(id)
{
  if(confirm('Are You Sure Delete This Post?'))
  {
    alert(id);

    window.location='APostDelete.php?bid='+id
  }
}
</script>

</head>
<body>

<?php require_once("layout/admin-nav.php") ?>
  
<form class="max-w-2xl mx-auto mt-10" action="" method="POST">
<table class="table">
 <thead>
     <tr>
       <th>Photo</th>      
       <th>Name</th>
       <th>Catagory Name</th>
       <th>Price</th>
       <th>Sold or Not</th>
       <th>Start Date</th>
       <th>End Date</th>
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

$query = "select * from Product";
$Result = mysqli_query($connection, $query);
while ($row = mysqli_fetch_array($Result)) { ?>
    <tr>
    <td>
    <img style='width:100px;height:100px' src='<?php echo $row['Image'] ?>'>";
    </td>
    <td>
    <?php echo $row['ProductName']; ?>
    </td>
    <td>
    <?php echo $row['CatagoryName']; ?>
    </td>
    <td>
    <?php echo $row['Price']; ?>
    </td>
    <td>
    <?php echo $row['ProductStatus']; ?>
    </td>
    <td>
    <?php echo $row['StartDate']; ?>
    </td>
    <td>
    <?php echo $row['EndDate']; ?>
    </td>
    <td>
      <a href="javascript:bid(<?php echo $row[0]; ?>)"> 
        <img src="Image/delete1.jpg"  width="50px" height="50px"  alt="Bid" /> 
      </a>
    </td>

<?php }
?>

</tbody>
</table>
</form>
</body>
</html>

