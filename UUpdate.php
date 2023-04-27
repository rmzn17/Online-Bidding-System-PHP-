
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "layout/head-content.php" ?>


<script>
  
function ValidateContactForm()
{

 
    var Name=ContactForm.Name;
    var Pass=ContactForm.Password;
    var Email=ContactForm.Email;
    var Phone=ContactForm.Phone;
    var Address=ContactForm.Address


    if (Name.value=="") 
    {
      window.alert("Enter Your Name");
      Email.focus();
      return false;
    }

   if (Pass.value=="") 
    {
      window.alert("Enter Password");
      Pass.focus();
      return false;
    }


    if (Email.value=="") 
    {
      window.alert("Enter Your Email");
      Email.focus();
      return false;
    }

   if (!validateCaseSensitiveEmail(Email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
   if (Phone.value=="") 
    {
      window.alert("Enter Your Phone Number");
      Email.focus();
      return false;
    }
    
    return true;

}
function validateCaseSensitiveEmail(email) 
{ 
 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
 if (reg.test(email)){
 return true; 
}
 else{
 return false;
 } 
} 

</script>

</head>
<body>


<?php require_once "layout/auth-nav.php" ?>

<?php
$uName = $_SESSION['uname'];
$Pass = $_SESSION['Pass'];

$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);



$query = "select * from Users where UserName='$uName' and Password='$Pass'";



$Complete = mysqli_query($connection, $query) or die("unable to connect");


$Rows = mysqli_fetch_array($Complete);

$name = $Rows['Name'];
$email = $Rows['Email'];
$phone = $Rows['Phone'];
$address = $Rows['Address'];
;

?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uName = $_SESSION['uname'];

  $Server = "localhost";
  $username = "root";
  $psrd = "";
  $dbname = "Bidding";
  $connection = mysqli_connect($Server, $username, $psrd, $dbname);

  $name = $_POST['Name'];
  $Password = $_POST['Password'];
  $Email = $_POST['Email'];
  $Phone = $_POST['Phone'];
  $Address = $_POST['Address'];

  $query = "update Users set Name='$name',Password='$Password',Email='$Email',Phone='$Phone', Address='$Address' where UserName='$uName'";

  $Complete = mysqli_query($connection, $query) or die("unable to connect");

  echo "<script>alert('Update Successfully');</script>";

}
?>





  
  <h2 class="font-bold text-2xl mt-10 text-center">Update Profile</h2>
  <form class="max-w-xl mx-auto flex flex-col gap-y-3 my-5" method="post" action="" name="ContactForm" onsubmit="return ValidateContactForm();">

     <input class="input input-bordered w-full" type="text" name="Name" placeholder="Your Name"value="<?php echo $name; ?>">
    <input class="input input-bordered w-full" type="password" placeholder="New Password" name="Password"></p>
    <input class="input input-bordered w-full" type="Email" name="Email" placeholder="Your Email" value="<?php echo $email; ?>">
    <input class="input input-bordered w-full" type="text" name="Phone" placeholder="Your Phone Number"value="<?php echo $phone; ?>">
    <input class="input input-bordered w-full" type="text" name="Address" placeholder="Your Address" value="<?php echo $address; ?>">
    <input class="btn btn-primary btn-block" type="submit" value="Update Now"></p>
  </form>



</body>
</html>

