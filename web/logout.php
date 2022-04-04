<?php 
    session_start();
    $url = "room.php";
    // $_SESSION["login"] = "N";
    session_unset();
header('Location: ' . $url);
