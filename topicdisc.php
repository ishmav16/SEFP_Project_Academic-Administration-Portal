<?php
session_start();
if (isset($_SESSION['login'])!=true)
{
header("Location:Student_Login.php");
}

include_once 'dbconnect.php';
?>
<html>
<head>

<meta content="width=device-width, initial-scale=1.0" name="viewport" >
 <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {
    /*background-color: lightblue;
    text-align: center;         /* make sure IE centers the page too */
}

#wrapper {
    width: 900px;
    margin: 0 auto;             /* center the page */
}

#content {
    background-color: #fff;
    border: 1px solid #000;
    float: left;
    font-family: Arial;
    padding: 20px 30px;
    text-align: left;
    width: 100%;                /* fill up the entire div */
}

#menu {
    float: left;
    border: 1px solid #000;
    border-bottom: none;        /* avoid a double border */
    clear: both;                /* clear:both makes sure the content div doesn't float next to this one but stays under it */
    width:100%;
    height:20px;
    padding: 0 30px;
    background-color: #FFF;
    text-align: left;
    font-size: 85%;
}

#menu a:hover {
    background-color: #009FC1;
}

#userbar {
    background-color: #fff;
    float: right;
    width: 250px;
}

#footer {
    clear: both;
}

/* begin table styles */
table {
    border-collapse: collapse;
    width: 100%;
}

table a {
    color: #000;
}

table a:hover {
    color:#373737;
    text-decoration: none;
}

th {
    background-color: green;
    color: white;
}

td {
    padding: 5px;
}

/* Begin font styles */
h1, #footer {
    font-family: Arial;
    color: #F1F3F1;
}

h3 {margin: 0; padding: 0;}

/* Menu styles */
.item {
    background-color: #00728B;
    border: 1px solid #032472;
    color: #FFF;
    font-family: Arial;
    padding: 3px;
    text-decoration: none;
}

.leftpart {
    width: 70%;
}

.rightpart {
    width: 30%;
}

.small {
    font-size: 75%;
    color: #373737;
}
#footer {
    font-size: 65%;
    padding: 3px 0 0 0;
}

.topic-post {
    height: 100px;
    overflow: auto;
}

.post-content {
    padding: 30px;
}

textarea {
    width: 500px;
    height: 200px;
}
</style>
<head>
<body>
  <nav class="navbar navbar-default" role="navigation">

          <div class="collapse navbar-collapse" id="navbar1">
            	<a href="index.html"><img src="images/logo3.png" width="200px" height="120px" title="logo" /></a>
              <ul class="nav navbar-nav navbar-right">
                  <?php if (isset($_SESSION['usr_id'])) { ?>
                  <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name'];
                  $u=$_SESSION['usr_id'] ;?></p></li>
                  <li><a href="logout.php">Log Out</a></li>

                  <li><a href="login.php"></a></li>
                  <li><a href="register.php"></a></li>
                  <?php } ?>
              </ul>
          </div>
      </div>
  </nav>


<?php

$cid=$_GET['tid'];
include_once 'dbconnect.php';
 if (isset($_SESSION['usr_id']))
  {
  	//echo $_SESSION['usr_id'];
  	$id=$_SESSION['usr_id'];
        $n=$_SESSION['n1'] ;
  }

 $_SESSION['cid1']=$cid;
  $res1=mysqli_query($con,"select * from topicsstu where topic_id=$cid");
  $n1=mysqli_fetch_array($res1);
   $sid=$n1['topic_by'];
      $dat=$n1['topic_date'];
      $n11= $n1['topic_description'];
   echo "<tr>";
   if(mysqli_num_rows($res1)!=0)
   {
       $a1=mysqli_query($con,"select * from students where sid=$sid");
       $a2=mysqli_fetch_array($a1);
       $name=$a2['Name'];
  echo '<div class= "container"> <table border="1">
                      <tr>
                        <th>DOUBT</th>
                        <th>Created by</th>
                      </tr>';
echo "<tr>";
  echo "<td>";
echo "$n11";
  echo "</td>";
  echo "<td>";
  echo "$name on $dat";
    echo "</td>";
echo "</tr>";
echo "</table>";
   $r1=mysqli_query($con,"select * from posts where post_topic=$cid order by post_date");
   echo "<br><br>";
  echo '<table border="1">
                      <tr>
                        <th>DISCUSSED</th>
                        <th>Created by</th>
                      </tr>';
  while($n=mysqli_fetch_array($r1))
  {
  	$sid1=$n['post_by'];
  	$a11=mysqli_query($con,"select * from students where sid=$sid1");
       $a22=mysqli_fetch_array($a11);
     $post=  $n['post_content'];
     $name=$a22['Name'];
     $dat= $n['post_date'];
 echo "<tr>";
  echo "<td>";
echo "$post";
  echo "</td>";
  echo "<td>";
  echo "$name on $dat";
    echo "</td>";
echo "</tr>";

  }
 echo " </table>";
echo "<br><br>";
  }
?>

<form method="GET" action="<?php echo "topicdisc1.php?tid=$cid" ;?>">
<textarea name="reply-content"></textarea>
<input type="submit" name="submit" value="submit" />
</form>
</body>
</html>
