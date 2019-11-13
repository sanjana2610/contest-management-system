<?php
require_once 'header.php';
if (!verifySession()) {
    header("Location: index.php");
}

$sponser=mysqli_query($connection,"SELECT * FROM `sponser`");


?>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <?php require_once 'sidebar.php';?>
        </nav>
        <div class="col-md-10 mt-3">
            <div class="row">
                <label style='color:black; font-size:24px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Sponser Details</label>
                <br/><br/>
                <br/>
                <div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-9">
              
                  <h4 class = "panel-title"><ul class = "list-group">
                  <?php while($s=mysqli_fetch_assoc($sponser)) {?>
                                <li class = "list-group-item" >
                                <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Organisation Name:   <span style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $s['org_name'] ?></span></h3>
                    <br/>
                    <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Contact:   <span style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $s['contact'] ?></span></h3>
                    <br/>
                    <h3 style='color:black; font-size:20px; font-family: Verdana, Geneva, Tahoma, sans-serif;'>Amount:   <span style='color:black; font-size:17px; font-family: Verdana, Geneva, Tahoma, sans-serif;'><?php echo $s['amount'] ?></span></h3>
                    <br/>
                    
                                <</li>
                                <?php }?>
                                

                  </ul>
                  <button style='color:white;font-size:18px; background-color:black;padding:15px;font-family: Verdana, Geneva, Tahoma, sans-serif;' type="submit" class="btn" style="width: 220px;"name='update' id='update'> <a style='color:white;text-decoration:none;'href='welcomej.php'>Back </a></button>
                  </h4>
                </div>
            </div>

        </div>        
</div>
</div>
</div>
</body>
</html>