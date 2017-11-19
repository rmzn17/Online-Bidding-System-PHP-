<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <link rel="stylesheet" type="text/css" href="CSS/userReg.css">
		<title>Bidding System</title>


  <style>

 body {
   
   
font-family: Agency FB;
}



</style>

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
    $Server="localhost";
		 $username="root";
		 $psrd="";
		 $dbname = "Bidding";
		 $connection= mysqli_connect($Server,$username,$psrd,$dbname);

         $name     =$_POST['name'];
         $uname    =$_POST['uname'];
         $Password =$_POST['password'];
         $email    =$_POST['email'];
         $phone    =$_POST['phone'];
         $dob      =$_POST['dob'];
         $gender   =$_POST['gender'];
         $address  =$_POST['address'];


         $destination = "UserPhoto/".$_FILES['image']['name'];
         $filename    = $_FILES['image']['tmp_name'];  

         move_uploaded_file($filename, $destination);

         $query="insert into User(Name,UserName,Password,Email,Phone,Gender,DOB,Address,Photo) values('$name','$uname','$Password','$email','$phone','$gender','$dob','$address','$destination')";
         $ret= mysqli_query($connection,$query);
      
        echo '<script language="javascript">';
        echo 'alert("Registration successfully")';
        echo '</script>';
      } 

?>

	<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kinbo.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="Home.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>&nbsp&nbspProducts</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="Car.php"><b>Car</b></a></li>
          <li><a href="Mobile.php"><b>Mobile</b></a></li>
          <li><a href="Computer.php"><b>Computer</b></a></li>
        </ul>
		     
      </li>
     
     

      <form class="navbar-form navbar-left">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" size="40">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </ul>
	
	
   <ul class="nav navbar-nav navbar-right">
   <li><a href="About Project.php"><b>About site</b></a></li>
    <li><a href="Contact Us.php"><b>Contact Us</b></a></li>
       <li  class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>User Login</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="UserLogin.php"><b>User Login</b></a></li>
          <li><a href="AdminLogin.php"><b>Admin Login</b></a></li>
        </ul>
      </li>
      <li class="active"><a href="Registration.php"><span class="glyphicon glyphicon-user"></span> <b>Sign Up</b></a></li>
     
    </ul>
  </div>
</nav>
  

		<div class="container">
			<div class="row main">
				<div class="main-login main-center">
				<h3>User Registration Form</h5>
					<form method="POST"  enctype="multipart/form-data" name="Registerform"  onsubmit="return RegisterValid();" >
						
						<div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
								</div>
							</div>
						</div>
					    <div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="uname" id="uname"  placeholder="Enter your User Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>


						<div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="phone"  placeholder="Enter your Phone Number"/>
								</div>
							</div>
						</div>
							

                        <div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="date" class="form-control" name="dob"/>
								</div>
							</div>
						</div>

                        <div class="form-group">
							
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="address" placeholder="Your Address" />
								</div>
							</div>
						</div>
                            <div class="form-group">
							<label  class="cols-sm-2 control-label">Your Gender</label>
							<div class="cols-sm-10">
								<div class="input-group">
									
									<input type="radio" name="gender" value="Male" />Male
									<input type="radio" name="gender" value="Female" />Female
								</div>
							</div>
						</div>
						  <div class="form-group">
							<label class="cols-sm-2 control-label">Your Profile Picture</label>
							<div class="cols-sm-10">
								<div class="input-group">
								
									<input type="file" name="image">
								</div>
							</div>
						</div>

						<div class="form-group ">
							<input  type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">
						</div>
						
					</form>
				</div>
			</div>
		</div>

	
	</body>
</html>