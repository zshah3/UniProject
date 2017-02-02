<?php session_start(); 
if (!isset($_SESSION['username'])) {
header('Location: login.php');
} echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
 <head>
  <title> Live Scores </title>
  <meta name="generator" content="editplus" />
  <meta name="author" content="Zubair Shah" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
 </head>

 <body>
  <?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
 <head>
  <title> Teams </title>
  <meta name="generator" content="editplus" />
  <meta name="author" content="" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
 </head>
 <style type='text/css'>
 body {background-color: #606060;  text-align: center; font-family: arial, verdana, sans-serif;}
 h1 {text-align: center; color: black;}
 #table1 {float:center; background-color:#A9BCF5; color:#190707; width:90%; padding:5px;border:1px; } 
 #table2 {float:center; background-color: #81DAF5;}
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
    <a href="adminHome.php">Home</a>
    <a href="adminFixtures.php">Fixtures & Results</a>
    <a href="contacts.php">Contacts</a>
    <a href="adminSquads.php">Squads</a>
	<a href="adminStats.php">Statistics</a>
    <a href="adminDiscussion.php">Discussion</a>
	<a href="adminScores.php">Live scores</a>
</div>

<br>

<br>
<h1><b>Live Scores</b></h1>

<?php
$con=mysqli_connect("mysql.cms.gre.ac.uk","sz106","disksm4D","mdb_sz106");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM livescore");

echo "<table border='1', align='center' id='table1'>
<tr id='tr'>
<th>ID</th>
<th>Date</th>
<th>1st Team Match</th>
<th>2nd Team Match</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['1stXI'] . "</td>";
  echo "<td>" . $row['2ndXI'] . "</td>";
  echo "<td width='5%'><a href='deleteScores.php?id=$row[id]' >Delete</a></td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>
<form>
<input Type="button" onClick="history.go(0)" value="Refresh">
</form>



<br>
 <form method='post'>
  <table id='table2' width='400' border='0' align='center'>
  <tr>
  <td colspan='2' align='center'>Add  new score </td>
  </tr>

  <tr>
  <td align='center'>Date:</td>
  <td><input type='date' name='date' /></td>
  </tr>

  <tr>
  <td align='center'>1st Team Match:</td>
   <td><textarea name="team1" rows=2 cols=20></textarea></td>
  </tr>

  <tr>
  <td align='center'>2nd Team Match:</td>
  <td><textarea name="team2" rows=2 cols=20></textarea></td></td>
  </tr>

 <tr><td colspan='2' align='center'><input type='submit' name='submit' value='Confirm' /></td>
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
$sql="INSERT INTO livescore (date, 1stXI, 2ndXI)
VALUES
('$_POST[date]','$_POST[team1]','$_POST[team2]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con);
}
?>




<p>You are logged in as <b><?php echo $_SESSION['username']; ?></b></p>
<footer>
  <p><a href="logout.php">Logout</a>   |   <a href="adminSitemap.php">Sitemap</a></p>
  </footer>
</div>
 </body>
</html>
