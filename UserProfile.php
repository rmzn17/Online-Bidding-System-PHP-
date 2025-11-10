<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "layout/head-content.php" ?>
</head>
<body>

<?php require_once "layout/auth-nav.php" ?>
  
<?php
$DATABASE = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($DATABASE, $username, $psrd, $dbname);

$uname = $_SESSION['uname'];

$query = "select * from Users where UserName='$uname'";
$Result = mysqli_query($connection, $query);

$row = mysqli_fetch_array($Result);

?>
<div class="max-w-2xl mx-auto mt-20 text-center">

  <div class="avatar">
    <div class="w-24 rounded-full">
      <img src="<?php echo $row['Photo'] ?>" />
    </div>
  </div>
  <p class="font-bold text-lg"><?php echo $row['Name']; ?></p>
  <p class="font-bold text-lg"><?php echo $row['Email']; ?></p>
  <p class="font-bold text-lg"><?php echo $row['Address']; ?></p>
</div>
</body>
</html>

