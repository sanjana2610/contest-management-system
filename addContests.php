<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = clean($_POST['name']);
    $min = clean($_POST['minPar']);
    $max = clean($_POST['maxPar']);
    $college = clean($_POST['college']);
    $block = clean($_POST['block']);
    $room = clean($_POST['room']);
    $date = clean($_POST['date']);
    $time = clean($_POST['time']);
    $res = mysqli_query($connection,"INSERT INTO `contests`( `c_name`, `min_par`, `max_par`, `college`, `block`, `room_no`, `time`, `date`) VALUES ('$name',$min,$max,'$college','$block','$room','$time','$date')")or die(mysqli_error($connection));
    $success = "Contest added successfully";
}
?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <?php require_once 'sidebar.php';?>
        </nav>
        <div class="col-md-10 mt-3">
            <div class="row">
                <label style='color:black; font-size:24px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Add Contest</label>
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
                            <label  style='color:black; font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Contest Name</label>
                            <input class="form-control"  style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;' type="text"name="name" placeholder="Enter Contest name" required>
                        </div> <br/>
                        <div class="form-group">
                            <label  style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'>Minimum Participants</label>
                            <input class="form-control" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;' name="minPar" type='number' placeholder="Enter Minimum Participants" required>
                        </div> <br/>
                        <div class="form-group">
                            <label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'>Maximum Participants</label>
                            <input class="form-control" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;' name="maxPar" type='number' placeholder="Enter Maximum Participants" required>
                        </div> <br/>
                        <div class="form-group">
                            <label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'>College Name</label>
                            <input class="form-control"  style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'type="text"name="college" placeholder="Enter Contest College name" required>
                        </div> <br/>
                        <div class="form-group">
                            <label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'>Block Name</label>
                            <input class="form-control" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;' type="text"name="block" placeholder="Enter Contest Block name" required>
                        </div> <br/>
                        <div class="form-group">
                            <label style='color:black;font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Room Number</label>
                            <input class="form-control" style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;' type="text"name="room" placeholder="Enter Contest Room number" required>
                        </div> <br/>
                        <div class="form-group">
                            <label style='color:black;font-size:18px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Date</label>
                            <input class="form-control"  style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;'name="date" type='date'  required>
                        </div> <br/>
                        <div class="form-group">
                            <label style='color:black; font-size:18px;font-family: Verdana, Geneva, Tahoma, sans-serif;'>Time</label>
                            <input style='color:black; font-family: Verdana, Geneva, Tahoma, sans-serif;' class="form-control" name="time" type='text'  placeholder="Enter in h:m:s order"  required>
                        </div> <br/>
                        <div>
                            <button style='color:white;font-size:18px; background-color:black;padding:10px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;">Create</button>
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