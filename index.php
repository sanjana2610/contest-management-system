<?php
require_once('config.php');
use Firebase\JWT\JWT;

if (verifySession()) {
  header("Location: welcomep.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = clean(h($_POST['email']));
  $password = clean(h($_POST['pwd']));
  $res = query("select password from users where email='$username'");
  $password_in_db = mysqli_fetch_assoc($res);
  if (!isset($password_in_db)) {
      $error = "Email not found";
  } else if (strcmp($password_in_db['password'], $password) != 0) {
      $error = "Password Invalid";
  } else {
      $issuedAt = time();
      $expirationTime = $issuedAt + 3600; // jwt valid for 3600 seconds from the issued time
      $payload = array(
          'username' => $username,
          'iat' => $issuedAt,
          'exp' => $expirationTime,
      );
      $key = JWT_KEY;
      $alg = 'HS256';
      $jwt = JWT::encode($payload, $key, $alg);
      $response = mysqli_query($connection,"SELECT `j_p` FROM `users` WHERE `email`='$username'") or die(mysqli_error($connection));
      $jp = mysqli_fetch_assoc($response);
if( strcmp($jp['j_p'],'P')){
  startSession($jwt);
      header("Location: " . "welcomej.php");}
      else{
        startSession($jwt);
      header("Location: " . "welcomep.php");
      }
      exit;
  }

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contest Management System</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class='row' id='header'><h3 style='color:white'>Contest Management System </h3></div>
<div class='wrapper'>
<form method="post" class="form-wrapper">
<label class="colour"><h4> <span class="fa fa-user"></span>Email<span class="sp">*</span></h4> </label> <input type="email" id='email'name="email" required/>
<br />
<label class='colour'><h4><span class="fa fa-key"> </span>Password <span class="sp">*</span></h4></label> <input type="password"id='pwd' name="pwd" required/>
<br />
<p style="color: red;"><?php if (isset($error)) {echo $error;}?></p>
<div class='row'>
    <div class='col-md-2'>
<button type="submit" name='login' id='login'>Login</button></div>
<div class='col-md-2'>
<button> <a style='color:white; text-decoration:none;'href='register.php'>Register </a></button></div>
</form>


</div> 
</body>
</html>