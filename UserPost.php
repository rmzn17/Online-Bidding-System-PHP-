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

function ValidateBidForm()
{

    
    var name        =BidForm.name;
    var price       =BidForm.price;
    var description =BidForm.description;
    var Quantity    =BidForm.qty;
    var sdate       =BidForm.sdate;
    var edate       =BidForm.edate;


    if (name.value == "")
    {
        window.alert("Please Enter Product Name.");
        name.focus();
        return false;
    }
    
   

if(document.getElementById("catagory").value == "Select Catagory")
   {
      alert("Please select Catagory"); // prompt user
      document.getElementById("catagory").focus(); //set focus back to control
      return false;
   }
   

    if (price.value == "")
    {
        window.alert("Need Product Base Price.");
        price.focus();
        return false;
    }


    if (description.value=="")
    {
        window.alert("Please Give Pruduct Description");
        description.focus();
        return false;
    }

    if (Quantity.value=="")
    {
        window.alert("Please Enter Product Quantity");
        Quantity.focus();
        return false;
    }
     if (sdate.value=="")
    {
        window.alert("Please Enter Start Date For Bid");
        Quantity.focus();
        return false;
    }

    if (edate.value=="")
    {
        window.alert("Please Enter End Date For Bid");
        Quantity.focus();
        return false;
    }
$datenow = date("Y-m-d");

if(sdate<datenow)
{
      window.alert("wrong date format");
        Quantity.focus();
        return false;
}
if(edate<datenow||edate<sdate)
{
      window.alert("wrong date format");
        Quantity.focus();
        return false;
}
  
    return true;
}
}


</script>

</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $uname = $_SESSION['uname'];
  //echo $uname;
  $name = $_POST['name'];
  //echo $name;
  $catagory = $_POST['catagory'];
  // echo $catagory;
  $price = $_POST['price'];
  //echo $price;
  $description = $_POST['description'];
  // echo $description;
  $Quantity = $_POST['qty'];
  //echo $Quantity;
  $sdate = $_POST['sdate'];
  $edate = $_POST['edate'];
  $ProductStatus = 'No';

  $destination = "ProductPhoto/" . $_FILES['Cpicture']['name'];
  $filename = $_FILES['Cpicture']['tmp_name'];
  move_uploaded_file($filename, $destination);

  $query = "insert into Product(ProductName,CatagoryName,UserName,Price,Description,ProductStatus,Quantity,StartDate,EndDate,Buyer,Image)      values('$name','$catagory','$uname','$price','$description','$ProductStatus','$Quantity','$sdate','$edate','Null','$destination')";
  $exe = mysqli_query($connection, $query);
  if (!$exe) {
    echo '<script language="javascript">';
    echo 'alert("insertion Problem")';
    echo '</script>';
    echo "Error creating database: " . mysqli_error($connection);

  } else {
    echo '<script language="javascript">';
    echo 'alert("successfull")';
    echo '</script>';
  }

}

?>

<?php require_once "layout/auth-nav.php" ?>



      <form class="max-w-xl mx-auto space-y-3 mb-10" action="" method="POST" enctype="multipart/form-data" role="form" name="BidForm">
          
              <h2 class="font-bold text-2xl text-center">Add New Product</h2>
      
             <div>
              <input type="text" name="name" maxlength="50" class="input input-bordered w-full" placeholder="Product Name..." required>
            </div>

              <div class="">
              
              <select class="select select-bordered w-full" name="catagory" id="catagory" onchange="fetch_select(this.value);">
                <option disabled selected>-- Product category --</option>
                
                <option>Mobile</option>
                <option>Computer</option>
                <option>Car</option>
              </select>
            </div>
          
            <div class="">
             
              <input class="input input-bordered w-full" type="text" name="price" maxlength="50" class="form-control" placeholder="Product price..." required>
            </div>
            <div class="">
              <textarea class="textarea textarea-bordered w-full" placeholder="Product Description..." rows="5" cols="62" name="description"> </textarea>
            </div>
            <div class="">
              <input class="input input-bordered w-full" placeholder="Product Quantity" type="text" name="qty" maxlength="50" class="form-control" required>
            </div>
              <div class="">
              <label class="control-label">Start Date</label>
              <input class="input input-bordered w-full" type="date" name="sdate" maxlength="50" class="form-control" required>
            </div>
            <div class="">
              <label class="control-label">End Date</label>
              <input class="input input-bordered w-full" type="date" name="edate" maxlength="50" class="form-control" required>
            </div>
             <div class="">
             <label class="control-label">Product Picture</label>
              <input class="file-input file-input-primary w-full"  type="file" name="Cpicture">
            </div>
              <button id="signupSubmit" type="submit" class="btn btn-primary btn-block"  onclick ="return ValidateBidForm();">Add Now</button>
          </form>
    

</body>
</html>

