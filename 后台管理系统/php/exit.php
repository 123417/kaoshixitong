<?php
    // include('./public.php');
    session_start();
    session_unset();
    echo "<script>window.location.href='../index.html'</script>";
?>