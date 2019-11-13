<?php
require_once 'header.php';
$par=getUsername();
$details= mysqli_query($connection,"SELECT * FROM `users` where `email`='$par'");
$detail=mysqli_fetch_assoc($details);
   ?>
         <div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar" style='background-color:white'>
            <?php require_once 'sidebar.php';?>
        </nav>
        <div class="col-md-10">
        <h2 class="mt-3" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'> Welcome <?php echo $detail['name']  ?> :)</h2><br/>
            <h2 class="mt-3" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Dashboard</h2>
            <div class="container">
<div class='row '>
<div class='col-md-6 border-primary rounded'>
<div class="card border " style="width:400px ;">
    <img class="card-img-top" src="images/contests.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Registered Contests</h4>
      <p class="card-text"  style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'>  Keep track of your upcoming contests :)</p>
      <a href="parContest.php" class="btn btn-primary">view</a>
    </div></div></div><br><br>
    <div class='col-md-6 border-primary rounded'>
    <div class="card border " style="width:400px ;">
    <img class="card-img-top" src="images/prfl.png" alt="Card image" style="width:180px;height:150px">
    <div class="card-body">
      <h4 class="card-title"style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Profile</h4>
      <p class="card-text" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'>  Know your details :)</p>
      <a href="profile.php" class="btn btn-primary">See Profile</a>
      <br>
    </div></div></div>
    <br/><br/>
    <div class='col-md-6 border-primary rounded'>
    <div class="card border " style="width:400px ;">
    <img class="card-img-top" src="images/badge.jpg" alt="Card image" style="width:180px;height:180px">
    <div class="card-body">
      <h4 class="card-title" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Bagged awards</h4>
      <p class="card-text" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'>you are talented :)</p>
    <a href='parResult.php' class="btn btn-primary">See awards</a>
    </div></div></div>
  </div></div></div>
        </div>
    </div>
</div>
</body>
</html>