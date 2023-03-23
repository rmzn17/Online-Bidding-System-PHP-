

<?php
$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);


$query = "SELECT * FROM Product WHERE ProductStatus = 'No' ";

$result = mysqli_query($connection, $query);

while ($row = mysqli_fetch_array($result)) {
  $datenow = date("Y-m-d");

  $duedate = $row['EndDate'];

  $prodid = $row['ProductID'];
  if ($datenow >= $duedate) {


    $buyer = $row['Buyer'];


    if ($buyer == "Null") {
      $seller = $row['UserName'];
      $ProductName = $row['ProductName'];

      $message = "Sorry Mr." . $seller . ", Your Product " . $ProductName . " Remain Unsold  No one bid your product";
      $query1 = "insert into Notification values('$seller','$message','No')";
      mysqli_query($connection, $query1);

    } else {

      $qry = "UPDATE Product SET ProductStatus = 'Yes' WHERE ProductID = '$prodid'";
      mysqli_query($connection, $qry);

      $seller = $row['UserName'];
      $buyer = $row['Buyer'];
      $ProductName = $row['ProductName'];

      $qry1 = "select * from Users where UserName='$seller'";
      $result1 = mysqli_query($connection, $qry1);
      $row1 = mysqli_fetch_array($result1);
      $sname = $row1['Name'];
      $semail = $row1['Email'];
      $sphone = $row1['Phone'];

      $qry2 = "select * from Users where UserName='$buyer'";
      $result2 = mysqli_query($connection, $qry2);
      $row2 = mysqli_fetch_array($result2);
      $bname = $row2['Name'];
      $bemail = $row2['Email'];
      $bphone = $row2['Phone'];

      $message = "Congratulation Mr." . $sname . ", Your Product " . $ProductName . " has been sold and Buyer is " . $bname . " You can contact with Buyer by Email:" . $bemail . " or You can use phone:" . $bphone . ".";
      $query1 = "insert into Notification values('$seller','$message','No')";
      mysqli_query($connection, $query1);

      $message = "Congratulation Mr." . $bname . ", Your are the final and highest bidder of  Product " . $ProductName . ". Now This is Your Product. Product Seller is " . $sname . ", You can contact with Seller by Email:" . $semail . " or You can use phone: " . $sphone . ".";
      $query2 = "insert into Notification values('$buyer','$message','No')";
      mysqli_query($connection, $query2);
    }



  }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bidding System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="CSS/Home.css"> -->
<link rel="stylesheet" type="text/css" href="CSS/main.css">
 

<script type="text/javascript">

function bid(id)
{
  if(confirm('Sure Participate?'))
  {
    alert('You Are Not Sign in, Please Sign In For Bid');
    window.location='BidProduct.php?bid='+id
  }
}
</script>


</head>
<body>




<?php require_once 'layout/nav.php' ?>

<?php
if (isset($_GET['message'])) {
  print '<script type="text/javascript">alert("' . $_GET['message'] . '");</script>';
}

if (isset($_GET['loginmessage'])) {
  print '<script type="text/javascript">alert("' . $_GET['loginmessage'] . '");</script>';
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  echo "<script> alert('name'); </script>";
}

?>



<div class="flex flex-wrap">



<?php
$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);

$query = "select * from product where ProductStatus='No'";
$Result = mysqli_query($connection, $query);
$break = 0;


while ($row = mysqli_fetch_array($Result)) {


  $datenow = date("Y-m-d");

  $sdate = $row['StartDate'];
  if ($sdate <= $datenow) {
    ?>

                                                            <div class="card w-96 bg-base-100 shadow-xl">
                                                                  <figure><img src=<?php echo $row['Image'] ?> alt="Shoes" /></figure>
                                                                  <div class="card-body">
                                                                    <h2 class="card-title"><?php echo $row['ProductName'] ?></h2>
                                                                    <p><?php echo $row['Description'] ?></p>
                                                                    <div class="card-actions justify-end">
                                                                      <a href="javascript:bid(<?php echo $row[0]; ?>)" class="btn btn-primary">Bid Now</a>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                <?php } ?>
<?php } ?>
     

</div>



<div class="container px-10 mx-auto">

  <h2 class="text-center text-2xl">Sold Product Here</h2>
<div class="flex flex-wrap">

     <?php


     $query = "select * from product where ProductStatus='Yes'";
     $Result = mysqli_query($connection, $query);


     while ($row = mysqli_fetch_array($Result)) {

       ?>

          <div class="card w-96 bg-base-100 shadow-xl">
            <figure><img src=<?php echo $row['Image']; ?> alt="Shoes" /></figure>
            <div class="card-body">
              <h2 class="card-title">
                <?php echo $row['ProductName']; ?>
                <div class="badge badge-secondary">SOLD</div>
              </h2>
              <p><?php echo $row['Description'] ?></p>
              <div class="card-actions justify-end">
                <div class="badge badge-outline"><?php echo $row['Price'] ?></div> 
                <!-- <div class="badge badge-outline">SOLD</div> -->
              </div>
            </div>
          </div>
                                         
                              
      <?php } ?>
  
      </div>
     </div>

</body>
</html>

