<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $par = clean($_POST['par']);
    $con = clean($_POST['contest']);
    $rank = clean($_POST['rank']);
    $award = clean($_POST['award']);
    $p="p";
    $res=mysqli_query($connection,"UPDATE `result` SET `rank`='$rank',`award`='$award' WHERE `id`='$par' and `contest_id`='$con'")or die(mysqli_error($connection));
    $success = "Contest successfully evaluated";
}
$contests= mysqli_query($connection,"SELECT  * FROM `contests`");
$par=mysqli_query($connection,"SELECT * FROM `users` where `j_p`='P'");
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <?php require_once 'sidebar.php';?>
        </nav>
        <div class="col-md-10 mt-3">
            <div class="row">
                <label style='color:black; font-size:24px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Evaluation</label>
                <br/><br/>
                <br/>
                <div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-9">
                    <?php if(!empty($success)){?>
                    <div style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'class="alert alert-success alert-dismissible fade in" role="alert">
                        <?php echo $success;?>
                    </div>
                    <?php } ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                            <label style='color:black; font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Participant's Mail ID</label>
                            <select name="par" class="form-control">
                                <?php while ($j = mysqli_fetch_assoc($par)) {?>
                                <option style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;' value="<?php echo $j['id'] ?>"><?php echo $j['email'] ?></option>
                                <?php }?>
                            </select>
                        </div><br/>
                        <div class="form-group">
                            <label style='color:black; font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Contest</label>
                            <select name="contest" class="form-control">
                                <?php while ($c = mysqli_fetch_assoc($contests)) {?>
                                <option style='color:black;font-family: Verdana, Geneva, Tahoma, sans-serif;' value="<?php echo $c['contest_id'] ?>"><?php echo $c['c_name'] ?></option>
                                <?php }?>
                            </select>
                        </div><br/>
                        <div class="form-group">
                            <label style='color:black; font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Rank</label>
                            <input style='color:black; font-size:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' class="form-control" type = "number" name = "rank" id = "rank"/>
                        </div><br/>
                        <div class="form-group">
                            <label style='color:black; font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Award</label>
                            <input style='color:black; font-size:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' class="form-control" type = "number" name = "award" id = "award"/>
                        </div><br/>
                        <div>
                            <button style='color:white;font-size:18px; background-color:black;padding:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</body>
</html>