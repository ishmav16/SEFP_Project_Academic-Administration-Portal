
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home | Academic Administration Application</title>
	   <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

</head>


<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Academic Administration Application</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['usr_id'])) { ?>
                <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
                <li><a href="logout.php">Log Out</a></li>

                <li><a href="login.php"></a></li>
                <li><a href="register.php"></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<center>
		<div class="form-group">
                        <a href="coursepage.php"><input type="submit" name="ADD COURSE" value="Add Course" class="btn btn-primary" /></a>
                    </div>
</center>
<center>
		<div class="form-group">
                        <a href="take_attendance1d.php"><input type="submit" name="Take Attendance" value="Take Attendance" class="btn btn-primary" /></a>
                    </div>
</center>
<center>
		<div class="form-group">
                        <a href="display_attendance1.php"><input type="submit" name="Display Attendance" value="Display Attendance" class="btn btn-primary" /></a>
                    </div>
</center>
<center>
		<div class="form-group">
                        <a href="Announcement1.php"><input type="submit" name="ANNOUNCEMENT" value="Announcement" class="btn btn-primary" /></a>
                    </div>
</center>


<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
