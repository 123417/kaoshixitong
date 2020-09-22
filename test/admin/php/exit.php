<?php
session_start();
//$_SESSION['admin']='';
session_unset();
echo "<script>window.location.href='../index.php';</script>";
?>