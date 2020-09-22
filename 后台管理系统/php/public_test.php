<?php
    session_start();
    if(!isset($_SESSION['name'])){
        echo "<script>window.location.href='../index.html'</script>";
    }
?>