<!DOCTYPE html>
<html lang="en">
  <head> 
    <?php require_once "layout/head-content.php" ?>

<script type="text/javascript">
  

  function RegisterValid()
  {


    var Name     =Registerform.name;
    var Uname    =Registerform.uname;
    var Password =Registerform.password;
    var email    =Registerform.email;
    var phone    =Registerform.phone;
    var dob      =Registerform.dob;
    var gender   =Registerform.gender;
    var address  =Registerform.address;


    if (Name.value == "")
    {
        window.alert("Please enter your name.");
        Name.focus();
        return false;
    }

    if (!/^[a-zA-Z]*$/g.test(Name.value)) {
        alert("Invalid Characters For Name");
        Name.focus();
        return false;
    }

    if (Uname.value == "")
    {
        window.alert("Please enter your username.");
        Uname.focus();
        return false;
    }
    if (Password.value == "")
    {
        window.alert("Please enter your Password.");
        Password.focus();
        return false;
    }
    
    if (email.value == "")
    {
        window.alert("Please enter your email.");
        email.focus();
        return false;
    }

     if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }



    if (phone.value == "")
    {
        window.alert("Please enter your telephone number.");
        phone.focus();
        return false;
    }

    if (phone.value.length != 11)
    {
        window.alert("Please  your telephone number must be 11 digit.");
        phone.focus();
        return false;
    }


    if (dob.value == "")
    {
        window.alert("Please Date of Birth.");
        dob.focus();
        return false;
    }
    if (address.value == "")
    {
        window.alert("Please provide Your Address");
        address.focus();
        return false;
    }

    if (gender.value == "")
    {
        window.alert("Please provide Gender.");
        gender.focus();
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
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Server = "localhost";
  $username = "root";
  $psrd = "";
  $dbname = "Bidding";
  $connection = mysqli_connect($Server, $username, $psrd, $dbname);

  $name = $_POST['name'];
  $uname = $_POST['uname'];
  $Password = $_POST['password'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];


  $destination = "UserPhoto/" . $_FILES['image']['name'];
  $filename = $_FILES['image']['tmp_name'];

  move_uploaded_file($filename, $destination);

  $query = "insert into Users(Name,UserName,Password,Email,Phone,Gender,DOB,Address,Photo) values('$name','$uname','$Password','$email','$phone','$gender','$dob','$address','$destination')";
  $ret = mysqli_query($connection, $query);

  echo '<script language="javascript">';
  echo 'alert("Registration successfully")';
  echo '</script>';
}

?>

  <?php require_once("layout/nav.php") ?>
  

    <div class="max-w-[400px] mx-auto my-10">
      
        <h3 class="text-center text-2xl">User Registration Form</h5>
          <form class="space-y-4" method="POST"  enctype="multipart/form-data" name="Registerform"  onsubmit="return RegisterValid();" >
            
            <div class="">             
                  <input type="text" class="input input-bordered w-full" name="name" id="name"  placeholder="Enter your Name"/>
            </div>
            <div class="form-group">
              <input type="text" class="input input-bordered w-full" name="uname" id="uname"  placeholder="Enter your User Name"/>
            </div>

            <div class="form-group">
              <input type="password" class="input input-bordered w-full" name="password" id="password"  placeholder="Enter your Password"/>
            </div>


            <div class="form-group">
              <input type="text" class="input input-bordered w-full" name="email" id="email"  placeholder="Enter your Email"/>
            </div>

            <div class="form-group">
              <input type="text" class="input input-bordered w-full" name="phone"  placeholder="Enter your Phone Number"/>
            </div>
              

            <div class="form-group">
              <input type="date" class="input input-bordered w-full" name="dob"/>
            </div>

            <div class="form-group">
              <input type="text" class="input input-bordered w-full" name="address" placeholder="Your Address" />
            </div>
            <div class="form-group">
              <label  class="font-bold">Your Gender</label>
                <div class="flex items-center gap-2">
                  <input class="radio checked:bg-primary" type="radio" name="gender" value="Male" />Male
                  <input class="radio checked:bg-primary" type="radio" name="gender" value="Female" />Female
                </div>
            </div>
             
            
            <div class="flex flex-col">
              <label class="font-bold">Your Profile Picture</label>
              <input type="file" name="image" class="file-input file-input-bordered file-input-primary w-full " />
            </div>
            


            <div class="">
              <input  type="submit" id="button" class="btn btn-primary btn-block">
            </div>
            
          </form>
      
    </div>

  
  </body>
</html>