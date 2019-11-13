<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = clean($_POST['name']);
                    $email = clean($_POST['email']);
                    $pass = clean($_POST['pass']);
                    $contact = clean($_POST['num']);
                    $info = clean($_POST['info']);
                      $id=clean($_POST['id']);
                $res=mysqli_query($connection,"UPDATE `users` SET `name`='$name',`email`='$email',`password`='$pass',`contact`='$contact',`info`='$info' WHERE `id`='$id'");
                $success = "Updated successfully";
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
                <label style='color:black; font-size:24px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Update Profile</label>
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
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                        <input type="text" name="id" value="<?php echo $u['id'] ?>" hidden>
                        <label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'> <h4>Name : </h4> </label>  
                        <input style='color:black; font-size:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' class="form-control" value="<?php echo $u['name'] ?>" type = "text" name = "name" id = "name"/>
                        </div> <br/>
                        <div class="form-group">
                        <label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'> <h4>email: </h4> </label>  
                        <input style='color:black; font-size:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' class="form-control" type = "email" value="<?php echo $u['email'] ?>"name = "email" id = "email"/>
                        </div> <br/>
                        <div class="form-group">
                        <label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'> <h4>Password: </h4> </label>  
                        <input style='color:black; font-size:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' class="form-control" type = "password" value="<?php echo $u['password'] ?>"name = "pass" id = "pass"/>
                        </div> <br/>
                        <div class="form-group">
                        <label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'> <h4> Contact number: </h4> </label>  
                        <input style='color:black; font-size:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' class="form-control"value="<?php echo $u['contact'] ?>" type = "number" name = "num" id = "num"/>
                        </div> <br/>
                        <div ><?php
                        if(strcmp($u['j_p'],'P')){ ?>
<label  style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'id='op1'style='display:none;' class="colour" ><h4>Designation:</h4> </label>
<?php } else { ?>
<label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;' id='op2'style='display:none;' class="colour"><h4>College name:</h4> </label> <?php } ?>
<div><Input style='color:black; font-size:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' class="form-control" type="text" value="<?php echo $u['info'] ?>" name = "info" required/></div>
<br/><br/></div>
                        <div>
                            <button style=' margin-bottom:20px;color:white;font-size:18px; background-color:black;padding:10px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;">Update</button>
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