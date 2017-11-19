<?php
if(isset($_GET['bid']))
{
$id=$_GET['bid'];



     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Bidding";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 

   $query="delete from Product where ProductID='$id'";



    mysqli_query($connection,$query);
    header('Location:ADeletePost.php');
}
?>