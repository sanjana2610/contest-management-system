<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}
$ci=$_GET['id'];
$contests= mysqli_query($connection,"SELECT * FROM `contests` where `contest_id`=".$_GET['id']);
$con=mysqli_fetch_assoc($contests);
$par=getUsername();
$response = mysqli_query($connection,"SELECT * FROM `users` WHERE `email`='$par'") or die(mysqli_error($connection));
      $jp= mysqli_fetch_assoc($response);
      $uid=$jp['id'];
      $rank=mysqli_query($connection,"SELECT `rank`,`award` FROM `result` where `id`='$uid' and `contest_id`='$ci'");
      $r=mysqli_fetch_assoc($rank);

?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <?php require_once 'sidebar.php';?>
        </nav>
        <div class="col-md-10 mt-3">
            <div class="row">
                <label style='color:black; font-size:24px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $con['c_name'] ?></label>
                <br/><br/>
                <br/>
                <div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-9">
                <?php if(!empty($success)){?>
                    <div style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'class="alert alert-success alert-dismissible fade in" role="alert">
                        <?php echo $success;
                        ?>
                    </div>
                    <?php } ?>
                <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Venue:  <span style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $con['college'],",",$con['block'],",",$con['room_no'],"."?></span></h3>
                    <br/>
                    <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Time:   <span style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $con['time'] ?></span></h3>
                    <br/>
                    <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Date:   <span style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $con['date'] ?></span></h3>
                   <br/>
                   <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Rank:   <span style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $r['rank'] ?></span></h3>
                   <br/>
                   <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Award:   <span style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $r['award'] ?></span></h3>
                   <br/> <?php
              if( strcmp($jp['j_p'],'P')){
                  ?>
                   <button style='color:white;font-size:18px; background-color:black;padding:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;"name='update' id='update'> <a style='color:white;text-decoration:none;'href='parResult.php'>Back </a></button>
                  <?php
              }else{?>
                <button style='color:white;font-size:18px; background-color:black;padding:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;"name='update' id='update'> <a style='color:white;text-decoration:none;'href='parResult.php'>Back </a></button><?php }?>
                </div>
            </div>
        </div>        
</div>
</div>
</div>
</body>
</html>