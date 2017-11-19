<?php
if(isset($_GET['del']))
{
$email=$_GET['del'];



   $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 

   $query="delete from ANotification where Email='$email'";



    mysqli_query($connection,$query);
    header('Location:ANotification.php');
}
?>