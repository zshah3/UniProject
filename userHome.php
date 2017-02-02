<?php session_start(); 
if (!isset($_SESSION['username2'])) {
header('Location: login.php');
}
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
 <head>
  <title> Home </title>
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

 <body align='center'>
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

<h1> Newham Cricket Club</h1>
<p> Welcome to Newham cricket club website.</p>
 
 <div id='div2'>

 </div>

<p>You are logged in as <b><?php echo $_SESSION['username2']; ?></b></p>
<footer>
  <p><a href="logout.php">Logout</a>   |   <a href="userSitemap.php">Sitemap</a></p>
  </footer>
</div>
 </body>
</html>
