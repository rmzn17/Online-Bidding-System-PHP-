<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "layout/head-content.php" ?>
</head>
<body>

<?php require_once "layout/auth-nav.php" ?>


<?php


$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);


$uname = $_SESSION['uname'];

$query = "select * from Product where Buyer='$uname' and ProductStatus='Yes'";
$Rows = mysqli_query($connection, $query);

if (mysqli_num_rows($Rows) > 0) { ?>
  <div class="overflow-x-auto">

    <table class="table w-full">
      <thead>
        <tr class="hover">
          <th>Product Name</th>
          <th>Catagory</th>
          <th>SellerName</th>
          <th>Sold Price</th>
        </tr>
      </thead>

    <tbody>

    <?php while ($row = mysqli_fetch_array($Rows)) { ?>

        <tr>
          <td><?php echo $row['ProductName'] ?></td>
          <td><?php echo $row['CatagoryName'] ?> </td>
          <td><?php echo $row['UserName'] ?> </td>
          <td><?php echo $row['Price'] ?> </td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
  </div>
<?php } else {
  echo "<script> window.alert('You Are Not Participate Any Bid Yet');</script>";
}

?>
</body>
</html>

