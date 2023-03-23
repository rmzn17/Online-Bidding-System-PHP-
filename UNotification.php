<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once("layout/head-content.php") ?>
</head>
<body>

<?php require_once("layout/auth-nav.php") ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Server = "localhost";
  $username = "root";
  $psrd = "";
  $dbname = "Bidding";
  $connection = mysqli_connect($Server, $username, $psrd, $dbname);


  $uname = $_SESSION['uname'];


  $query = "delete from Notification where UserName='$uname'";

  mysqli_query($connection, $query);

}

?>

<?php


$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);


$uname = $_SESSION['uname'];

$count = 0;
$query = "select * from Notification where UserName='$uname' and Seen='No'";
$Rows = mysqli_query($connection, $query);
$count = mysqli_num_rows($Rows);





if ($count == 0) { ?>

        <p class="text-2xl text-green-500 font-bold text-center">
          You Have No New Notification
        </p>

<?php }

if ($count > 0) { ?>

          <script> alert('You Have $count New Notification');</script>

          <form method='POST'>
        <table class="table">
             <thead>
             <tr>
               <th>Message</th>   
            </tr>
          </thead>

        <tbody>

         <?php while ($row = mysqli_fetch_array($Rows)) { ?>
                    <tr>


                    <td>
                    <?php echo $row['Message']; ?>
                    </td>

   


         <?php } ?>

            <p >
          <button type='submit' class='btn btn-primary' >Delete All Message</button>
          </p>

        </tbody>
        </form>
<?php } ?>

</body>
</html>

