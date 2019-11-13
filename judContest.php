<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}
$par=getUsername();
$id=mysqli_query($connection,"SELECT `id` FROM `users` where `email`='$par'");
$i = mysqli_fetch_assoc($id);
$dum=$i['id'];
$contest= mysqli_query($connection,"SELECT `contest_id` FROM `result` where `id`='$dum' and `j_p`='j'");
$con = [];
$conid = [];
while($c = mysqli_fetch_assoc($contest) ){
  $cid=$c['contest_id'];
  $temp = mysqli_query($connection,"SELECT `c_name` FROM `contests` where `contest_id`='$cid'");
  $temp = mysqli_fetch_assoc($temp);
  $cname = $temp['c_name'];
  array_push($con,$cname);
  $temp=mysqli_query($connection,"SELECT `contest_id` FROM `contests` where `c_name`='$cname'");
  $temp = mysqli_fetch_assoc($temp);
  $cid = $temp['contest_id'];
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
                <label style='color:black; font-size:24px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Assigned Contests</label>
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
                                <form action="viewContestpar.php" method="get">
                                <input type="text" name="id" value="<?php echo $conid[$id] ?>" hidden>
                                <button style=' background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
    color:black;color:black; font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;' 
    type="submit" class="btn btn-primary"><?php echo $con[$id] ?></button></li>
                                </form>
                                <?php }?>
                                

                  </ul>
                  </h4>
                </div>
            </div>
        </div>  

</div>
</div>
</div>
</body>
</html>