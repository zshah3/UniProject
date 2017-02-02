<?php session_start(); echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
 <head>
  <title> Log In </title>
  <meta name="generator" content="editplus" />
  <meta name="author" content="Zubair Shah" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
 </head>
 <style type='text/css'>
 body {background-color: #606060;  text-align: center; font-family: arial, verdana, sans-serif;}
 h1 {text-align: center; color: black;}
 table {float:center;}
 #h_nav_bar a { padding:15px; font-weight:bold; float:center; }
 #h_nav_bar a:link { color:#d0d0d0; background-color:#0000a0; }
 #h_nav_bar a:visited { color:#c0c0c0; background-color:#0000a0; }
 #h_nav_bar a:hover { color:#ffffff; background-color:#000060; }
 #h_nav_bar a:active { color:#f0f0f0; background-color:#00ff00; }
 #banner {height: 150px; width: 800px; font-size: 32px; font-size: 32px; background: #FFFFFF url(Images/banner.jpg) left center no-repeat; margin: 0 auto; }
 #background {width: 800px; background-color:#FFFFFF; float:center; margin: 0 auto;}
	
</style>

 <body>
 <div id="banner" >
</div>
<div id='background'>
<br>

 <div id="h_nav_bar">
    <a href="adminHome.php">Home</a>
    <a href="adminFixtures.php">Fixtures & Results</a>
    <a href="adminContacts.php">Contacts</a>
    <a href="adminSquads.php">Squads</a>
	<a href="adminStats.php">Statistics</a>
    <a href="adminDiscussion.php">Discussion</a>
	<a href="adminScores.php">Live scores</a>
</div>

<h1> Newham Cricket Club</h1>
<p> Welcome to Newham cricket club website. This is a private website please log in for full functionality. If you are a member of the club and require a username and password please submit the form below</p>
<form method='post'>
  <table id='table2' width='400' border='0' align='center'>
 
  <tr>
  <td align='center'>Full Name:</td>
  <td><input type='text' name='name' /></td>
  </tr>

  <tr>
  <td align='center'>Email:</td>
   <td><input type='text' name="email" /></td>
  </tr>

  <tr>
  <td align='center'>Please state why you are enitiled to a username and password:</td>
  <td><textarea name="reason" rows=2 cols=20></textarea></td></td>
  </tr>

 <tr><td colspan='2' align='center'><input type='submit' name='submit3' value='Submit' /></td>
  </tr>
  </table>
  </form>
  <?php
$con=mysqli_connect("mysql.cms.gre.ac.uk","sz106","disksm4D","mdb_sz106");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(isset($_POST['submit3'])){
$sql="INSERT INTO requestform (fullname, email, reason)
VALUES
('$_POST[name]','$_POST[email]','$_POST[reason]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "Your request is pending. We will send you your username and password by email";

mysqli_close($con);
}
?>
<br>
<br>
<p>If you already have a username and password you can log in below</p>

  <form method='post' action='login.php'>
  <table width='400' border='0' align='center'>
  <tr>
  <td colspan='2' align='center'>Log in as a regular member</td>
  </tr>

  <tr>
  <td align='center'>User Name:</td>
  <td><input type='text' name='username2' /></td>
  </tr>

  <tr>
  <td>User Password:</td>
   <td><input type='password' name='password2' /></td>
  </tr>

 <tr><td colspan='2' align='center'><input type='submit' name='submit2' value='Log In' /></td>
  </tr>
  </table>
  </form>

  <form method='post' action='login.php'>
  <table width='400' border='0' align='center'>
  <tr>
  <td colspan='2' align='center'>Log in as an admin</td>
  </tr>

  <tr>
  <td align='center'>User Name:</td>
  <td><input type='text' name='username' /></td>
  </tr>

  <tr>
  <td>User Password:</td>
   <td><input type='password' name='password' /></td>
  </tr>

 <tr><td colspan='2' align='center'><input type='submit' name='submit' value='Log In' /></td>
  </tr>
  </table>
  </form>

 </body>
</html>

<?php
$con=mysqli_connect("mysql.cms.gre.ac.uk","sz106","disksm4D","mdb_sz106");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(isset($_POST['submit2'])){
$username = $_POST['username2'];
$password = $_POST['password2'];

$sql="select * from users where username='$username' AND password='$password'";


if(!mysqli_num_rows($run)>0){
	$_SESSION['username2']=$username;
	
echo "<script>window.open('userHome.php','_self')</script>";
}
else {
	echo "<script>alert('Email or password is incorrect')</script>";
}

}


$con=mysqli_connect("mysql.cms.gre.ac.uk","sz106","disksm4D","mdb_sz106");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];

$sql="select * from admins where username='$username' AND password='$password'";


if(!mysqli_num_rows($run)>0){
	$_SESSION['username']=$username;
	
echo "<script>window.open('adminHome.php','_self')</script>";
}
else {
	echo "<script>alert('Email or password is incorrect')</script>";
}

}
	
?>