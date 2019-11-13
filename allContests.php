<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}

$contests= mysqli_query($connection,"SELECT * FROM `contests`");
$c = mysqli_fetch_assoc($contests);
$con= mysqli_query($connection,"SELECT `contest_id`,`c_name` FROM `contests`");

$judge=mysqli_query($connection,"SELECT * FROM `users` where `j_p`='J'");
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <?php require_once 'sidebar.php';?>
        </nav>
        <div class="col-md-10 mt-3">
            <div class="row">
                <label style='color:black; font-size:24px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Contests</label>
                <br/><br/>
                <br/>
                <div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-9">
              
                  <h4 class = "panel-title"><ul class = "list-group">
                  <?php while ($id=mysqli_fetch_assoc($con)) {?>
                                <li class = "list-group-item" >
                                <form action="result.php" method="get">
                                <input type="text" name="id" value="<?php echo $id['contest_id'] ?>" hidden>
                                <button style=' background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
    color:black;color:black; font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;' 
    type="submit" class="btn btn-primary"><?php echo $id['c_name'] ?></button></li>
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