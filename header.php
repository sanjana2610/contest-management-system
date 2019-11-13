<?php
require_once 'config.php';
if (!verifySession()) {
  header("Location: index.php");
}
$user=getUsername();
$response = mysqli_query($connection,"SELECT * FROM `users` WHERE `email`='$user'") or die(mysqli_error($connection));
$u= mysqli_fetch_assoc($response);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CMS</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <style>
  h2,h4{
padding:5px;
margin:0px;
  }
  .navbar{
     padding:3px; 
    }
    a:link{
color:white;
    }
    .nav{
        padding-right:30px;
    }
 
  </style>
  
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php 
if(strcmp($u['j_p'],"P")){
  echo "welcomej.php";
}else
{
  echo "welcomep.php";
}
      ?>"style='color:white; text-decoration:none;font-family: Verdana, Geneva, Tahoma, sans-serif; padding-top:20px;padding-left:30px' >Contest Management System</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><h4 style='font-family: Verdana, Geneva, Tahoma, sans-serif; color:white;'><span class="glyphicon glyphicon-log-in "></span> Logout</h4></a></li>
    </ul>
  </div>
</nav>