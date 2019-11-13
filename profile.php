<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}
$user=getUsername();
$response = mysqli_query($connection,"SELECT * FROM `users` WHERE `email`='$user'") or die(mysqli_error($connection));
      $u= mysqli_fetch_assoc($response);
      ?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <?php require_once 'sidebar.php';?>
        </nav>
        <div class="col-md-10 mt-3">
            <div class="row">
                <label style='color:black; font-size:24px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Profile</label>
                <br/><br/>
                <br/>
                <div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-9">
                <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Name:</h3><p style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $u['name'] ?></p>
                    <br/>
                    <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Email:</h3><p style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $u['email'] ?></p>
                    <br/>
                    <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Contact Number:</h3><p style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $u['contact'] ?></p>
                    <br/>
                    <?php
              if( strcmp($jp['j_p'],'J')){
                  ?>
                   <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>College:</h3><p style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $u['info'] ?></p>
                    <br/><?php
              }else{?><h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Designation:</h3><p style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $u['info'] ?></p>
                <br/><?php }?>
                <button style='color:white;font-size:18px; background-color:black;padding:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;"name='update' id='update'> <a style='color:white;text-decoration:none;'href='update.php'>Update Profile </a></button>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</body>
</html>