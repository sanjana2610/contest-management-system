<?php

include('config.php');
if(isset($_POST['reg']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$c_pwd=$_POST['cnf_pwd'];
$contact = $_POST['contact'];
$j_p = $_POST['judgeorparticipant'];
$info = $_POST['info'];
$query = mysqli_query($connection,"SELECT * FROM `users` WHERE `email`= '$email' and `password`= '$pwd'") or die(mysqli_error($connection));
$count = mysqli_num_rows($query);
if($count != '0')
{
?>

<script>
alert('Already Exists');
</script>

<?php
}
else
{
if(strcmp($c_pwd,$pwd)){
  ?>

<script>
alert('Enter correct confirm password');
</script>

<?php
}else{
mysqli_query($connection,"INSERT INTO `users` ( `name`, `email`, `password`, `contact`, `j_p`, `info`) VALUES ('$name','$email','$pwd','$contact','$j_p','$info')") or die(mysqli_error($connection));
header("Location: index.php");

}
}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contest Management System</title>
<link href="vendor/bootstrap/css/bootstrap-social.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/register.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
    $('#jp').on('change', function() {
      if ( this.value == 'J')
      {
        $("#op1").show();
        $("#op2").hide();
      }
      else
      {
        $("#op2").show();
        $("#op1").hide();
      }
    });
});
</script>
</head>  
<body>
<div class='row' id='header'><h3>Contest Management System </h3></div>
<div class='wrapper'>
<form method="post" class="form-wrapper"> 
<label class="colour"> <h4>Name <span class="sp">*</span>: </h4> </label>  <Input type = "text" name = "name" id = "name" pattern="[A-Za-z0-9_]{1,15}" required/>
<br />
<label class="colour"><h4>E-mail id<span class="sp">*</span> :</h4> </label> <Input type="email" name = "email" id = "email"required/><br/>
<label class="colour"><h4> Password <span class="sp">*</span>:</h4> </label> <Input type = "password" name = "pwd"id = "pwd" pattern=".{6,}" required/>
<br />
<label class="colour"><h4>Confirm Password <span class="sp">*</span>:</h4> </label> <Input type = "password" name = "cnf_pwd"id = "cnf_pwd" pattern=".{6,}" required/>
<br />

<label class="colour"><h4> Contact number <span class="sp">*</span>: </h4></label> <Input type="text"  name = "contact" id = "contact" pattern="[1-9]{1}[0-9]{9}" required/>
<br />
<label>
<br />
  <label class="colour"><h4>Judge/Participant <span class="sp">*</span>: </h4></label> <select id='jp'name = "judgeorparticipant" class= "judgeorparticipant" required > 
  <option value="J"  class= "judgeorparticipant"> <h4>Judge </h4></option>
  <option value="P"class= "judgeorparticipant"> <h4>Participant </h4></option>
  </select>

<br /><br/>
<div >
<label id='op1'style='display:block;' class="colour" ><h4>Designation<span class="sp">*</span> :</h4> </label> 
<label  id='op2'style='display:none;' class="colour"><h4>College name<span class="sp">*</span> :</h4> </label> 
<div><Input type="text"  name = "info" required/></div>
<br/><br/></div>

<div class='row'>
    <div class='col-md-2'>
<button type="submit" name='reg' id='reg'>Register</button></div>
<div class='col-md-2'>
<button type="submit" style='padding-right:15px;padding-left:15px;' name='login' id='login'> <a style='color:white; text-decoration:none;'href='index.php'>Login </a></button></div>
</form> 
</div>
</body>
</html>





