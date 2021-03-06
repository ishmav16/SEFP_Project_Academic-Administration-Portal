<?php
session_start();

if(isset($_SESSION['usr_id'])) {
    header("Location: index.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['Name']);
    $email = mysqli_real_escape_string($con, $_POST['email_Id']);
    $password = mysqli_real_escape_string($con, $_POST['Password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $Phone_no=mysqli_real_escape_string($con,$_POST['Phone_no']);
 $Roll_No=mysqli_real_escape_string($con,$_POST['Roll_No']);
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
 if(strlen($Roll_No) < 11) {
        $error = true;
        $roll_error = "ROLL must be minimum of 11 characters";
   }
if(strlen((string)$Phone_no) < 10) {
        $error = true;
        $phone_error = "Phone no. must be minimum of 10 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
	//$some=123456;

    if (!$error) {
        if(mysqli_query($con, "INSERT INTO students(Name,Password,Roll_No,email_Id,Phone_no) VALUES('" . $name . "', '" . $password . "', '".$Roll_No."','".$email."','".$Phone_no."')")) {
            $successmsg = "Successfully Registered! <a href='Student_Login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Script</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- add header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Academic Administration Application</a>
        </div>
        <!-- menu items -->
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Student_Login.php">Login</a></li>
                <li class="active"><a href="Student_Register.php">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                    <legend>Sign Up</legend>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="Name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>

		    	<div class="form-group">
                        <label for="name">Roll No</label>
                        <input type="text" name="Roll_No" placeholder="Enter Roll Number" required value="<?php if($error) echo $Roll_No; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($roll_error)) echo $roll_error; ?></span>
                    </div>


                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email_Id" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>


                    <div class="form-group">
                        <label for="name">Phone no</label>
                        <input type="text" name="Phone_no" placeholder="Phone Number" required value="<?php if($error) echo $Phone_no; ?>" class="form-control" />
                                 <span class="text-danger"><?php if (isset($phone_error)) echo $phone_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="Password" placeholder="Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
        Already Registered? <a href="Student_Login.php">Login Here</a>
        </div>
    </div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
