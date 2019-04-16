<?php
session_start();
if(isset($_SESSION['fb_access_token'])) header('Location: page/app.php');
else header( "Location: page/login.php" );
?>
