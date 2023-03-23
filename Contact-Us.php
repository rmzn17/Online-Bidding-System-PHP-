<?php session_start() ?>


<?php

$Server = "localhost";
$username = "root";
$psrd = "";
$dbname = "Bidding";
$connection = mysqli_connect($Server, $username, $psrd, $dbname);

?>



<!DOCTYPE html>
<html>

<head>

<?php require_once("layout/head-content.php") ?>
<script type="text/javascript">
  

  function validmessage()
  {
    var name=UserMessage.name;
    var email=UserMessage.email;
    var message=UserMessage.message;

    if(name.value=="")
    {
      alert("Need Your Name");
      name.focus();
    }
    if(email.value=="")
    {
      alert("Need Your Email");
      email.focus();
    }

  }

</script>
</head>
<div class="container-fluid">



<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $seen = "No";

  $query = "insert into ANotification values('$name','$email','$message','$seen')";

  mysqli_query($connection, $query);



}
?>


<?php require_once("layout/nav.php") ?>


<!-- The button to open modal -->
<div class="text-center mt-20">
  <p>Please, click the button below to see contact form</p>
  <label for="my-modal-4" class="btn btn-primary">Contact Us</label>
</div>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-4" class="modal-toggle" />
<label for="my-modal-4" class="modal cursor-pointer">
  <label class="modal-box relative" for="">
    <h3 class="text-lg font-bold">Can't wait to here from you</h3>
    <form class="flex flex-col gap-y-3" method="POST" name="UserMessage" onsubmit=" return  validmessage();">
      
        <input type="text" class="input input-bordered" id="Name" name="name" placeholder="Enter Your Name...">
     
      
    
        <input type="email" class="input input-bordered" id="exampleInputEmail1" name="email" placeholder="Enter Your Email...">
     
       
        <textarea class="textarea textarea-bordered" rows="3" cols="68" name="message" placeholder="Enter Your Comment..."></textarea>
  
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </label>
</label>


</body>
</html>

