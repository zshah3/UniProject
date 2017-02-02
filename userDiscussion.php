<?php session_start(); 
if (!isset($_SESSION['username2'])) {
header('Location: login.php');
}  echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
 <head>
  <title> Discussions </title>
  <meta name="generator" content="editplus" />
  <meta name="author" content="Zubair Shah" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
 </head>
 <style type='text/css'>
 body {background-color: #606060;  text-align: center; font-family: arial, verdana, sans-serif;}
 h1 {text-align: center; color: black;}
 #table {float:center; background-color:#A9BCF5; color:#190707; width:90%; padding:5px;border:1px; } 
 #tr {background-color:#0000a0; color:#d0d0d0; }
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
    <a href="userHome.php">Home</a>
    <a href="userFixtures.php">Fixtures & Results</a>
    <a href="userContacts.php">Contacts</a>
    <a href="userSquads.php">Squads</a>
	<a href="userStats.php">Statistics</a>
    <a href="userDiscussion.php">Discussion</a>
	<a href="userScores.php">Live scores</a>
</div>
<p></p>
<p></p>
<br>
<h1><b>Discussions</b></h1>

<form method='post' action='userDiscussion.php'>
<?php
$con=mysqli_connect("mysql.cms.gre.ac.uk","sz106","disksm4D","mdb_sz106");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$result = mysqli_query($con,"SELECT * FROM discussion");

echo "<table border='1', align='center' id='table'>
<tr id='tr'>
<th width='1%'>ID</th>
<th width='15%'>Date</th>
<th width='15 %'>Username</th>
<th>Message</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td >" . $row['id'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['message'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>

 <table width='400' border='0' align='center'>
  <tr>
  <td colspan='2' align='center'>Write a  new message </td>
  </tr>

  <tr>
  <td align='center'>Date:</td>
  <td><input name='date' type='text' value="<?php echo date('Y-m-d'); ?>"  readonly></td>
  </tr>

   <tr>
  <td>Your Username:</td>
  <td align='center'><input name='name' value='<?php echo $_SESSION['username2']; ?>' readonly></td>
  </tr>

  <tr>
  <td align='center'>Your Message</td>
  <td><textarea name="message" rows=2 cols=20></textarea></td></td>
  </tr>

 <tr><td colspan='2' align='center'><input type='submit' name='submit' value='Post' /></td>
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

if(isset($_POST['submit'])){

$sql="INSERT INTO discussion (date, username, message)
VALUES
('$_POST[date]','$_POST[name]','$_POST[message]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con);
	
}


?>

 </body>

 <p>You are logged in as <b><?php echo $_SESSION['username2']; ?></b></p>
<footer>
  <p><a href="logout.php">Logout</a>   |   <a href="userSitemap.php">Sitemap</a></p>
  </footer>
</div>
 </body>
</html>