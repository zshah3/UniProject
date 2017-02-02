<?php session_start(); 
if (!isset($_SESSION['username'])) {
header('Location: login.php');
} echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
 <head>
  <title> Statistics </title>
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
  <meta name="author" content="Zubair Shah" />
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

<form action=" " method='post' >
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
<br>
<h1><b>Statistics</b></h1>
<?php
$con=mysqli_connect("mysql.cms.gre.ac.uk","sz106","disksm4D","mdb_sz106");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$result = mysqli_query($con,"SELECT * FROM stats");

echo "<table border='1', align='center' id='table1'>
<tr id='tr'>
<th>Player Name</th>
<th>Matches</th>
<th>Runs Scored</th>
<th>High Score</th>
<th>50s</th>
<th>100s</th>
<th>Overs</th>
<th>Wickets</th>
<th>Runs Conceded</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['player'] . "</td>";
  echo "<td>" . $row['matches'] . "</td>";
  echo "<td>" . $row['runs'] . "</td>";
  echo "<td>" . $row['highscore'] . "</td>";
  echo "<td>" . $row['50s'] . "</td>";
  echo "<td>" . $row['100s'] . "</td>";
  echo "<td>" . $row['overs'] . "</td>";
  echo "<td>" . $row['wickets'] . "</td>";
  echo "<td>" . $row['runsconceded'] . "</td>";
  echo "<td width='5%'><a href='deleteStats.php?id=$row[id]' >Delete</a></td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>
<br>
 
  <table id='table2' width='400' border='0' align='center'>
  <tr>
  <td colspan='2' align='center'>Add new statistics here</td>
  </tr>

  <tr>
  <td align='center'>Player Name:</td>
  <td><input type='text' name='name' /></td>
  </tr>

  <tr>
  <td>Matches:</td>
   <td><input type='text' name='matches' /></td>
  </tr>
  <tr>
  <td align='center'>Runs Scored:</td>
  <td><input type='text' name='runs' /></td>
  </tr>
  <tr>
  <td align='center'>High Score:</td>
  <td><input type='text' name='highscore' /></td>
  </tr>
  <tr>
  <td align='center'>50s:</td>
  <td><input type='text' name='a50s' /></td>
  </tr>
  <tr>
  <td align='center'>100s:</td>
  <td><input type='text' name='a100s' /></td>
  </tr>
  <tr>
  <td align='center'>Overs:</td>
  <td><input type='text' name='overs' /></td>
  </tr>
  <tr>
  <td align='center'>Wickets:</td>
  <td><input type='text' name='wickets' /></td>
  </tr>
  <tr>
  <td align='center'>Runs Conceded:</td>
  <td><input type='text' name='runsconceded' /></td>
  </tr>

 <tr><td colspan='2' align='center'><input type='submit' name='submit' value='Confirm' /></td>
  </tr>
 </table>

<?php
$con=mysqli_connect("mysql.cms.gre.ac.uk","sz106","disksm4D","mdb_sz106");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(isset($_POST['submit'])){
$sql="INSERT INTO stats (player, matches, runs, highscore, 50s, 100s, overs, wickets, runsconceded)
VALUES
('$_POST[name]',     '$_POST[matches]',       '$_POST[runs]',      '$_POST[highscore]',     '$_POST[a50s]',       '$_POST[a100s]',      '$_POST[overs]',       '$_POST[wickets]',      '$_POST[runsconceded]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con);
}
?>


 <table id= 'table2' width='400' border='0' align='center'>
  <tr>
  <td colspan='2' align='center'>Edit existing statistics here</td>
  </tr>

  <tr>
  <td align='center'>Player Name:</td> 
 <td>
 <?php
  $con=mysqli_connect("mysql.cms.gre.ac.uk","sz106","disksm4D","mdb_sz106");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
echo "<select name='dropdwn'>";
$result = mysqli_query($con,"SELECT player FROM stats");
while($row = mysqli_fetch_array($result))
{
echo "<option>".$row['player']."</option>";
}
echo "</select>";
?></td>
</tr>
  <tr>
  <td>Matches:</td>
   <td><input type='text' name='matches2' /></td>
  </tr>
  <tr>
  <td align='center'>Runs Scored:</td>
  <td><input type='text' name='runs2' /></td>
  </tr>
  <tr>
  <td align='center'>High Score:</td>
  <td><input type='text' name='highscore2' /></td>
  </tr>
  <tr>
  <td align='center'>50s:</td>
  <td><input type='text' name='a50s2' /></td>
  </tr>
  <tr>
  <td align='center'>100s:</td>
  <td><input type='text' name='a100s2' /></td>
  </tr>
  <tr>
  <td align='center'>Overs:</td>
  <td><input type='text' name='overs2' /></td>
  </tr>
  <tr>
  <td align='center'>Wickets:</td>
  <td><input type='text' name='wickets2' /></td>
  </tr>
  <tr>
  <td align='center'>Runs Conceded:</td>
  <td><input type='text' name='runsconceded2' /></td>
  </tr>

 <tr><td colspan='2' align='center'><input type='submit' name='submit2' value='Confirm' /></td>
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
if(isset($_POST['submit2'])){
$sql="UPDATE stats SET matches = if('$_POST[matches2]' = ' ', matches,'$_POST[matches2]'),
runs = if('$_POST[runs2]' = ' ', runs, '$_POST[runs2]'), 
highscore = if('$_POST[highscore2]' = ' ', highscore, '$_POST[highscore2]'),
50s= if('$_POST[a50s2]' = ' ', 50s, '$_POST[a50s2]'),
100s = if('$_POST[a100s2]' = ' ', 100s, '$_POST[a100s2]'),
overs = if('$_POST[overs2]' = ' ', overs, '$_POST[overs2]'),
wickets = if('$_POST[wickets2]' = ' ',wickets, '$_POST[wickets2]'),
runsconceded = if('$_POST[runsconceded2]' = ' ', runsconceded, '$_POST[runsconceded2]')
WHERE player='$_POST[dropdwn]'";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con);
}
?>
<br>
  <form method='post'>
 


<p>You are logged in as <b><?php echo $_SESSION['username']; ?></b></p>
<footer>
  <p><a href="logout.php">Logout</a>   |   <a href="adminSitemap.php">Sitemap</a></p>
  </footer>
</div>
 </body>
</html>
