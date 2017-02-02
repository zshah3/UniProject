<?php
$con=mysqli_connect("mysql.cms.gre.ac.uk","sz106","disksm4D","mdb_sz106");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if(isset($_GET['id']) && !empty($_GET['id'])) {

$sql=("DELETE FROM requestform WHERE id=".$_GET['id']);

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  } else {
 
  }

mysqli_close($con);
  }

$con=mysqli_connect("mysql.cms.gre.ac.uk","sz106","disksm4D","mdb_sz106");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if(isset($_GET['id2']) && !empty($_GET['id2'])) {

$sql=("DELETE FROM users WHERE id=".$_GET['id2']);

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  } else {
 
  }

mysqli_close($con);


  }
header('Location: adminHome.php');
?>