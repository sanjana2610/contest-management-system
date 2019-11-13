<?php
require_once 'config.php';
if(!verifySession()){
    header("Location: index.php");    
}
destroySession();
header("Location: index.php");    
?>
