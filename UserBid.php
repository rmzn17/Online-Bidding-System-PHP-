
<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Bidding System</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	
	select
{
 width:300px;
 height:40px;
 border:1px solid #20B2AA;
 margin-top:20px;
 padding:2px;
 font-size:20px;
 color:grey;
 border-radius:5px;

}
#heading
{
 text-align:center;
 margin-top:10px;
 font-size:30px;
 color:#228B22;
}
</style>
<body>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

	   $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
      $connection= mysqli_connect($Server,$username,$psrd,$dbname); 
             $id=$_GET['bid'];
       $price=$_POST['Catagory'];
       $buyer=$_SESSION['uname'];

      $qry="select * from Product where ProductID='$id'";
      $Rslt=mysqli_query($connection,$qry);

      $rw=mysqli_fetch_array($Rslt);

      $postbuyer=$rw['Buyer'];
      $productname=$rw['ProductName'];

      $message=$postbuyer." Someone Bid heigher than your Bid price on product".$productname.'! , You Can Bid Again This Product ';

      $insert="insert into Notification values('$postbuyer','$message','No')";
       mysqli_query($connection,$insert);


       $query="update Product set Price='$price',Buyer='$buyer' where ProductID='$id'";

       mysqli_query($connection,$query);

       header('Location:Bidding.php');



 }
 
?>

<?php

  

if(isset($_GET['bid']))
{

	 $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 
	 $uname= $_SESSION['uname'];
        $id=$_GET['bid'];


    $query="select * from Product where ProductID ='$id'";

     $Result=mysqli_query($connection,$query);
     
     $row=mysqli_fetch_array($Result);

    $Buyer=$row['UserName'];

    if($Buyer==$uname)
    {
    	echo"<script>alert('This Is Your Product, You Can Not Bid Your Own Product');</script>";

    }
    else
    {
      echo '<a href="Bidding.php"> <img src="Image/back.jpg"  width="80px" height="80px"  alt="Bid" /> </a>';
      
    $qry="select * from Product where ProductID ='$id'";

     $Result=mysqli_query($connection,$qry);

     $row=mysqli_fetch_array($Result);

    $Price=$row['Price'];

    $price1=$Price+100;
    $price2=$Price+300;
    $price3=$Price+500;
    $query="select * from product where ProductID='$id'";
    $Result=mysqli_query($connection,$query);
    $break=0;

    $row=mysqli_fetch_array($Result);
   echo'<table align="center">';
    echo'<td>';
     echo"<img src='".$row['Image']."' width='350px' height='250px'>";
    echo'</td>';
    echo'<td>';

    echo "<h3>";
    echo $row['ProductName'];
    echo "</h3>";

     echo $row['Description'];
     echo "<br>";
     echo "<b>";
      echo "Corrent Price: ";
    echo $row['Price'];
    echo "</b>";
     echo "<br><br>";
   echo'</table>';
   

    echo ' 
   <p id="heading">Choose Your Price</p>
<center>
<form method="POST" name="CatagoryForm"  onsubmit="return validform();">
<br><div align="center">

 <select name="Catagory" id="Catagory" onchange="fetch_select(this.value);">
 
  <option>'.$price1.'</option>
  <option>'.$price2.'</option>
  <option>'.$price3.'</option>
 </select><br>

</div>   
</center>
<p style=" margin: -2.7% 10% 10% 62%">
<button type="submit" class="btn btn-primary">Bid Now</button>
</form>
';

    }
    
}
?>

</body>
</html>