<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}
$ci=$_GET['id'];
$contests= mysqli_query($connection,"SELECT * FROM `contests` where contest_id=".$_GET['id']);
$coni=mysqli_fetch_assoc($contests);
$par=getUsername();
      $rank=mysqli_query($connection,"SELECT * FROM `result` where `contest_id`='$ci' and `rank` is not null");
      $response = mysqli_query($connection,"SELECT * FROM `users` WHERE `email`='$par'") or die(mysqli_error($connection));
      $jp= mysqli_fetch_assoc($response);


      $con = [];
$conid = [];
while($r = mysqli_fetch_assoc($rank) ){
  $cid=$r['id'];
  $temp = mysqli_query($connection,"SELECT `name` FROM `users` where `id`='$cid'");
  $temp = mysqli_fetch_assoc($temp);
  $cname = $temp['name'];
  array_push($con,$cname);
  $temp=mysqli_query($connection,"SELECT `rank` FROM `result` where `id`='$cid' and `contest_id`='$ci'");
  $temp = mysqli_fetch_assoc($temp);
  $cid = $temp['rank'];
  array_push($conid,$cid);
}

?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <?php require_once 'sidebar.php';?>
        </nav>
        <div class="col-md-10 mt-3">
            <div class="row">
                <label style='color:black; font-size:24px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $coni['c_name'] ?></label>
                <br/><br/>
                <br/>
                <div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-9">
              
                  <h4 class = "panel-title"><ul class = "list-group">
                  <?php for($id=0;$id<count($con);$id++) {?>
                                <li class = "list-group-item" >
                                <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Name:   <span style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $con[$id] ?></span></h3>
                    <br/>
                    <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Rank:   <span style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $conid[$id] ?></span></h3>
                    <br/>
                    
                                <</li>
                                <?php }?>
                                

                  </ul>
                  <button style='color:white;font-size:18px; background-color:black;padding:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;"name='update' id='update'> <a style='color:white;text-decoration:none;'href='allContests.php'>Back </a></button>
                  </h4>
                </div>
            </div>

        </div>        
</div>
</div>
</div>
</body>
</html>