<?php session_start(); 
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
 <head>
  <title> Contacts </title>
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
 #background {width: 800px; background-color:#FFFFFF; float:center; margin: 0 auto; }
	
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
<br>
<h1><b>Contact details</b></h1>
<p>Full Address:<br>
Bobby Moore Pavilion,<br> 
Flanders Field, <br>
Napier Road, <br>
London E6 2SG.<br>
<br>
<br>
Email address: newhamcricketinfo@gmail.com
<p/>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


  <p>You are logged in as <b><?php echo $_SESSION['username']; ?></b></p>
<footer>
  <p><a href="logout.php">Logout</a>   |   <a href="adminSitemap.php">Sitemap</a></p>
  </footer>
</div>
 </body>
</html>
