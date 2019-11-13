<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}

$contests= mysqli_query($connection,"SELECT * FROM `contests` where contest_id=".$_GET['id']);
$con=mysqli_fetch_assoc($contests);
$par=getUsername();
$response = mysqli_query($connection,"SELECT * FROM `users` WHERE `email`='$par'") or die(mysqli_error($connection));
      $jp= mysqli_fetch_assoc($response);
if(isset($_POST['del']))
{
    $id = $_POST['id'];
    $res= mysqli_query($connection,"DELETE FROM `contests` where contest_id=$id");
    header("Location: contests.php");
}if(isset($_POST['reg']))
{   $cid = $_POST['id'];
    $id=$jp['id'];
    $p="p";
    $res=mysqli_query($connection,"INSERT INTO `result` ( `id`, `contest_id`, `j_p`) VALUES ('$id','$cid','$p')")or die(mysqli_error($connection));
    $success="Successfully registered";
}
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
                    <?php
              if( strcmp($jp['j_p'],'P')){
                  ?>
                  <form method="post" >
                                <input type="text" name="id"id='id' value="<?php echo $con['contest_id'] ?>" hidden>
                  <button style='color:white;font-size:18px; background-color:black;padding:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;"name='del' id='del'>Delete Contest</button>
                  </form> <?php
              }else{?> <form method="post" >
              <input type="text" name="id"id='id' value="<?php echo $con['contest_id'] ?>" hidden>
              <button style='color:white;font-size:18px; background-color:black;padding:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;"name='reg' id='reg'>Register</button></form><?php }?>
                
                </div>
            </div>
        </div>        
</div>
</div>
</div>
</body>
</html>