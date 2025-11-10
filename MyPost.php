<?php session_start() ?>


<?php

$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);

?>


<!DOCTYPE html>
<html lang="en">
<head>
 <?php require_once "layout/head-content.php" ?>


<script>
  
  function validform()
  {

   
   if(document.getElementById("Catagory").value == "Select Catagory")
   {
      alert("Please select Product Catagory"); // prompt user
     // document.getElementById("election").focus(); //set focus back to control
      return false;
   }
  // return true;
  }

</script>


</head>
<body>



<?php require_once "layout/auth-nav.php" ?>


  <p class="text-2xl font-bold text-center">Select Product Catagory</p>

<form class="max-w-sm mx-auto" method="POST" name="CatagoryForm"  onsubmit="return validform();">


 <select class="select select-bordered w-full mb-5" name="Catagory" id="Catagory" onchange="fetch_select(this.value);">
 <option disabled selected>Select Catagory</option>
  <option>Mobile</option>
  <option>Computer</option>
  <option>Car</option>
  <option>All</option>
 </select>

 

 <div class="text-right">

   <button type="submit" class="btn btn-primary w-28">View</button>
 </div>
</form>

<div class="overflow-x-auto max-w-4xl mx-auto mt-10">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $catagory = $_POST['Catagory'];


  $uname = $_SESSION['uname'];



  if ($catagory == 'All') {
    $query = "select * from Product where UserName='$uname'";
    $Rows = mysqli_query($connection, $query);

    if (mysqli_num_rows($Rows) > 0) { ?>
                      <table class="table w-full">
                      <thead>
                      <tr>
                      <th>Catagory </th>
                      <th>Photo </th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Sold or Not?</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      </tr>
                      </thead>

                      <tbody>

                      <?php while ($row = mysqli_fetch_array($Rows)) { ?>

                            <tr>
                                <td><?php echo $row['CatagoryName'] ?></td>
                                <td> <img style="width:100px;height:100px" src='<?php echo $row['Image'] ?> '>;
                                <td><?php echo $row['ProductName'] ?></td>
                                  <td><?php echo $row['Price'] ?></td>
                                  <td><?php echo $row['ProductStatus'] ?></td>

                                <td>
                                  <?php $row['StartDate'] ?>
                                </td>


                                <td>
                                  <?php $row['EndDate'] ?>
                                </td>
                            </tr>
                    <?php }
    } else {
      echo "<script> window.alert('You Have Not Any Post Yet');</script>";
    }

  } else {

    $query = "select * from Product where UserName='$uname' and CatagoryName='$catagory'";
    $Rows = mysqli_query($connection, $query);

    if (mysqli_num_rows($Rows) > 0) { ?>
                            <table class="table w-full">
                            <thead>
                            <tr>
                            <th>Catagory </th>
                            <th>Photo </th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Sold or Not?</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php while ($row = mysqli_fetch_array($Rows)) { ?>

                                    <tr>
                                        <td><?php echo $row['CatagoryName'] ?></td>
                                        <td> <img style="width:100px;height:100px" src=' <?php echo $row['Image'] ?> '>
                                        <td><?php echo $row['ProductName'] ?></td>

                                          <td><?php echo $row['Price'] ?></td>
                                          <td><?php echo $row['ProductStatus'] ?></td>

                                        <td>
                                          <?php echo $row['StartDate'] ?>
                                        </td>


                                        <td>
                                          <?php echo $row['EndDate'] ?>
                                        </td>
                                    </tr>
                            <?php }
    } else {
      echo "<script> window.alert('You Have Not Any Post Yet On this Catagory');</script>";
    }


  }

  echo '</tbody>';

}
?>
</div>
</body>
</html>

