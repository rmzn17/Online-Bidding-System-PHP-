
<?php


session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once("layout/head-content.php") ?>


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



<?php require_once("layout/auth-nav.php") ?>
<div class="flex flex-wrap gap-5">
<?php
$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);
$uname = $_SESSION['uname'];
$query = "select * from product where ProductStatus='No' and UserName!='$uname'";
$Result = mysqli_query($connection, $query);


while ($row = mysqli_fetch_array($Result)) {


  $datenow = date("Y-m-d");

  $sdate = $row['StartDate'];
  if ($sdate <= $datenow) { ?>
          <div class="flex flex-col w-28">


            <div class="max-w-xl aspect-square overflow-hidden rounded-full">
             <img class="object-fill" src='<?php echo $row['Image'] ?>' width='200px' height='220px' /> 
          </div>
    
   
            <h3>
            <?php echo $row['ProductName']; ?>
            </h3>

            <p><?php echo $row['Description']; ?></p>
            <p><?php echo $row['Price']; ?></p>
            <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Image/bidnow.png"  width="50px" height="50px"  alt="Bid" /> <span style="color: green;font-size: 20px"><b>Running</b></span> </a>
          </div>
        <?php


  }
}
?> 
</div>

</body>
</html>

