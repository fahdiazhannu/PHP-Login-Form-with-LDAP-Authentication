<?php 
// start session
session_start();
 
// destroy session
session_destroy();
 
// redirect with message
header("location:index.php?message=logout");
?>