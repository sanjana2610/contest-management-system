<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clean($_POST['name']);
    $cid = clean($_POST['contest']);
    $contact = clean($_POST['contact']);
    $amount = clean($_POST['amount']);
    
    $res = mysqli_query($connection,"INSERT INTO `sponser`(`contest_id`, `org_name`, `contact`, `amount`) VALUES ('$cid','$name','$contact','$amount')")or die(mysqli_error($connection));
    $success = "Sponser added successfully";
}
$contests= mysqli_query($connection,"SELECT * FROM `contests`");
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <?php require_once 'sidebar.php';?>
        </nav>
        <div class="col-md-10 mt-3">
            <div class="row">
                <label style='color:black; font-size:24px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Add Sponser</label>
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
                            <label  style='color:black; font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Organisation Name</label>
                            <input class="form-control"  style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;' type="text"name="name" placeholder="Enter Organisation name" required>
                        </div> <br/>
                        <div class="form-group">
                            <label style='color:black; font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Contest</label>
                            <select name="contest"  class="form-control">
                                <?php while ($c = mysqli_fetch_assoc($contests)) {?>
                                <option style='color:black;font-family: Verdana, Geneva, Tahoma, sans-serif;'  value="<?php echo $c['contest_id'] ?>"><?php echo $c['c_name'] ?></option>
                                <?php }?>
                            </select>
                        </div><br/>
                        <div class="form-group">
                            <label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'>Contact</label>
                            <input class="form-control" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;' name="contact" type='text' placeholder="Enter Contact number" pattern="[1-9]{1}[0-9]{9}" required>
                        </div> <br/>
                        <div class="form-group">
                            <label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'>Amount</label>
                            <input class="form-control"  style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'type="number"name="amount" placeholder="Enter Amount" required>
                        </div> <br/>
                        
                        <div>
                            <button style='color:white;font-size:18px; background-color:black;padding:10px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;">Add</button>
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